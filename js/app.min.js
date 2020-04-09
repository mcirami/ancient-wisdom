/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("jQuery(document).ready(function ($) {\n  $('.video_open').click(function () {\n    var videoLink = $(this).data('video');\n\n    if (videoLink.includes(\"embed\") || videoLink.includes(\"vimeo\")) {\n      embedLink = videoLink;\n    } else if (videoLink.includes(\"v=\")) {\n      str = videoLink.split(\"v=\");\n      embedLink = \"https://www.youtube.com/embed/\" + str[1];\n    } else if (videoLink.includes(\"youtu.be\")) {\n      str = videoLink.split(\".be/\");\n      embedLink = \"https://www.youtube.com/embed/\" + str[1];\n    }\n\n    var overlay = document.createElement(\"div\");\n    overlay.classList.add('overlay');\n    overlay.innerHTML = \"<div class='video_embed'><div class='video_wrapper'><iframe frameborder='0' allowfullscreen src='\" + embedLink + \"/?rel=0&showinfo=0'></iframe></div><span class='close_button'>CLOSE</span></div>\";\n    document.body.appendChild(overlay);\n    setTimeout(function () {\n      var element = document.querySelector('.close_button');\n      element.addEventListener('click', function () {\n        $('.overlay').remove();\n      });\n    }, 1000);\n  });\n\n  if (my_script_vars.pageTitle !== \"The School Of Ancient Wisdom\") {\n    var link = document.querySelector('.free_lesson_link');\n    link.firstChild.href = my_script_vars.home + \"#free_lessons\";\n  }\n});\n/*\n\nimport { BrowserRouter as Router, Route, Link } from 'react-router-dom';\n\nimport React from \"react\";\nimport ReactDOM from \"react-dom\";\nimport Header from \"components/header\";\n\nconst App = () => (\n\t<Router>\n\t\t<div>\n\t\t\t<Header />\n\t\t\t<section className=\"section container content\">\n\t\t\t\t<Route exact path=\"/\" component={PostList} />\n\t\t\t\t<Route path=\"/:slug\" component={PostView} />\n\t\t\t</section>\n\t\t</div>\n\t</Router>\n);\n\nReactDOM.render(<App />, document.getElementById(\"app\"));*///# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvYXBwLmpzPzllMGUiXSwibmFtZXMiOlsialF1ZXJ5IiwiZG9jdW1lbnQiLCJyZWFkeSIsIiQiLCJjbGljayIsInZpZGVvTGluayIsImRhdGEiLCJpbmNsdWRlcyIsImVtYmVkTGluayIsInN0ciIsInNwbGl0Iiwib3ZlcmxheSIsImNyZWF0ZUVsZW1lbnQiLCJjbGFzc0xpc3QiLCJhZGQiLCJpbm5lckhUTUwiLCJib2R5IiwiYXBwZW5kQ2hpbGQiLCJzZXRUaW1lb3V0IiwiZWxlbWVudCIsInF1ZXJ5U2VsZWN0b3IiLCJhZGRFdmVudExpc3RlbmVyIiwicmVtb3ZlIiwibXlfc2NyaXB0X3ZhcnMiLCJwYWdlVGl0bGUiLCJsaW5rIiwiZmlyc3RDaGlsZCIsImhyZWYiLCJob21lIl0sIm1hcHBpbmdzIjoiQUFBQUEsTUFBTSxDQUFDQyxRQUFELENBQU4sQ0FBaUJDLEtBQWpCLENBQXVCLFVBQVNDLENBQVQsRUFBWTtBQUdsQ0EsR0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQkMsS0FBakIsQ0FBdUIsWUFBVTtBQUVoQyxRQUFJQyxTQUFTLEdBQUdGLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUcsSUFBUixDQUFhLE9BQWIsQ0FBaEI7O0FBRUEsUUFBSUQsU0FBUyxDQUFDRSxRQUFWLENBQW1CLE9BQW5CLEtBQStCRixTQUFTLENBQUNFLFFBQVYsQ0FBbUIsT0FBbkIsQ0FBbkMsRUFBZ0U7QUFDL0RDLGVBQVMsR0FBR0gsU0FBWjtBQUNBLEtBRkQsTUFFTyxJQUFJQSxTQUFTLENBQUNFLFFBQVYsQ0FBbUIsSUFBbkIsQ0FBSixFQUE4QjtBQUNwQ0UsU0FBRyxHQUFHSixTQUFTLENBQUNLLEtBQVYsQ0FBZ0IsSUFBaEIsQ0FBTjtBQUNBRixlQUFTLEdBQUcsbUNBQW1DQyxHQUFHLENBQUMsQ0FBRCxDQUFsRDtBQUNBLEtBSE0sTUFHQSxJQUFJSixTQUFTLENBQUNFLFFBQVYsQ0FBbUIsVUFBbkIsQ0FBSixFQUFvQztBQUMxQ0UsU0FBRyxHQUFHSixTQUFTLENBQUNLLEtBQVYsQ0FBZ0IsTUFBaEIsQ0FBTjtBQUNBRixlQUFTLEdBQUcsbUNBQW1DQyxHQUFHLENBQUMsQ0FBRCxDQUFsRDtBQUNBOztBQUVELFFBQUlFLE9BQU8sR0FBR1YsUUFBUSxDQUFDVyxhQUFULENBQXVCLEtBQXZCLENBQWQ7QUFDQUQsV0FBTyxDQUFDRSxTQUFSLENBQWtCQyxHQUFsQixDQUFzQixTQUF0QjtBQUNBSCxXQUFPLENBQUNJLFNBQVIsR0FBb0Isc0dBQ25CUCxTQURtQixHQUVuQixrRkFGRDtBQUlBUCxZQUFRLENBQUNlLElBQVQsQ0FBY0MsV0FBZCxDQUEwQk4sT0FBMUI7QUFFQU8sY0FBVSxDQUFDLFlBQVU7QUFDcEIsVUFBTUMsT0FBTyxHQUFHbEIsUUFBUSxDQUFDbUIsYUFBVCxDQUF1QixlQUF2QixDQUFoQjtBQUNBRCxhQUFPLENBQUNFLGdCQUFSLENBQXlCLE9BQXpCLEVBQWtDLFlBQVU7QUFDM0NsQixTQUFDLENBQUMsVUFBRCxDQUFELENBQWNtQixNQUFkO0FBQ0EsT0FGRDtBQUdBLEtBTFMsRUFLUCxJQUxPLENBQVY7QUFNQSxHQTVCRDs7QUE4QkEsTUFBSUMsY0FBYyxDQUFDQyxTQUFmLEtBQTZCLDhCQUFqQyxFQUFpRTtBQUNoRSxRQUFJQyxJQUFJLEdBQUd4QixRQUFRLENBQUNtQixhQUFULENBQXVCLG1CQUF2QixDQUFYO0FBQ0FLLFFBQUksQ0FBQ0MsVUFBTCxDQUFnQkMsSUFBaEIsR0FBdUJKLGNBQWMsQ0FBQ0ssSUFBZixHQUFzQixlQUE3QztBQUNBO0FBRUQsQ0F0Q0Q7QUF1Q0EiLCJmaWxlIjoiLi9hc3NldHMvanMvYXBwLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsialF1ZXJ5KGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigkKSB7XG5cblxuXHQkKCcudmlkZW9fb3BlbicpLmNsaWNrKGZ1bmN0aW9uKCl7XG5cblx0XHRsZXQgdmlkZW9MaW5rID0gJCh0aGlzKS5kYXRhKCd2aWRlbycpO1xuXG5cdFx0aWYgKHZpZGVvTGluay5pbmNsdWRlcyhcImVtYmVkXCIpIHx8IHZpZGVvTGluay5pbmNsdWRlcyhcInZpbWVvXCIpKSB7XG5cdFx0XHRlbWJlZExpbmsgPSB2aWRlb0xpbms7XG5cdFx0fSBlbHNlIGlmICh2aWRlb0xpbmsuaW5jbHVkZXMoXCJ2PVwiKSkge1xuXHRcdFx0c3RyID0gdmlkZW9MaW5rLnNwbGl0KFwidj1cIik7XG5cdFx0XHRlbWJlZExpbmsgPSBcImh0dHBzOi8vd3d3LnlvdXR1YmUuY29tL2VtYmVkL1wiICsgc3RyWzFdO1xuXHRcdH0gZWxzZSBpZiAodmlkZW9MaW5rLmluY2x1ZGVzKFwieW91dHUuYmVcIikpIHtcblx0XHRcdHN0ciA9IHZpZGVvTGluay5zcGxpdChcIi5iZS9cIik7XG5cdFx0XHRlbWJlZExpbmsgPSBcImh0dHBzOi8vd3d3LnlvdXR1YmUuY29tL2VtYmVkL1wiICsgc3RyWzFdO1xuXHRcdH1cblxuXHRcdGxldCBvdmVybGF5ID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcImRpdlwiKTtcblx0XHRvdmVybGF5LmNsYXNzTGlzdC5hZGQoJ292ZXJsYXknKTtcblx0XHRvdmVybGF5LmlubmVySFRNTCA9IFwiPGRpdiBjbGFzcz0ndmlkZW9fZW1iZWQnPjxkaXYgY2xhc3M9J3ZpZGVvX3dyYXBwZXInPjxpZnJhbWUgZnJhbWVib3JkZXI9JzAnIGFsbG93ZnVsbHNjcmVlbiBzcmM9J1wiICtcblx0XHRcdGVtYmVkTGluayArXG5cdFx0XHRcIi8/cmVsPTAmc2hvd2luZm89MCc+PC9pZnJhbWU+PC9kaXY+PHNwYW4gY2xhc3M9J2Nsb3NlX2J1dHRvbic+Q0xPU0U8L3NwYW4+PC9kaXY+XCI7XG5cblx0XHRkb2N1bWVudC5ib2R5LmFwcGVuZENoaWxkKG92ZXJsYXkpO1xuXG5cdFx0c2V0VGltZW91dChmdW5jdGlvbigpe1xuXHRcdFx0Y29uc3QgZWxlbWVudCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5jbG9zZV9idXR0b24nKTtcblx0XHRcdGVsZW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbigpe1xuXHRcdFx0XHQkKCcub3ZlcmxheScpLnJlbW92ZSgpO1xuXHRcdFx0fSk7XG5cdFx0fSwgMTAwMCk7XG5cdH0pO1xuXG5cdGlmIChteV9zY3JpcHRfdmFycy5wYWdlVGl0bGUgIT09IFwiVGhlIFNjaG9vbCBPZiBBbmNpZW50IFdpc2RvbVwiKSB7XG5cdFx0bGV0IGxpbmsgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuZnJlZV9sZXNzb25fbGluaycpO1xuXHRcdGxpbmsuZmlyc3RDaGlsZC5ocmVmID0gbXlfc2NyaXB0X3ZhcnMuaG9tZSArIFwiI2ZyZWVfbGVzc29uc1wiXG5cdH1cblxufSk7XG4vKlxuXG5pbXBvcnQgeyBCcm93c2VyUm91dGVyIGFzIFJvdXRlciwgUm91dGUsIExpbmsgfSBmcm9tICdyZWFjdC1yb3V0ZXItZG9tJztcblxuaW1wb3J0IFJlYWN0IGZyb20gXCJyZWFjdFwiO1xuaW1wb3J0IFJlYWN0RE9NIGZyb20gXCJyZWFjdC1kb21cIjtcbmltcG9ydCBIZWFkZXIgZnJvbSBcImNvbXBvbmVudHMvaGVhZGVyXCI7XG5cbmNvbnN0IEFwcCA9ICgpID0+IChcblx0PFJvdXRlcj5cblx0XHQ8ZGl2PlxuXHRcdFx0PEhlYWRlciAvPlxuXHRcdFx0PHNlY3Rpb24gY2xhc3NOYW1lPVwic2VjdGlvbiBjb250YWluZXIgY29udGVudFwiPlxuXHRcdFx0XHQ8Um91dGUgZXhhY3QgcGF0aD1cIi9cIiBjb21wb25lbnQ9e1Bvc3RMaXN0fSAvPlxuXHRcdFx0XHQ8Um91dGUgcGF0aD1cIi86c2x1Z1wiIGNvbXBvbmVudD17UG9zdFZpZXd9IC8+XG5cdFx0XHQ8L3NlY3Rpb24+XG5cdFx0PC9kaXY+XG5cdDwvUm91dGVyPlxuKTtcblxuUmVhY3RET00ucmVuZGVyKDxBcHAgLz4sIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiYXBwXCIpKTsqL1xuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./assets/js/app.js\n");

/***/ }),

/***/ "./assets/sass/app.scss":
/*!******************************!*\
  !*** ./assets/sass/app.scss ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvc2Fzcy9hcHAuc2Nzcz81ZmFjIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBIiwiZmlsZSI6Ii4vYXNzZXRzL3Nhc3MvYXBwLnNjc3MuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyByZW1vdmVkIGJ5IGV4dHJhY3QtdGV4dC13ZWJwYWNrLXBsdWdpbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./assets/sass/app.scss\n");

/***/ }),

/***/ 0:
/*!*******************************************************!*\
  !*** multi ./assets/js/app.js ./assets/sass/app.scss ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/matteocirami/dev-valet/wisdom/wp-content/themes/TheSchoolOfAncientWisdom/assets/js/app.js */"./assets/js/app.js");
module.exports = __webpack_require__(/*! /Users/matteocirami/dev-valet/wisdom/wp-content/themes/TheSchoolOfAncientWisdom/assets/sass/app.scss */"./assets/sass/app.scss");


/***/ })

/******/ });