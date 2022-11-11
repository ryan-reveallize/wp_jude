/* Set Background Image */
jQuery('.bg-img').each(function () {
	var imgSrc = jQuery(this).attr('data-background-image');
	if (imgSrc != undefined) {
		jQuery(this).css('background-image', 'url("' + imgSrc + '")');
		//jQuery(this).parent().css('background-position', '50% 0%');
	}
});

jQuery(document).ready(function () {
	/* Element Animate */
	jQuery('.animate__animated:not(.no_animation)').scrolla({
		once: true
	});
});

