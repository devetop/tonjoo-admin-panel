import './additional-plugin.css';

import $ from "jquery";

import 'plugins/jquery-ui/jquery-ui';
import 'plugins/overlayScrollbars/js/jquery.overlayScrollbars';
import 'plugins/repeater/jquery.repeater';

import 'bootstrap';

window.$ = window.jQuery = $;

$(function () {
    $.widget.bridge('uibutton', $.ui.button);
});
