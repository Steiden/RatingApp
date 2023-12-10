<?php

require_once "./db.php";

$rating = @$_POST['rating'];
$name = @$_POST['name'];
$email = @$_POST['email'];
$text = @$_POST['text'];

if(isset($rating) && isset($name) && isset($email) && isset($text)) {
	try {
		$dbh -> prepare("INSERT INTO `users-rate` (`rating`, `name`, `email`, `text`) VALUES (?, ?, ?, ?)")->execute([$rating, $name, $email, $text]);

		header("Location: ../../../index.html");
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}