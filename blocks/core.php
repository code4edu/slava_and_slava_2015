<?php
#poedim.csit.pro core and standart functions

if(!defined("SITE_POEDIM_SECURE"))
    die("Access denied");

ob_start('ob_gzhandler', 6);

$host = 'localhost';
$db_name = 'poedim';
$user = 'poedim';
$password = '3sOokIyF';

$db = mysql_connect ($host,$user,$password);
mysql_select_db ($db_name,$db);
mysql_query("SET NAMES 'utf8'"); 
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");

function getUrl() {
  $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
  $url .= ( $_SERVER["SERVER_PORT"] != 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
  $url .= $_SERVER["REQUEST_URI"];
  return $url;
}