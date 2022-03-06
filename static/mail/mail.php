
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$project_name = $_POST["project_name"];
$user_name = $_POST["user_name"];
$user_phone = $_POST["user_phone"];
$user_email = $_POST["user_email"];
$user_message = $_POST["user_message"];

$m = new PHPMailer();
$m->IsSMTP();
$m->CharSet    = 'UTF-8';
$m->Host       = "smtp.gmail.com";
$m->SMTPSecure = 'ssl';
// $m->SMTPDebug  = 2;
$m->SMTPAuth   = true;
$m->Port       = 465;
$m->Username   = "versta64mc@gmail.com";
$m->Password   = "248157369qQ";
$m->setFrom('versta64mc@gmail.com');

$m->addAddress('versta64mc@gmail.com', 'Получатель');



$m->Subject = "Новая заявка: $project_name";
$m->msgHTML("<html><body>
<table style='width: 100%;'>
<tr style='background-color: #f8f8f8;'><td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Имя:</b></td><td style='padding: 10px; border: #e9e9e9 1px solid;'>$user_name</td></tr>
  <tr style='background-color: #f8f8f8;'><td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Телефон:</b></td><td style='padding: 10px; border: #e9e9e9 1px solid;'>$user_phone</td></tr>
  <tr style='background-color: #f8f8f8;'><td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Емейл:</b></td><td style='padding: 10px; border: #e9e9e9 1px solid;'>$user_email</td></tr>
  <tr style='background-color: #f8f8f8;'><td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Сообщение:</b></td><td style='padding: 10px; border: #e9e9e9 1px solid;'>$user_message</td></tr>
</table>
</html></body>");






if ($m->send()) {
  echo 'Письмо отправлено!';
}else {
  echo $m->ErrorInfo;
}
exit;
?>