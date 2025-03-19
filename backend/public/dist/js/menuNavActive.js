(function ($) {
    /*** add active class and stay opened when selected ***/
    var url = window.location;
    var url_originPathname = url.origin + url.pathname;

    // console.log('url: ', url);
    // console.log('url_originPathname: ', url_originPathname);

    // for sidebar menu entirely but not cover treeview
    $('ul.nav-sidebar a').filter(function() {
        if (this.href == url_originPathname) {
            return this.href == url_originPathname || url.href.indexOf(this.href) == 0;
        }
    }).addClass('active');

    // for the treeview
    $('ul.nav-treeview a').filter(function() {
        if (this.href == url_originPathname) {
            return this.href == url_originPathname || url.href.indexOf(this.href) == 0;
        }
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open');
} (jQuery));