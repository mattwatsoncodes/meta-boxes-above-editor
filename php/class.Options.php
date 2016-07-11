<?php

namespace mkdo\meta_boxes_above_editor;

/**
 * Class Options
 *
 * Options page for the plugin
 *
 * @package mkdo\meta_boxes_above_editor
 */
class Options {

	private $language_code;

	/**
	 * Constructor
	 */
	public function __construct() {
	}

	/**
	 * Do Work
	 */
	public function run() {
		add_action( 'admin_init', array( $this, 'init_options_page' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'plugin_action_links_' . plugin_basename( MKDO_MBAE_ROOT ) , array( $this, 'add_setings_link' ) );
	}

	/**
	 * Initialise the Options Page
	 */
	public function init_options_page() {

		// Register Settings
		register_setting( 'mkdo_mbae_settings_group', 'mkdo_mbae_post_types' );

		// Add sections
		add_settings_section( 'mkdo_mbae_post_types_section', 'Choose Post Types', array( $this, 'mkdo_mbae_post_types_section_cb' ), 'mkdo_mbae_settings' );

    	// Add fields to a section
		add_settings_field( 'mkdo_mbae_post_types_select', 'Choose Post Types:', array( $this, 'mkdo_mbae_post_types_select_cb' ), 'mkdo_mbae_settings', 'mkdo_mbae_post_types_section' );
	}

	/**
	 * Call back for the post_type section
	 */
	public function mkdo_mbae_post_types_section_cb() {
		echo '<p>';
		esc_html_e( 'Select the Post Types that you wish to enable \'primary\' meta boxes on.', MKDO_MBAE_TEXT_DOMAIN  );
		echo '</p>';
	}

	/**
	 * Call back for the post_type selector
	 */
	public function mkdo_mbae_post_types_select_cb() {

		$post_type_args = array(
			'show_ui' => true,
		);
		$post_types           = get_post_types( $post_type_args );
		$mkdo_mbae_post_types = get_option( 'mkdo_mbae_post_types', array( 'post', 'page' ) );

		unset( $post_types['attachment'] );

		if ( ! is_array( $mkdo_mbae_post_types ) ) {
			$mkdo_mbae_post_types = array();
		}

		?>
		<div class="field field-checkbox field-post-types">
			<ul class="field-input">
				<?php
				foreach ( $post_types as $key => $post_type ) {
					$post_type_object = get_post_type_object( $post_type );
					?>
					<li>
						<label>
							<input type="checkbox" name="mkdo_mbae_post_types[]" value="<?php echo $key; ?>" <?php if ( in_array( $key, $mkdo_mbae_post_types ) ) { echo ' checked="checked"'; } ?> />
							<?php echo $post_type_object->labels->name;?>
						</label>
					</li>
					<?php
				}
				?>
			</ul>
		</div>
		<?php
	}

	/**
	 * Add the options page
	 */
	public function add_options_page() {
		add_submenu_page( 'options-general.php', esc_html__( 'Meta Boxes Above Editor', MKDO_MBAE_TEXT_DOMAIN ), esc_html__( 'Meta Boxes Above Editor', MKDO_MBAE_TEXT_DOMAIN ), 'manage_options', 'meta_boxes_above_editor', array( $this, 'render_options_page' ) );
	}

	/**
	 * Render the options page
	 */
	public function render_options_page() {
		?>
		<div class="wrap">
			<h2><?php esc_html_e( 'Meta Boxes Above Editor', MKDO_MBAE_TEXT_DOMAIN );?></h2>
			<form action="options.php" method="POST">
	            <?php settings_fields( 'mkdo_mbae_settings_group' ); ?>
	            <?php do_settings_sections( 'mkdo_mbae_settings' ); ?>
	            <?php submit_button(); ?>
	        </form>
		</div>
	<?php
	}

	/**
	 * Add 'Settings' action on installed plugin list
	 */
	function add_setings_link( $links ) {
		array_unshift( $links, '<a href="options-general.php?page=meta_boxes_above_editor">' . esc_html__( 'Settings', MKDO_MBAE_TEXT_DOMAIN ) . '</a>');
		return $links;
	}
}
