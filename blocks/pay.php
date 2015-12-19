	<section id="pay">
		<form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">
			<input type="hidden" name="receiver" value="41001431548759">
			<input type="hidden" name="formcomment" value="POEDIM.CSIT.PRO">
			<input type="hidden" name="short-dest" value="заказ на сайте poedim.csit.pro">
			<input type="hidden" name="label" value="1">
			<input type="hidden" name="quickpay-form" value="shop">
			<input type="hidden" name="targets" value="заказ номер 1">
			<input type="hidden" name="sum" value="<?=$cart_sum;?>" data-type="number">
			<input type="hidden" name="paymentType" value="AC"/>
			<input type="submit" value="ОПЛАТИТЬ" />
		</form>
	</section>