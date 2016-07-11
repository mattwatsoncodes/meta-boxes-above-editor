<?php

namespace mkdo\meta_boxes_above_editor;

/**
 * Class MainController
 *
 * The main loader for this plugin
 *
 * @package mkdo\meta_boxes_above_editor
 */
class MainController {

	private $options;
	private $assets_controller;
	private $render_meta_boxes;

	/**
	 * Constructor
	 *
	 * @param Options            $options              Object defining the options page
	 * @param AssetsController   $assets_controller    Object to load the assets
	 * @param RenderMetaBoxes    $render_meta_boxes    Object to render the meta boxes
	 */
	public function __construct( Options $options, AssetsController $assets_controller, RenderMetaBoxes $render_meta_boxes ) {
        $this->options           = $options;
        $this->assets_controller = $assets_controller;
        $this->render_meta_boxes = $render_meta_boxes;
	}

	/**
	 * Do Work
	 */
	public function run() {
		load_plugin_textdomain( MKDO_MBAE_TEXT_DOMAIN, false, MKDO_MBAE_ROOT . '\languages' );

		$this->options->run();
		$this->assets_controller->run();
		$this->render_meta_boxes->run();
	}
}
