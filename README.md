# WooCommerce Multilingual API Sync

**Version:** 1.0.0  
**Author:** NuoBiT Solutions, S.L.  
**License:** GPLv3 or later  

## Description

This plugin disables WooCommerce product synchronization via REST API hooks to ensure only the data explicitly sent through the API is processed. It removes the `insert` in `woocommerce_rest_insert_product_object` action, streamlining product management for API-driven workflows.

## Core Functionality

- **Prevents Automatic Synchronization:** Disables product synchronization and related actions in WooCommerce to avoid interference with API-driven operations.
- **Focus on API-Provided Data:** Ensures only the product data sent explicitly via the API is processed, preventing unintended updates or conflicts.
- **Simplified Customization:** Offers a straightforward solution for managing WooCommerce REST API behavior without altering core files.

## Use Cases

- **API-Driven Product Management:** Ideal for scenarios where products are managed entirely through external systems using WooCommerce's REST API.
- **Multilingual WooCommerce Stores:** Suitable for stores requiring precise control over product updates in a multilingual context, ensuring no unnecessary synchronizations occur.
- **Custom Workflow Implementation:** Provides a clean slate for developers to implement their own product handling logic without interference from default WooCommerce behaviors.

## Requirements

- **WooCommerce**: Required for REST API functionality.  
- **WooCommerce Multilingual (optional)**: Recommended for multilingual support but not required.

## Installation

1. Download the plugin files or clone the repository.
2. Upload the files to your WordPress `plugins` directory.
3. Activate the plugin from the WordPress admin dashboard.
4. Ensure WooCommerce (and WooCommerce Multilingual, if applicable) are installed and configured.

## Usage

Once activated, this plugin will:

- Disable the `insert` in `woocommerce_rest_insert_product_object` action.
- Prevent WooCommerce from automatically synchronizing products during REST API operations.
- Allow developers to define custom behavior for managing product data.

No additional setup is required after activation.

## GitHub Repository

[Visit NuoBiT's GitHub Repository](https://github.com/nuobit/woocommerce-multilingual-api-sync)
