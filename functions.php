<?php 
/*
 * Theme update checker
 *
 * @since Hoover Elementary School 1.0
 */
require WP_CONTENT_DIR . '/plugins/plugin-update-checker-master/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/csd509j/Hoover',
	__FILE__,
	'Hoover'
);

$myUpdateChecker->setBranch('master'); 

/*
 * Setup style sheets
 *
 * @since Hoover Elementary School 1.0
 */
function hoover_theme_enqueue_styles() {
    
	$parent_style = 'csdschools';
	$child_theme = wp_get_theme();
	$parent_theme_version = $child_theme->parent();
	
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', '', $parent_theme_version->version );
	wp_enqueue_style( 'hoover-style',
	    get_stylesheet_directory_uri() . '/style.css',
	    array( $parent_style ),
	    wp_get_theme()->get('Version')
	);

}
add_action( 'wp_enqueue_scripts', 'hoover_theme_enqueue_styles' );