$('.profile').off().each(function() {
	try {
		var $t = $(this);
		var profile = $.parseJSON($t.attr('data-profile'));
		var $content = $('#' + $t.attr('data-content')).clone().removeClass('data');
		$content.find('.name').text(profile.name);
		$t.css('background-image', 'url(' + profile.picture + ')').html($content.html());
		var $overlay = $(this).find('.overlay');
		var pos = $overlay.css('top');
		$t.mouseover(function() {
			$overlay.stop().animate({'top': '0px'}, 100);
		});
		$overlay.mouseout(function() {
			$overlay.stop().animate({'top': pos}, 100);
		});
		$t.mouseout(function() {
			$overlay.stop().animate({'top': pos}, 100);
		});
	} catch (e) {
		console.log(e);
	}
});
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