<?php
/**
 * Disables the automatic synchronization of products and variations in 
 * WooCommerce Multilingual and enforces the link between products and 
 * variations through the translation_of parameter.
 */

namespace Woocommerce_Multilingual_Api_Sync;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'rest_api_init', __NAMESPACE__ . '\\disable_product_insert_hook', 20);

function disable_product_insert_hook() {
    global $wp_filter;

    $hook_map = [
        'woocommerce_rest_insert_product_object'             => 'post_product',
        'woocommerce_rest_insert_product_variation_object'   => 'post_product_variation',
    ];

    foreach ( $hook_map as $hook_name => $element_type ) {
        if ( isset( $wp_filter[ $hook_name ] ) ) {
            foreach ( $wp_filter[ $hook_name ]->callbacks as $priority => $callbacks ) {
                foreach ( $callbacks as $key => $callback ) {
                    if ( is_array( $callback['function'] ) && $callback['function'][1] === 'insert' ) {
                        remove_action( $hook_name, $callback['function'], $priority );
                    }
                }
            }
        }

        add_action( $hook_name, function( $object, $request, $creating ) use ( $element_type ) {
            insert_product_translation( $object, $request, $creating, $element_type );
        }, 10, 3 );
    }
}

function insert_product_translation( $object, $request, $creating, $element_type ) {
    $params = $request->get_params();

    $lang_code       = isset( $params['lang'] ) ? $params['lang'] : null;
    $translation_of  = isset( $params['translation_of'] ) ? (int) $params['translation_of'] : null;

    if ( $lang_code && $translation_of ) {
        global $wpdb;

        $row = $wpdb->get_row( $wpdb->prepare(
            "SELECT trid, language_code 
             FROM {$wpdb->prefix}icl_translations 
             WHERE element_id = %d 
             AND element_type = %s", 
            $translation_of,
            $element_type
        ));

        if ( $row ) {
            $trid         = $row->trid;
            $source_lang  = $row->language_code;
            $new_id       = $object->get_id();

            $existing = $wpdb->get_var( $wpdb->prepare(
                "SELECT translation_id 
                 FROM {$wpdb->prefix}icl_translations 
                 WHERE element_id = %d 
                 AND element_type = %s", 
                $new_id,
                $element_type
            ));

            if ( $existing ) {
                $wpdb->update(
                    "{$wpdb->prefix}icl_translations",
                    [
                        'trid'                 => $trid,
                        'language_code'        => $lang_code,
                        'source_language_code' => $source_lang
                    ],
                    [
                        'element_id'   => $new_id,
                        'element_type' => $element_type
                    ]
                );
            }
        }
    }
}
