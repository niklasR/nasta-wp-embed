<?php

/**
 *
 * @link              http://niklasr.github.io/nasta-wp-embed
 * @since             0.1.0
 * @package           nasta_e,bed
 *
 * @wordpress-plugin
 * Plugin Name:       NaSTA WP Embed
 * Plugin URI:        http://niklasr.github.io/nasta-wp-embed
 * Description:       Embed a video player in wordpress for livestreams on the JaNET infrastructure
 * Version:           0.1.0
 * Author:            Nik Rahmel
 * Author URI:        http://niklasr.de/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       nasta-embed
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'wp_enqueue_scripts', 'enqueue_clappr' );
add_shortcode('nastaembed', 'embed_player');

function embed_player( $atts ){
    $scriptcontent = '<div id="player"></div><script>var player = new Clappr.Player({source: "';
    $scriptcontent .= $atts['url'];
    $scriptcontent .= '", mimeType: "application/x-mpegURL", parentId: "#player"}); </script>';
    return $scriptcontent;
}

function enqueue_clappr() {
    wp_enqueue_script('clappr', 'https://cdn.jsdelivr.net/clappr/latest/clappr.min.js');
}

?>