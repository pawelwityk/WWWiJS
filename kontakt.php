<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


if (!defined('IN_INDEX')) { exit("This file can only be included in index.php."); }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['imie'])&&isset($_POST['nazwisko'])&&isset($_POST['email'])) { #to jest to w formularzu w htmlu
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $email = $_POST['email'];
        if (isset($_POST['opcje'])) {
            $opcje = implode(', ', $_POST['opcje']);
        } 
        else {
            $opcje = "";
        }
        if (isset($_POST['dodatkowe'])) {
            $informacje_dodatkowe = $_POST['dodatkowe'];
        } 
        else {
            $informacje_dodatkowe = "";
        }
    
        $stmt = DB::getInstance()->prepare("INSERT INTO `kontakt` (`Imię`, `Nazwisko`, `E_mail`, `Opcje`, `Dodatkowe_informacje`) VALUES (:imie, :nazwisko, :email, :opcje, :informacje_dodatkowe)");
        #w singletonie DB stworzyłam obiekt DB
        #wywołuję na nim metodę getInstance() dzięki czemu zwracany jest obiekt DB - to mam w helpers.inc
        #na tym obiekcie wywołuję metodę prepare (phpową) z jakimiś dziwnymi argumentami 
        #prepare(łańcuch znaków zawierający zapytanie sql) - no i tak, nie rozumiem baz danych pora na csa
        $stmt->execute([
            ':imie' => $imie,
            ':nazwisko' => $nazwisko,
            ':email' => $email,
            ':opcje' => $opcje,
            ':informacje_dodatkowe' => $informacje_dodatkowe
        ]);

        /*
        * Dodanie komunikatu, który wyświetli się w ramce nad treścią tej podstrony. Więcej informacji na temat
        * wyświetlania komunikatów znajdziesz w pliku helpers.inc.php.
        */

        //TwigHelper::addMsg('Row has been added.', 'success');  #z klasy TwigHelper funkcja addMsg

    
        $mail = new PHPMailer();
        $mail->Encoding = 'base64';
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP();
        //$mail->SMTPDebug  = 1;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "halo.brysia@gmail.com";
        $mail->Password = "aprezaxqnhzqgsju";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  
        $mail->Port = 465;

        $mail->setFrom($email, $imie.' '.$nazwisko);   
        $mail->AddAddress("brysia@poczta.onet.pl", "Studio Nagraniowe");
        $mail->AddReplyTo($email, $imie);
        
        $mail->Subject = "Zgłoszenie od: ".' '.$email;
        $mail->Body = 'Opcje: '.$opcje."\n". 'Informacje dodatkowe: '.$informacje_dodatkowe;

        try {
            $mail->send();
            TwigHelper::addMsg('Wiadomość została wysłana.', 'success');
        
        } catch (Exception $e) {
            TwigHelper::addMsg('Wystąpił błąd podczas wysyłania wiadomości: ' . $e->getMessage(), 'error');
        }
    }
}

print TwigHelper::getInstance()->render('kontakt.html');
