<?php
/**
 * Shopexcel General Settings
 *
 * @package Shopexcel
 */
if( ! function_exists( 'shopexcel_customize_register_general' ) ) :

function shopexcel_customize_register_general( $wp_customize ) {
	
    /** General Settings */
    $wp_customize->add_panel( 
        'general_settings',
         array(
            'priority'    => 6,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'General', 'shopexcel' ),
            'description' => __( 'Customize Container, Sidebar, Button and Scroll to Top.', 'shopexcel' ),
        ) 
    );

}
endif;
add_action( 'customize_register', 'shopexcel_customize_register_general' );