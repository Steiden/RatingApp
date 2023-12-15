<?php

require_once "./db.php";

$user_id = $_POST['user_id'];
$name = $_POST['name'];
$rating = $_POST['rating'];
$email = $_POST['email'];
$message = $_POST['message'];

if(isset($user_id) && isset($rating) && isset($email) && isset($message)) {
	try {
		$dbh -> prepare("INSERT INTO `usersRates` (`users_id`, `name`, `rating`, `email`, `message`) VALUES (?, ?, ?, ?, ?)")->execute([$user_id, $name, $rating, $email, $message]);

		header("Location: ../../../index.html");
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}