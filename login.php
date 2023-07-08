<?php

if (!defined('IN_INDEX')) { exit("This file can only be included in index.php."); }


if (isset($_SESSION['id'])) {
    // Przekieruj użytkownika na stronę logowania lub wyświetl komunikat o braku dostępu
    header("Location: /admin");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Wprowadź swoje dane logowania
        $validUsername = 'admin';
        $validPassword = 'brysia123';

        $enteredUsername = $_POST['username'];
        $enteredPassword = $_POST['password'];

        // Sprawdzanie poprawności danych logowania
        if ($enteredUsername === $validUsername && $enteredPassword === $validPassword) {
            // Przekierowanie na inną stronę po poprawnym zalogowaniu
            $_SESSION['id'] = $enteredUsername;
            header("Location: /admin");
            exit();
        } else {
            // Wyświetlanie alertu z błędem w przypadku nieprawidłowych danych logowania
            TwigHelper::addMsg('Błędny login lub hasło.', 'error');
        }
    }
  }

  print TwigHelper::getInstance()->render('login.html');