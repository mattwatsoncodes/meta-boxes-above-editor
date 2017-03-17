<?php

/**
 * @link              https://github.com/mkdo/meta-boxes-above-editor
 * @package           mkdo\meta_boxes_above_editor
 *
 * Plugin Name:       Meta Boxes Above Editor
 * Plugin URI:        https://github.com/mkdo/meta-boxes-above-editor
 * Description:       Render meta boxes above the editor, by dragging and dropping, or registering a meta box with a 'context' value of 'primary'.
 * Version:           1.0.3
 * Author:            Make Do <hello@makedo.in>
 * Author URI:        http://www.makedo.in
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       meta-boxes-above-editor
 * Domain Path:       /languages
 */

// Constants
define( 'MKDO_MBAE_ROOT', __FILE__ );
define( 'MKDO_MBAE_TEXT_DOMAIN', 'meta-boxes-above-editor' );

// Load Classes
require_once "php/class.MainController.php";
require_once "php/class.Options.php";
require_once "php/class.AssetsController.php";
require_once "php/class.RenderMetaBoxes.php";

// Use Namespaces
use mkdo\meta_boxes_above_editor\MainController;
use mkdo\meta_boxes_above_editor\Options;
use mkdo\meta_boxes_above_editor\AssetsController;
use mkdo\meta_boxes_above_editor\RenderMetaBoxes;

// Initialize Classes
$options           = new Options();
$assets_controller = new AssetsController();
$render_meta_boxes = new RenderMetaBoxes();
$controller        = new MainController( $options, $assets_controller, $render_meta_boxes );

// Run the Plugin
$controller->run();
