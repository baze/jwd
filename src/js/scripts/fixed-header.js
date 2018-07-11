'use strict';

var $ = require('jquery');

module.exports = function () {

	$(window).scroll(function(){ 
		
		const scrollDepth = 256;
		var position = $(window).scrollTop();
		const header = $('.header--fixed');

		if ( position <= 44 ) {
			header.addClass('initial');
		} else {
			header.removeClass('initial');
		}

		if(position > scrollDepth) {
			header.addClass('header--fixed-background');
			header.removeClass('header--fixed-transparent');
		}
		else { 
			header.addClass('header--fixed-transparent');
			header.removeClass('header--fixed-background'); 
		}
	});

};