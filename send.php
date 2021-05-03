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
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'])) {$name = $_POST['name'];}
    if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
    // if (isset($_POST['email'])) {$email = $_POST['email'];}
    if (isset($_POST['formData'])) {$formData = $_POST['formData'];}

    $to = "sungur.rugnus@gmail.com"; /*Укажите адрес, га который должно приходить письмо*/
    $sendfrom   = "Из сайта"; /*Укажите адрес, с которого будет приходить письмо, можно не настоящий, нужно для формирования заголовка письма*/
    $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
    $subject = "$formData";
    $message = "$formData
  <b>Имя пославшего:</b> $name
  <b>Телефон:</b> $phone";
    $send = mail ($to, $subject, $message, $headers);
    if ($send == 'true')
    {
    echo '<center>

  Спасибо за отправку вашего сообщения!

  </center>';
    }
    else
    {
    echo '<center>

  <b>Ошибка. Сообщение не отправлено!</b>

  </center>';
    }
  } else {
    http_response_code(403);
    echo "Попробуйте еще раз";
  }


?>