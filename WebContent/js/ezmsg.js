var zIndex = 1000;
var profileExpandsOverRows = 4;
var profileExpandsOverCols = 2;
var animationInterval = 200;
var scrollInterval = 600;
var messageArea = '';

var changing = false;
var counter = 1;

(function($) {
	$.fn.badge = function(badgeText) {
		var $badge = this.find('.the-badge');
		if ($badge.length == 0 && badgeText) {
			$badge = this.append('<div class="outer-badge" id="b-' + this.attr('id') + '"><div class="inner-badge"><p class="the-badge number">' + badgeText + '</p></div></div>');
		} else if (badgeText) {
			$badge.text(badgeText);
		} else {
			$badge.remove();
		}
	};
})(jQuery);

$('.action-slide').click(function() {
	var $t = $(this);
	var $content = $('.' + $t.attr('data-slide-id'));
	if ($content.length > 0) {
		$content.parent().stop().animate({
			'left' : -$content.position().left + 'px'
		});
	}
});

function finishTransformation($t, scroll) {
	$t.closest('.js-masonry').masonry();
	if (scroll) {
		$('html, body').animate({
			scrollTop : $t.offset().top
		}, scrollInterval);
	}
	changing = false;
}

$('.profile').click(function() {
	if (!changing) {
		changing = true;
		var $t = $(this);
		if (!$t.hasClass('maximized')) {
			$t.attr('data-orgwidth', $t.outerWidth());
			$t.attr('data-orgheight', $t.outerHeight());
			var width = ($t.outerWidth() * profileExpandsOverCols) + ((profileExpandsOverCols - 1) * 10);
			var height = ($t.outerHeight() * profileExpandsOverRows) + ((profileExpandsOverRows - 1) * 10);
			$t.addClass('maximized').css('z-index', zIndex++).animate({
				'width' : width + 'px',
				'height' : height + 'px'
			}, animationInterval, function() {
				finishTransformation($t, true);
			});
			$t.append(messageArea).find('.message-area,.message-send-area').show();
		} else {
			$t.removeClass('maximized').animate({
				'width' : $t.attr('data-orgwidth') + 'px',
				'height' : $t.attr('data-orgheight') + 'px'
			}, animationInterval, function() {
				finishTransformation($t);
			});
		}
		$t.badge(counter++);
	}
});

$('.members, .documents, .pictures, .videos').click(function() {
	if (!changing) {
		changing = true;
		var $t = $(this);
		var $contentArea = $('.' + $t.attr('data-id'));
		if ($contentArea.outerHeight() > 0) {
			$contentArea.animate({
				'height' : '0px'
			}, function() {
				$contentArea.addClass('data');
				finishTransformation($t);
			});
		} else {
			var height = ($t.outerHeight() * profileExpandsOverRows) + ((profileExpandsOverRows - 1) * 10);
			$contentArea.css('z-index', zIndex++).removeClass('data').animate({
				'height' : height + 'px'
			}, function() {
				finishTransformation($t, true);
			});
		}
	}
});
