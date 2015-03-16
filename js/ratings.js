$(document).ready(function(){
	$('.rating input:radio').attr('checked', false);
	$('.rating input').click(function() {
		$('.rating span.' + event.target.name).removeClass('checked');
		$(this).parent().addClass('checked');
	});
});