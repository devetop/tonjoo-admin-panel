import $ from "jquery";

import 'plugins/codemirror/codemirror.css';
import 'plugins/codemirror/codemirror';

$(function() {
    $(".codemirror").each(function(index, elem) {
        var that = $(this);
        var cm = CodeMirror.fromTextArea(elem, {
            textWrapping: true,
            lineNumbers: true,
            styleActiveLine: true,
            matchBrackets: true,
            theme: "ambiance"
        });

        setTimeout(function() {
            cm.refresh();
        }, 100);

        $(window).on("toggleShowMore", function() {
            cm.refresh();
        });
        $('.repeater-create').on('click', 'input', function() {
            cm.refresh();
        });

        if ($(this).closest(".repeatable-base").length) {
            cm.toTextArea();
        }
    });
})
