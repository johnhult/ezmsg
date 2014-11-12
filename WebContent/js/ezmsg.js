var zIndex = 1000;
var profileExpandsOverRows = 4;
var profileExpandsOverCols = 2;
var changing = false;

var messageArea = '';


$('.profile').click(function() {
	if (!changing) {
		changing = true;
		var $t = $(this);
		if (!$t.hasClass('maximized')) {
			$t.attr('data-orgwidth', $t.outerWidth());
			$t.attr('data-orgheight', $t.outerHeight());
			var width = ($t.outerWidth() * profileExpandsOverCols) + ((profileExpandsOverCols - 1) *10);
			var height = ($t.outerHeight() * profileExpandsOverRows) + ((profileExpandsOverRows - 1) * 10);
			$t.addClass('maximized').css('z-index', zIndex++).animate({'width': width + 'px', 'height' : height + 'px'}, 200, function() {
				$t.closest('.js-masonry').masonry();
				changing = false;
			});
			$t.append(messageArea).find('.message-area,.message-send-area').show();
		} else {
			$t.removeClass('maximized').animate({'width': $t.attr('data-orgwidth') + 'px', 'height' : $t.attr('data-orgheight') + 'px'}, 200, function() {
				$t.closest('.js-masonry').masonry();
				changing = false;
			});
		}
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
		$content.parent().stop().animate({'left': -$content.position().left + 'px'});
	}
});