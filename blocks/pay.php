<?
#poedim.csit.pro list of catalog

if(!defined("SITE_POEDIM_SECURE"))
    die("Access denied");

$sql = "SELECT * FROM `categories`";
$result = mysql_query($sql);

$cart_sum = 0;
$order = array(
		'iteams' => '',
		'total' => 0
	);
while ($category = mysql_fetch_array($result))
{
    $sql = "SELECT * FROM `food` WHERE `category` = '".$category['id']."'";
    $res = mysql_query($sql);

    while ($iteam = mysql_fetch_array($res)) 
    {
        if (isset($_COOKIE['food-'.$category['id'].'-'.$iteam['id']]))
        {
            $count = $_COOKIE['food-'.$category['id'].'-'.$iteam['id']];

    		setcookie('food-'.$category['id'].'-'.$iteam['id'], 0, -1);

            $price = $count * $iteam['price'];

            if (!$count || $count == 'NaN')
                continue;

            $cart_sum += $price;
            $order['iteams'] .= $iteam['name']." - ".$count.": ".$price."\n";
        }
    }
}
    if (!$cart_sum)
    {
    	header('Location: http://poedim.csit.pro/');
    	die();
    }

    $order['total'] = $cart_sum;
    $sql = 'INSERT INTO `orders` (`iteams`, `total`) VALUES("'.mysql_escape_string($order['iteams']).'", "'.$order['total'].'")';
    $res = mysql_query($sql);

    $sql = 'SELECT id FROM `orders` WHERE `iteams` = "'.mysql_escape_string($order['iteams']).'" ORDER BY `id` DESC';
    $res = mysql_query($sql);
    $order = mysql_fetch_array($res);

?>
	<section id="pay">
		<form method="POST" name="auto" action="https://money.yandex.ru/quickpay/confirm.xml">
			<input type="hidden" name="receiver" value="41001431548759">
			<input type="hidden" name="formcomment" value="POEDIM.CSIT.PRO">
			<input type="hidden" name="short-dest" value="заказ на сайте poedim.csit.pro">
			<input type="hidden" name="label" value="<?=$order['id'];?>">
			<input type="hidden" name="quickpay-form" value="shop">
			<input type="hidden" name="targets" value="заказ номер №<?=$order['id'];?>">
			<input type="hidden" name="sum" value="<?=$cart_sum;?>" data-type="number">
			<input type="hidden" name="paymentType" value="AC"/>
			<input type="submit" value="ОПЛАТИТЬ" />
		</form>
	</section>

	<script language="JavaScript">
		document.forms["auto"].submit();
	</script>