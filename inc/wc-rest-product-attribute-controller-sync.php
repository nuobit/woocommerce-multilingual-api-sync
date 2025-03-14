<?php
/**
 * Ensures that product attributes added via the WooCommerce API 
 * are always marked as translatable in WooCommerce Multilingual.
 */

namespace Woocommerce_Multilingual_Api_Sync;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action('woocommerce_rest_insert_product_attribute', __NAMESPACE__ . '\\make_attribute_translatable', 10);

function make_attribute_translatable($attribute) {
    global $woocommerce_wpml;

    $_POST['add_new_attribute'] = true;
    $_POST['wcml-is-translatable-attr'] = true;
    $_POST['attribute_name'] = $attribute->attribute_name;

    $woocommerce_wpml->attributes->set_attribute_readonly_config( $attribute->attribute_id, (array) $attribute );
}
