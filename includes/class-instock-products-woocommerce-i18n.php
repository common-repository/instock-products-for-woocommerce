<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://smartsoftfirm.com
 * @since      1.0.0
 *
 * @package    Instock_Products_Woocommerce
 * @subpackage Instock_Products_Woocommerce/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Instock_Products_Woocommerce
 * @subpackage Instock_Products_Woocommerce/includes
 * @author     SmartSoftFirm <smartsoftfirm@gmail.com>
 */
class Instock_Products_Woocommerce_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'instock-products-woocommerce',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
