'use strict';

var $ = require('jquery');

module.exports = function() {

        var activeClass = 'tab--active';

        var tabItems = $('.tabs-nav-entry, .tabs-navigation-entry');
        var tabContentWrapper = $('.tabs-entries, .tabs-content');
        var activeItems = tabItems.find('.'+activeClass);

        if (!activeItems.length) {
            var selectedItem = tabItems.first();
            selectTab(selectedItem);
        }

        tabItems.on('click', function (event) {
            event.preventDefault();

            var selectedItem = $(this);

            if (!selectedItem.hasClass(activeClass)) {

                selectTab(selectedItem);
            }
        });

        function selectTab(selectedItem) {
            var selectedTab = selectedItem.data('content');
            var selectedContent = tabContentWrapper.find('li[data-content="' + selectedTab + '"]');

            tabItems.removeClass(activeClass);
            selectedItem.addClass(activeClass);
            selectedContent.addClass(activeClass).siblings('li').removeClass(activeClass);
        }

};
