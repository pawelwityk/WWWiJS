
<?php

if (!defined('IN_INDEX')) { exit("This file can only be included in index.php."); }

if (!isset($_SESSION['id'])) {
    // Przekieruj użytkownika na stronę logowania lub wyświetl komunikat o braku dostępu
    header("Location: /login");
    exit();
} elseif (isset($_GET['delete'])) {
    $stmt = DB::getInstance()->prepare("DELETE FROM kontakt WHERE ID = :ID");
    $stmt->execute([':ID' => intval($_GET['delete'])]);
    header("Location: /admin");
}

$stmt = DB::getInstance()->prepare("SELECT * FROM kontakt");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

print TwigHelper::getInstance()->render('admin.html', [
    'rows' => $rows,
]);