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
	document.cookie = name + "=" + escape(value) + "; expires= " + now.toGMTString() + "; domain=poedim.csit.pro";
}

function deleteCookie(name) {
  setCookie(name, "", {
    expires: -1
  })
}

$(document).ready(function() {
	$('.button').bind("click", function(e){
		var id = $(this).attr('rel');
		var category = $(this).closest('ul').attr('rel');
		setCookie('food-' + category + '-' + id, parseInt(getCookie('food-' + category + '-' + id)) + 1);
	});

	$('.plus').bind("click", function(e){
		var id = $(this).closest('.change').attr('rel');
		var category = $(this).closest('li').attr('rel');
		var price = $(this).closest('.name').attr('rel');
		var count = parseInt(getCookie('food-' + category + '-' + id)) + 1;
		setCookie('food-' + category + '-' + id, count);

		$(this).closest('.count').html(count);
		$(this).closest('.value').html(count * price);
	});

	$('.minus').bind("click", function(e){
		var id = $(this).closest('.change').attr('rel');
		var category = $(this).closest('li').attr('rel');
		var price = $(this).closest('.name').attr('rel');
		var count = parseInt(getCookie('food-' + category + '-' + id)) - 1;

		if (count <= 0)
		{
			deleteCookie('food-' + category + '-' + id);
			$(this).closest('li').hide();
			return;
		}	

		setCookie('food-' + category + '-' + id, count);

		$(this).closest('.count').html(count);
		$(this).closest('.value').html(count * price);
	});

	$('a[href*=#]').bind("click", function(e){
		var anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: $(anchor.attr('href')).offset().top
		}, 1000);
		e.preventDefault();
	});
});