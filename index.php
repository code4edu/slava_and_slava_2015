<?php
#poedim.csit.pro
#fast and tasty food in SSU

define ("SITE_POEDIM_SECURE", "yes");
include ('blocks/core.php');
include ('blocks/template/head.php');

$page = isset ($_GET['page']) ? $_GET['page'] : '';

switch ($page)
{
	case 'cart':
	{

	}
	break;
	default:
	{
	include ('blocks/template/header_index.php');
	include ('blocks/list_catalog.php');		
	}
}

include ('blocks/template/footer.php');