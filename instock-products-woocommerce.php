<?php

/**
 * Instock Products for woocommerce
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://smartsoftfirm.com
 * @since             1.0.0
 * @package           WPINC
 *
 * @wordpress-plugin
 * Plugin Name:       Instock Products for Woocommerce
 * Plugin URI:        https://wpdemo.smartsoftfirm.com/quickspace/shop
 * Description:        In-stock Products Woocommerce Plugin Help you to show your WooCommerce Store Products Count and Sow for "In Store" "Out of Stock" and "Sold". So you will happy to use this plugin. 
 * Version:           1.0.0
 * Author:            SmartSoftFirm
 * Author URI:        https://smartsoftfirm.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       instock-products-for-woocommerce
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version 1.0.0
 */
define( 'INSTOCK_PRODUCTS_WOOCOMMERCE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-instock-products-woocommerce-activator.php
 */
function activate_instock_products_woocommerce() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-instock-products-woocommerce-activator.php';
	Instock_Products_Woocommerce_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-instock-products-woocommerce-deactivator.php
 */
function deactivate_instock_products_woocommerce() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-instock-products-woocommerce-deactivator.php';
	Instock_Products_Woocommerce_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_instock_products_woocommerce' );
register_deactivation_hook( __FILE__, 'deactivate_instock_products_woocommerce' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-instock-products-woocommerce.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_instock_products_woocommerce() {

	$plugin = new Instock_Products_Woocommerce();
	$plugin->run();

}
run_instock_products_woocommerce();

add_action( 'woocommerce_after_shop_loop_item_title', 'ISW_woo_stock_quantity');

function ISW_woo_stock_quantity() {
    global $product;

    if ( $product->get_stock_quantity()>0){
        echo esc_html( "In Stock ").$product->get_stock_quantity()." ";        
    } else {
        echo esc_html( $product->get_stock_status())." ";
    } 
    if( $product->get_total_sales()>0) {
        echo esc_html(" - Sold ").$product->get_total_sales();
    } 

}