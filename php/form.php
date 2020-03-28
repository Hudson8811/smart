<?php
// Файлы phpmailer
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$telephone = $_POST['phone'];


$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $msg = "ok";
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;

    $mail->Host       = 'smtp.mail.ru'; // SMTP сервера
    $mail->Username   = 'fortest73@mail.ru'; // Логин на почте
    $mail->Password   = 'OU2aOanp2oA'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('fortest73@mail.ru', 'Test'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('fortest73@mail.ru');

    $mail->isHTML(true);

    $mail->Subject = 'Заявка ';
    $mail->Body    = "<b>Имя:</b> $name <br>
        <b>Телефон:</b> $telephone<br>";


    if ($mail->send()) {
        echo "$msg";
    } else {
        echo "Сообщение не было отправлено. Неверно указаны настройки вашей почты";
    }

} catch (Exception $e) {
    echo "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}
?>