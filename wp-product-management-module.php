<?php

/*
Plugin Name: Wp Product Management Module
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: 1.0
Author: vincentsantos
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/


add_action('init', function() {
	add_shortcode('product_list', 'print_product_list');
});

function print_product_list() {
	global $wpdb;

	$query_str = 'SELECT * FROM wp_product_management_products';
	$products = $wpdb->get_results($query_str);

	$output_str = "<ul><li>TEST</li>";
	foreach($products as $product){
		$output_str .= "<li>".$product->name."</li>";
	}
	$output_str .= "</ul>";

	echo $output_str;
}