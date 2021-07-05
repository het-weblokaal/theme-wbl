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

/***/ "./src/css/editor-style.css":
/*!**********************************!*\
  !*** ./src/css/editor-style.css ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvY3NzL2VkaXRvci1zdHlsZS5jc3M/MGY2YyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQSIsImZpbGUiOiIuL3NyYy9jc3MvZWRpdG9yLXN0eWxlLmNzcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIHJlbW92ZWQgYnkgZXh0cmFjdC10ZXh0LXdlYnBhY2stcGx1Z2luIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./src/css/editor-style.css\n");

/***/ }),

/***/ "./src/css/style.css":
/*!***************************!*\
  !*** ./src/css/style.css ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvY3NzL3N0eWxlLmNzcz8wNmFkIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBIiwiZmlsZSI6Ii4vc3JjL2Nzcy9zdHlsZS5jc3MuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyByZW1vdmVkIGJ5IGV4dHJhY3QtdGV4dC13ZWJwYWNrLXBsdWdpbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./src/css/style.css\n");

/***/ }),

/***/ "./src/js/polyfill.js":
/*!****************************!*\
  !*** ./src/js/polyfill.js ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("/**\n * Polyfills\n */\n\n/**\n * el.matches polyfill for IE11\n * Source: https://developer.mozilla.org/en-US/docs/Web/API/Element/closest\n */\nif (!Element.prototype.matches) Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector;\n/**\n * el.closest polyfill for IE11\n * Source: https://developer.mozilla.org/en-US/docs/Web/API/Element/closest\n */\n\nif (!Element.prototype.closest) Element.prototype.closest = function (s) {\n  var el = this;\n  if (!document.documentElement.contains(el)) return null;\n\n  do {\n    if (el.matches(s)) return el;\n    el = el.parentElement || el.parentNode;\n  } while (el !== null && el.nodeType === 1);\n\n  return null;\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvanMvcG9seWZpbGwuanM/MDM2NCJdLCJuYW1lcyI6WyJFbGVtZW50IiwicHJvdG90eXBlIiwibWF0Y2hlcyIsIm1zTWF0Y2hlc1NlbGVjdG9yIiwid2Via2l0TWF0Y2hlc1NlbGVjdG9yIiwiY2xvc2VzdCIsInMiLCJlbCIsImRvY3VtZW50IiwiZG9jdW1lbnRFbGVtZW50IiwiY29udGFpbnMiLCJwYXJlbnRFbGVtZW50IiwicGFyZW50Tm9kZSIsIm5vZGVUeXBlIl0sIm1hcHBpbmdzIjoiQUFBQTs7OztBQUlBOzs7O0FBSUEsSUFBSSxDQUFDQSxPQUFPLENBQUNDLFNBQVIsQ0FBa0JDLE9BQXZCLEVBQ0lGLE9BQU8sQ0FBQ0MsU0FBUixDQUFrQkMsT0FBbEIsR0FBNEJGLE9BQU8sQ0FBQ0MsU0FBUixDQUFrQkUsaUJBQWxCLElBQ0FILE9BQU8sQ0FBQ0MsU0FBUixDQUFrQkcscUJBRDlDO0FBR0o7Ozs7O0FBSUEsSUFBSSxDQUFDSixPQUFPLENBQUNDLFNBQVIsQ0FBa0JJLE9BQXZCLEVBQ0lMLE9BQU8sQ0FBQ0MsU0FBUixDQUFrQkksT0FBbEIsR0FBNEIsVUFBU0MsQ0FBVCxFQUFZO0FBQ3BDLE1BQUlDLEVBQUUsR0FBRyxJQUFUO0FBQ0EsTUFBSSxDQUFDQyxRQUFRLENBQUNDLGVBQVQsQ0FBeUJDLFFBQXpCLENBQWtDSCxFQUFsQyxDQUFMLEVBQTRDLE9BQU8sSUFBUDs7QUFDNUMsS0FBRztBQUNDLFFBQUlBLEVBQUUsQ0FBQ0wsT0FBSCxDQUFXSSxDQUFYLENBQUosRUFBbUIsT0FBT0MsRUFBUDtBQUNuQkEsTUFBRSxHQUFHQSxFQUFFLENBQUNJLGFBQUgsSUFBb0JKLEVBQUUsQ0FBQ0ssVUFBNUI7QUFDSCxHQUhELFFBR1NMLEVBQUUsS0FBSyxJQUFQLElBQWVBLEVBQUUsQ0FBQ00sUUFBSCxLQUFnQixDQUh4Qzs7QUFJQSxTQUFPLElBQVA7QUFDSCxDQVJEIiwiZmlsZSI6Ii4vc3JjL2pzL3BvbHlmaWxsLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLyoqXG4gKiBQb2x5ZmlsbHNcbiAqL1xuXG4vKipcbiAqIGVsLm1hdGNoZXMgcG9seWZpbGwgZm9yIElFMTFcbiAqIFNvdXJjZTogaHR0cHM6Ly9kZXZlbG9wZXIubW96aWxsYS5vcmcvZW4tVVMvZG9jcy9XZWIvQVBJL0VsZW1lbnQvY2xvc2VzdFxuICovXG5pZiAoIUVsZW1lbnQucHJvdG90eXBlLm1hdGNoZXMpXG4gICAgRWxlbWVudC5wcm90b3R5cGUubWF0Y2hlcyA9IEVsZW1lbnQucHJvdG90eXBlLm1zTWF0Y2hlc1NlbGVjdG9yIHx8IFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBFbGVtZW50LnByb3RvdHlwZS53ZWJraXRNYXRjaGVzU2VsZWN0b3I7XG5cbi8qKlxuICogZWwuY2xvc2VzdCBwb2x5ZmlsbCBmb3IgSUUxMVxuICogU291cmNlOiBodHRwczovL2RldmVsb3Blci5tb3ppbGxhLm9yZy9lbi1VUy9kb2NzL1dlYi9BUEkvRWxlbWVudC9jbG9zZXN0XG4gKi9cbmlmICghRWxlbWVudC5wcm90b3R5cGUuY2xvc2VzdClcbiAgICBFbGVtZW50LnByb3RvdHlwZS5jbG9zZXN0ID0gZnVuY3Rpb24ocykge1xuICAgICAgICB2YXIgZWwgPSB0aGlzO1xuICAgICAgICBpZiAoIWRvY3VtZW50LmRvY3VtZW50RWxlbWVudC5jb250YWlucyhlbCkpIHJldHVybiBudWxsO1xuICAgICAgICBkbyB7XG4gICAgICAgICAgICBpZiAoZWwubWF0Y2hlcyhzKSkgcmV0dXJuIGVsO1xuICAgICAgICAgICAgZWwgPSBlbC5wYXJlbnRFbGVtZW50IHx8IGVsLnBhcmVudE5vZGU7XG4gICAgICAgIH0gd2hpbGUgKGVsICE9PSBudWxsICYmIGVsLm5vZGVUeXBlID09PSAxKTsgXG4gICAgICAgIHJldHVybiBudWxsO1xuICAgIH07Il0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./src/js/polyfill.js\n");

/***/ }),

/***/ 0:
/*!*********************************************************************************!*\
  !*** multi ./src/js/polyfill.js ./src/css/style.css ./src/css/editor-style.css ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/erik/Webdev/www/hetweblokaal/public_html/wp-content/themes/theme-wbl/src/js/polyfill.js */"./src/js/polyfill.js");
__webpack_require__(/*! /home/erik/Webdev/www/hetweblokaal/public_html/wp-content/themes/theme-wbl/src/css/style.css */"./src/css/style.css");
module.exports = __webpack_require__(/*! /home/erik/Webdev/www/hetweblokaal/public_html/wp-content/themes/theme-wbl/src/css/editor-style.css */"./src/css/editor-style.css");


/***/ })

/******/ });