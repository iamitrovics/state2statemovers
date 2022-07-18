<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	// '/pagination.php',                      Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	// '/customizer.php',                   // Customizer additions.
	// '/custom-comments.php',                 Custom Comments file.
	// '/jetpack.php',                         Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	// '/woocommerce.php',                     Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	// Custom include files
	'/cleanup.php',                         // Cleaning worpdress garbage
	'/images.php',                          // Image sizes
	'/settings.php',                        // Theme Settings
	'/customize.php',                       // Customize theme
    '/ctp.php',                             // Custom Post Types	
	'/forms.php',                           // Quote Forms
    // '/blocks.php',                          // Custom Post Types	
);

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

require_once('wp_bootstrap_mobile_navwalker.php');

// disable this on publishing
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

// function gb_gutenberg_admin_styles() {
//     echo '
//         <style>
//             /* Main column width */
//             .wp-block {
//                 max-width: 100%;
//             }
 
//             /* Width of "wide" blocks */
//             .wp-block[data-align="wide"] {
//                 max-width: 100%;
//             }
 
//             /* Width of "full-wide" blocks */
//             .wp-block[data-align="full"] {
//                 max-width: none;
//             }	
//         </style>
//     ';
// }

// add_action('admin_head', 'gb_gutenberg_admin_styles');

add_filter( 'wpcf7_autop_or_not', '__return_false' );

add_action('init', 'init_remove_support',100);
function init_remove_support(){
    $post_type = 'post';
    remove_post_type_support( $post_type, 'editor');
}

if ( ! is_admin() ) {

	function fb_filter_query( $query, $error = true ) {

		if ( is_search() ) {
			$query->is_search = false;
			$query->query_vars['s'] = false;
			$query->query['s'] = false;

			if ( $error == true )
				$query->is_404 = true;
		}
	}

	add_action( 'parse_query', 'fb_filter_query' );
	add_filter( 'get_search_form', function() { return null;} );

}

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

if (current_user_can('manage_options')) {
	function lwp_2629_user_edit_ob_start() {ob_start();}
	add_action( 'personal_options', 'lwp_2629_user_edit_ob_start' );
	function lwp_2629_insert_nicename_input( $user ) {
		$content = ob_get_clean();
		$regex = '/<tr(.*)class="(.*)\buser-user-login-wrap\b(.*)"(.*)>([\s\S]*?)<\/tr>/';
		$nicename_row = sprintf(
			'<tr class="user-user-nicename-wrap"><th><label for="user_nicename">%1$s</label></th><td><input type="text" name="user_nicename" id="user_nicename" value="%2$s" class="regular-text" />' . "\n" . '<span class="description">%3$s</span></td></tr>',
			esc_html__( 'Nicename' ),
			esc_attr( $user->user_nicename ),
			esc_html__( 'Must be unique.' )
		);
		echo preg_replace( $regex, '\0' . $nicename_row, $content );
	}
	add_action( 'show_user_profile', 'lwp_2629_insert_nicename_input' );
	add_action( 'edit_user_profile', 'lwp_2629_insert_nicename_input' );
	function lwp_2629_profile_update( $errors, $update, $user ) {
		if ( !$update ) return;
		if ( empty( $_POST['user_nicename'] ) ) {
			$errors->add(
				'empty_nicename',
				sprintf(
					'<strong>%1$s</strong>: %2$s',
					esc_html__( 'Error' ),
					esc_html__( 'Please enter a Nicename.' )
				),
				array( 'form-field' => 'user_nicename' )
			);
		} else {
			$user->user_nicename = $_POST['user_nicename'];
		}
	}
	add_action( 'user_profile_update_errors', 'lwp_2629_profile_update', 10, 3 );
	}