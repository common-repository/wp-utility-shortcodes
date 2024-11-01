<?php
/*
Plugin Name: WP Utility Shortcodes
Plugin URI: http://demo.pippinspages.com/wp-utility-shortcodes/
Description: Shortcodes for adding buttons and info boxes to WordPress posts and pages
Version: 1.0
Author: Pippin Williamson
Author URI: http://pippinspages.com
*/


//load css styles
function wpus_styles()
{
	if (!is_admin())
	{
	   $scriptFileDir= WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),'',plugin_basename(__FILE__));
	   wp_enqueue_style('wpus_css', $scriptFileDir . 'css/wpus.css', false, '1.0', 'all');
	}
}
add_action('init', 'wpus_styles');

//shortcodes

function button_shortcode( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'color' => '',
      'size' => '',
      'type' => '',
      'align' => '',
      ), $atts ) );

      return '<div class="wpus wpus_button wpus_button_' . $size . ' wpus_button_' . $color . ' wpus_' . $align . '"><em class="wpus_' . $type . '"></em>' . $content . '</div>';

}
add_shortcode('button', 'button_shortcode');

function box_shortcode( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'color' => '',
      'size' => '',
      'type' => '',
	  'align' => '',
      ), $atts ) );

      return '<div class="wpus wpus_box wpus_box_' . $size . ' wpus_box_' . $color . ' wpus_' . $align . '"><em class="wpus_' . $type . '"></em>' . $content . '</div>';

}
add_shortcode('box', 'box_shortcode');
add_filter('the_content', 'do_shortcode');
add_filter('widget_text', 'do_shortcode');
?>