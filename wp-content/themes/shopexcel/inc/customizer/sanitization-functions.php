<?php
/**
 * Shopexcel Sanitization Functions
 * 
 * @package Shopexcel
*/

if( ! function_exists( 'shopexcel_sanitize_checkbox' ) ) :

function shopexcel_sanitize_checkbox( $checked ){
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
endif;

if( ! function_exists( 'shopexcel_sanitize_select' ) ) :

function shopexcel_sanitize_select( $value ){    
    if ( is_array( $value ) ) {
		foreach ( $value as $key => $subvalue ) {
			$value[ $key ] = sanitize_text_field( $subvalue );
		}
		return $value;
	}
	return sanitize_text_field( $value );    
}
endif;

if( ! function_exists( 'shopexcel_sanitize_number_absint' ) ) :

function shopexcel_sanitize_number_absint( $number, $setting ) {
    // Ensure $number is an absolute integer (whole number, zero or greater).
    $number = absint( $number );
    
    // If the input is an absolute integer, return it; otherwise, return the default
    return ( $number ? $number : $setting->default );
}
endif;

if( ! function_exists( 'shopexcel_sanitize_radio' ) ) :

function shopexcel_sanitize_radio( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
endif;

if( ! function_exists( 'shopexcel_sanitize_empty_absint' ) ) :
/**
 * Sanitize a positive number, but allow an empty value.
 *
 * @since 1.0.0
*/
function shopexcel_sanitize_empty_absint( $input ) {
	if ( '' == $input ) {
		return '';
	}

	return absint( $input );
}
endif;

if( ! function_exists( 'shopexcel_sanitize_empty_floatval' ) ) :
/**
 * Sanitize a float number, but allow an empty value.
 *
 * @since 1.0.0
*/
function shopexcel_sanitize_empty_floatval( $input, $setting ) {
	if ( '' == $input ) {
		return '';
	}

	$number = floatval( $input );                                                          
	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}
endif;

if( ! function_exists( 'shopexcel_sanitize_sortable' ) ) :
/**
 * Sanitize sortable
 *
 * @since 1.0.0
*/
function shopexcel_sanitize_sortable( $value = array() ) {
	if ( is_string( $value ) || is_numeric( $value ) ) {
		return array(
			sanitize_text_field( $value ),
		);
	}
	$sanitized_value = array();
	foreach ( $value as $sub_value ) {
		$sanitized_value[] = sanitize_text_field( $sub_value );
	}
	return $sanitized_value;
}
endif;

if ( ! function_exists( 'shopexcel_sanitize_hex_color' ) ) :
/**
 * Sanitize hex colors
 * We don't use the core function as we want to allow empty values
 */
function shopexcel_sanitize_hex_color( $color ) {
	if ( '' === $color ) {
		return '';
	}

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return $color;
	}

	return '';
}
endif;

if( ! function_exists( 'shopexcel_sanitize_rgba' ) ) :
/**
 * Sanitize RGBA colors
 */
function shopexcel_sanitize_rgba( $color ) {
	if ( '' === $color ) {
		return '';
	}

	// If string does not start with 'rgba', then treat as hex
	// sanitize the hex color and finally convert hex to rgba
	if ( false === strpos( $color, 'rgba' ) ) {
		return shopexcel_sanitize_hex_color( $color );
	}

	// By now we know the string is formatted as an rgba color so we need to further sanitize it.
	$color = str_replace( ' ', '', $color );
	sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
	return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';

	return '';
}
endif;

if( ! function_exists( 'shopexcel_sanitize_variants' ) ) :
/**
 * Sanitize our Google Font variants
 */
function shopexcel_sanitize_variants( $input ) {
	if ( is_array( $input ) ) {
		$input = implode( ',', $input );
	}
	return sanitize_text_field( $input );
}
endif;

if( ! function_exists( 'shopexcel_sanitize_image' ) ) :
/**
 * Sanitize image
 */
function shopexcel_sanitize_image( $image, $setting ) {
	/*
		* Array of valid image file types.
		*
		* The array includes image mime types that are included in wp_get_mime_types()
		*/
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
		'bmp'          => 'image/bmp',
		'tif|tiff'     => 'image/tiff',
		'ico'          => 'image/x-icon',
		'webp'         => 'image/webp'
	);
	// Return an array with file extension and mime_type.
	$file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
	return ( $file['ext'] ? $image : '' );
}
endif;

if( ! function_exists( 'shopexcel_sanitize_code' ) ) :
/**
 * Sanitize image
 */
function shopexcel_sanitize_code( $value ){
	return htmlspecialchars_decode( stripslashes( $value ) );
}
endif;

if( ! function_exists( 'shopexcel_get_kses_extended_ruleset' ) ) :
/**
 * Sanitize SVG
 */
function shopexcel_get_kses_extended_ruleset() {
	$kses_defaults = wp_kses_allowed_html( 'post' );

	$svg_args = array(
		'svg'   => array(
			'class'           => true,
			'aria-hidden'     => true,
			'aria-labelledby' => true,
			'role'            => true,
			'xmlns'           => true,
			'width'           => true,
			'height'          => true,
			'viewbox'         => true, // <= Must be lower case!
		),
		'g'     => array( 'fill' => true ),
		'title' => array( 'title' => true ),
		'path'  => array(
			'd'    => true,
			'fill' => true,
		),
	);
	return array_merge( $kses_defaults, $svg_args );
}
endif;