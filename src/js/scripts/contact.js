'use strict';

var $ = require('jquery');

module.exports = function () {

    $('.contact__button').click(function (event) {
        event.preventDefault();
        $('.contact__form').toggleClass('active');
        $('html').toggleClass('overlay-active');
    });

};