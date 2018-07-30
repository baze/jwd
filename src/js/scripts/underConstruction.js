'use strict';

var $ = require('jquery');

module.exports = function () {

    $('.imprint').click(function (event) {
        event.preventDefault();
        $('.under_construction__legal__imprint').toggleClass('active');
    });

};