<?php
/**
 * Created by PhpStorm.
 * User: emmaedgar
 * Date: 2/24/17
 * Time: 12:39 PM
 */

function es_get_instagram($atts){

    $oembed_url = 'https://api.instagram.com/oembed?url=';
    $oembed_url .= $atts['url'];
    if( $atts['description'] == 'false'){
        $oembed_url .= '&hidecaption=true';
    }

    $json = file_get_contents($oembed_url);
    $obj = json_decode($json);

    $classes = 'es-align-' . $atts['align'] . ' es-insta-size-' . $atts['size'];

    wp_enqueue_style('es-styles');
    $html = '<div class="' . $classes . '">' . $obj->html . '</div>';

    return $html;

}
