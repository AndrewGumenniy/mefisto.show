<?php
$formname = $_POST['formname'];
$formtype = $_POST['formtype'];

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$name = htmlspecialchars($name);
$email = htmlspecialchars($email);
$phone = htmlspecialchars($phone);
$name = urldecode($name);
$email = urldecode($email);
$phone = urldecode($phone);
$name = trim($name);
$email = trim($email);
$phone = trim($phone);

if (!empty($_POST['character'])) $character = $_POST['character'];
if (!empty($_POST['time'])) $time = $_POST['time'];

$to = "<alexandr.mefisto@gmail.com>";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $formname <admin@mail> \r\n";

if (!empty($_POST['name'])){
	if($formname == "Форма выбора персонажа"){
	 $mail = mail("$to", "$formname", "Персонаж: $formtype<br/> Имя: $name <br/>  Телефон: $phone", $headers);
	}
	else if($formname == "Форма для письма"){
	 $mail = mail("$to", "$formname", "Пожелания по программе: $time<br/> Имя: $name <br/> Телефон: $phone <br/> Почта: $email", $headers); 
	}
	else if($formname == "Форма выбора шоу-программы"){
	 $mail = mail("$to", "$formname", "Шоу: $formtype<br/> Персонаж: $character <br/> Время программы: $time<br/> Имя: $name <br/> Телефон: $phone", $headers); 
	}
	else{
	 $mail = mail("$to", "$formname", "Имя: $name <br/> Почта: $email <br/> Телефон: $phone", $headers);
	}
	header("Location: success");
}
else{
	header("Location: failure");
}
?>
