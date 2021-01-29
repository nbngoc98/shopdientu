/* Tabs Block */
$(document).ready(function($) {
	var tabs = $('ul.nav-tabs');
	$(".tab-content .clearfix").each(function() {
		if($(this).index() != 0) {
			$(this).css({visibility: 'hidden',display:'block' })
		}
	});
	tabs.each(function(i) {
		var tab = $(this).find('> li > a');
		var litab = $(this).find('li');
		var ua = navigator.userAgent,
		event = (ua.match(/iPad/i)) ? "touchstart" : "click";
		tab.bind(event, function(e) {
			var contentLocation = $(this).attr('href');
			if(contentLocation.charAt(0)=="#") {
				e.preventDefault();
				tab.removeClass('active');
				litab.removeClass('active');
				$(this).addClass('active');
				$(contentLocation).css({ visibility: 'visible'}).addClass('active').siblings().css({ visibility: 'hidden'}).removeClass('active');
			}
		});
		litab.bind(event, function(e) {
				litab.removeClass('active');
				$(this).addClass('active');
		});
	});
});


//<![CDATA[

