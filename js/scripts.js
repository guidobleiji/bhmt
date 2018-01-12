jQuery(document).ready(function(){
	jQuery('.mh').matchHeight();
	jQuery('html').fitVids();
	jQuery.fn.matchHeight._afterUpdate = function(event, groups) {
		jQuery('.zijbalk').height(function (index, height) {
			return (height + 75);
		});
	}

	jQuery('#slider').owlCarousel({
		autoplay:true,
		autoplayTimeout:4000,
        lazyLoad:true,
		center:true,
		responsiveClass:true,
		items:1,
		dots:false,
		animateOut: 'fadeOut',
		loop:true
	});
	
	jQuery(function() {
		jQuery('a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = jQuery(this.hash);
		  target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			jQuery('html, body').animate({
			  scrollTop: target.offset().top
			}, 1000);
			return false;
		  }
		}
		});
	});
	
	jQuery('.nieuwsblok p').html(function(_, text) {
		return text.replace('<!--more-->', '<span class="lees-verder">... Lees verder <i class="fa fa-caret-right" aria-hidden="true"></i></span>' );
	});
	
	jQuery('.tijdlijn li:eq(3) .tijdlijn-panel').addClass('tijdlijn-gradient');
	jQuery('.tijdlijn li:gt(3)').hide();
	jQuery('.volledig-programma').click(function() {
		jQuery('.tijdlijn li:eq(3) .tijdlijn-panel').toggleClass('tijdlijn-gradient');
		jQuery('.volledig-programma i').toggleClass('fa-flip-vertical');
		jQuery('.tijdlijn li:gt(3)').slideToggle();
		jQuery('html, body').animate({
			scrollTop: jQuery('.tijdlijn').offset().top
		}, 500);
	});
});

var $document = jQuery(document),
$element = jQuery('.navbar-default'),
className = 'scroll';
	
$document.scroll(function() {
	$element.toggleClass(className, $document.scrollTop() >= 60);
});