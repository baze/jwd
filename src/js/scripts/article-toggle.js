'use strict';

var $ = require('jquery');

module.exports = function () {

    $('.article__body__toggle').click(function (event) {
        event.preventDefault();
        $('.article__body').toggleClass('active');
    });

};