function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : 0;
}

function setCookie (name, value) {
	var now = new Date();
	var expireTime = now.getTime() + 12 * 36000;
	now.setTime(expireTime);
	document.cookie = name + "=" + escape(value) + "; expires= " + now.toGMTString() + ";";
}

function deleteCookie(name) {
  setCookie(name, "", {
    expires: -1
  })
}

$(document).ready(function() {

	$('.list').hide();

	$('.header').bind("click", function(e){
		$('.header').removeClass('select');
		$(this).addClass('select');
		$('.list').hide();
		$(this).closest(".category").children('.list').show();
	});

	$('.button').bind("click", function(e){
		var id = $(this).attr('rel');
		var category = $(this).closest('ul').attr('rel');
		setCookie('food-' + category + '-' + id, parseInt(getCookie('food-' + category + '-' + id)) + 1);
	});

	$('.plus').bind("click", function(e){
		var id = $(this).closest('.change').attr('rel');
		var category = $(this).closest('li').attr('rel');
		var price = parseInt($(this).closest('.about').children('.name').attr('rel'));
		var count = parseInt(getCookie('food-' + category + '-' + id)) + 1;
		setCookie('food-' + category + '-' + id, count);

		$(this).closest('.about').children('.count').html(count);
		$(this).closest('li').children('.price').children('.value').text(count * price);

		var total = parseInt($("#total .total").text()) + price;

		$("#total .total").text(total);
	});

	$('.minus').bind("click", function(e){
		var id = $(this).closest('.change').attr('rel');
		var category = $(this).closest('li').attr('rel');
		var price = parseInt($(this).closest('.about').children('.name').attr('rel'));
		var count = parseInt(getCookie('food-' + category + '-' + id)) - 1;

		if (count <= 0)
		{
			deleteCookie('food-' + category + '-' + id);
			$(this).closest('li').hide();
			return;
		}

		setCookie('food-' + category + '-' + id, count);

		$(this).closest('.about').children('.count').html(count);
		$(this).closest('li').children('.price').children('.value').text(count * price);

		var total = parseInt($("#total .total").text()) - price;

		$("#total .total").text(total);

		if (total <= 0)
			$("#total .total").text('0');
	});

	$('a[href*=#]').bind("click", function(e){
		var anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: $(anchor.attr('href')).offset().top
		}, 1000);
		e.preventDefault();
	});
});