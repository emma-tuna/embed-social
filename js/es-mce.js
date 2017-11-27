/**
 * Created by emmaedgar on 1/25/16.
 */

(function() {
    /* Register the buttons */
    tinymce.create('tinymce.plugins.EsButtons', {
        init : function(editor, url) {
            /**
             * Inserts shortcode content
             */
            editor.addButton('button_es_embed', {
                image : url + '/social-embed-icon.png',
                tooltip: 'Embed Social Shortcode Builder',
                onclick: function() {
                    editor.execCommand('es_popup','',{
                        embedUrl : ''
                    });
                }
            });

            // Called when we click the Embed Social Shortcode Builder
            editor.addCommand( 'es_popup', function(ui, v) {

                // Defaults
                var embedType = '';
                if (v.embedType)
                    embedType = v.embedType;
                var embedId = '';
                if (v.embedId)
                    embedId = v.embedId;
                var embedAlign = '';
                if (v.embedAlign)
                    embedAlign = v.embedAlign;
                var embedSize = '';
                if (v.embedSize)
                    embedSize = v.embedSize;
                var embedDesc = '';
                if (v.embedDesc)
                    embedDesc = v.embedDesc;

                // Calls the pop-up modal
                editor.windowManager.open({
                    // Modal settings
                    title: 'Insert Shortcode',
                    width: jQuery( window ).width() * 0.7,
                    // minus head and foot of dialog box
                    height: (jQuery( window ).height() - 36 - 50) * 0.7,
                    inline: 1,
                    id: 'es-shortcode-builder-popup',
                    body: [
                        { // type
                            type: 'listbox',
                            name: 'embedType',
                            label: 'Social Media Platform',
                            value: embedType,
                            'values': [
                                {text: 'Instagram', value: 'instagram'},
                                {text: 'Pinterest', value: 'pinterest'}
                            ]
                        },
                        {//url
                            type: 'textbox',
                            name: 'embedId',
                            label: 'Post ID',
                            value: embedId
                        },
                        { // alignment
                            type: 'listbox',
                            name: 'embedAlign',
                            label: 'Alignment',
                            value: embedAlign,
                            'values': [
                                {text: 'Left', value: 'left'},
                                {text: 'Center', value: 'center'},
                                {text: 'Right', value: 'right'}
                            ]
                        },
                        { //embedSize
                            type: 'listbox',
                            name: 'embedSize',
                            label: 'Size',
                            value: embedSize,
                            'values': [
                                {text: 'Small', value: 'small'},
                                {text: 'Medium', value: 'medium'},
                                {text: 'Large', value: 'large'}
                            ]
                        },
                        {//description
                            type: 'listbox',
                            name: 'embedDesc',
                            label: 'Description',
                            value: embedDesc,
                            'values': [
                                {text: 'Hide', value: 'false'},
                                {text: 'Show', value: 'true'}
                            ]
                        }
                    ],
                    onsubmit: function( e ) { //when the ok button is clicked

                        if(typeof e.data.embedId != 'undefined' && e.data.embedId.length) {
                            var id = e.data.embedId;

                            var type = '';
                            if(typeof e.data.embedType != 'undefined' && e.data.embedType.length){
                                type = e.data.embedType;
                            } else {
                                type = '';
                            }

                            var desc = '';
                            if(typeof e.data.embedDesc != 'undefined' && e.data.embedDesc.length){
                                desc = e.data.embedDesc;
                            } else {
                                desc = 'false';
                            }

                            var align = '';
                            if(typeof e.data.embedAlign != 'undefined' && e.data.embedAlign.length){
                                align = e.data.embedAlign;
                            } else {
                                align = 'center';
                            }

                            var size = '';
                            if(typeof e.data.embedSize != 'undefined' && e.data.embedSize.length){
                                size = e.data.embedSize;
                            } else {
                                size = 'small';
                            }

                            var shortcode_str = '[es-embed type="'+type+'" id="'+id+'" align="'+align+'" size="'+size+'" description="'+desc+'"]';

                            //insert shortcode to TinyMCE
                            editor.insertContent( shortcode_str);
                        } else {
                            window.alert("Invalid URL. Please try again.");
                        }
                    }
                });


            });
        },
        createControl : function(n, cm) {
            return null;
        }
    });
    /* Start the buttons */
    tinymce.PluginManager.add( 'es_button_script', tinymce.plugins.EsButtons );

})();