jQuery(document).ready(function($) {


	$('.video_open').click(function(){

		let videoLink = $(this).data('video');

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

		setTimeout(function(){
			const element = document.querySelector('.close_button');
			element.addEventListener('click', function(){
				$('.overlay').remove();
			});
		}, 1000);
	});

	if (my_script_vars.pageTitle !== "The School Of Ancient Wisdom") {
		let link = document.querySelector('.free_lesson_link');
		link.firstChild.href = my_script_vars.home + "#free_lessons"
	}

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
