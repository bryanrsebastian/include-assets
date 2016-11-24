<?php
/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) 
	exit;
	
/**
 * Enqueue Style/Script for specific page
 * @param  array $filenames collection filename of style/script
 * @return enqueue your style/script
 */
function include_assets( $filenames = array(), $jquery = '', $in_footer = false )
{	
	/* Check if the $filename is empty */
	if ( empty( $filenames ) )
		return;

	foreach ( $filenames as $filename ) {
		/* Get the extension */
		$ext = pathinfo( $filename, PATHINFO_EXTENSION );
		/* Remove the extension */
		$without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);

		$path = get_template_directory(). '/assets/'. $ext .'/'. $filename;
		/* Check if the given path is exist */
		if ( ! file_exists( $path ) ) 
			return;

		$uri = get_template_directory_uri(). '/assets/'. $ext .'/'. $filename;
		if ( $ext == 'js' ) {
			wp_register_script( $without_ext, $uri, array( $jquery ), NULL, $in_footer );
		    wp_enqueue_script( $without_ext );
		} else if( $ext == 'css' ) {
			wp_register_style( $without_ext, $uri );
			wp_enqueue_style( $without_ext );
		} else {
			return;
		}
	}
}
add_action( 'wp_enqueue_scripts', 'include_assets', 10, 3 );