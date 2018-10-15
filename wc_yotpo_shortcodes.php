<?php
/*
* Plugin Name: Yotpo Shortcodes for WooCommerce
* Description: This plugin adds the ability to use shortcodes to control the placement of Yotpo widgets.
* Version: 1.0
* Author: Paul Glushak
* Author URI: http://paulglushak.com/
* Plugin URI: http://paulglushak.com/yotpo-shortcodes-for-woocommerce/
*/

/*
 * This plugin allows using shortcodes to display Yotpo widgets inside and oustide (applicable widgets only) of product pages e.g. page builders, sidebars, widgets etc.
 * See example usage at the bottom.
 * 
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function basic_check() { if ( !class_exists( 'woocommerce' ) && !function_exists( 'wc_yotpo_get_product_data' ) ) { return; } }

function wc_place_yotpo_widget() {
	basic_check();
	if ( is_product() ) { $html = wc_yotpo_show_widget(); }
	echo $html;
}

function wc_place_yotpo_bottomline() {
	basic_check();
	if ( is_product() ) { $html = wc_yotpo_show_buttomline(); }
	echo $html;
}

function wc_place_yotpo_product_gallery( $args ) {
	basic_check();
	if ( empty( $args['gallery_id'] ) ) { return 'Error - no gallery ID specified'; }
	$html = '<div class="yotpo yotpo-pictures-widget" data-gallery-id="' . $args['gallery_id'] . '"';
	if ( is_product() ) {
		global $product;
		$html .= 'data-product-id="' . $product->get_id() . '"';
	}
	$html .= '></div>';
	return $html;
}

function wc_place_yotpo_product_reviews_carousel( $args ) {
	basic_check();
	extract( shortcode_atts( array(
		'background_color' => 'transparent', // transparent or #color
		'mode' => 'top_rated', // top_rated or most_recent
		'type' => 'per_product', // per_product, product, both or site
		'count' => '9', // 3-9
		'show_bottomline' => '1', 
		'autoplay_enabled' => '1',
		'autoplay_speed' => '3000',
		'show_navigation' => '1'), $args ) );
	$html = '<div class="yotpo yotpo-reviews-carousel" 
		 data-background-color="' . $background_color . '" 
		 data-mode="' . $mode . '" 
		 data-type="' . $type . '" 
		 data-count="' . $count . '" 
		 data-show-bottomline="' . $show_bottomline . '" 
		 data-autoplay-enabled="' . $autoplay_enabled . '" 
		 data-autoplay-speed="' . $autoplay_speed . '" 
		 data-show-navigation="' . $show_navigation . '"';
	if ( is_product() ) {
		global $product;
		$html .= 'data-product-id="' . $product->get_id() . '"';
	} elseif ($args['product_id']) {
		$html .= 'data-product-id="' . $args['product_id'] . '"';
	}
	$html .= '></div>';
	return $html;
}

add_shortcode( 'yotpo_widget', 'wc_place_yotpo_widget' ); # [yotpo_widget]
add_shortcode( 'yotpo_bottomline', 'wc_place_yotpo_bottomline' ); # [yotpo_bottomline]
add_shortcode( 'yotpo_product_gallery', 'wc_place_yotpo_product_gallery' ); # [yotpo_product_gallery gallery_id="5bbb561f5ea79223a9da0e7c"]
add_shortcode( 'yotpo_product_reviews_carousel', 'wc_place_yotpo_product_reviews_carousel' ); # [yotpo_product_reviews_carousel background_color="#22fff2" mode="most-recent" type="both" count="3"]

?>
