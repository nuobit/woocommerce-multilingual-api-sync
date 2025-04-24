<?php
/**
 * Plugin Name: WooCommerce Multilingual API Sync
 * Description: Manages pending synchronization processes in WooCommerce Multilingual.
 * Version: 1.0.2
 * Author: NuoBiT Solutions S.L.
 * Author URI: https://www.nuobit.com
 */

 require_once __DIR__ . '/inc/namespace.php';

 add_action( 'plugins_loaded', 'Woocommerce_Multilingual_Api_Sync\\init', 0 );
