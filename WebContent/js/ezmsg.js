var zIndex = 1000;
var profileExpandsOverRows = 4;
var profileExpandsOverCols = 2;
var animationInterval = 200;
var scrollInterval = 600;
var loader = '<div class="loader"><img src="img/loader.gif"></div>';
var error = '<div class="error"><h4>Ett fel har uppstått:</h4><p></p></div>';
var messageArea = '<div class="message-area"><div class="messages"></div></div><div class="send-area"></div>';

var changing = false;

$('.action-slide').click(function() {
	slide($(this));
});

$('.profile .clickTarget').click(function() {
	if (!changing) {
		changing = true;
		var $t = $(this).parent();
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
//			var colorClass = $t.attr("class").match(/color[\w-]*\b/);
			loadMessages($t.append(messageArea).find('.message-area').show(), $t.attr('data-id'), $t.find('h3').text());
		} else {
			$t.removeClass('maximized').animate({
				'width' : $t.attr('data-orgwidth') + 'px',
				'height' : $t.attr('data-orgheight') + 'px'
			}, animationInterval, function() {
				finishTransformation($t);
			});
		}
	}
});

$('.members, .documents, .pictures, .videos').click(function() {
	if (!changing) {
		changing = true;
		var $t = $(this);
		var $contentArea = $('.' + $t.attr('data-id'));
		if ($contentArea.outerHeight() > 0) {
			slide($t);
			changing = false;
		} else {
			var height = ($t.outerHeight() * profileExpandsOverRows) + ((profileExpandsOverRows - 1) * 10);
			$contentArea.css('z-index', zIndex++).removeClass('data').animate({
				'height' : height + 'px'
			}, function() {
				finishTransformation($t, true);
			});
			slide($t);
		}
	}
});

$('.logout').click(function() {
	window.location = 'index.php?logout=true';
});

$('.contracting-search-field').keyup(function() {
	var $t = $(this);
	if ($t.val().length > 0) {
		$t.removeClass('search-default').addClass('search-edited').next().show();
	} else {
		$t.removeClass('search-edited').addClass('search-default').next().hide();
	}
});

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

function slide($t) {
	var $content = $('.' + $t.attr('data-slide-id'));
	if ($content.length > 0) {
		if ($content.hasClass('lazy-loading')) {
			lazyLoad($content);
		}
		if ($content.position().left != $content.parent().position().left) {
			$content.parent().stop().animate({
				'left' : -$content.position().left + 'px'
			});
			return true;
		}
	}
	return false;
}

function finishTransformation($t, scroll) {
	$t.closest('.js-masonry').masonry();
	if (scroll) {
		$('html, body').animate({
			scrollTop : $t.offset().top
		}, scrollInterval);
	}
	changing = false;
}

function lazyLoad($container) {
	
	$container.removeClass('lazy-loading');
	var $target = $container.find('.loader-target').html(loader);
	var contentUrl = $container.attr('data-contentUrl');
	handleGet($target, contentUrl, function(data) {
		$target.html(data);
	});
}

function loadMessages($messageArea, uid, name) {
	
	var $target = $messageArea.find('.messages');
	var contentUrl = 'load_messages.php?toUser=' + uid;
	handleGet($target, contentUrl, function(data) {
		var messages = $.parseJSON(data);
		var html = "";
		$.each(messages, function(index, message) {
			if (message.from == uid) {
				html += '<div><div class="text"><div class="name">' + name + '<span class="time">' + message.time + '</span></div>' + message.message + '</div><div class="them"><div class="round profile p-' + message.from + '"></div></div><br style="clear: both;" /></div>';
			} else {
				html += '<div><div class="me"><div class="round profile"></div></div><div class="text"><div class="name">Jag<span class="time">' + message.time + '</span></div>' + message.message + '</div><br style="clear: both;"/></div>';
			}
		});
		$target.html(html);
	});
}

function handleGet($target, contentUrl, onOk) {
	
	$.get(contentUrl, function(data) {
		  onOk(data);
	}).fail(function() {
		$target.html(error).find('p').text('Gick inte att hämta data från ' + contentUrl);
	});
}

