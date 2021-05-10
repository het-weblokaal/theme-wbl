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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/build/block-editor.js":
/*!*****************************************!*\
  !*** ./assets/js/build/block-editor.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("/**\n * Block Control\n *\n */\nwp.domReady(function () {\n  var __ = wp.i18n.__;\n  /* ==================== CLEANUP ==================== */\n\n  /**\n   * Remove panels\n   *\n   * These should be re-enabled if blog module is active\n   */\n\n  var _wp$data$dispatch = wp.data.dispatch('core/edit-post'),\n      removeEditorPanel = _wp$data$dispatch.removeEditorPanel; // // Excerpt panel\n  // removeEditorPanel( 'post-excerpt' );\n  // Discussion panel\n\n\n  removeEditorPanel('discussion-panel');\n  /**\n   * Disable inline images\n   */\n\n  wp.richText.unregisterFormatType('core/image');\n  /**\n   * Remove Style variants\n   */\n  // Quote\n\n  wp.blocks.unregisterBlockStyle('core/quote', 'default');\n  wp.blocks.unregisterBlockStyle('core/quote', 'large'); // Table\n\n  wp.blocks.unregisterBlockStyle('core/table', 'regular');\n  wp.blocks.unregisterBlockStyle('core/table', 'stripes'); // Separator\n\n  wp.blocks.unregisterBlockStyle('core/separator', 'default');\n  wp.blocks.unregisterBlockStyle('core/separator', 'wide');\n  wp.blocks.unregisterBlockStyle('core/separator', 'dots'); // Buttons\n\n  wp.blocks.unregisterBlockStyle('core/button', 'fill');\n  wp.blocks.unregisterBlockStyle('core/button', 'outline'); // Image\n\n  wp.blocks.unregisterBlockStyle('core/image', 'default');\n  wp.blocks.unregisterBlockStyle('core/image', 'circle-mask');\n  /* ==================== ADDITIONS ==================== */\n  // @link https://developer.wordpress.org/block-editor/developers/filters/block-filters/\n\n  wp.blocks.registerBlockVariation('wbl-theme/segment', {\n    name: 'wbl-theme/segment/test',\n    title: __('Segment: Test', 'theme-wbl'),\n    description: __('WBL Segment as a Test', 'theme-wbl'),\n    attributes: {\n      variation: 'test',\n      tagName: 'aside'\n    },\n    innerBlocks: [['core/paragraph', {\n      placeholder: 'Test'\n    }]],\n    scope: ['block', 'inserter']\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvYnVpbGQvYmxvY2stZWRpdG9yLmpzPzhlMjgiXSwibmFtZXMiOlsid3AiLCJfXyIsInJlbW92ZUVkaXRvclBhbmVsIiwibmFtZSIsInRpdGxlIiwiZGVzY3JpcHRpb24iLCJhdHRyaWJ1dGVzIiwidmFyaWF0aW9uIiwidGFnTmFtZSIsImlubmVyQmxvY2tzIiwicGxhY2Vob2xkZXIiLCJzY29wZSJdLCJtYXBwaW5ncyI6IkFBQUE7Ozs7QUFLQUEsRUFBRSxDQUFGQSxTQUFhLFlBQVc7QUFBQSxNQUVmQyxFQUZlLEdBRVJELEVBQUUsQ0FGTSxJQUVSQSxDQUZRO0FBSXZCOztBQUVBOzs7Ozs7QUFOdUIsMEJBV09BLEVBQUUsQ0FBRkEsY0FYUCxnQkFXT0EsQ0FYUDtBQUFBLE1BV2ZFLGlCQVhlLHdDQWF2QjtBQUNBO0FBRUE7OztBQUNBQSxtQkFBaUIsQ0FBakJBLGtCQUFpQixDQUFqQkE7QUFFQTs7OztBQUdDRixJQUFFLENBQUZBO0FBRUQ7OztBQUlBOztBQUNBQSxJQUFFLENBQUZBO0FBQ0FBLElBQUUsQ0FBRkEsMENBOUJ1QixPQThCdkJBLEVBOUJ1QixDQWdDdkI7O0FBQ0FBLElBQUUsQ0FBRkE7QUFDQUEsSUFBRSxDQUFGQSwwQ0FsQ3VCLFNBa0N2QkEsRUFsQ3VCLENBb0N2Qjs7QUFDQUEsSUFBRSxDQUFGQTtBQUNBQSxJQUFFLENBQUZBO0FBQ0FBLElBQUUsQ0FBRkEsOENBdkN1QixNQXVDdkJBLEVBdkN1QixDQXlDdkI7O0FBQ0FBLElBQUUsQ0FBRkE7QUFDQUEsSUFBRSxDQUFGQSwyQ0EzQ3VCLFNBMkN2QkEsRUEzQ3VCLENBNkN2Qjs7QUFDQUEsSUFBRSxDQUFGQTtBQUNBQSxJQUFFLENBQUZBO0FBR0E7QUFFQTs7QUFFQUEsSUFBRSxDQUFGQSxtREFBdUQ7QUFDdERHLFFBQUksRUFEa0Q7QUFFdERDLFNBQUssRUFBRUgsRUFBRSxrQkFGNkMsV0FFN0MsQ0FGNkM7QUFHdERJLGVBQVcsRUFBRUosRUFBRSwwQkFIdUMsV0FHdkMsQ0FIdUM7QUFJdERLLGNBQVUsRUFBRTtBQUFFQyxlQUFTLEVBQVg7QUFBcUJDLGFBQU8sRUFBRTtBQUE5QixLQUowQztBQUt0REMsZUFBVyxFQUFFLENBQ1osbUJBQW9CO0FBQUVDLGlCQUFXLEVBQUU7QUFBZixLQUFwQixDQURZLENBTHlDO0FBUXREQyxTQUFLLEVBQUU7QUFSK0MsR0FBdkRYO0FBdEREQSIsImZpbGUiOiIuL2Fzc2V0cy9qcy9idWlsZC9ibG9jay1lZGl0b3IuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIEJsb2NrIENvbnRyb2xcbiAqXG4gKi9cblxud3AuZG9tUmVhZHkoIGZ1bmN0aW9uKCkge1xuXG5cdGNvbnN0IHsgX18gfSA9IHdwLmkxOG47XG5cblx0LyogPT09PT09PT09PT09PT09PT09PT0gQ0xFQU5VUCA9PT09PT09PT09PT09PT09PT09PSAqL1xuXG5cdC8qKlxuXHQgKiBSZW1vdmUgcGFuZWxzXG5cdCAqXG5cdCAqIFRoZXNlIHNob3VsZCBiZSByZS1lbmFibGVkIGlmIGJsb2cgbW9kdWxlIGlzIGFjdGl2ZVxuXHQgKi9cblx0Y29uc3QgeyByZW1vdmVFZGl0b3JQYW5lbCB9ID0gd3AuZGF0YS5kaXNwYXRjaCggJ2NvcmUvZWRpdC1wb3N0JyApO1xuXG5cdC8vIC8vIEV4Y2VycHQgcGFuZWxcblx0Ly8gcmVtb3ZlRWRpdG9yUGFuZWwoICdwb3N0LWV4Y2VycHQnICk7XG5cblx0Ly8gRGlzY3Vzc2lvbiBwYW5lbFxuXHRyZW1vdmVFZGl0b3JQYW5lbCggJ2Rpc2N1c3Npb24tcGFuZWwnICk7XG5cblx0LyoqXG5cdCAqIERpc2FibGUgaW5saW5lIGltYWdlc1xuXHQgKi9cblx0IHdwLnJpY2hUZXh0LnVucmVnaXN0ZXJGb3JtYXRUeXBlKCAnY29yZS9pbWFnZScgKTtcblxuXHQvKipcblx0ICogUmVtb3ZlIFN0eWxlIHZhcmlhbnRzXG5cdCAqL1xuXG5cdC8vIFF1b3RlXG5cdHdwLmJsb2Nrcy51bnJlZ2lzdGVyQmxvY2tTdHlsZSggJ2NvcmUvcXVvdGUnLCAnZGVmYXVsdCcgKTtcblx0d3AuYmxvY2tzLnVucmVnaXN0ZXJCbG9ja1N0eWxlKCAnY29yZS9xdW90ZScsICdsYXJnZScgKTtcblxuXHQvLyBUYWJsZVxuXHR3cC5ibG9ja3MudW5yZWdpc3RlckJsb2NrU3R5bGUoICdjb3JlL3RhYmxlJywgJ3JlZ3VsYXInICk7XG5cdHdwLmJsb2Nrcy51bnJlZ2lzdGVyQmxvY2tTdHlsZSggJ2NvcmUvdGFibGUnLCAnc3RyaXBlcycgKTtcblxuXHQvLyBTZXBhcmF0b3Jcblx0d3AuYmxvY2tzLnVucmVnaXN0ZXJCbG9ja1N0eWxlKCAnY29yZS9zZXBhcmF0b3InLCAnZGVmYXVsdCcgKTtcblx0d3AuYmxvY2tzLnVucmVnaXN0ZXJCbG9ja1N0eWxlKCAnY29yZS9zZXBhcmF0b3InLCAnd2lkZScgKTtcblx0d3AuYmxvY2tzLnVucmVnaXN0ZXJCbG9ja1N0eWxlKCAnY29yZS9zZXBhcmF0b3InLCAnZG90cycgKTtcblxuXHQvLyBCdXR0b25zXG5cdHdwLmJsb2Nrcy51bnJlZ2lzdGVyQmxvY2tTdHlsZSggJ2NvcmUvYnV0dG9uJywgJ2ZpbGwnICk7XG5cdHdwLmJsb2Nrcy51bnJlZ2lzdGVyQmxvY2tTdHlsZSggJ2NvcmUvYnV0dG9uJywgJ291dGxpbmUnICk7XG5cblx0Ly8gSW1hZ2Vcblx0d3AuYmxvY2tzLnVucmVnaXN0ZXJCbG9ja1N0eWxlKCAnY29yZS9pbWFnZScsICdkZWZhdWx0JyApO1xuXHR3cC5ibG9ja3MudW5yZWdpc3RlckJsb2NrU3R5bGUoICdjb3JlL2ltYWdlJywgJ2NpcmNsZS1tYXNrJyApO1xuXG5cblx0LyogPT09PT09PT09PT09PT09PT09PT0gQURESVRJT05TID09PT09PT09PT09PT09PT09PT09ICovXG5cblx0Ly8gQGxpbmsgaHR0cHM6Ly9kZXZlbG9wZXIud29yZHByZXNzLm9yZy9ibG9jay1lZGl0b3IvZGV2ZWxvcGVycy9maWx0ZXJzL2Jsb2NrLWZpbHRlcnMvXG5cblx0d3AuYmxvY2tzLnJlZ2lzdGVyQmxvY2tWYXJpYXRpb24oICd3YmwtdGhlbWUvc2VnbWVudCcsIHtcblx0XHRuYW1lOiAnd2JsLXRoZW1lL3NlZ21lbnQvdGVzdCcsXG5cdFx0dGl0bGU6IF9fKCAnU2VnbWVudDogVGVzdCcsICd0aGVtZS13YmwnICksXG5cdFx0ZGVzY3JpcHRpb246IF9fKCAnV0JMIFNlZ21lbnQgYXMgYSBUZXN0JywgJ3RoZW1lLXdibCcgKSxcblx0XHRhdHRyaWJ1dGVzOiB7IHZhcmlhdGlvbjogJ3Rlc3QnLCB0YWdOYW1lOiAnYXNpZGUnIH0sXG5cdFx0aW5uZXJCbG9ja3M6IFtcblx0XHRcdFsgJ2NvcmUvcGFyYWdyYXBoJywgeyBwbGFjZWhvbGRlcjogJ1Rlc3QnIH0gXVxuXHRcdF0sXG5cdFx0c2NvcGU6IFsgJ2Jsb2NrJywgJ2luc2VydGVyJyBdXG5cdH0gKTtcbn0gKTtcbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./assets/js/build/block-editor.js\n");

/***/ }),

/***/ 2:
/*!***********************************************!*\
  !*** multi ./assets/js/build/block-editor.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/erik/Webdev/www/hetweblokaal/public_html/wp-content/themes/theme-wbl/assets/js/build/block-editor.js */"./assets/js/build/block-editor.js");


/***/ })

/******/ });