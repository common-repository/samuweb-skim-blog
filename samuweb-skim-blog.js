(function($) {

	// Stops the scrolling if user interacts
	$("html, body").bind("scroll mousedown DOMMouseScroll mousewheel keyup", function(){
		$('html, body').stop();
	});

	// Automatically scrolls to every title and subtitle and highlights them
	$('.samuweb-skim-blog-button').click(function(index) {
		$(samuweb_skim_blog_primary_element + ',' + samuweb_skim_blog_secondary_element).addClass('samuweb-skim-blog-fade-out');
		$(samuweb_skim_blog_primary_element + ',' + samuweb_skim_blog_secondary_element).each(function(index) {
			var highlight_element = $(this);

			$('html, body').animate({ scrollTop: $(this).offset().top - 50 }, 1000, 'swing', function() {
				highlight_element.addClass('samuweb-skim-blog-highlight');

				window.setTimeout(function(){
					highlight_element.removeClass('samuweb-skim-blog-highlight');
				}, samuweb_skim_blog_scroll_speed);

			}).delay(samuweb_skim_blog_scroll_speed);

		});
		window.setTimeout(function(){
			$('html, body').animate({ scrollTop: 0 }, 1000, 'swing');
		}, samuweb_skim_blog_scroll_speed * index);
	});

})(jQuery);