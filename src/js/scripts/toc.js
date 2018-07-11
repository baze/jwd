'use strict';

var $ = require('jquery');

module.exports = function() {


	var ToC =
	"<nav role='navigation' class='table-of-contents'>" +
	"<h3>In diesem Artikel:</h3>" +
	"<ul>";

	var newLine, el, title, titlestring, link, anchor;

	$(".article h2").each(function() {
	  
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

	$(".toc__hook").append(ToC);
	

};