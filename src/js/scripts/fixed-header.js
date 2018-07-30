'use strict';

var $ = require('jquery');

module.exports = function () {

	const hero = $('.hero');
	const header = $('.header--fixed');
	var height = header.outerHeight(true);

/*	if( typeof header !== 'undefined' ) {
		hero.css({ "padding-top" : height + 44 });
	}*/

	$(window).scroll(function(){ 
		
		const scrollDepth = 256;
		var position = $(window).scrollTop();
		
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