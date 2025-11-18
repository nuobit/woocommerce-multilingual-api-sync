<?php

namespace Woocommerce_Multilingual_Api_Sync;

function init() {
	if ( ! is_plugin_active( 'woocommerce-multilingual/wpml-woocommerce.php' ) ) {
        trigger_error( 'WooCommerce Multilingual API Sync requires WooCommerce Multilingual to be installed and active.', E_USER_WARNING );
        return;
    }

	$inc_path = __DIR__ . '/';
	$files = [
		'wc-rest-product-attribute-controller-sync.php',
		//'wc-rest-product-controller-sync.php',
	];

	foreach ( $files as $file ) {
		require_once $inc_path . $file;
	}
}
