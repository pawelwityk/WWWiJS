<?php

$nazwa = null;
$category = null;

if (!defined('IN_INDEX')) { exit("This file can only be included in index.php."); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $category = $_POST['category'];

    $stmt = DB::getInstance()->prepare("INSERT INTO `sprzet` (`Nazwa`, `Kategoria`) VALUES (:name, :category)");

    $stmt->execute([
        ':name' => $name,
        ':category' => $category,
    ]);
}

if (isset($_GET['delete'])) {
    $stmt = DB::getInstance()->prepare("DELETE FROM sprzet WHERE ID = :ID");
    $stmt->execute([':ID' => intval($_GET['delete'])]);
    header("Location: /sprzet");
}


$stmt = DB::getInstance()->prepare("SELECT * FROM sprzet WHERE Kategoria = 'Wzmacniacze'");
$stmt->execute();
$wzmacniacze = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = DB::getInstance()->prepare("SELECT * FROM sprzet WHERE Kategoria = 'Słuchawki'");
$stmt->execute();
$sluchawki = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = DB::getInstance()->prepare("SELECT * FROM sprzet WHERE Kategoria = 'Mikrofony'");
$stmt->execute();
$mikrofony = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = DB::getInstance()->prepare("SELECT * FROM sprzet WHERE Kategoria = 'Sterowniki'");
$stmt->execute();
$sterowniki = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = DB::getInstance()->prepare("SELECT * FROM sprzet WHERE Kategoria = 'Preampy'");
$stmt->execute();
$preampy = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = DB::getInstance()->prepare("SELECT * FROM sprzet WHERE Kategoria = 'System'");
$stmt->execute();
$system = $stmt->fetchAll(PDO::FETCH_ASSOC);

print TwigHelper::getInstance()->render('sprzet.html', [

    'wzmacniacze' => $wzmacniacze,
    'sluchawki' => $sluchawki,
    'mikrofony' => $mikrofony,
    'sterowniki' => $sterowniki,
    'preampy' => $preampy,
    'system' => $system,

]);

//wpisywanie do bazy
// $stmt = DB::getInstance()->prepare("INSERT INTO `zdjecia_baza` (`Sciezka`, `Kolumna`) VALUES (:nazwa_pliku, :kolumna)");

// $stmt->execute([
//     ':nazwa_pliku' => $nazwa_pliku,
//     ':kolumna' => $kolumna,
//   ]);


