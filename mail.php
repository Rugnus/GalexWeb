<?php

$recipient = "sungur.gasanov@mail.ru";
$siteName = 'Заказ сайта';

$name = trim($_POST["name"]);
$phone = trim($_POST["phone"]);
$message = "Имя: $name \nТелефон: $phone";

$pagetitle = "Заявка на сайт";
if ($_POST['name'] && $_POST['phone']) {
    mail($recipient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recipient");
}
?>