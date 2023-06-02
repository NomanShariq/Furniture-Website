<?php
/**
 * Shopexcel Footer Panel
 *
 * @package Shopexcel
 */
if( ! function_exists( 'shopexcel_customize_register_main_footer' ) ) :

function shopexcel_customize_register_main_footer( $wp_customize ) {
	
    /** General Settings */
    $wp_customize->add_panel(
        'main_footer_settings',
        array(
            'title'       => __( 'Footer', 'shopexcel' ),
            'priority'    => 20,
            'capability'  => 'edit_theme_options',
            'description' => __( 'Customizer footer settings from here.', 'shopexcel' ),
        )
    );
}
endif;
add_action( 'customize_register', 'shopexcel_customize_register_main_footer' );