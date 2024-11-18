<?php
/**
 * Plugin Name: WooCommerce Multilingual API Sync
 * Description: Disables product synchronization hooks in WooCommerce Multilingual to ensure only API-sent data is processed.
 * Version: 1.0
 * Author: NuoBiT Solutions S.L.
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'rest_api_init', 'disable_product_insert_hook', 20 );

function disable_product_insert_hook() {
    global $wp_filter;

    $hook_name = 'woocommerce_rest_insert_product_object';

    if ( isset( $wp_filter[ $hook_name ] ) ) {
        foreach ( $wp_filter[ $hook_name ]->callbacks as $priority => $callbacks ) {
            foreach ( $callbacks as $key => $callback ) {
                if ( is_array( $callback['function'] ) && $callback['function'][1] === 'insert' ) {
                    remove_action( $hook_name, $callback['function'], $priority );
                }
            }
        }
    }
}
