<?php

if (!defined('IN_INDEX')) { exit("This file can only be included in index.php."); }

$zdjecia = null;
$zdjecia1 = null;
$zdjecia2 = null;
$zdjecia3 = null;
$nazwa_pliku = null;
$kolumna = null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST != null && $_POST['kolumna'] > 0 && $_POST['kolumna'] <= 3) {

  $nazwa_pliku = $_POST['nazwa_pliku'];
  $kolumna = $_POST['kolumna'];

  $stmt = DB::getInstance()->prepare("INSERT INTO `zdjecia_baza` (`Sciezka`, `Kolumna`) VALUES (:nazwa_pliku, :kolumna)");

  $stmt->execute([
    ':nazwa_pliku' => $nazwa_pliku,
    ':kolumna' => $kolumna,
  ]);

  TwigHelper::addMsg('Zdjęcie zostało dodane.', 'success');

}
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST['kolumna'] > 3 || $_POST['kolumna'] < 1)) {
  
  TwigHelper::addMsg('Podano zły numer kolumny', 'error');
}

if (isset($_GET['delete'])) {
  $stmt = DB::getInstance()->prepare("DELETE FROM zdjecia_baza WHERE ID = :ID");
  $stmt->execute([':ID' => intval($_GET['delete'])]);
  header("Location: /galeria");
}

if (isset($_FILES['zdjecie'])) {

  $plik = $_FILES['zdjecie'];
  $nazwa = $plik['name'];
  $tmp = $plik['tmp_name'];

  // Przeniesienie przesłanego pliku do docelowego katalogu
  move_uploaded_file($tmp, "resources/" . $nazwa);

  // Inne operacje, które chcesz wykonać na przesłanym pliku
  // np. zapisanie informacji o zdjęciu w bazie danych itp.
}
  
// Wyświetlenie wszystkich zdjęć w katalogu
$katalog = 'resources/';
$zdjecia = glob($katalog . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

foreach ($zdjecia as &$zdjecie) {
  $zdjecie = basename($zdjecie);
}

$stmt = DB::getInstance()->prepare("SELECT * FROM zdjecia_baza WHERE Kolumna = 1");
$stmt->execute();
$zdjecia1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = DB::getInstance()->prepare("SELECT * FROM zdjecia_baza WHERE Kolumna = 2");
$stmt->execute();
$zdjecia2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = DB::getInstance()->prepare("SELECT * FROM zdjecia_baza WHERE Kolumna = 3");
$stmt->execute();
$zdjecia3 = $stmt->fetchAll(PDO::FETCH_ASSOC);

print TwigHelper::getInstance()->render('galeria.html', [
    'zdjecia' => $zdjecia,
    'zdjecia1' => $zdjecia1,
    'zdjecia2' => $zdjecia2,
    'zdjecia3' => $zdjecia3,
]);
