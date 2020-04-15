jQuery(document).ready(function($) {

	$(window).on('scroll', function (event) {
		if ($(window).scrollTop() > 40) {
			$('.menu,header .logo,.mobile_menu_icon,ul.member_menu > li').addClass('scroll');
			$('.header_bottom').addClass('home_background');
		} else {
			$('.header_top,.menu,header .logo,.mobile_menu_icon,ul.member_menu > li').removeClass('scroll');
			$('.header_bottom').removeClass('home_background');
		}
	});

	/*(function(){

		var parallax = document.querySelectorAll(".hero"),
			speed = 0.5;

		window.onscroll = function(){
			[].slice.call(parallax).forEach(function(el,i){

				let windowYOffset = window.pageYOffset,
					elBackgrounPos = "0 " + (windowYOffset * speed) + "px";

				el.style.backgroundPosition = elBackgrounPos;

			});
		};

	})();*/

	document.addEventListener('click', function(event){

		if (event.target.classList.contains('video_open')) {

			event.preventDefault();

			let videoLink = event.target.getAttribute('data-video');

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
			overlay.classList.add('overlay');
			overlay.innerHTML = "<div class='video_embed'><div class='video_wrapper'><iframe frameborder='0' allowfullscreen src='" +
				embedLink +
				"/?rel=0&showinfo=0'></iframe></div><span class='close_button'>CLOSE</span></div>";

			document.body.appendChild(overlay);

			setTimeout(function() {
				const element = document.querySelector('.close_button');
				element.addEventListener('click', function() {
					document.querySelector('.overlay').remove();
				});
			}, 1000);
		}

	}, false);

	if (my_script_vars.pageTitle !== "The School Of Ancient Wisdom" && !my_script_vars.member) {
		let links = document.querySelectorAll('.free_lesson_link');
		links.forEach(link => {
			link.firstChild.href = my_script_vars.home + "#free_lessons"
		});
	}

	if (my_script_vars.pageTitle === 'Member Lessons') {
		setTimeout(function() {
			$('.filtr-container').filterizr();
		},2000);
	}

	$('.filter_list li').click(function () {
		if (!$(this).hasClass('all')) {
			$(this).toggleClass('active');
			$('.filter_list li.all').removeClass('active');

			var allFilters = document.querySelectorAll(".filter_list li");

			var active = false;
			for (var i = 0; i < allFilters.length; i++) {
				if (allFilters[i].classList.contains('active')) {
					active = true;
				}
			}

			if (active === false) {
				$('.filter_list li.all').addClass('active');
			}

		} else {
			$('.filter_list li').removeClass('active');
			$(this).addClass('active');
		}
	});

	if ($(window).width() > 768) {

		subMenuHover();

	} else if ($(window).width() < 769) {

		mobileSubMenu();
	}

	$(window).on('resize', function () {

		let menuIcon = $('.mobile_menu_icon');
		let menu = $('.menu');
		let headerBottom = $('.header_bottom');

		if ($(window).width() > 768) {

			if(menuIcon.hasClass('open')) {
				menuIcon.removeClass('open');
				menu.removeClass('open');
				headerBottom.removeClass('background');
			}

			$('.sub-menu').clearQueue();

			subMenuHover();

			if ($('.menu-item-has-children .sub-menu').hasClass('open')) {
				$('.menu-item-has-children .sub-menu').slideUp(100);
				$('.menu-item-has-children .sub-menu').removeClass('open');
			}

			if ($('.menu-item-has-children > a').hasClass('open')) {
				$('.menu-item-has-children > a').removeClass('open');
			}

/*			$('.user_mobile_nav').removeClass('open');
			$('.user_mobile_nav p span').removeClass('open');
			$('.nav_wrap ul').css('display', 'block');*/
			//navIcon.html("+");


		} else {
			$('.menu-item-has-children').unbind('mouseenter');
			$('.menu-item-has-children').unbind('mouseleave');

			mobileSubMenu();

		}
	});

	function subMenuHover() {
		$('.menu-item-has-children').mouseenter(function () {
				$(this).children('.sub-menu').slideDown(100);
			}
		);

		$('.menu-item-has-children').mouseleave(function () {
				$(this).children('.sub-menu').slideUp(100);
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
		$('.header_bottom').toggleClass('background');
	});

});
/*

import { BrowserRouter as Router, Route, Link } from 'react-router-dom';

import React from "react";
import ReactDOM from "react-dom";
import Header from "components/header";

const App = () => (
	<Router>
		<div>
			<Header />
			<section className="section container content">
				<Route exact path="/" component={PostList} />
				<Route path="/:slug" component={PostView} />
			</section>
		</div>
	</Router>
);

ReactDOM.render(<App />, document.getElementById("app"));*/
