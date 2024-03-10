<?php
$login = filter_var(trim($_POST ['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST ['pass']), FILTER_SANITIZE_STRING);
$surname = filter_var(trim($_POST ['surname']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST ['name']), FILTER_SANITIZE_STRING);
$age = filter_var(trim($_POST ['age']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST ['email']), FILTER_SANITIZE_STRING);
$phone = filter_var(trim($_POST ['phone']), FILTER_SANITIZE_STRING);

if (mb_strlen ($login) <= 3 || mb_strlen($login)  > 90){
	echo "Некорректная длинна логина";
	exit();
}else if (mb_strlen ($pass) <= 3 || mb_strlen($pass)  > 50){
	echo "Некорректная длинна пароля";
	exit();
}else if (mb_strlen ($surname) < 3 || mb_strlen($surname)  > 90){
	echo "Некорректная длинна фамилии";
	exit();
}else if (mb_strlen ($name) < 3 || mb_strlen($name)  > 90){
	echo "Некорректная длинна имени";
	exit();
}else if (mb_strlen ($age) < 1 || mb_strlen($age)  > 3){
    echo "Некорректный возраст";
	exit();
}else if (mb_strlen ($email) < 5 || mb_strlen($email)  > 90){
	echo "Некорректная почта";
	exit();
}else if (mb_strlen ($phone) < 6 || mb_strlen($phone)  > 20){
	echo "Некорректный номер телефона";
	exit();
}

$pass = md5($pass."qwertyasdfgzxcv258741369");

$mysql = new mysqli('localhost','root','','mysql');
$mysql -> query ("INSERT INTO `table` (`login`, `password`, `surname`, `name`, `age`, `e-mail`, `phone`) 
VALUES('$login','$pass','$surname','$name','$age','$email','$phone')");

$mysql->close();


header('Location: /')
?>
