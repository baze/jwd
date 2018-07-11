'use strict';

var $ = require('jquery');

module.exports = function () {

	var ToC =
		  "<nav role='navigation' class='landingpage-toc' style='" + attr + bodyMaxwidth + unit + "'>" +
		    "<ul>";

		var newLine, el, title, titlestring, link, anchor;

		$(tocHeadlines).each(function() {
		  
		  el = $(this);
		  title = el.text();
		  titlestring = title.replace(/\s+/g, '-').replace(/ü/gi, "ue").replace(/ä/gi, "ae").replace(/ö/gi, "oe").replace(/\./g,'').replace(/:/g,'').replace(/,/g,'').toLowerCase();
		  anchor = $(el).attr("id", titlestring);
		  link = "#" + titlestring;	  

		  newLine =
		    "<li>" +
		      "<a href='" + link + "'>" +
		        title +
		      "</a>" +
		    "</li>";

		  ToC += newLine;

		});

		ToC +=
		   "</ul>" +
		  "</nav>";

		$(".landingpage-toc__hook").append(ToC);

		var debounce_timer;

		$(window).scroll(function(){ 
	        
	        const start =  $('.landingpage-toc__hook')   
	    	const header = $('.landingpage-toc');
	    	var offset = start.offset();
	    	var scrollDepth = offset.top;
	        var position = $(window).scrollTop();

	        if(debounce_timer) {
				window.clearTimeout(debounce_timer);
			}

			debounce_timer = window.setTimeout(function() {
				if(position > scrollDepth) {
	            	header.addClass('toc-scrolled');
	        	} else {
	        		header.removeClass('toc-scrolled');
	        	}
		}, 50);

	    });

	    $('.landingpage-toc li a').click( function(){
	    	$(this).parent().addClass('active').siblings().removeClass( 'active' );
	    });

		$(window).bind('scroll', function() {
	    	var currentTop = $(window).scrollTop();
	    	var elems = $(tocHeadlines);
	   	
	    	elems.each(function(index){
	      		var elemTop 	= $(this).offset().top + (-240);
	      		var elemBottom 	= elemTop + $(this).height();
	      		if(currentTop >= elemTop && currentTop <= elemBottom){
	        		var id 		= $(this).attr('id');
	        		var navElem = $('a[href="#' + id+ '"]');
	    			navElem.parent().addClass('active').siblings().removeClass( 'active' );
	    		}
	    	})
		});

};