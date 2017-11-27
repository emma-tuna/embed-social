<?php
function es_pinterest_html( $atts ){

    wp_enqueue_script('pin-embed-js');
    wp_enqueue_style('es-styles');

    $classes = 'es-align-' . $atts['align']  . ' es-pin-size-' . $atts['size'];


    $html = '<div class="' . $classes . '"><a data-pin-do="embedPin" ';
        if ($atts['size'] == 'medium' || $atts['size'] == 'large') $html .= 'data-pin-width="' . $atts['size'] . '" ';
        if($atts['description'] == 'false') $html .= 'data-pin-terse="true" ';
        $html .= 'href="https://pinterest.com/pin/' . $atts['id'] . '"></a></div>';

    return $html;
}