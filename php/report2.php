<?php

require_once "./db.php";

$report2 = $dbh->query("select rating, message, createdAt from usersRates order by rating desc");
$report2 = $report2->fetchAll();

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
	</main>
</body>

</html>