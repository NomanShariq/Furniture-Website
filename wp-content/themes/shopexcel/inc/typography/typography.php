<?php
/**
 * Shopexcel Typography Related Functions
 *
 * @package Shopexcel
*/

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/typography/google-fonts.php';


if ( ! function_exists( 'shopexcel_typography_default_fonts' ) ) :
/**
 * Set the default system fonts.
 */
function shopexcel_typography_default_fonts() {
	$fonts = array(
		'Default Family',
		'System Stack',
		'Arial, Helvetica, sans-serif',
		'Century Gothic',
		'Comic Sans MS',
		'Courier New',
		'Georgia, Times New Roman, Times, serif',
		'Helvetica',
		'Impact',
		'Lucida Console',
		'Lucida Sans Unicode',
		'Palatino Linotype',
		'Segoe UI, Helvetica Neue, Helvetica, sans-serif',
		'Tahoma, Geneva, sans-serif',
		'Trebuchet MS, Helvetica, sans-serif',
		'Verdana, Geneva, sans-serif',
	);

	return apply_filters( 'shopexcel_typography_default_fonts', $fonts );
}
endif;

if( ! function_exists( 'shopexcel_get_font_family' ) ) :
/**
 * Get font family 
 */
function shopexcel_get_font_family( $font ){
	$output = '';
	$no_quotes = array(
		'inherit',
		'Arial, Helvetica, sans-serif',
		'Georgia, Times New Roman, Times, serif',
		'Helvetica',
		'Impact',
		'Segoe UI, Helvetica Neue, Helvetica, sans-serif',
		'Tahoma, Geneva, sans-serif',
		'Trebuchet MS, Helvetica, sans-serif',
		'Verdana, Geneva, sans-serif',		
	);

	if( $font['family'] === 'System Stack' ){
		$output = apply_filters( 'shopexcel_typography_system_stack', '-apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"' );
	}else{
		if( in_array( $font['family'], $no_quotes ) || ( $font['family'] ==='System Stack' ) ){
			$wrapper_start = null;
			$wrapper_end = null;
		}else{
			$wrapper_start = '"';
			$wrapper_end = ( $font['category'] ) ? '", ' . $font['category'] : '"';
		}
		$output = $wrapper_start . $font['family'] . $wrapper_end;
	}

	return $output;
}
endif;

if ( ! function_exists( 'shopexcel_google_fonts_url' ) ) :	
/**
 * Google Fonts url
 */
function shopexcel_google_fonts_url() {
	$defaults  			= shopexcel_get_typography_defaults();
	$generalDefaults    = shopexcel_get_general_defaults();

	$fonts_url = '';
	$settings  = array();

	$settings['primary_font']  = wp_parse_args( get_theme_mod( 'primary_font' ), $defaults['primary_font'] );
	$settings['site_title']    = wp_parse_args( get_theme_mod( 'site_title' ), $defaults['site_title'] );
	$settings['button']        = wp_parse_args( get_theme_mod( 'button' ), $defaults['button'] );
	$settings['heading_one']   = wp_parse_args( get_theme_mod( 'heading_one' ), $defaults['heading_one'] );
	$settings['heading_two']   = wp_parse_args( get_theme_mod( 'heading_two' ), $defaults['heading_two'] );
	$settings['heading_three'] = wp_parse_args( get_theme_mod( 'heading_three' ), $defaults['heading_three'] );
	$settings['heading_four']  = wp_parse_args( get_theme_mod( 'heading_four' ), $defaults['heading_four'] );
	$settings['heading_five']  = wp_parse_args( get_theme_mod( 'heading_five' ), $defaults['heading_five'] );
	$settings['heading_six']   = wp_parse_args( get_theme_mod( 'heading_six' ), $defaults['heading_six'] );

	$not_google = str_replace( ' ', '+', shopexcel_typography_default_fonts() );

	$font_settings = array(
		'primary_font',
		'site_title',
		'button',
		'heading_one',
		'heading_two',
		'heading_three',
		'heading_four',
		'heading_five',
		'heading_six',
	);

	if( shopexcel_pro_is_activated() ){
		$prodefaults = shopexcel_pro_get_customizer_defaults();
		$settings['notification_bar']  = wp_parse_args( get_theme_mod( 'notification_bar' ), $prodefaults['notification_bar'] );
		$font_settings[] = 'notification_bar';
	}

	$google_fonts = array();		

	foreach( $font_settings as $key ){

		$value = str_replace( ' ', '+', $settings[ $key ]['family'] );

		$variants = $settings[ $key ]['variants'];

		$value = ! empty( $variants ) ? $value . ':' . $variants : $value;
		
		// Make sure we don't add the same font twice.
		if ( ! in_array( $value, $google_fonts ) ) {
			$google_fonts[] = $value;
		}
	}
	// Ignore any non-Google fonts.
	$google_fonts = array_diff( $google_fonts, $not_google );
	
	$google_fonts = implode( '|', $google_fonts );
	$google_fonts = apply_filters( 'shopexcel_typography_google_fonts', $google_fonts );

	$subset = apply_filters( 'shopexcel_fonts_subset', '' );

	$font_args = array();
	$font_args['family'] = $google_fonts;
	
	if ( '' !== $subset ) {
		$font_args['subset'] = rawurlencode( $subset );
	}
	
	$display = apply_filters( 'shopexcel_google_font_display', 'swap' );

	if ( $display ) {
		$font_args['display'] = $display;
	}
			
	if ( $google_fonts ) {
		$fonts_url = add_query_arg( $font_args, '//fonts.googleapis.com/css' );			
	}

	if( get_theme_mod( 'ed_localgoogle_fonts', $generalDefaults['ed_localgoogle_fonts'] ) ) {
        $fonts_url = shopexcel_get_webfont_url( add_query_arg( $font_args, 'https://fonts.googleapis.com/css' ) );
    }

	return esc_url( $fonts_url );
}
endif;

if ( ! function_exists( 'shopexcel_get_all_google_fonts_ajax' ) ) :
/**
 * Return an array of all of our Google Fonts.
 */
function shopexcel_get_all_google_fonts_ajax() {
	// Bail if the nonce doesn't check out
	if ( ! isset( $_POST['shopexcel_customize_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['shopexcel_customize_nonce'] ), 'shopexcel_customize_nonce' ) ) {
		wp_die();
	}

	// Do another nonce check
	check_ajax_referer( 'shopexcel_customize_nonce', 'shopexcel_customize_nonce' );

	// Bail if user can't edit theme options
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die();
	}

	// Get all of our fonts
	$fonts = shopexcel_get_all_google_fonts();

	// Send all of our fonts in JSON format
	echo wp_json_encode( $fonts );

	// Exit
	die();
}
endif;
add_action( 'wp_ajax_shopexcel_get_all_google_fonts_ajax', 'shopexcel_get_all_google_fonts_ajax' );

if( ! function_exists( 'shopexcel_flush_local_google_fonts' ) ){
	/**
	 * Ajax Callback for flushing the local font
	 */
	function shopexcel_flush_local_google_fonts() {
		$WebFontLoader = new Shopexcel_WebFont_Loader();
		//deleting the fonts folder using ajax
		$WebFontLoader->delete_fonts_folder();
		die();
	}
}
add_action( 'wp_ajax_flush_local_google_fonts', 'shopexcel_flush_local_google_fonts' );
add_action( 'wp_ajax_nopriv_flush_local_google_fonts', 'shopexcel_flush_local_google_fonts' );