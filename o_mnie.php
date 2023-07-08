<?php

if (!defined('IN_INDEX')) { exit("This file can only be included in index.php."); }


// Ścieżka do pliku, w którym będzie przechowywany zedytowany tekst
$contentPath = "resources/omnie.txt";
$cursivePath = "resources/omnie_cursive.txt";
$headerPath = "resources/omnie_header.txt";

$initialContent = file_get_contents($contentPath);
$initialHeader = file_get_contents($headerPath);
$initialCursive = file_get_contents($cursivePath);

// Sprawdzenie czy formularz został wysłany
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pobranie edytowanego tekstu z pola tekstowego 

    if (isset($_POST['editedHeader'])) {
        $editedHeader = $_POST['editedHeader'];
        file_put_contents($headerPath, $editedHeader);
        $initialHeader = file_get_contents($headerPath);
    } 
    if (isset($_POST['editedCursive'])) {
        $editedCursive = $_POST['editedCursive'];
        file_put_contents($cursivePath, $editedCursive);
        $initialCursive = file_get_contents($cursivePath);
    } 
    if (isset($_POST['editedContent'])) {
        $editedContent = $_POST['editedContent'];
        file_put_contents($contentPath, $editedContent);
        $initialContent = file_get_contents($contentPath);
    }
}
print TwigHelper::getInstance()->render('o_mnie.html', [
    'initialContent' => $initialContent, 
    'initialCursive'=> $initialCursive, 
    'initialHeader'=>$initialHeader
]);
