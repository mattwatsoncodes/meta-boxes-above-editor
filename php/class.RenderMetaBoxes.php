<?php
namespace mkdo\meta_boxes_above_editor;
/**
 * Class RenderMetaBoxes
 *
 * Renders the 'primary' meta boxes
 *
 * @package mkdo\meta_boxes_above_editor
 */
class RenderMetaBoxes {

	/**
	 * Constructor
	 */
	function __construct() {
	}

	/**
	 * Do Work
	 */
	 public function run() {
 		add_action( 'edit_form_after_title', array( $this, 'edit_form_after_title' ), 99 );
 	}

 	/**
 	 * Render Meta Boxes
 	 */
 	public function edit_form_after_title() {
 		global $post, $wp_meta_boxes;

 		$screen     = get_current_screen();
 		$post_types = apply_filters(
 			'mkdo_mbae_post_types_filter',
 			get_option( 'mkdo_mbae_post_types', array( 'post', 'page' ) ) 
 		);

 		if ( in_array( $screen->id, $post_types ) ) {
 			?>
 				<div id="postbox-container-0" class="postbox-container">
 					<?php do_meta_boxes( get_current_screen(), 'primary', $post );?>
 				</div>
 			<?php
 			unset( $wp_meta_boxes[ get_post_type( $post ) ]['primary'] );
 		}
 	}
 }
