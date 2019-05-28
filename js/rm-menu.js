/*================================
=            RM Menu             =
================================*/

$tablet = 768;
$desktop = 1080;

// Insert Nav Dropdown Button

$("<span class=\"nav-dropdown-button\"><span class=\"dropdown-arrow\"></span></span>").insertAfter(".menu-item-has-children > a");

// Insert Close Button

$("<span class=\"close-menu\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span>").insertAfter(".main-menu > .menu-item:last-of-type");

// Add/Remove Off-Canvas Menu Classes

var slideRightRemoveClass = true;
$(".menu-trigger").click(function () {
	$(".menu-wrap").toggleClass('menu-is-open');
	var el = $(this);
	slideRightRemoveClass = false;
	$(".menu-wrap").removeClass('menu-is-closed');
	// removed sticky form on mobile
	$('.sticky-form').removeClass('sticky-mobile-fixed');
	$('.connect').removeClass('chat-on');

});

$(".menu-wrap").click(function() {
	slideRightRemoveClass = false;
});

$("html, .close-menu").click(function () {
	if (slideRightRemoveClass) {
		$(".menu-wrap").addClass('menu-is-closed');
		$(".menu-wrap").removeClass('menu-is-open');
	}
	slideRightRemoveClass = true;
});

// Make the mobile menu work when switching between sizes

$(window).on("load resize",function(e){
	if ($("html").hasClass("is--device") || $(window).width() < $desktop) {
		$(".menu-wrap").removeClass("hover-menu");
		$(".menu-wrap").addClass("touch-menu");
		// $(".menu-wrap").removeClass("menu-is-closed");

	}
	else{
		$(".menu-wrap").removeClass("menu-is-open");
		$(".menu-wrap").removeClass("touch-menu");
		$(".menu-wrap").addClass("hover-menu");
	}


	if ($("html").hasClass("is--device") || $(window).width() < $desktop) {

		// Make dropdown button same height as #menu-main a

		$('.nav-dropdown-button').each(function(index, obj){
			var navDropdown = $(this).prev().outerHeight();
		});


		$('.touch-menu > .main-menu > li.menu-item-has-children > .nav-dropdown-button, .touch-menu .sub-menu > li.menu-item-has-children > .nav-dropdown-button').unbind('click');
		$('.touch-menu > .main-menu > li.menu-item-has-children > .nav-dropdown-button, .touch-menu .sub-menu > li.menu-item-has-children > .nav-dropdown-button').on('click' , function(e){
			e.preventDefault();
			var el = $(this);
			el.parent().toggleClass('sub-menu-open');
			el.next().slideToggle(400);
		});
	}
	else{
		$('.menu > li.menu-item-has-children > a, .menu .sub-menu > li.menu-item-has-children > a').unbind('click');
		$('ul.sub-menu, .menu').removeAttr('style');
	}
});