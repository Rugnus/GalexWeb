 <?php
// ---------------- ВАРИАНТ 1 -------------------

// $recepient = "sungur.rugnus@gmail.com";

// $siteName = "Ajax-форма";

// $name = trim($_POST["name"]);
// $phone = trim($_POST["phone"]);
// $email = trim($_POST['contactFF']);
// $mess = trim($_POST['message']);
// $message = "Имя: $name \nТелефон: $phone  \nСообщение: $message \nПочта: $email";

// $pagetitle = "Заявка с сайта \"$siteName\"";
// mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");



// ---------------- ВАРИАНТ 2 -------------------
// if (isset ($_POST['contactFF'])) {
//   $to = "sungur.rugnus@gmail.com"; // поменять на свой электронный адрес
//   $from = $_POST['contactFF'];
//   $subject = "Заполнена контактная форма с ".$_SERVER['HTTP_REFERER'];
//   $message = "Имя: ".$_POST['name']."\nEmail: ".$from."\nIP: ".$_SERVER['REMOTE_ADDR']."\nСообщение: ".$_POST['message'];
//   $boundary = md5(date('r', time()));
//   $filesize = '';
//   $headers = "MIME-Version: 1.0\r\n";
//   $headers .= "From: " . $from . "\r\n";
//   $headers .= "Reply-To: " . $from . "\r\n";
//   $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
//   $message="
// Content-Type: multipart/mixed; boundary=\"$boundary\"

// --$boundary
// Content-Type: text/plain; charset=\"utf-8\"
// Content-Transfer-Encoding: 7bit

// $message";
//   for($i=0;$i<count($_FILES['fileFF']['name']);$i++) {
//      if(is_uploaded_file($_FILES['fileFF']['tmp_name'][$i])) {
//          $attachment = chunk_split(base64_encode(file_get_contents($_FILES['fileFF']['tmp_name'][$i])));
//          $filename = $_FILES['fileFF']['name'][$i];
//          $filetype = $_FILES['fileFF']['type'][$i];
//          $filesize += $_FILES['fileFF']['size'][$i];
//          $message.="

// --$boundary
// Content-Type: \"$filetype\"; name=\"$filename\"
// Content-Transfer-Encoding: base64
// Content-Disposition: attachment; filename=\"$filename\"

// $attachment";
//      }
//    }
//    $message.="
// --$boundary--";

//   if ($filesize < 10000000) { // проверка на общий размер всех файлов. Многие почтовые сервисы не принимают вложения больше 10 МБ
//     mail($to, $subject, $message, $headers);
//     echo $_POST['name'].', Ваше сообщение получено, спасибо!';
//   } else {
//     echo 'Извините, письмо не отправлено. Размер всех файлов превышает 10 МБ.';
//   }
// }


// ---------------- ВАРИАНТ 3 -------------------
  // use PHPMailer\PHPMailer\PHPMailer;
  // use PHPMailer\PHPMailer\Exception;

  // require 'phpmailer/src/Exception.php';
  // require 'phpmailer/src/PHPMailer.php';

  // $mail = new PHPMailer(true);
  // $mail -> CharSet = 'UTF-8';
  // $mail -> setLanguage('ru', 'phpmailer/language/');
  // $mail -> IsHTML(true);

  // //От кого письмо
  // $mail -> setFrom('sender@gmail.com', 'Заказ с сайта');
  // // Кому письмо 
  // $mail -> addAddress('sungur.rugnus@gmail.com');
  // // Тема письма 
  // $mail -> Subject = 'Вам заказ с сайта';

  // // Тело письма
  // $body = 'Письмо с сайта Galex.';

  // if(trim(!empty($_POST['name']))) {
  //   $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
  // }
  // if(trim(!empty($_POST['email']))) {
  //   $body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';
  // }
  // if(trim(!empty($_POST['phone']))) {
  //   $body.='<p><strong>Телефон:</strong> '.$_POST['phone'].'</p>';
  // }
  // if(trim(!empty($_POST['message']))) {
  //   $body.='<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>';
  // }

  // //Прикрепление файла
  // if(!empty($_FILES['file']['tmp_name'])) {
  //   // Путь загрузки файлов 
  //   $filePath = __DIR__ . "/files/" . $_FILES['file']['name'];
  //   // Грузим файл 
  //   if (copy($_FILES['file']['tmp_name'], $filePath)) {
  //     $fileAttach = $filePath;
  //     $body .= '<p><strong>Файл в приложении</strong></p>';
  //     $mail -> addAttachment(__DIR__ . "/files/" . $_FILES['file']['name']);
  //   } 
  // }

  // $mail->Body = $body;
  
  // // Отправляем
  // if(!$mail->send()) {
  //   $message = 'Ошибка.';
  // } else {
  //   $message = 'Данные отправлены.';
  // }

  // $response = ['message' => $message];

  // // header('Content-type: application/json');
  // echo json_encode($response);


// ---------------- ВАРИАНТ 4 --------------------
if (isset ($_POST['email'])) {
  $to = "sungur.rugnus@gmail.com";
  $from = "galex-web@gmail.ru";
  $subject = "Заполнена контактная форма на сайте ".$_SERVER['HTTP_REFERER'];
  $message = "Имя пользователя: ".$_POST['name']."\nEmail пользователя ".$_POST['email']."\nТелефон пользователя ".$_POST['phone']."\nСообщение: ".$_POST['message']."\n\nАдрес сайта: ".$_SERVER['HTTP_REFERER'];
 
  $boundary = md5(date('r', time()));
  $filesize = '';
  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "From: " . $from . "\r\n";
  $headers .= "Reply-To: " . $from . "\r\n";
  $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
  $message="
Content-Type: multipart/mixed; boundary=\"$boundary\"
 
--$boundary
Content-Type: text/plain; charset=\"utf-8\"
Content-Transfer-Encoding: 7bit
 
$message";
     if(is_uploaded_file($_FILES['file']['tmp_name'])) {
         $attachment = chunk_split(base64_encode(file_get_contents($_FILES['file']['tmp_name'])));
         $filename = $_FILES['file']['name'];
         $filetype = $_FILES['file']['type'];
         $filesize = $_FILES['file']['size'];
         $message.="
 
--$boundary
Content-Type: \"$filetype\"; name=\"$filename\"
Content-Transfer-Encoding: base64
Content-Disposition: attachment; filename=\"$filename\"
 
$attachment";
     }
   $message.="
--$boundary--";
 
  if ($filesize < 10000000) { // проверка на общий размер всех файлов. Многие почтовые сервисы не принимают вложения больше 10 МБ
    mail($to, $subject, $message, $headers);
    echo $_POST['name'].', Ваше сообщение отправлено, спасибо!';
  } else {
    echo 'Извините, письмо не отправлено. Размер всех файлов превышает 10 МБ.';
  }
}
?>
