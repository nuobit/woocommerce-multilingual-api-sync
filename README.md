# WooCommerce Multilingual API Sync

**Version:** 1.0.2
**Author:** NuoBiT Solutions, S.L.  
**License:** GPLv3 or later  

## Description

WooCommerce Multilingual API Sync ensures seamless integration between the WooCommerce REST API and WooCommerce Multilingual.

## Core Functionality

- **Translatable Attributes**: Automatically marks product attributes added via WooCommerce REST API as translatable in WooCommerce Multilingual.
- (UNAVAILABLE) **Product Synchronization Control**: Disables product synchronization hooks in WooCommerce Multilingual to ensure only data sent through the REST API is processed.

## Use Cases

- Adding product attributes via WooCommerce REST API and ensuring they are immediately ready for translation in WooCommerce Multilingual.
- (UNAVAILABLE) Preventing automatic synchronization issues by precisely controlling the data synchronization flow when using WooCommerce REST API.

## Requirements

- **WooCommerce Multilingual**: Required for REST API functionality.

## Installation

1. Download the plugin files or clone the repository.
2. Upload the files to your WordPress `plugins` directory.
3. Activate the plugin from the WordPress admin dashboard.
4. Ensure WooCommerce (and WooCommerce Multilingual, if applicable) are installed and configured.

## Usage

After installation and activation:

- Product attributes added via the WooCommerce REST API are automatically set as translatable.
- (UNAVAILABLE) Product synchronization hooks are automatically disabled, ensuring that only REST API data is processed.
- No additional settings or user interactions are required. The plugin operates automatically once activated.

## GitHub Repository

[Visit NuoBiT's GitHub Repository](https://github.com/nuobit/woocommerce-multilingual-api-sync)
