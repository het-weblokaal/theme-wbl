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

/***/ "./inc/blocks/blocks.editor.css":
/*!**************************************!*\
  !*** ./inc/blocks/blocks.editor.css ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9pbmMvYmxvY2tzL2Jsb2Nrcy5lZGl0b3IuY3NzP2YyZmIiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUEiLCJmaWxlIjoiLi9pbmMvYmxvY2tzL2Jsb2Nrcy5lZGl0b3IuY3NzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLy8gcmVtb3ZlZCBieSBleHRyYWN0LXRleHQtd2VicGFjay1wbHVnaW4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./inc/blocks/blocks.editor.css\n");

/***/ }),

/***/ "./src/css/editor-style.css":
/*!**********************************!*\
  !*** ./src/css/editor-style.css ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvY3NzL2VkaXRvci1zdHlsZS5jc3M/NmZlMSJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQSIsImZpbGUiOiIuL3NyYy9jc3MvZWRpdG9yLXN0eWxlLmNzcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIHJlbW92ZWQgYnkgZXh0cmFjdC10ZXh0LXdlYnBhY2stcGx1Z2luIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./src/css/editor-style.css\n");

/***/ }),

/***/ "./src/css/style.css":
/*!***************************!*\
  !*** ./src/css/style.css ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvY3NzL3N0eWxlLmNzcz9hMWNhIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBIiwiZmlsZSI6Ii4vc3JjL2Nzcy9zdHlsZS5jc3MuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyByZW1vdmVkIGJ5IGV4dHJhY3QtdGV4dC13ZWJwYWNrLXBsdWdpbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./src/css/style.css\n");

/***/ }),

/***/ "./src/js/polyfill.js":
/*!****************************!*\
  !*** ./src/js/polyfill.js ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("/**\n * Polyfills\n */\n\n/**\n * el.matches polyfill for IE11\n * Source: https://developer.mozilla.org/en-US/docs/Web/API/Element/closest\n */\nif (!Element.prototype.matches) Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector;\n/**\n * el.closest polyfill for IE11\n * Source: https://developer.mozilla.org/en-US/docs/Web/API/Element/closest\n */\n\nif (!Element.prototype.closest) Element.prototype.closest = function (s) {\n  var el = this;\n  if (!document.documentElement.contains(el)) return null;\n\n  do {\n    if (el.matches(s)) return el;\n    el = el.parentElement || el.parentNode;\n  } while (el !== null && el.nodeType === 1);\n\n  return null;\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvanMvcG9seWZpbGwuanM/MDM2NCJdLCJuYW1lcyI6WyJFbGVtZW50IiwiZWwiLCJkb2N1bWVudCJdLCJtYXBwaW5ncyI6IkFBQUE7Ozs7QUFJQTs7OztBQUlBLElBQUksQ0FBQ0EsT0FBTyxDQUFQQSxVQUFMLFNBQ0lBLE9BQU8sQ0FBUEEsb0JBQTRCQSxPQUFPLENBQVBBLCtCQUNBQSxPQUFPLENBQVBBLFVBRDVCQTtBQUdKOzs7OztBQUlBLElBQUksQ0FBQ0EsT0FBTyxDQUFQQSxVQUFMLFNBQ0ksT0FBTyxDQUFQLG9CQUE0QixhQUFZO0FBQ3BDLE1BQUlDLEVBQUUsR0FBTjtBQUNBLE1BQUksQ0FBQ0MsUUFBUSxDQUFSQSx5QkFBTCxFQUFLQSxDQUFMLEVBQTRDOztBQUM1QyxLQUFHO0FBQ0MsUUFBSUQsRUFBRSxDQUFGQSxRQUFKLENBQUlBLENBQUosRUFBbUI7QUFDbkJBLE1BQUUsR0FBR0EsRUFBRSxDQUFGQSxpQkFBb0JBLEVBQUUsQ0FBM0JBO0FBRkosV0FHU0EsRUFBRSxLQUFGQSxRQUFlQSxFQUFFLENBQUZBLGFBSHhCOztBQUlBO0FBUEoiLCJmaWxlIjoiLi9zcmMvanMvcG9seWZpbGwuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIFBvbHlmaWxsc1xuICovXG5cbi8qKlxuICogZWwubWF0Y2hlcyBwb2x5ZmlsbCBmb3IgSUUxMVxuICogU291cmNlOiBodHRwczovL2RldmVsb3Blci5tb3ppbGxhLm9yZy9lbi1VUy9kb2NzL1dlYi9BUEkvRWxlbWVudC9jbG9zZXN0XG4gKi9cbmlmICghRWxlbWVudC5wcm90b3R5cGUubWF0Y2hlcylcbiAgICBFbGVtZW50LnByb3RvdHlwZS5tYXRjaGVzID0gRWxlbWVudC5wcm90b3R5cGUubXNNYXRjaGVzU2VsZWN0b3IgfHwgXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIEVsZW1lbnQucHJvdG90eXBlLndlYmtpdE1hdGNoZXNTZWxlY3RvcjtcblxuLyoqXG4gKiBlbC5jbG9zZXN0IHBvbHlmaWxsIGZvciBJRTExXG4gKiBTb3VyY2U6IGh0dHBzOi8vZGV2ZWxvcGVyLm1vemlsbGEub3JnL2VuLVVTL2RvY3MvV2ViL0FQSS9FbGVtZW50L2Nsb3Nlc3RcbiAqL1xuaWYgKCFFbGVtZW50LnByb3RvdHlwZS5jbG9zZXN0KVxuICAgIEVsZW1lbnQucHJvdG90eXBlLmNsb3Nlc3QgPSBmdW5jdGlvbihzKSB7XG4gICAgICAgIHZhciBlbCA9IHRoaXM7XG4gICAgICAgIGlmICghZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LmNvbnRhaW5zKGVsKSkgcmV0dXJuIG51bGw7XG4gICAgICAgIGRvIHtcbiAgICAgICAgICAgIGlmIChlbC5tYXRjaGVzKHMpKSByZXR1cm4gZWw7XG4gICAgICAgICAgICBlbCA9IGVsLnBhcmVudEVsZW1lbnQgfHwgZWwucGFyZW50Tm9kZTtcbiAgICAgICAgfSB3aGlsZSAoZWwgIT09IG51bGwgJiYgZWwubm9kZVR5cGUgPT09IDEpOyBcbiAgICAgICAgcmV0dXJuIG51bGw7XG4gICAgfTsiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./src/js/polyfill.js\n");

/***/ }),

/***/ 0:
/*!****************************************************************************************************************!*\
  !*** multi ./src/js/polyfill.js ./src/css/style.css ./src/css/editor-style.css ./inc/blocks/blocks.editor.css ***!
  \****************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/erik/Webdev/www/hetweblokaal/public_html/wp-content/themes/theme-wbl/src/js/polyfill.js */"./src/js/polyfill.js");
__webpack_require__(/*! /home/erik/Webdev/www/hetweblokaal/public_html/wp-content/themes/theme-wbl/src/css/style.css */"./src/css/style.css");
__webpack_require__(/*! /home/erik/Webdev/www/hetweblokaal/public_html/wp-content/themes/theme-wbl/src/css/editor-style.css */"./src/css/editor-style.css");
module.exports = __webpack_require__(/*! /home/erik/Webdev/www/hetweblokaal/public_html/wp-content/themes/theme-wbl/inc/blocks/blocks.editor.css */"./inc/blocks/blocks.editor.css");


/***/ })

/******/ });