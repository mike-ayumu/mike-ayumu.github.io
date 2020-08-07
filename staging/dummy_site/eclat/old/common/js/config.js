$(document).ready(function() {
	$(".acd__box").css("display","none");
	$(".acd__box.is-block").css("display","block");
	$('.acd__btn').click(function(){
		$(this).next().slideToggle("fast");
		$(this).toggleClass('open');
	});
});
$(document).ready(function() {
	var pagetop = $('.pagetop');
	$(window).scroll(function () {
		if ($(this).scrollTop() > 200) {
			pagetop.fadeIn();
		} else {
			pagetop.fadeOut();
		}
	});
	pagetop.click(function () {
		$('body, html').animate({ scrollTop: 0 }, 600);
		return false;
	});
});
$(document).ready(function() {
	var trigger = $('#trigger');
	var another_voice = $('.another_voice');
	var voice_list=$('.voice_list');
	var pagetop = $('.cv_btn_experience');
	$(window).scroll(function () {
		if ($(this).scrollTop() > trigger.height() - another_voice.height() - 200) {
			pagetop.fadeIn();
		} else {
			pagetop.fadeOut();
		}
	});
});
