$(document).ready(function() {
	
	$('#panel_kontakt').hover(
		function() {
			$(this).stop().animate({right: '0'}, 'slow');
		},
		function() {
			$(this).stop().animate({right: '-230px'}, 'slow');
		}
	);	
});

function add_to_facebook(elem) {
	window.open(elem.href, 'sharer_'+(new Date()).getTime(), 'toolbar=0, status=0, width=626, height=436');
	return false;
}

$(document).ready(function() {
	window.fbAsyncInit = function() {
	FB.init({status: true, cookie: true, xfbml: true});
	};

	(function() {
		var e = document.createElement('script'); e.async = true;
		e.src = document.location.protocol + '//connect.facebook.net/pl_PL/all.js';
		document.getElementById('fb-root').appendChild(e);
	}());

	$('#fb_like_box').hover(
		function() {
			$(this).stop().animate({right: '0'}, 'slow');
		},
		function() {
			$(this).stop().animate({right: '-240px'}, 'slow');
		}
	);
	
});

