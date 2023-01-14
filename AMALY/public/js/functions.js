(function ($) {

	$('#countdown_dashboard').countDown({

	        targetOffset: {
	            'day':      0,
	            'month':    50,
	            'year':     0,
	            'hour':     0,
	            'min':      0,
	            'sec':      0

	        },


	    });

	$('#email_field').focus(email_focus).blur(email_blur);
	$('#subscribe_form').bind('submit', function() { return false; });

})(jQuery);
