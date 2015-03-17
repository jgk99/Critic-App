function slideSwitch() {
	var $active = $('#slideshow a.slideshow-active');

	if ($active.length == 0) $active = $('#slideshow a:last');

	var $next =  $active.next().length ? $active.next()
		: $('#slideshow a:first');

	$active.addClass('slideshow-last-active');

	$next.css({opacity: 0.0})
		.addClass('slideshow-active')
		.animate({opacity: 1.0}, 1000, function() {
			$active.removeClass('slideshow-active slideshow-last-active');
		});
}

$(function() {
	setInterval("slideSwitch()", 3000);
});