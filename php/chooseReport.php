<?php

require_once "./db.php";

$login = $_POST['login'];
$pass = $_POST['password'];

$result = $dbh->query("select * from users where login = '$login' and password = '$pass'");
$result = $result->fetch();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Выбор отчета</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<main class="main">
		<?php if(!$result) : ?>
			<section class="container admin-container">
				<form action="../php/chooseReport.php" method="POST" class="container__form">
					<h1 class="container__title">Администратор</h1>
					<input type="text" name="login" id="login" class="container__input" placeholder="Введите логин:" minlength="4" maxlength="25" required>
					<input type="password" name="password" id="password" class="container__input" placeholder="Введите пароль:" minlength="4" maxlength="64" required>
					<button type="submit" class="container__button btn-login">Вход</button>
				</form>
			</section>
		<?php endif; ?>

		<?php if($result) : ?>
			<section class="container">
				<h1 class="container__title">Администратор</h1>
				<form action="../php/report1.php" method="post">
					<button type="submit" class="container__button btn-report">Отчет 1</button>
				</form>
				<form action="../php/report2.php" method="post">
					<button type="submit" class="container__button btn-report">Отчет 2</button>
				</form>
			</section>
		<?php endif; ?>
	</main>
</body>
</html>