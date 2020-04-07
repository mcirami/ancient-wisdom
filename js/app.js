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

eval("jQuery(document).ready(function ($) {\n  $('.video_open').click(function () {\n    var videoLink = $(this).data('video');\n\n    if (videoLink.includes(\"embed\") || videoLink.includes(\"vimeo\")) {\n      embedLink = videoLink;\n    } else if (videoLink.includes(\"v=\")) {\n      str = videoLink.split(\"v=\");\n      embedLink = \"https://www.youtube.com/embed/\" + str[1];\n    } else if (videoLink.includes(\"youtu.be\")) {\n      str = videoLink.split(\".be/\");\n      embedLink = \"https://www.youtube.com/embed/\" + str[1];\n    }\n    /*var iframe = document.createElement(\"iframe\");\n    \tiframe.setAttribute(\"frameborder\", \"0\");\n    iframe.setAttribute(\"allowfullscreen\", \"\");\n    iframe.setAttribute(\"src\", embedLink + this.dataset.embed + \"?autoplay=1\");*/\n\n\n    var overlay = document.createElement(\"div\");\n    overlay.classList.add('overlay');\n    overlay.innerHTML = \"<div class='video_embed'><div class='video_wrapper'><iframe frameborder='0' allowfullscreen src='\" + embedLink + \"/?rel=0&showinfo=0'></iframe></div></div>\"; //overlay.appendChild(iframe);\n\n    document.body.appendChild(overlay);\n  });\n});\n/*\n\nimport { BrowserRouter as Router, Route, Link } from 'react-router-dom';\n\nimport React from \"react\";\nimport ReactDOM from \"react-dom\";\nimport Header from \"components/header\";\n\nconst App = () => (\n\t<Router>\n\t\t<div>\n\t\t\t<Header />\n\t\t\t<section className=\"section container content\">\n\t\t\t\t<Route exact path=\"/\" component={PostList} />\n\t\t\t\t<Route path=\"/:slug\" component={PostView} />\n\t\t\t</section>\n\t\t</div>\n\t</Router>\n);\n\nReactDOM.render(<App />, document.getElementById(\"app\"));*///# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvYXBwLmpzPzllMGUiXSwibmFtZXMiOlsialF1ZXJ5IiwiZG9jdW1lbnQiLCJyZWFkeSIsIiQiLCJjbGljayIsInZpZGVvTGluayIsImRhdGEiLCJpbmNsdWRlcyIsImVtYmVkTGluayIsInN0ciIsInNwbGl0Iiwib3ZlcmxheSIsImNyZWF0ZUVsZW1lbnQiLCJjbGFzc0xpc3QiLCJhZGQiLCJpbm5lckhUTUwiLCJib2R5IiwiYXBwZW5kQ2hpbGQiXSwibWFwcGluZ3MiOiJBQUFBQSxNQUFNLENBQUNDLFFBQUQsQ0FBTixDQUFpQkMsS0FBakIsQ0FBdUIsVUFBU0MsQ0FBVCxFQUFZO0FBRWxDQSxHQUFDLENBQUMsYUFBRCxDQUFELENBQWlCQyxLQUFqQixDQUF1QixZQUFVO0FBRWhDLFFBQUlDLFNBQVMsR0FBR0YsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRRyxJQUFSLENBQWEsT0FBYixDQUFoQjs7QUFFQSxRQUFJRCxTQUFTLENBQUNFLFFBQVYsQ0FBbUIsT0FBbkIsS0FBK0JGLFNBQVMsQ0FBQ0UsUUFBVixDQUFtQixPQUFuQixDQUFuQyxFQUFnRTtBQUMvREMsZUFBUyxHQUFHSCxTQUFaO0FBQ0EsS0FGRCxNQUVPLElBQUlBLFNBQVMsQ0FBQ0UsUUFBVixDQUFtQixJQUFuQixDQUFKLEVBQThCO0FBQ3BDRSxTQUFHLEdBQUdKLFNBQVMsQ0FBQ0ssS0FBVixDQUFnQixJQUFoQixDQUFOO0FBQ0FGLGVBQVMsR0FBRyxtQ0FBbUNDLEdBQUcsQ0FBQyxDQUFELENBQWxEO0FBQ0EsS0FITSxNQUdBLElBQUlKLFNBQVMsQ0FBQ0UsUUFBVixDQUFtQixVQUFuQixDQUFKLEVBQW9DO0FBQzFDRSxTQUFHLEdBQUdKLFNBQVMsQ0FBQ0ssS0FBVixDQUFnQixNQUFoQixDQUFOO0FBQ0FGLGVBQVMsR0FBRyxtQ0FBbUNDLEdBQUcsQ0FBQyxDQUFELENBQWxEO0FBQ0E7QUFFRDs7Ozs7O0FBTUEsUUFBSUUsT0FBTyxHQUFHVixRQUFRLENBQUNXLGFBQVQsQ0FBdUIsS0FBdkIsQ0FBZDtBQUNBRCxXQUFPLENBQUNFLFNBQVIsQ0FBa0JDLEdBQWxCLENBQXNCLFNBQXRCO0FBQ0FILFdBQU8sQ0FBQ0ksU0FBUixHQUFvQixzR0FDbkJQLFNBRG1CLEdBRW5CLDJDQUZELENBdEJnQyxDQXlCaEM7O0FBRUFQLFlBQVEsQ0FBQ2UsSUFBVCxDQUFjQyxXQUFkLENBQTBCTixPQUExQjtBQUNBLEdBNUJEO0FBOEJBLENBaENEO0FBaUNBIiwiZmlsZSI6Ii4vYXNzZXRzL2pzL2FwcC5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbImpRdWVyeShkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oJCkge1xuXG5cdCQoJy52aWRlb19vcGVuJykuY2xpY2soZnVuY3Rpb24oKXtcblxuXHRcdHZhciB2aWRlb0xpbmsgPSAkKHRoaXMpLmRhdGEoJ3ZpZGVvJyk7XG5cblx0XHRpZiAodmlkZW9MaW5rLmluY2x1ZGVzKFwiZW1iZWRcIikgfHwgdmlkZW9MaW5rLmluY2x1ZGVzKFwidmltZW9cIikpIHtcblx0XHRcdGVtYmVkTGluayA9IHZpZGVvTGluaztcblx0XHR9IGVsc2UgaWYgKHZpZGVvTGluay5pbmNsdWRlcyhcInY9XCIpKSB7XG5cdFx0XHRzdHIgPSB2aWRlb0xpbmsuc3BsaXQoXCJ2PVwiKTtcblx0XHRcdGVtYmVkTGluayA9IFwiaHR0cHM6Ly93d3cueW91dHViZS5jb20vZW1iZWQvXCIgKyBzdHJbMV07XG5cdFx0fSBlbHNlIGlmICh2aWRlb0xpbmsuaW5jbHVkZXMoXCJ5b3V0dS5iZVwiKSkge1xuXHRcdFx0c3RyID0gdmlkZW9MaW5rLnNwbGl0KFwiLmJlL1wiKTtcblx0XHRcdGVtYmVkTGluayA9IFwiaHR0cHM6Ly93d3cueW91dHViZS5jb20vZW1iZWQvXCIgKyBzdHJbMV07XG5cdFx0fVxuXG5cdFx0Lyp2YXIgaWZyYW1lID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcImlmcmFtZVwiKTtcblxuXHRcdGlmcmFtZS5zZXRBdHRyaWJ1dGUoXCJmcmFtZWJvcmRlclwiLCBcIjBcIik7XG5cdFx0aWZyYW1lLnNldEF0dHJpYnV0ZShcImFsbG93ZnVsbHNjcmVlblwiLCBcIlwiKTtcblx0XHRpZnJhbWUuc2V0QXR0cmlidXRlKFwic3JjXCIsIGVtYmVkTGluayArIHRoaXMuZGF0YXNldC5lbWJlZCArIFwiP2F1dG9wbGF5PTFcIik7Ki9cblxuXHRcdHZhciBvdmVybGF5ID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcImRpdlwiKTtcblx0XHRvdmVybGF5LmNsYXNzTGlzdC5hZGQoJ292ZXJsYXknKTtcblx0XHRvdmVybGF5LmlubmVySFRNTCA9IFwiPGRpdiBjbGFzcz0ndmlkZW9fZW1iZWQnPjxkaXYgY2xhc3M9J3ZpZGVvX3dyYXBwZXInPjxpZnJhbWUgZnJhbWVib3JkZXI9JzAnIGFsbG93ZnVsbHNjcmVlbiBzcmM9J1wiICtcblx0XHRcdGVtYmVkTGluayArXG5cdFx0XHRcIi8/cmVsPTAmc2hvd2luZm89MCc+PC9pZnJhbWU+PC9kaXY+PC9kaXY+XCI7XG5cdFx0Ly9vdmVybGF5LmFwcGVuZENoaWxkKGlmcmFtZSk7XG5cblx0XHRkb2N1bWVudC5ib2R5LmFwcGVuZENoaWxkKG92ZXJsYXkpO1xuXHR9KTtcblxufSk7XG4vKlxuXG5pbXBvcnQgeyBCcm93c2VyUm91dGVyIGFzIFJvdXRlciwgUm91dGUsIExpbmsgfSBmcm9tICdyZWFjdC1yb3V0ZXItZG9tJztcblxuaW1wb3J0IFJlYWN0IGZyb20gXCJyZWFjdFwiO1xuaW1wb3J0IFJlYWN0RE9NIGZyb20gXCJyZWFjdC1kb21cIjtcbmltcG9ydCBIZWFkZXIgZnJvbSBcImNvbXBvbmVudHMvaGVhZGVyXCI7XG5cbmNvbnN0IEFwcCA9ICgpID0+IChcblx0PFJvdXRlcj5cblx0XHQ8ZGl2PlxuXHRcdFx0PEhlYWRlciAvPlxuXHRcdFx0PHNlY3Rpb24gY2xhc3NOYW1lPVwic2VjdGlvbiBjb250YWluZXIgY29udGVudFwiPlxuXHRcdFx0XHQ8Um91dGUgZXhhY3QgcGF0aD1cIi9cIiBjb21wb25lbnQ9e1Bvc3RMaXN0fSAvPlxuXHRcdFx0XHQ8Um91dGUgcGF0aD1cIi86c2x1Z1wiIGNvbXBvbmVudD17UG9zdFZpZXd9IC8+XG5cdFx0XHQ8L3NlY3Rpb24+XG5cdFx0PC9kaXY+XG5cdDwvUm91dGVyPlxuKTtcblxuUmVhY3RET00ucmVuZGVyKDxBcHAgLz4sIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiYXBwXCIpKTsqL1xuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./assets/js/app.js\n");

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