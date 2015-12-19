<?
#poedim.csit.pro list of catalog

if(!defined("SITE_POEDIM_SECURE"))
    die("Access denied");
?>
    <section id="catalog">
        <div class="container">
<?
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
                        <div class="img"><img src="<?=$iteam['img'];?>" alt="<?=$iteam['name'];?>" /></div>
                        <div class="about">
                            <div class="name"><?=$iteam['name'];?></div>
                            <div class="about"><?=$iteam['description'];?></div>
                        </div>
                        <div class="add">
                            <div class="price"><?=$iteam['price'];?> руб.</div>
                            <div class="button" rel="<?=$iteam['id'];?>">В корзину</div>
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
		</div>
	</section>