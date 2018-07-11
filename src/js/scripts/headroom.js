'use strict';

var Headroom = require('headroom.js');

module.exports = function() {

    var myElement = document.querySelector('.header-headroom');
    var headroom = new Headroom(myElement, {
        "tolerance": 12,
        "offset": 320,
        "classes": {
            "initial": "headroom",
            "pinned": "headroom--pinned",
            "unpinned": "headroom--unpinned",
            "top": "headroom--top",
            "notTop": "headroom--not-top"
        }
    });
    headroom.init();

};