'use strict';

var $ = require('jquery');

module.exports = function() {

		var headline = $('.accordion__headline');
		const toggle = $('<span class="accordion__toggle"></span>');
		var accordion = $('.accordion');

		headline.append( toggle );
		headline.wrapInner('<button class="accordion__trigger"></button>');

		var trigger = $('.accordion__trigger');

		trigger.click(function (event) {
   	   		$(this).closest('.accordion').toggleClass('accordion--active');
    	});

};