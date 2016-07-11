<?php
namespace mkdo\meta_boxes_above_editor;
/**
 * Class AssetsController
 *
 * Sets up the JS and CSS needed for this plugin
 *
 * @package mkdo\meta_boxes_above_editor
 */
class AssetsController {

	/**
	 * Constructor
	 */
	function __construct() {
	}

	/**
	 * Do Work
	 */
	public function run() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

	/**
	 * Enqeue Scripts
	 */
	public function admin_enqueue_scripts() {

		$plugin_css_url = plugins_url( 'css/plugin.css', MKDO_MBAE_ROOT );
		wp_enqueue_style( MKDO_MBAE_TEXT_DOMAIN, $plugin_css_url );
	}
}
