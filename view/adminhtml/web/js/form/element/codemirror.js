define([
    'Magento_Ui/js/form/element/textarea',
    'jquery',
    'Amasty_ImportCore/js/lib/codemirror',
    'Amasty_ImportCore/js/lib/codemirror/xml'
], function (Textarea, $, CodeMirror) {
    'use strict';

    return Textarea.extend({
        defaults: {
            codeMirrorConfig: {
                lineNumbers: true
            }
        },
        editor:null,

        initialize: function () {
            var config;

            this._super();
            $.async('#' + this.uid, function (elem) {
                config = $.extend();
                this.editor = CodeMirror.fromTextArea(elem, this.codeMirrorConfig);
                this.editor.on('change', function () {
                    this.value(this.editor.getValue());
                }.bind(this));
            }.bind(this));

            return this;
        },
        setCodeMirrorValue: function (value) {
            this.value(value);
            this.editor.setValue(value);
        }
    });
});
