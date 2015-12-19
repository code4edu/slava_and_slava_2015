<?php
#poedim.csit.pro
#fast and tasty food in SSU
if (!isset($_GET['psswd']) || $_GET['psswd'] != 'pswd')
	die();

define ("SITE_POEDIM_SECURE", "yes");
include ('blocks/core.php');

?>
<!DOCTYPE html>
<html lang="ru-Ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Закажи еду в два клика и забери в столовой без очереди! Поедим</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Поедим">
    <meta name="description" content="Поедим">
    <link type="image/ico" href="/img/favicon.ico" rel="shortcut icon"/>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/jquery.js" type="text/javascript"></script>
    <link type="image/ico" href="/img/favicon.ico" rel="shortcut icon"/>
    <script>
    $(document).ready(function() {


	$('input').bind("click", function(e){
		$(this).closest("tr").hide();
	});
});
    </script>
<style>
/* font-family: "PTSansRegular"; */
@font-face {
    font-family: "PTSansRegular";
    src: url("/fonts/PTSansRegular/PTSansRegular.eot");
    src: url("/fonts/PTSansRegular/PTSansRegular.eot?#iefix")format("embedded-opentype"),
    url("/fonts/PTSansRegular/PTSansRegular.woff") format("woff"),
    url("/fonts/PTSansRegular/PTSansRegular.ttf") format("truetype");
    font-style: normal;
    font-weight: normal;
}
/* font-family: "PTSansItalic"; */
@font-face {
    font-family: "PTSansItalic";
    src: url("/fonts/PTSansItalic/PTSansItalic.eot");
    src: url("/fonts/PTSansItalic/PTSansItalic.eot?#iefix")format("embedded-opentype"),
    url("/fonts/PTSansItalic/PTSansItalic.woff") format("woff"),
    url("/fonts/PTSansItalic/PTSansItalic.ttf") format("truetype");
    font-style: normal;
    font-weight: normal;
}
/* font-family: "PTSansBold"; */
@font-face {
    font-family: "PTSansBold";
    src: url("/fonts/PTSansBold/PTSansBold.eot");
    src: url("/fonts/PTSansBold/PTSansBold.eot?#iefix")format("embedded-opentype"),
    url("/fonts/PTSansBold/PTSansBold.woff") format("woff"),
    url("/fonts/PTSansBold/PTSansBold.ttf") format("truetype");
    font-style: normal;
    font-weight: normal;
}

html, body {
    margin: 0;
    padding: 0;
    background: #eee;
    font-family: "PTSansRegular", PT Sans, Helvetica, Arial, sans-sherif;
    font-size: 20px;
    background: #efefef;
    text-align: center;
}

.wrap {
	border: 1px solid #efefef;
	background: #FFF;
	border-radius: 8px;
	margin: 30px auto;
	width: 900px;
	padding: 10px 20px;
}
table {
	width: 100%;
}
table td {
	text-align: center;
}

</style>
</head>
<body>
	<div class="wrap">
		<h2>Заказы</h2>
		<table>
			<thead>
				<tr>
					<th>Заказ</th>
					<th>Сумма</th>
					<th>Дата</th>
					<th>Удалить</th>
				</tr>
			</thead>
			<tbody>
	<?
	$sql = 'SELECT * FROM `orders` ORDER BY `id` DESC';
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result))
	{
	?>
				<tr>
					<td><pre><?=$row['iteams'];?></pre></td>
					<td><?=$row['total'];?></td>
					<td><?=$row['date'];?></td>
					<td><input type="checkbox" name="<?=$row['id'];?>" value="d"/></td>
				</tr>
	<?
	}
	?>	
			</tbody>
		</table>
	</div>