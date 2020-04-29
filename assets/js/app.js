jQuery(document).ready(function($) {

	/*
		Function add and remove class from header to shrink logo when page scroll is > 40 from top
	*/

	function headerClassesScroll() {
		if ($(window).scrollTop() > 40) {
			$('.menu,header .logo,.mobile_menu_icon,ul.member_menu > li').addClass('scroll');
		} else {
			$('.header_top,.menu,header .logo,.mobile_menu_icon,ul.member_menu > li').removeClass('scroll');
		}
	}



	/*
		call function headerClassesScroll when page is scrolled
	*/

	$(window).on('scroll', function (event) {
		headerClassesScroll()
	});

	/*
		call function headerClassesScroll when page loaded if on home page
	*/
	if (my_script_vars.frontPage) {
		headerClassesScroll();
	}

	/*
		Add click event to open video overlay
	*/

	document.addEventListener('click', function(event){

		if (event.target.classList.contains('video_open') || event.target.classList.contains('video_open_img')) {

			event.preventDefault();
			let videoLink;

			if (event.target.classList.contains('video_open_img')) {
				videoLink = event.target.closest('.video_open').getAttribute('data-video');
			} else {
				videoLink = event.target.getAttribute('data-video');
			}

			if (videoLink.includes("embed") || videoLink.includes("vimeo")) {
				embedLink = videoLink;
			} else if (videoLink.includes("v=")) {
				str = videoLink.split("v=");
				embedLink = "https://www.youtube.com/embed/" + str[1];
			} else if (videoLink.includes("youtu.be")) {
				str = videoLink.split(".be/");
				embedLink = "https://www.youtube.com/embed/" + str[1];
			}

			let overlay = document.createElement("div");
			overlay.classList.add('video_overlay');
			overlay.innerHTML = "<div class='video_embed'><div class='video_wrapper'><iframe frameborder='0' allowfullscreen src='" +
				embedLink +
				"/?rel=0&showinfo=0'></iframe></div><span class='close_button'>CLOSE</span></div>";

			document.body.appendChild(overlay);

			setTimeout(function() {
				const element = document.querySelector('.close_button');
				element.addEventListener('click', function() {
					document.querySelector('.video_overlay').remove();
				});
			}, 1000);

		}

	}, false);

	/*
		If not a member changes Section One href to link to home page with href and adds scroll class
	*/

	if (!my_script_vars.member) {
		let links = document.querySelectorAll('.free_lesson_link');

		if (my_script_vars.frontPage) {
			links.forEach(link => {
				link.firstChild.classList.add("scroll_to_section");
			});
		} else {
			links.forEach(link => {
				link.firstChild.href = my_script_vars.home + "#free_lessons_section";
			});
		}
	}

	/*
		Add animation to body scroll on free lessons template when button clicked with class scroll_to_section
	*/

	let scrollToDivs = document.querySelectorAll('.scroll_to_section');

	scrollToDivs.forEach(function(value, index){
		value.addEventListener("click", function(event){
			event.preventDefault();
			let hash = this.getAttribute('href');
			$('html,body').animate({scrollTop: $(hash).offset().top - 100}, 1000);
		}, false);
	});

	if ($(window).width() > 768) {

		subMenuHover();

	} else if ($(window).width() < 768) {

		mobileSubMenu();
	}

	$(window).on('resize', function () {

		let menuIcon = $('.mobile_menu_icon');
		let menu = $('.menu');
		let headerBottom = $('.header_bottom');

		if ($(window).width() > 767) {
			let childSubmenu = $('.menu-item-has-children .sub-menu');
			let childLink = $('.menu-item-has-children > a');

			if(menuIcon.hasClass('open')) {
				menuIcon.removeClass('open');
				menu.removeClass('open');
				headerBottom.removeClass('background');
			}

			$('.sub-menu').clearQueue();

			subMenuHover();

			if (childSubmenu.hasClass('open')) {
				childSubmenu.slideUp(100);
				childSubmenu.removeClass('open');
			}

			if (childLink.hasClass('open')) {
				childLink.removeClass('open');
			}

		} else {
			let submenu = $('.menu-item-has-children');
			submenu.unbind('mouseenter');
			submenu.unbind('mouseleave');

			mobileSubMenu();

		}
	});

	function subMenuHover() {
		let topHasChildren = $('.menu-item-has-children.top_submenu');
		let bottomHasChildren = $('.menu-item-has-children');
		bottomHasChildren.mouseenter(function () {
				$(this).children('.sub-menu').slideDown(100);
			}
		);

		topHasChildren.mouseleave(function () {
				$(this).children('.sub-menu').slideUp(100);
				bottomHasChildren.children('.sub-menu').slideUp(100);
			}
		);
	}

	function mobileSubMenu() {
		$('.menu-item-has-children > a').click(function (e) {

			if (!$(this).hasClass('open')) {
				e.preventDefault();
				$(this).next('.sub-menu').not(":animated").slideDown(400);
				$(this).addClass('open');
				$(this).parent('li').addClass('open');

			} else {
				e.preventDefault();
				$(this).next('.sub-menu').not(":animated").slideUp(400);
				$(this).removeClass('open');
				$(this).parent('li').removeClass('open');
			}
		});
	}


	$('.mobile_menu_icon').click(function(e){
		e.preventDefault();
		$(this).toggleClass('open');
		$('.menu').toggleClass('open');
		if(my_script_vars.frontPage) {
			$('.header_bottom').toggleClass('background');
		}

	});

	var postVideoBtn = document.getElementById("post_video_btn");
	var cancelPost = $('.cancel_post');

	if (postVideoBtn) {

		$('#post_video_btn').click(function (e) {
			e.preventDefault();
			var headerHeight = $('#global_header').height();

			$('#post_submit_form').addClass('show');
			$('html,body').animate({scrollTop: $(this).offset().top - headerHeight}, 1000);

			$('#post_video_btn').css('opacity', '0');

		});
	}

	if (cancelPost) {

		cancelPost.click(function (e) {
			e.preventDefault();
			$('#post_submit_form').removeClass('show');
			$("html, body").animate({scrollTop: 100}, "slow");

			setTimeout(function () {
				$('#post_video_btn').css('opacity', '1');
			}, 800);
		})
	}

});