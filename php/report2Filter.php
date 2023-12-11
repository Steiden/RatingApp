<?php

require_once "./db.php";

if ($_POST['constraint'] != "" && $_POST['constraintSymbol'] != "") {
	$constraint = $_POST['constraint'];
	$constraintSymbol = $_POST['constraintSymbol'];
	$report2 = $dbh->query("select rating, message, createdAt from usersRates where rating $constraintSymbol $constraint order by rating desc");
	$report2 = $report2->fetchAll();
} else {
	header("Location: report2.php");
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Отчет 2</title>
	<link rel="stylesheet" href="../css/style.css">
</head>

<body>
	<main class="main">
		<section class="container">
			<h1 class="container__title">Отчет 2</h1>
			<section class="report__command-panel">
				<form action="./report2Filter.php" method="post" class="report__form report-form">
					<section class="main__input-container report__input-container">
						<label for="constraintSymbol" class="report__label">Выбор сравнения:</label>
						<select name="constraintSymbol" id="constraintSymbol" class="report__select">
							<option value="=">=</option>
							<option value=">">></option>
							<option value="<"><</option>
						</select>
					</section>
					<section class="main__input-container report__input-container">
						<label for="constraint" class="report__label">Значение:</label>
						<input type="number" name="constraint" id="constraint" class="report__input" min="1" max="5">
					</section>
					<button type="submit" class="container__button report__button">Показать</button>
				</form>
				<form action="./report2.php" method="POST">
					<button type="submit" name="all" value="all" class="container__button report__button">Все</button>
				</form>
			</section>
			<section class="report">
				<table class="report__table report-table">
					<thead class="report-table__head">
						<th class="report-table__cell">Оценка товара</th>
						<th class="report-table__cell">Сообщение</th>
						<th class="report-table__cell">Дата отзыва</th>
					</thead>
					<tbody class="report-table__body">
						<?php foreach ($report2 as $key => $value) : ?>
							<tr class="report-table__row">
								<td class="report-table__cell"><?= $value['rating'] ?></td>
								<td class="report-table__cell"><?= $value['message'] ?></td>
								<td class="report-table__cell"><?= $value['createdAt'] ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</section>
		</section>

		<article class="main__nav-buttons">
			<a href="../index.html" class="main__nav-button">⌂</a>
			<form action="./chooseReport.php" method="POST" class="main__nav-button">
				<input type="text" name="login" value="admin" class="d-none">
				<input type="password" name="password" value="admin" class="d-none">
				<button type="submit" class="main__nav-button">←</button>
			</form>
		</article>
	</main>
</body>

</html>