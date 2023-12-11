<?php

try {
	$dbh = new PDO('mysql:host=localhost;dbname=ratingApp', 'root', '');
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}