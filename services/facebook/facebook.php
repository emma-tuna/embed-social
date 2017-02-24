<?php
/**
 * Created by PhpStorm.
 * User: emmaedgar
 * Date: 2/24/17
 * Time: 12:39 PM
 */

function ie_get_facebook($atts){

    $oembed_url = 'https://www.facebook.com/plugins/post/oembed.json/?url=';
    $oembed_url .= $atts['url'];
//    if( $atts['description'] == 'false'){
//        $oembed_url .= '&hidecaption=true';
//    }
    $oembed_url = 'https://www.facebook.com/plugins/video/oembed.json/?url=https%3A%2F%2Fwww.facebook.com%2Ffacebook%2Fvideos%2F10153231379946729%2F';

    $json = file_get_contents($oembed_url);
    var_dump($json);

    $obj = json_decode($json);


    $classes = 'i-align-' . $atts['align'] . ' i-insta-size-' . $atts['size'];

    wp_enqueue_style('i-embed-styles');
    $html = '<div class="' . $classes . '">' . $obj . '</div>';

    return $html;

}
