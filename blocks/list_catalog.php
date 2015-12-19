<?
#poedim.csit.pro list of catalog

if(!defined("SITE_POEDIM_SECURE"))
    die("Access denied");

$sql = "SELECT * FROM `categories`";
$result = mysql_query($sql);

while ($row = mysql_fetch_array($result))
{
	?>
            <div class="category">
                <div class="header"><?=$row['name'];?></div>
                <ul class="list" rel="<?=$row['id'];?>">
	<?
	$sql = "SELECT * FROM `food` WHERE `category` = '".$row['id']."'";
	$res = mysql_query($sql);

	while ($iteam = mysql_fetch_array($res)) 
	{
		?>
                    <li>
                        <div class="img"><img src="<?=$item['img'];?>" alt="<?=$item['name'];?>" /></div>
                        <div class="about">
                            <div class="name"><?=$item['name'];?></div>
                            <div class="about"><?=$item['description'];?></div>
                        </div>
                        <div class="add">
                            <div class="price"><?=$item['price'];?> руб.</div>
                            <div class="button" rel="<?=$item['id'];?>">В корзину</div>
                        </div>
                    </li>
		<?
	}
	?>

                </ul>
            </div>
	<?
}
?>