/**
 * File group.js.
 *
 * Theme Group customizer.
 * 
 * @package Shopexcel
 */

(function ($) {
    "use strict";
    $(document).on("click", ".shopexcel-customizer-group-collapsible .head-label", (function () {
        var container = $(this).closest(".shopexcel-customizer-group");
        container.find(" > .group-content").slideToggle(200);
        container.toggleClass("is-active");
        return false;
    }));

})(jQuery);