=== Meta Boxes Above Editor ===
Contributors: mkdo, mwtsn
Donate link:
Tags: meta, meta box, cmb2, postbox, postbox container
Requires at least: 4.5
Tested up to: 4.5
Stable tag: 1.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Render meta boxes above the editor, by dragging and dropping, or registering a meta box with a 'context' value of 'primary'.

== Description ==

Designed initially to work with [CMB2](https://wordpress.org/plugins/cmb2/), but will work with any Meta Box.

Adds a new 'Postbox Container' to WordPress above the editor (`postbox-container-0`) to render meta boxes above the editor (below the title). You can use this container to drag existing meta boxes above the editor.

To initialize a meta box above the editor, you can add a 'context' value of 'primary' when you register the meta box, and it will automatically appear above the editor.

== Installation ==

1. Backup your WordPress install
2. Upload the plugin folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Configure the plugin via the 'Meta Boxes Above Editor' options page under the WordPress 'Settings' Menu

== Screenshots ==

1. Meta box rendering above the editor
2. Choose the post types that you want to enable the postbox container on
3. Drag any meta box above the editor
4. Add a 'context' of primary when registering your meta box for it to appear above the editor (code example using [CMB2](https://wordpress.org/plugins/cmb2/)).

== Changelog ==

= 1.0.0 =
* First stable release

= 1.0.1 =
* Updated documentation

= 1.0.2 =
* Fixed date picker float for CMB2 when above editor

= 1.0.3 =
* Added new artwork.
