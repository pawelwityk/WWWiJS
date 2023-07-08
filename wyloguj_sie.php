<?php

unset($_SESSION['logged_in']);

// Zakończenie sesji
session_destroy();

// Przekierowanie użytkownika na stronę logowania lub inną stronę po wylogowaniu
header("Location: /");
exit();