'use strict';

var $ = require('jquery');

var OnScreen = require('onscreen');
var os = new OnScreen();

module.exports = function () {

    os.on('enter', '.counter', (element, event) => {

        $('.counter__number').each(function () {
    		
        	$(this).prop('Counter', 0).animate({ Counter: $(this).text() }, 
        	{
            	
            	duration: 3500,
            	easing: 'swing', 
            	
            	step: function (now) {
                 	$(this).text(Math.ceil(now));
            	}

        	});

    	});

    });

};