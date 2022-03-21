/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/polyfill.js":
/*!****************************!*\
  !*** ./src/js/polyfill.js ***!
  \****************************/
/***/ (() => {

eval("/**\n * Polyfills\n */\n\n/**\n * el.matches polyfill for IE11\n * Source: https://developer.mozilla.org/en-US/docs/Web/API/Element/closest\n */\nif (!Element.prototype.matches) Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector;\n/**\n * el.closest polyfill for IE11\n * Source: https://developer.mozilla.org/en-US/docs/Web/API/Element/closest\n */\n\nif (!Element.prototype.closest) Element.prototype.closest = function (s) {\n  var el = this;\n  if (!document.documentElement.contains(el)) return null;\n\n  do {\n    if (el.matches(s)) return el;\n    el = el.parentElement || el.parentNode;\n  } while (el !== null && el.nodeType === 1);\n\n  return null;\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly90aGVtZS13YmwvLi9zcmMvanMvcG9seWZpbGwuanM/MDM2NCJdLCJuYW1lcyI6WyJFbGVtZW50IiwicHJvdG90eXBlIiwibWF0Y2hlcyIsIm1zTWF0Y2hlc1NlbGVjdG9yIiwid2Via2l0TWF0Y2hlc1NlbGVjdG9yIiwiY2xvc2VzdCIsInMiLCJlbCIsImRvY3VtZW50IiwiZG9jdW1lbnRFbGVtZW50IiwiY29udGFpbnMiLCJwYXJlbnRFbGVtZW50IiwicGFyZW50Tm9kZSIsIm5vZGVUeXBlIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxJQUFJLENBQUNBLE9BQU8sQ0FBQ0MsU0FBUixDQUFrQkMsT0FBdkIsRUFDSUYsT0FBTyxDQUFDQyxTQUFSLENBQWtCQyxPQUFsQixHQUE0QkYsT0FBTyxDQUFDQyxTQUFSLENBQWtCRSxpQkFBbEIsSUFDQUgsT0FBTyxDQUFDQyxTQUFSLENBQWtCRyxxQkFEOUM7QUFHSjtBQUNBO0FBQ0E7QUFDQTs7QUFDQSxJQUFJLENBQUNKLE9BQU8sQ0FBQ0MsU0FBUixDQUFrQkksT0FBdkIsRUFDSUwsT0FBTyxDQUFDQyxTQUFSLENBQWtCSSxPQUFsQixHQUE0QixVQUFTQyxDQUFULEVBQVk7QUFDcEMsTUFBSUMsRUFBRSxHQUFHLElBQVQ7QUFDQSxNQUFJLENBQUNDLFFBQVEsQ0FBQ0MsZUFBVCxDQUF5QkMsUUFBekIsQ0FBa0NILEVBQWxDLENBQUwsRUFBNEMsT0FBTyxJQUFQOztBQUM1QyxLQUFHO0FBQ0MsUUFBSUEsRUFBRSxDQUFDTCxPQUFILENBQVdJLENBQVgsQ0FBSixFQUFtQixPQUFPQyxFQUFQO0FBQ25CQSxJQUFBQSxFQUFFLEdBQUdBLEVBQUUsQ0FBQ0ksYUFBSCxJQUFvQkosRUFBRSxDQUFDSyxVQUE1QjtBQUNILEdBSEQsUUFHU0wsRUFBRSxLQUFLLElBQVAsSUFBZUEsRUFBRSxDQUFDTSxRQUFILEtBQWdCLENBSHhDOztBQUlBLFNBQU8sSUFBUDtBQUNILENBUkQiLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIFBvbHlmaWxsc1xuICovXG5cbi8qKlxuICogZWwubWF0Y2hlcyBwb2x5ZmlsbCBmb3IgSUUxMVxuICogU291cmNlOiBodHRwczovL2RldmVsb3Blci5tb3ppbGxhLm9yZy9lbi1VUy9kb2NzL1dlYi9BUEkvRWxlbWVudC9jbG9zZXN0XG4gKi9cbmlmICghRWxlbWVudC5wcm90b3R5cGUubWF0Y2hlcylcbiAgICBFbGVtZW50LnByb3RvdHlwZS5tYXRjaGVzID0gRWxlbWVudC5wcm90b3R5cGUubXNNYXRjaGVzU2VsZWN0b3IgfHwgXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIEVsZW1lbnQucHJvdG90eXBlLndlYmtpdE1hdGNoZXNTZWxlY3RvcjtcblxuLyoqXG4gKiBlbC5jbG9zZXN0IHBvbHlmaWxsIGZvciBJRTExXG4gKiBTb3VyY2U6IGh0dHBzOi8vZGV2ZWxvcGVyLm1vemlsbGEub3JnL2VuLVVTL2RvY3MvV2ViL0FQSS9FbGVtZW50L2Nsb3Nlc3RcbiAqL1xuaWYgKCFFbGVtZW50LnByb3RvdHlwZS5jbG9zZXN0KVxuICAgIEVsZW1lbnQucHJvdG90eXBlLmNsb3Nlc3QgPSBmdW5jdGlvbihzKSB7XG4gICAgICAgIHZhciBlbCA9IHRoaXM7XG4gICAgICAgIGlmICghZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LmNvbnRhaW5zKGVsKSkgcmV0dXJuIG51bGw7XG4gICAgICAgIGRvIHtcbiAgICAgICAgICAgIGlmIChlbC5tYXRjaGVzKHMpKSByZXR1cm4gZWw7XG4gICAgICAgICAgICBlbCA9IGVsLnBhcmVudEVsZW1lbnQgfHwgZWwucGFyZW50Tm9kZTtcbiAgICAgICAgfSB3aGlsZSAoZWwgIT09IG51bGwgJiYgZWwubm9kZVR5cGUgPT09IDEpOyBcbiAgICAgICAgcmV0dXJuIG51bGw7XG4gICAgfTsiXSwiZmlsZSI6Ii4vc3JjL2pzL3BvbHlmaWxsLmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./src/js/polyfill.js\n");

/***/ }),

/***/ "./src/scss/style.scss":
/*!*****************************!*\
  !*** ./src/scss/style.scss ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9zcmMvc2Nzcy9zdHlsZS5zY3NzLmpzIiwibWFwcGluZ3MiOiI7QUFBQSIsInNvdXJjZXMiOlsid2VicGFjazovL3RoZW1lLXdibC8uL3NyYy9zY3NzL3N0eWxlLnNjc3M/ZmMyZiJdLCJzb3VyY2VzQ29udGVudCI6WyIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiXSwibmFtZXMiOltdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./src/scss/style.scss\n");

/***/ }),

/***/ "./src/scss/editor-style.scss":
/*!************************************!*\
  !*** ./src/scss/editor-style.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9zcmMvc2Nzcy9lZGl0b3Itc3R5bGUuc2Nzcy5qcyIsIm1hcHBpbmdzIjoiO0FBQUEiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly90aGVtZS13YmwvLi9zcmMvc2Nzcy9lZGl0b3Itc3R5bGUuc2Nzcz8wM2QwIl0sInNvdXJjZXNDb250ZW50IjpbIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyJdLCJuYW1lcyI6W10sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./src/scss/editor-style.scss\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/polyfill": 0,
/******/ 			"css/editor-style": 0,
/******/ 			"css/style": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) var result = runtime(__webpack_require__);
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = globalThis["webpackChunktheme_wbl"] = globalThis["webpackChunktheme_wbl"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/editor-style","css/style"], () => (__webpack_require__("./src/js/polyfill.js")))
/******/ 	__webpack_require__.O(undefined, ["css/editor-style","css/style"], () => (__webpack_require__("./src/scss/style.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/editor-style","css/style"], () => (__webpack_require__("./src/scss/editor-style.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;