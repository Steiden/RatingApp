<?php

require_once "./db.php";

$name = $_POST['name'];
$rating = $_POST['rating'];
$email = $_POST['email'];
$message = $_POST['message'];

if(isset($name) && isset($rating) && isset($email) && isset($message)) {
	try {
		$dbh -> prepare("INSERT INTO `usersRates` (`name`, `rating`, `email`, `message`) VALUES (?, ?, ?, ?)")->execute([$name, $rating, $email, $message]);

		header("Location: ../../../index.html");
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}