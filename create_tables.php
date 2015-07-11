<?php
/**
 * Created by PhpStorm.
 * User: vincentsantos
 * Date: 7/11/15
 * Time: 3:53 PM
 */

global $wpdb;

function install_tables() {
	$product_sql = "CREATE TABLE wp_product_management_products (
				id int(11) unsigned NOT NULL AUTO_INCREMENT,
	            name varchar(50) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
	            PRIMARY KEY (id)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

	$shirt_type_sql = " CREATE TABLE wp_product_management_shirt_types (
					id int(11) unsigned NOT NULL AUTO_INCREMENT,
					  name varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
					  PRIMARY KEY (id)
					) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; ";

	$product_shirt_type_sql = "CREATE TABLE wp_product_management_product_shirt_types (
						  id int(11) unsigned NOT NULL AUTO_INCREMENT,
						  product_id int(11) NOT NULL,
						  shirt_type_id int(11) NOT NULL,
						  product_picture varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
						  PRIMARY KEY (id)
						) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

	$product_colors_sql = "CREATE TABLE wp_product_management_product_colors (
						  id int(11) unsigned NOT NULL AUTO_INCREMENT,
						  product_id int(11) NOT NULL,
						  color_name varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
						  hex_value varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
						  PRIMARY KEY (id)
						) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

	$orders_sql = "CREATE TABLE wp_product_management_orders (
				  id int(11) unsigned NOT NULL AUTO_INCREMENT,
				  product_shirt_type_id int(11) NOT NULL,
				  product_color_id int(11) NOT NULL,
				  small_quantity int(11) NOT NULL DEFAULT '0',
				  extra_small_quantity int(11) NOT NULL DEFAULT '0',
				  medium_quantity int(11) NOT NULL DEFAULT '0',
				  large_quantity int(11) NOT NULL DEFAULT '0',
				  extra_large_quantity int(11) NOT NULL DEFAULT '0',
				  total_quantity int(11) NOT NULL DEFAULT '0',
				  file_1 varchar(250) NOT NULL DEFAULT '',
				  file_2 varchar(250) DEFAULT NULL,
				  file_3 varchar(250) DEFAULT NULL,
				  file_4 varchar(250) DEFAULT NULL,
				  contact_name varchar(50) NOT NULL DEFAULT '',
				  contact_organization varchar(50) DEFAULT NULL,
				  contact_number varchar(50) NOT NULL DEFAULT '',
				  contact_secondary_number varchar(50) DEFAULT NULL,
				  contact_email varchar(50) NOT NULL DEFAULT '',
				  contact_special_request varchar(250) DEFAULT NULL,
				  PRIMARY KEY (id)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $product_sql );
	dbDelta( $product_colors_sql );
	dbDelta( $product_shirt_type_sql );
	dbDelta( $orders_sql );
	dbDelta( $shirt_type_sql );
}