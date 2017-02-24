<?php
/**
 * Created by PhpStorm.
 * User: emmaedgar
 * Date: 1/25/16
 * Time: 10:14 AM
 */


add_action( 'admin_init', 'es_tinymce_button' );

function es_tinymce_button() {
    if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
        add_filter( 'mce_buttons', 'es_register_tinymce_button' );
        add_filter( 'mce_external_plugins', 'es_add_tinymce_button' );
    }
}

function es_register_tinymce_button( $buttons ) {
    array_push( $buttons, "button_es_embed" );
    return $buttons;
}

function es_add_tinymce_button( $plugin_array ) {
    $plugin_array['es_button_script'] = plugins_url( '/js/es-mce.js', __FILE__ ) ;
    return $plugin_array;
}