(function($) {

    var forms = $.forms,
        editors = {},
        config, lot, CM, i, j, k, l, m;

    if (!forms) return;

    config = $.TE || {};
    config.languages = $.languages.$.TE || {};
    lot = forms.$;
    CM = forms.CM;

    function preview($, panel) {
        /*
        // `.text-editor-panel < .text-editor-panel-body < .text-editor-panel-content < iframe`
        var frame = panel.children[1].children[0].children[0];
        // Loading…
        frame.src = 'data:text/html,' + encodeURIComponent('<!DOCTYPE html><html><head><meta charset="utf-8"></head><body><div style="margin:0;padding:0;position:absolute;top:0;right:0;bottom:0;left:0;width:100%;height:100%;background:#fff url(data:image/gif;base64,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) no-repeat 50% 50%;"></div></body></html>');
        // TODO: Do AJAX stuff…
        // do_ajax_stuff_then_do(function(responseText) {
        //    frame.src = 'data:text/html,' + encodeURIComponent(responseText);
        // });
        */
    }

    for (i in CM) {
        for (j in CM[i]) {
            k = CM[i][j];
            if (!k.getTextArea) continue;
            l = k.getTextArea();
            if (l.nodeName.toLowerCase() === 'textarea' && l.classList.contains('editor') && (m = l.getAttribute('data-type'))) {
                if (config[m]) k.toTextArea(); // destroy `CodeMirror`
            }
        }
    }

    for (i in lot) {
        editors[i] = {};
        for (j in lot[i]) {
            k = lot[i][j];
            if (k.nodeName.toLowerCase() === 'textarea' && k.classList.contains('editor') && (l = k.getAttribute('data-type'))) {
                if (typeof TE.ui[l] === "function") {
                    editors[i][j] = new TE.ui[l](k, config[l] || {});
                    editors[i][j]._.hooks.set('enter.panel.preview', preview);
                }
            }
        }
    }

    forms.TE = editors;

})(Panel);