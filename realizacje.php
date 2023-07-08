<?php

if (!defined('IN_INDEX')) { exit("This file can only be included in index.php."); }

$autor = null;
$tytul = null;
$link = null;
$rows = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['autor'])&&isset($_POST['tytul'])&&isset($_POST['link'])) { #to jest to w formularzu w htmlu
        $autor = $_POST['autor'];
        $tytul = $_POST['tytul'];
        $link = $_POST['link'];
        
        preg_match('/src="([^"]+)"/', $_POST['link'], $matches);
        $link = isset($matches[1]) ? $matches[1] : '';

        $stmt = DB::getInstance()->prepare("INSERT INTO `realizacje` (`Autor`, `Tytuł`, `Link`) VALUES (:autor, :tytul, :link)");

        $stmt->execute([
            ':autor' => $autor,
            ':tytul' => $tytul,
            ':link' => $link,
        ]);

        TwigHelper::addMsg('Pozycja została dodana', 'success');
    }
} elseif (isset($_GET['delete'])) {
    $stmt = DB::getInstance()->prepare("DELETE FROM realizacje WHERE ID = :ID");
    $stmt->execute([':ID' => intval($_GET['delete'])]);
    header("Location: /realizacje");

}
$stmt = DB::getInstance()->prepare("SELECT * FROM realizacje");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

print TwigHelper::getInstance()->render('realizacje.html', [ 
    'rows' => $rows,
]);
