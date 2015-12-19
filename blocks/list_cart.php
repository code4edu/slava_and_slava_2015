<?
#poedim.csit.pro list of catalog

if(!defined("SITE_POEDIM_SECURE"))
    die("Access denied");

$sql = "SELECT * FROM `categories`";
$result = mysql_query($sql);

?>
    <ul class="cart">
<?
$cart_sum = 0;
while ($category = mysql_fetch_array($result))
{
    $sql = "SELECT * FROM `food` WHERE `category` = '".$category['id']."'";
    $res = mysql_query($sql);

    while ($iteam = mysql_fetch_array($res)) 
    {
        if (isset($_COOKIE['food-'.$category['id'].'-'.$iteam['id']]))
        {
            $count = $_COOKIE['food-'.$category['id'].'-'.$iteam['id']];
            $price = $count * $iteam['price'];
            $cart_sum += $price;
            ?>
            <li rel="<?=$category['id'];?>">
                <div class="about">
                    <div class="name" rel="<?=$iteam['price'];?>"><?=$iteam['name'];?></div>
                    <div class="count"><?=$count;?></div>
                    <div class="change" rel="<?=$iteam['id'];?>">
                        <span class="plus">+</span> | <span class="minus">-</span>
                    </div>
                </div>
                <div class="price">
                    <span class="value"><?=$price;?></span> руб.
                </div>
            <?
        }
    }
}
?>
    </ul>
<?