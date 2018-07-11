'use strict';

var $ = require('jquery');

module.exports = function () {

    $('.faq__question').click(function (event) {
        event.preventDefault();
        $(this).toggleClass('active');
        $(this).next('.faq__answer').toggleClass('expanded');
    });

};