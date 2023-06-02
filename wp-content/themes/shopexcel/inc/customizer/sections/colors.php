<?php
/**
 * Shopexcel Colors Settings
 *
 * @package Shopexcel
 */
if ( ! function_exists( 'shopexcel_customize_register_colors' ) ) : 

function shopexcel_customize_register_colors( $wp_customize ) {
    
    $defaults = shopexcel_get_color_defaults();

    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color', 
        array(
            'default'           =>  $defaults['primary_color'],
            'sanitize_callback' => 'shopexcel_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Shopexcel_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'primary_color', 
            array(
                'label'    => __( 'Primary Color', 'shopexcel' ),
                'section'  => 'colors',
                'priority' => 10,
            )
        )
    );

    /** Body Font Color*/
    $wp_customize->add_setting( 
        'body_font_color', 
        array(
            'default'           =>  $defaults['body_font_color'],
            'sanitize_callback' => 'shopexcel_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Shopexcel_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'body_font_color', 
            array(
                'label'       => __( 'Base Font', 'shopexcel' ),
                'section'     => 'colors',
                'priority'    => 10,
            )
        )
    );

    /** Heading Color*/
    $wp_customize->add_setting( 
        'heading_color', 
        array(
            'default'           =>  $defaults['heading_color'],
            'sanitize_callback' => 'shopexcel_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Shopexcel_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'heading_color', 
            array(
                'label'       => __( 'Heading', 'shopexcel' ),
                'section'     => 'colors',
                'priority'    => 10,
            )
        )
    );

    /** Section Background Color*/
    $wp_customize->add_setting(
        'section_bg_color', 
        array(
            'default'           =>  $defaults['section_bg_color'],
            'sanitize_callback' => 'shopexcel_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Shopexcel_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'section_bg_color', 
            array(
                'label'       => __( 'Section Background', 'shopexcel' ),
                'section'     => 'colors',
                'priority'    => 10,
            )
        )
    );

    /** Site Background Color*/
    $wp_customize->add_setting( 
        'site_bg_color', 
        array(
            'default'           =>  $defaults['site_bg_color'],
            'sanitize_callback' => 'shopexcel_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Shopexcel_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'site_bg_color', 
            array(
                'label'       => __( 'Site Background', 'shopexcel' ),
                'section'     => 'colors',
                'priority'    => 10,
            )
        )
    );

    $wp_customize->get_section( 'colors' )->priority   = 7;
    $wp_customize->remove_control( 'background_color' ); //Remove site background color
}
endif;
add_action( 'customize_register', 'shopexcel_customize_register_colors' );