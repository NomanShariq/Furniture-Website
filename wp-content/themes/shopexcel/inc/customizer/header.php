<?php
/**
 * Shopexcel Header Panel
 *
 * @package Shopexcel
 */
if( ! function_exists( 'shopexcel_customize_register_main_header' ) ) :

function shopexcel_customize_register_main_header( $wp_customize ) {
	
    /** General Settings */
    $wp_customize->add_panel(
        'main_header_settings',
        array(
            'title'       => __( 'Main Header', 'shopexcel' ),
            'priority'    => 15,
            'capability'  => 'edit_theme_options',
            'description' => __( 'Customizer header settings from here.', 'shopexcel' ),
        )
    );
}
endif;
add_action( 'customize_register', 'shopexcel_customize_register_main_header' );