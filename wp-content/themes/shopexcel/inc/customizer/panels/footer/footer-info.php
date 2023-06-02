<?php
/**
 * Footer Info Setting
 *
 * @package Shopexcel
 */
if ( ! function_exists( 'shopexcel_customize_register_footer_info_settings' ) ) : 

function shopexcel_customize_register_footer_info_settings( $wp_customize ) {
    $defaults = shopexcel_get_general_defaults();

    /** Footer Info Settings */
    $wp_customize->add_section(
        'footer_info_settings',
        array(
            'title'    => __( 'Footer Info Settings', 'shopexcel' ),
            'priority' => 10,
            'panel'    => 'main_footer_settings',
        )
    );

    /** Phone Label*/
    $wp_customize->add_setting(
        'footer_phone_label',
        array(
            'default'           => $defaults['footer_phone_label'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'footer_phone_label',
        array(
            'type'    => 'text',
            'section' => 'footer_info_settings',
            'label'   => __( 'Phone Label', 'shopexcel' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'footer_phone_label', array(
        'selector'        => '.foot-phn',
        'render_callback' => 'shopexcel_footer_phone_label',
    ) );

    /** Phone */
    $wp_customize->add_setting(
        'footer_phone',
        array(
            'default'           => $defaults['footer_phone'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'footer_phone',
        array(
            'type'    => 'text',
            'section' => 'footer_info_settings',
            'label'   => __( 'Phone Number', 'shopexcel' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'footer_phone', array(
        'selector'        => '.footer-phone-number',
        'render_callback' => 'shopexcel_footer_phone_partial',
    ) );

    /** Email Label*/
    $wp_customize->add_setting(
        'footer_email_label',
        array(
            'default'           => $defaults['footer_email_label'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'footer_email_label',
        array(
            'type'    => 'text',
            'section' => 'footer_info_settings',
            'label'   => __( 'Email Label', 'shopexcel' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'footer_email_label', array(
        'selector'        => '.foot-email',
        'render_callback' => 'shopexcel_footer_email_label',
    ) );

    /** Email */
    $wp_customize->add_setting(
        'footer_email',
        array(
            'default'           => $defaults['footer_email'],
            'sanitize_callback' => 'sanitize_email',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'footer_email',
        array(
            'type'    => 'text',
            'section' => 'footer_info_settings',
            'label'   => __( 'Email Address', 'shopexcel' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'footer_email', array(
        'selector'        => '.footer-email-wrap',
        'render_callback' => 'shopexcel_footer_email',
    ) );

    /** Phone Label*/
    $wp_customize->add_setting(
        'opening_hour_label',
        array(
            'default'           => $defaults['opening_hour_label'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'opening_hour_label',
        array(
            'type'    => 'text',
            'section' => 'footer_info_settings',
            'label'   => __( 'Opening Hour Label', 'shopexcel' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'opening_hour_label', array(
        'selector'        => '.foot-opn-hr',
        'render_callback' => 'shopexcel_opening_hour_label',
    ) );

    /** Phone */
    $wp_customize->add_setting(
        'opening_hour',
        array(
            'default'           => $defaults['opening_hour'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'opening_hour',
        array(
            'type'    => 'text',
            'section' => 'footer_info_settings',
            'label'   => __( 'Opening Hours', 'shopexcel' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'opening_hour', array(
        'selector'        => '.footer-opn-hr',
        'render_callback' => 'shopexcel_opening_hour',
    ) );
}
endif;
add_action( 'customize_register', 'shopexcel_customize_register_footer_info_settings' );
