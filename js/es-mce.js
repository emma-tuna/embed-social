/**
 * Created by emmaedgar on 1/25/16.
 */

(function() {
    /* Register the buttons */
    tinymce.create('tinymce.plugins.EsButtons', {
        init : function(ed, url) {
            /**
             * Inserts shortcode content
             */
            ed.addButton( 'button_es_embed', {
                title : 'Insert Embed Social Shortcode',
                image : '../wp-content/plugins/embed-social/images/es-button.png',
                onclick : function() {
                    ed.selection.setContent('[es-embed url= size=small align=center description=true]');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    /* Start the buttons */
    tinymce.PluginManager.add( 'es_button_script', tinymce.plugins.EsButtons );
})();