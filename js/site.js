function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : 0;
}

function setCookie (name, value) {
	var now = new Date();
	var time = now.getTime();
	var expireTime = time + 12 * 36000;
	now.setTime(expireTime);
	document.cookie = name + "=" + escape(value) + "; expires= " + now.toGMTString() + "; path=/; domain=poedim.csit.pro";
}

$(document).ready(function() {
	$('.button').bind("click", function(e){
		var id = $(this).attr('rel');
		var category = $(this).closest('ul').attr('rel');
		setCookie('food-' + category + '-' + id, parseInt(getCookie('food-' + category + '-' + id)) + 1);
	});

	$('a[href*=#]').bind("click", function(e){
		var anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: $(anchor.attr('href')).offset().top
		}, 1000);
		e.preventDefault();
	});
});