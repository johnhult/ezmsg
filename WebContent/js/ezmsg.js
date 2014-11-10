$('.action-send').click(function() {
	try {
		var $t = $(this);
		var profile = $.parseJSON($t.closest('.profile').attr('data-profile'));
		var $content = $('#' + $t.attr('data-content'));
		$content.find('.profile-pic').css('background-image', 'url(' + profile.picture + ')');
		$content.find('.profile-name').text(profile.name);
		$content.find('textarea').val('');
		$content.show(100);
		$content.find('.closer').off().click(function() {
			$content.hide(100);
		});
	} catch (e) {
		console.log(e);
	}
});
$('.action-slide').click(function() {
	var $t = $(this);
	var $content = $('.' + $t.attr('data-slide-id'));
	if ($content.length > 0) {
		$content.parent().stop().animate({'left': -$content.position().left + "px"});
	}
});