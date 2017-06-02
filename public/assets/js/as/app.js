var as = {};

as.toggleSidebar = function () {

    if (window.innerWidth > 768) {
        $("body").toggleClass('sidebar-collapse');
    } else {
        $("body").toggleClass('sidebar-open');
    }

    return false;
};

as.hideNotifications = function () {
    $(".alert-notification").slideUp(600, function () {
        $(this).remove();
    })
};

as.adjustPage = function () {
    /**
     * Page top offset, used for setting appropriate top offset
     * for page content when we are resizing the page (or open it on small screen).
     * @type {number}
     */
    var topOffset = 0;

    // Current width of our viewport.
    var width = window.innerWidth > 0
        ? window.innerWidth
        : screen.width;

    // If width is smaller than 768px, we will adjust page top offset.
    if (width < 768) {
        topOffset = 100;
    }

    // Current viewport height
    var height = window.innerHeight > 0
        ? window.innerHeight
        : screen.height;

    height = height - topOffset;

    if (height < 1) {
        height = 1;
    }

    $("#page-wrapper").css("margin-top", (topOffset) + "px");

    if (height > topOffset) {
        $("#page-wrapper").css("min-height", (height) + "px");
    }
};

as.init = function () {

    $(window).bind("load resize", as.adjustPage);

    if ($("#side-menu").length) {
        $("#side-menu").metisMenu({
            toggle: false,
            activeClass: 'active'
        });
    }

    $("#sidebar-toggle").click(as.toggleSidebar);

    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

    $(".alert-notification .close").click(as.hideNotifications);

    setTimeout(as.hideNotifications, 2500);

    $("a[data-toggle=loader], button[data-toggle=loader]").click(function () {
        if ($(this).parents('form').valid()) {
            as.btn.loading($(this), $(this).data('loading-text'));
            $(this).parents('form').submit();
        }
    });
};

$(document).ready(as.init);