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
module.exports = __webpack_require__(9);


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
__webpack_require__(8);

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

/*
|--------------------------------------------------------------------------
| Voting
|--------------------------------------------------------------------------
*/

/* General Like/Unlike */
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

/* Profile Unlike */
$('.unvote').click(function (e) {
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
            $('.post_' + formObj['postid']).remove();
        }.bind(this),

        /* Redirect to login if not authenticated */
        error: function error() {
            window.location.href = "/login";
        }
    });
});

/* Profile Delete */
$('.delete_small').click(function (e) {
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

/*
|--------------------------------------------------------------------------
| Dropdowns
|--------------------------------------------------------------------------
*/

/* Navigation dropdown */
$('.nav-dropdown').dropdown({
  action: 'select'
});

/* Sort dropdown */
$('.ui.dropdown.sort-dropdown').dropdown({
  action: function action(text, value, element) {
    element.click();
  }
});

/* Tag selection dropdown */
$('#tags').dropdown();

/* Location dropdown */
$('#location').dropdown();

/***/ }),
/* 4 */
/***/ (function(module, exports) {

/*
|--------------------------------------------------------------------------
| Popups
|--------------------------------------------------------------------------
*/

/* Delete Popup */
$('.trash_btn').popup({
  position: 'right center',
  content: 'Remove Post'
});

$('.edit_btn').popup({
  position: 'left center',
  content: 'Edit Post'
});

/***/ }),
/* 5 */
/***/ (function(module, exports) {

/*
|--------------------------------------------------------------------------
| Preloader
|--------------------------------------------------------------------------
*/

$(window).on('load', function () {
    $('#spinner').fadeOut().queue(function () {
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

/*
|--------------------------------------------------------------------------
| Theme
|--------------------------------------------------------------------------
*/

function checkTheme(theme) {
    if (theme == 1) {
        $('body').addClass('night-body');
        $('.search-input').addClass('night-font');
        $('.primary-link').addClass('night-font');
        $('#test_btn').attr('checked', 'checked');
        $('.ui').not('.ui.button, .ui.card, .ui.search').addClass('inverted');
        $('.visible.content, .ui.card').addClass('night-bg');
        $('.ui.card').addClass('night-shadow').children('.content').addClass('night-font').children().addClass('night-font');
        $('.comment').children('.content').children().addClass('night-font').children().addClass('night-font');
        $('.post-title').addClass('night-title');
        $('.trash_btn').removeAttr('data-variation');
        $('.edit_btn').removeAttr('data-variation');
    } else {
        $('body').removeClass('night-body');
        $('.search-input').removeClass('night-font');
        $('.primary-link').removeClass('night-font');
        $('.ui').not('.ui.button, .ui.card, .ui.search').removeClass('inverted');
        $('.visible.content, #leftload, #rightload, .ui.card').removeClass('night-bg');
        $('.ui.card').removeClass('night-shadow').children('.content').removeClass('night-font').children().removeClass('night-font');
        $('.comment').children('.content').children().removeClass('night-font').children().removeClass('night-font');
        $('.post-title').removeClass('night-title');
        $('.trash_btn').attr('data-variation', 'inverted');
        $('.edit_btn').attr('data-variation', 'inverted');
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

var _ref;

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/*
|--------------------------------------------------------------------------
| Validation
|--------------------------------------------------------------------------
*/

/* Post Form */
$('.create-post-form').form({
  fields: {
    title: {
      identifier: 'title',
      rules: [{
        type: 'empty',
        prompt: 'Please enter a title'
      }, {
        type: 'maxLength[70]',
        prompt: 'Title must be <b><u>70 characters</u></b> or <b><u>less</u></b>'
      }, {
        type: 'regExp[^(?!.*[-+_@#$%^&£*.,]).+$]',
        prompt: 'Title <b><u>cannot</u></b> contain any <b><u>special characters</u></b>'
      }]
    },
    tags: {
      identifier: 'tags[]',
      rules: [{
        type: 'empty',
        prompt: 'Post must contain <b><u>at least 1 tag</u></b>'
      }, {
        type: 'maxCount[5]',
        prompt: 'Post must contain <b><u>5 tags</u></b> or <b><u>less</u></b>'
      }]
    }
  }
});

/* Settings Form */
$('.settings-form').form({
  fields: {
    name: {
      identifier: 'name',
      rules: [{
        type: 'empty',
        prompt: 'Please enter a username'
      }, {
        type: 'maxLength[20]',
        prompt: 'Name must be less than 20 characters'
      }, {
        type: 'regExp[^(?!.*[-+_!@#$%^&£*.,?])(?!.*\\\s).+$]',
        prompt: 'Userame must be <b><u>one word</u></b> and contain <b><u>no special characters</u></b> or <b><u>spaces</u></b>'
      }]
    },
    email: {
      identifier: 'email',
      rules: [(_ref = {
        type: 'empty'
      }, _defineProperty(_ref, 'type', 'email'), _defineProperty(_ref, 'prompt', 'Please enter a valid e-mail'), _ref)]
    },
    bio: {
      identifier: 'bio',
      rules: [{
        type: 'maxLength[80]',
        prompt: 'Bio must be <b><u>80 characters</u></b> or <b><u>less</u></b>'
      }]
    },
    url: {
      identifier: 'url',
      optional: 'true',
      rules: [{
        type: 'regExp[^(?!https)(?!http)(?!.*[-+_!@#$%^&*,?])(?=.*[.])(?!.*[.]$).+$]',
        prompt: 'Please enter a valid URL: <b><u>www.example.com</u></b> | <b><u>example.com</u></b>'
      }]
    }
  }
});

/***/ }),
/* 8 */
/***/ (function(module, exports) {

/*
|--------------------------------------------------------------------------
| TinyMCE editor
|--------------------------------------------------------------------------
*/

tinymce.init({
    selector: '.mce_field',
    menubar: false,
    branding: false,
    plugins: 'codesample',
    codesample_languages: [{ text: 'HTML/XML', value: 'markup' }, { text: 'CSS', value: 'css' }, { text: 'Sass (Sass)', value: 'sass' }, { text: 'Sass (Scss)', value: 'scss' }, { text: 'JavaScript', value: 'javascript' }, { text: 'PHP', value: 'php' }, { text: 'SQL', value: 'sql' }, { text: 'Java', value: 'java' }, { text: 'Ruby', value: 'ruby' }, { text: 'Python', value: 'python' }, { text: 'C#', value: 'csharp' }, { text: 'Objective-C', value: 'objectivec' }],
    codesample_dialog_height: 400,
    codesample_dialog_width: 400,
    toolbar: 'undo redo | styleselect | bold italic | blockquote | codesample'
});

/***/ }),
/* 9 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);