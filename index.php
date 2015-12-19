<?php
#poedim.csit.pro
#fast and tasty food in SSU

define ("SITE_POEDIM_SECURE", "yes");
include ('blocks/core.php');
include ('blocks/template/head.php');

$page = isset ($_GET['page']) ? $_GET['page'] : '';
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
    <link rel="stylesheet" href="/css/style.css">

    <script src="/js/site.js" type="text/javascript"></script>
</head>
<body>
<?
switch ($page)
{
	case 'cart':
	{
	include ('blocks/template/header_cart.php');
	include ('blocks/list_cart.php');
	}
	break;
	case 'confirm':
	{
	include ('blocks/pay.php');
	}
	break;
	default:
	{
	include ('blocks/template/header_index.php');
	include ('blocks/list_catalog.php');	
	include ('blocks/index_foot.php');		
	}
}

include ('blocks/template/footer.php');