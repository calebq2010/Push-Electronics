	$('.thumbnail').on('click', function() {
		var splash = $('.splash');

		splash.find('img').attr('src', $(this).find('img').attr('src')).end()
			.find('.description').text($(this).find('h3').text()).end().removeClass('none');
	});
	$('.splash').on('click', function(e) {
		$(this).addClass('none');
	}).find('.img-preview').on('click', function() {
		return false;
	});