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

/***/ "./resources/js/edit_profile_form.js":
/*!*******************************************!*\
  !*** ./resources/js/edit_profile_form.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// Intercettiamo tramite l'id il form per editare i dettagli del medico
var submitEditProfileForm = document.getElementById("submit-edit-profile");

// Intercettiamo tramite l'id il form per editare le credenziali del medico
var submitEditCredentialsForm = document.getElementById("submit-edit-credentials");

// Prendiamo il tag password e palliniamolo
var password = document.getElementById("password");
password.type = "password";

// Definiamo l'addEventListener al submit del form di editing del profilo
submitEditProfileForm.addEventListener("submit", function (event) {
  // Intercettiamo il submit del form
  event.preventDefault();

  // Verifichiamo che il medico confermi le modifiche
  var hasConfirmed = confirm("Sei sicuro di voler modificare le tue informazioni personali?");

  // Dovesse con fermare inviamo il form
  if (hasConfirmed) submitEditProfileForm.submit();
});

// Definiamo l'addEventListener al submit del form di editing delle credenziali del medico
submitEditCredentialsForm.addEventListener("submit", function (event) {
  // Intercettiamo il submit del form
  event.preventDefault();

  // Verifichiamo che il medico confermi le modifiche
  var hasConfirmed = confirm("Sei sicuro di voler modificare le tue credenziali?");

  // Dovesse con fermare inviamo il form
  if (hasConfirmed) submitEditCredentialsForm.submit();
});
var preview = document.getElementById("image");
var imageField = document.getElementById("thumb");
if (imageField !== null) {
  imageField.addEventListener("input", function () {
    preview.src = imageField.value;
  });
}

/***/ }),

/***/ 2:
/*!*************************************************!*\
  !*** multi ./resources/js/edit_profile_form.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/pasqualepedoto/laravel-BDoctors/resources/js/edit_profile_form.js */"./resources/js/edit_profile_form.js");


/***/ })

/******/ });