'use strict';

var $ = require('jquery');

module.exports = function () {

    $('.mega__menu__toggle').click(function (event) {
        event.preventDefault();
        $(this).toggleClass('active');
        $('.mega__menu').toggleClass('active');
    });

};