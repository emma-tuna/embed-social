<?php
/**
 * Created by PhpStorm.
 * User: emmaedgar
 * Date: 1/22/16
 * Time: 1:59 PM
 */


require_once( ES__PLUGIN_DIR . '/services/pinterest/pinterest.php' );
require_once( ES__PLUGIN_DIR . '/services/instagram/instagram.php' );
// require_once( ES__PLUGIN_DIR . '/services/facebook/facebook.php' );


// Only if shortcode does not already exist
if ( ! shortcode_exists( 'es-embed' ) ) {

    /**
     * Get shortcode attributes and call functions based on the service used
     * @param $atts
     * @return string|void
     */
    function es_shortcode_atts( $atts ) {
        $atts = shortcode_atts(
            array(
                'url' => '',
                'size' => 'small',
                'description' => 'true',
                'align' => 'center',
            ), $atts, 'pin_embed' );


        if( $atts['url'] == '' )
            return;

        if( strpos($atts['url'], 'pinterest.com')){
            return es_pinterest_html($atts);
        }
        if( strpos($atts['url'], 'instagr.am')){
            return es_get_instagram($atts);
        }
        // if( strpos($atts['url'], 'facebook.com')){
        //     return es_get_facebook($atts);
        // }
    }
    add_shortcode( 'es-embed', 'es_shortcode_atts' );


}

