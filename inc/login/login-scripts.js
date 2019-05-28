(function($) {
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		$('html').addClass('is--device');
		if(/iPad/i.test(navigator.userAgent)){
			$('html').addClass('is--ipad');
		}
	}
	else{
		$('html').addClass('not--device');
	}

	$(function() {//doc.ready[shorthand] start

		$('#loginform').addClass('letswrap');
		$('#nav').addClass('letswrap');
		$('#backtoblog').addClass('letswrap');
		$(".letswrap" ).wrapAll("<div class='leave-header clearfix' />");


		//Let's use Materialize.css markup
		$('form#loginform > p:nth-of-type(1)').html('<input type="text" placeholder="user@domain.com" name="log" id="user_login" class="input wrap-inputs-one" value=""><label class="wrap-inputs-one" for="user_login">Username or Email</label>');
		$('form#loginform > p:nth-of-type(2)').html('<input type="password" placeholder="********" name="pwd" id="user_pass" class="input wrap-inputs-two" value=""><label class="wrap-inputs-two" for="user_pass">Password</label>');

		$(".wrap-inputs-one" ).wrapAll("<div class='input-field col s12 m6' />");
		$(".wrap-inputs-two" ).wrapAll("<div class='input-field col s12 m6' />");

		$(".input-field" ).wrapAll("<div class='row' />");

		//wrapping the button section in a div
		$('.forgetmenot').addClass('wrapme');
		$('.submit').addClass('wrapme');
		$(".wrapme" ).wrapAll("<div class='lower-login-wrap clearfix' />");

    $('.forgetmenot.wrapme').html('<input name="rememberme" type="checkbox" id="rememberme" value="forever"><label for="rememberme">Remember Me</label>');

    //Lost Password
    $('form#lostpasswordform > p').addClass('lostpasswrap');
    $(".message, #lostpasswordform" ).wrapAll("<div class='youlostyourpassword' />");
    $("#login_error" ).wrapAll("<div class='yourpasswordiswrong' />");
    $('.lostpasswrap').html('<input type="text" placeholder="admin@rosmeontmedia.com" name="user_login" id="user_login" class="input" value=""><label for="user_login">Username or Email</label>');

    $('.lostpasswrap input, .lostpasswrap label').addClass('wrap-input');
    $( '.wrap-input' ).wrapAll( '<div class="input-field" />');


    setTimeout(function () {
      $('.leave-header, .youlostyourpassword, .yourpasswordiswrong').addClass('showme');
    }, 500);

    setTimeout(function () {
    	//$('label.wrap-inputs-one').removeClass('active');
      	$('label.wrap-inputs-two,label.wrap-inputs-one').addClass('active');
    }, 300);

	});// end of doc.ready
})(jQuery);
