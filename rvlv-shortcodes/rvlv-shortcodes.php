<?php
/*
Plugin Name: Revolve Themes Shortcodes
Plugin URI:  http://revolvethemes.com/public/rvlv-shortcodes.zip
Description: A simple plugin that allows you to add custom shortcodes to your content
Version:     1.0
Author:      Revolve Themes
Author URI:  http://revolvethemes.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: soigne
*/

/**
 * Available Soigne Shortcodes
 *
 * @package Soigne
 * @since Soigne 1.0
 * @version 1.0
 */

// Enable shortcodes in widget areas
add_filter( 'widget_text', 'do_shortcode' );

// Replace WP autop formatting
if (!function_exists( "soigne_remove_wpautop")) {
	function soigne_remove_wpautop($content) {
		$content = do_shortcode( shortcode_unautop( $content ) );
		$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content);
		return $content;
	}
}

/*--------------------------------------------------------------
# Text styles
--------------------------------------------------------------*/

// Intro Paragraph
function soigne_shortcode_intro_paragraph( $atts, $content = null ) {
  return '<p class="intro-paragraph">' . soigne_remove_wpautop($content) . '</p>';
}
add_shortcode( 'intro_paragraph', 'soigne_shortcode_intro_paragraph' );

// Italic - Center Paragraph
function soigne_shortcode_center_paragraph( $atts, $content = null ) {
  return '<p class="italic-paragraph">' . soigne_remove_wpautop($content) . '</p>';
}
add_shortcode( 'italic_paragraph', 'soigne_shortcode_center_paragraph' );

/*--------------------------------------------------------------
# Text columns
--------------------------------------------------------------*/

// Two Columns
function soigne_shortcode_two_columns( $atts, $content = null ) {
  return '<p class="two-col">' . soigne_remove_wpautop($content) . '</p>';
}
add_shortcode( 'two_columns', 'soigne_shortcode_two_columns' );

// Three Columns
function soigne_shortcode_three_columns( $atts, $content = null ) {
  return '<p class="three-col">' . soigne_remove_wpautop($content) . '</p>';
}
add_shortcode( 'three_columns', 'soigne_shortcode_three_columns' );

/*--------------------------------------------------------------
# Pull quotes & Pull text
--------------------------------------------------------------*/

// Pull quote left
function soigne_shortcode_pull_quote_left( $atts, $content = null ) {
  return '<blockquote class="pull-quote-left"><p>' . soigne_remove_wpautop($content) . '</p></blockquote>';
}
add_shortcode( 'quote_left', 'soigne_shortcode_pull_quote_left' );

// Pull quote right
function soigne_shortcode_pull_quote_right( $atts, $content = null ) {
  return '<blockquote class="pull-quote-right"><p>' . soigne_remove_wpautop($content) . '</p></blockquote>';
}
add_shortcode( 'quote_right', 'soigne_shortcode_pull_quote_right' );

// Pull heading left
function soigne_shortcode_heading_left( $atts, $content = null ) {
  return '<h3 class="left-heading">' . soigne_remove_wpautop($content) . '</h3>';
}
add_shortcode( 'heading_left', 'soigne_shortcode_heading_left' );

// Pull heading right
function soigne_shortcode_heading_right( $atts, $content = null ) {
  return '<h3 class="right-heading">' . soigne_remove_wpautop($content) . '</h3>';
}
add_shortcode( 'heading_right', 'soigne_shortcode_heading_right' );

/*--------------------------------------------------------------
# Dropcap
--------------------------------------------------------------*/

function soigne_shortcode_dropcap( $atts, $content = null ) {
  return '<span class="dropcap">' . soigne_remove_wpautop($content) . '</span>';
}
add_shortcode( 'dropcap', 'soigne_shortcode_dropcap' );

/*--------------------------------------------------------------
# Cite
--------------------------------------------------------------*/

function soigne_shortcode_cite( $atts, $content = null ) {
  return '<p class="cite">' . soigne_remove_wpautop($content) . '</p>';
}
add_shortcode( 'cite', 'soigne_shortcode_cite' );

/*--------------------------------------------------------------
# Images & Galleries
--------------------------------------------------------------*/

// One column gallery
function soigne_one_column_gallery( $atts, $content = null ) {
  
  $args = shortcode_atts( array( 'url' => FALSE ), $atts  );
  $img  = esc_url( $content );
  $url  = $args['url'] ? esc_url( $args['url'] ) : $img;

    return "<a class='one-col-gallery' href='$url'><img src='$img' /></a>";
}
add_shortcode('img_one_column', 'soigne_one_column_gallery');

// Two columns gallery - first image
function soigne_two_columns_gallery( $atts, $content = null ) {
  
  $args = shortcode_atts( array( 'url' => FALSE ), $atts  );
  $img  = esc_url( $content );
  $url  = $args['url'] ? esc_url( $args['url'] ) : $img;

    return "<a class='two-col-gallery' href='$url'><img src='$img' /></a>";
}
add_shortcode('img_two_columns_first', 'soigne_two_columns_gallery');

// Two columns gallery - last image
function soigne_two_columns_gallery_last( $atts, $content = null ) {
  
  $args = shortcode_atts( array( 'url' => FALSE ), $atts  );
  $img  = esc_url( $content );
  $url  = $args['url'] ? esc_url( $args['url'] ) : $img;

    return "<a class='two-col-gallery last' href='$url'><img src='$img' /></a>";
}
add_shortcode('img_two_columns_last', 'soigne_two_columns_gallery_last');

// Three columns gallery - first image
function soigne_three_columns_gallery( $atts, $content = null ) {
  
  $args = shortcode_atts( array( 'url' => FALSE ), $atts  );
  $img  = esc_url( $content );
  $url  = $args['url'] ? esc_url( $args['url'] ) : $img;

    return "<a class='three-col-gallery' href='$url'><img src='$img' /></a>";
}
add_shortcode('img_three_columns_first', 'soigne_three_columns_gallery');

// Three columns gallery - second image
function soigne_three_columns_gallery_second( $atts, $content = null ) {
  
  $args = shortcode_atts( array( 'url' => FALSE ), $atts  );
  $img  = esc_url( $content );
  $url  = $args['url'] ? esc_url( $args['url'] ) : $img;

    return "<a class='three-col-gallery' href='$url'><img src='$img' /></a>";
}
add_shortcode('img_three_columns_second', 'soigne_three_columns_gallery_second');

// Three columns gallery - last image
function soigne_three_columns_gallery_last( $atts, $content = null ) {
  
  $args = shortcode_atts( array( 'url' => FALSE ), $atts  );
  $img  = esc_url( $content );
  $url  = $args['url'] ? esc_url( $args['url'] ) : $img;

    return "<a class='three-col-gallery last' href='$url'><img src='$img' /></a>";
}
add_shortcode('img_three_columns_last', 'soigne_three_columns_gallery_last');

// Pull image right
function soigne_pull_image_right( $atts, $content = null ) {
  
  $args = shortcode_atts( array( 'url' => FALSE ), $atts  );
  $img  = esc_url( $content );
  $url  = $args['url'] ? esc_url( $args['url'] ) : $img;

    return "<a class='pull-right' href='$url'><img src='$img' /></a>";
}
add_shortcode('image_right', 'soigne_pull_image_right');

// Pull image left
function soigne_pull_image_left( $atts, $content = null ) {
  
  $args = shortcode_atts( array( 'url' => FALSE ), $atts  );
  $img  = esc_url( $content );
  $url  = $args['url'] ? esc_url( $args['url'] ) : $img;

    return "<a class='pull-left' href='$url'><img src='$img' /></a>";
}
add_shortcode('image_left', 'soigne_pull_image_left');

/*--------------------------------------------------------------
# Divide text
--------------------------------------------------------------*/

function soigne_shortcode_divider( $atts, $content = null ) {
  return '<div class="divider"></div>';
}
add_shortcode( 'divider', 'soigne_shortcode_divider' );

/*--------------------------------------------------------------
# Three columns box
--------------------------------------------------------------*/

// Three columns box - first
function soigne_three_boxes_first( $atts, $content = null ) {
  return '<div class="box-three-col">' . do_shortcode( soigne_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'three_col_box_first', 'soigne_three_boxes_first' );

// Three columns box - second
function soigne_three_boxes_second( $atts, $content = null ) {
  return '<div class="box-three-col">' . do_shortcode( soigne_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'three_col_box_second', 'soigne_three_boxes_second' );

// Three columns box - last
function soigne_three_boxes_last( $atts, $content = null ) {
  return '<div class="box-three-col last">' . do_shortcode( soigne_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'three_col_box_last', 'soigne_three_boxes_last' );

/*--------------------------------------------------------------
# Two columns box
--------------------------------------------------------------*/

// Two columns box - first
function soigne_two_boxes_first( $atts, $content = null ) {
  return '<div class="box-two-col">' . do_shortcode( soigne_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'two_col_box_first', 'soigne_two_boxes_first' );

// Two columns box - last
function soigne_two_boxes_last( $atts, $content = null ) {
  return '<div class="box-two-col last">' . do_shortcode( soigne_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'two_col_box_last', 'soigne_two_boxes_last' );

/*--------------------------------------------------------------
# Colour boxes
--------------------------------------------------------------*/

// White box
function soigne_shortcode_white_box( $atts, $content = null ) {
  return '<p class="white-box">' . do_shortcode( soigne_remove_wpautop($content) ) . '</p>';
}
add_shortcode( 'white_box', 'soigne_shortcode_white_box' );

// Blue box
function soigne_shortcode_blue_box( $atts, $content = null ) {
  return '<p class="blue-box">' . do_shortcode( soigne_remove_wpautop($content) ) . '</p>';
}
add_shortcode( 'blue_box', 'soigne_shortcode_blue_box' );

// Grey box
function soigne_shortcode_grey_box( $atts, $content = null ) {
  return '<p class="grey-box">' . do_shortcode( soigne_remove_wpautop($content) ) . '</p>';
}
add_shortcode( 'grey_box', 'soigne_shortcode_grey_box' );

// Dark box
function soigne_shortcode_dark_box( $atts, $content = null ) {
  return '<p class="dark-box">' . do_shortcode( soigne_remove_wpautop($content) ) . '</p>';
}
add_shortcode( 'dark_box', 'soigne_shortcode_dark_box' );

/*--------------------------------------------------------------
# Buttons
--------------------------------------------------------------*/

function soigne_button( $atts, $content = null ) {
  extract( shortcode_atts(array(
    'link'	 => '#',
    'target' => '',
    'color'	 => '',
    'size'	 => '',
    'form'	 => '',
    'font'	 => '', 
    ), $atts)
  );

	$color  = ($color) ? ' ' . $color . '-btn' : '';
	$size   = ($size) ? ' ' . $size . '-btn' : '';
	$form   = ($form) ? ' ' . $form . '-btn' : '';
	$font   = ($font) ? ' ' . $font . '-btn' : '';
	$target = ($target == 'blank') ? ' target="_blank"' : '';
	$out    = '<a' . $target . ' class="standard-btn' . $color . $size . $form . $font . '" href="' . $link . '"><span>' . do_shortcode($content) . '</span></a>';

    return $out;
}
add_shortcode('button', 'soigne_button');
