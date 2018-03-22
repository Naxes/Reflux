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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(8);


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

/* Modules */
__webpack_require__(2);
__webpack_require__(3);
__webpack_require__(4);
__webpack_require__(5);
__webpack_require__(6);
__webpack_require__(7);

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

/***/ }),
/* 2 */
/***/ (function(module, exports) {

/* ==========================================================================
   Votes
   ========================================================================== */
$('.vote').click(function (e) {
    e.preventDefault();
    e.stopPropagation();

    var form = $(this.form);
    var formData = form.serializeArray(),
        formObj = {};

    /* Form data */
    $(formData).each(function (i, val) {
        formObj[val.name] = val.value;
    });

    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: formData,

        /* Toggle button color */
        success: function (data) {
            $(this).toggleClass('basic ' + 'blue ' + 'blue');
            $('.value_' + formObj['postid']).load(' .value_' + formObj['postid']);
        }.bind(this),

        /* Redirect to login if not authenticated */
        error: function error() {
            window.location.href = "/login";
        }
    });
});

/* ==========================================================================
   Delete post
   ========================================================================== */
$('.delete').click(function (e) {
    e.preventDefault();
    e.stopPropagation();

    var form = $(this.form);
    var formData = form.serializeArray(),
        formObj = {};

    /* Form data */
    $(formData).each(function (i, val) {
        formObj[val.name] = val.value;
    });

    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: formData,

        success: function success(data) {
            $('.post_' + formObj['postid']).remove();
            $('.ui.mini.modal').modal('hide');
        }
    });
});

/***/ }),
/* 3 */
/***/ (function(module, exports) {

$('.ui.dropdown').dropdown();

/***/ }),
/* 4 */
/***/ (function(module, exports) {



/***/ }),
/* 5 */
/***/ (function(module, exports) {

/* ==========================================================================
   Preloader
   ========================================================================== */
$(window).on('load', function () {
    $('#spinner').delay(200).fadeOut().queue(function () {
        $('#leftload').addClass('leftload');
        $('#rightload').addClass('rightload').delay(500).queue(function () {
            $('#preloader').remove();
            $('body').removeClass('loading');
        });
    });
});

/***/ }),
/* 6 */
/***/ (function(module, exports) {

/* ==========================================================================
   Day/Night mode
   ========================================================================== */

function checkTheme(theme) {
    if (theme == 1) {
        $('body').addClass('night-body');
        $('.ui').not('.ui.button, .ui.card').addClass('inverted');
        $('.visible.content, .ui.card').addClass('night-bg');
        $('.ui.card').addClass('night-shadow').children('.content').addClass('night-font').children().addClass('night-font');
        $('.comment').children('.content').children().addClass('night-font').children().addClass('night-font');
        $('.post-title').addClass('night-title');
    } else {
        $('body').removeClass('night-body');
        $('.ui').not('.ui.button, .ui.card').removeClass('inverted');
        $('.visible.content, #leftload, #rightload, .ui.card').removeClass('night-bg');
        $('.ui.card').removeClass('night-shadow').children('.content').removeClass('night-font').children().removeClass('night-font');
        $('.comment').children('.content').children().removeClass('night-font').children().removeClass('night-font');
        $('.post-title').removeClass('night-title');
    }
}

$(document).ready(function () {
    var theme = localStorage.getItem('theme');
    checkTheme(theme);

    /* Set theme on click */
    $('#test_btn').on('click', function () {
        theme ^= true;
        localStorage.setItem('theme', theme);
        checkTheme(theme);
    });
});

/***/ }),
/* 7 */
/***/ (function(module, exports) {

tinymce.init({
    selector: '.mce_field',
    menubar: false,
    branding: false,
    plugins: 'codesample',
    codesample_languages: [{ text: 'HTML/XML', value: 'markup' }, { text: 'CSS', value: 'css' }, { text: 'JavaScript', value: 'javascript' }],
    codesample_dialog_height: 400,
    codesample_dialog_width: 400,
    toolbar: 'undo redo | styleselect | bold italic | blockquote | codesample'
});

/***/ }),
/* 8 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);