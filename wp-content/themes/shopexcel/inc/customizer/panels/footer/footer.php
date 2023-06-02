<?php
/**
 * Shopexcel Footer Setting
 *
 * @package Shopexcel
 */
if ( ! function_exists( 'shopexcel_customize_register_footer' ) ) : 

function shopexcel_customize_register_footer( $wp_customize ) {
    $colorDefaults = shopexcel_get_color_defaults();
    $defaults      = shopexcel_get_general_defaults();

    $wp_customize->add_section(
        'footer_settings',
        array(
            'title'      => __( 'Footer Settings', 'shopexcel' ),
            'priority'   => 20,
            'panel' => 'main_footer_settings',
        )
    );
    
    $wp_customize->add_setting(
        'footer_tabs_settings',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        new Customizer_Tabs_Control(
            $wp_customize, 'footer_tabs_settings', array(
                'section' => 'footer_settings',
                'tabs'    => array(
                    'general' => array(
                        'nicename' => esc_html__( 'General', 'shopexcel' ),
                        'controls' => array(
                            'footer_copyright',
                            'ed_author_link',
                            'ed_wp_link',
                            'payment_image',
                        ),
                    ),
                    'design' => array(
                        'nicename' => esc_html__( 'Design', 'shopexcel' ),
                        'controls' => array(
                            'foot_text_color',
                            'foot_widget_heading_color',
                            'foot_bg_color',
                        ),
                    )
                ),
            )
        )
    );

    /** Footer Copyright */
    $wp_customize->add_setting(
        'footer_copyright',
        array(
            'default'           => $defaults['footer_copyright'],
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'footer_copyright',
        array(
            'label'   => __( 'Footer Copyright Text', 'shopexcel' ),
            'section' => 'footer_settings',
            'type'    => 'textarea',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
        'selector' => '.site-info .copyright',
        'render_callback' => 'shopexcel_get_footer_copyright',
    ) );
    
    /** Payment Image */
    $wp_customize->add_setting(
        'payment_image',
        array(
            'default'           => $defaults['payment_image'],
            'sanitize_callback' => 'shopexcel_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'payment_image',
            array(
                'label'    => __( 'Payment Image', 'shopexcel' ),
                'section'  => 'footer_settings',
                'priority' => 12,
            )
        )
    );

    /** Text Color*/
    $wp_customize->add_setting(
        'foot_text_color', 
        array(
            'default'           =>  $colorDefaults['foot_text_color'],
            'sanitize_callback' => 'shopexcel_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Shopexcel_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'foot_text_color', 
            array(
                'label'       => __( 'Text Color', 'shopexcel' ),
                'section'     => 'footer_settings',
            )
        )
    );

    /** Footer Widget Title Color*/
    $wp_customize->add_setting(
        'foot_widget_heading_color', 
        array(
            'default'           =>  $colorDefaults['foot_widget_heading_color'],
            'sanitize_callback' => 'shopexcel_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Shopexcel_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'foot_widget_heading_color', 
            array(
                'label'       => __( 'Widget Title Color', 'shopexcel' ),
                'section'     => 'footer_settings',
            )
        )
    );

    /** Footer Background Color*/
    $wp_customize->add_setting(
        'foot_bg_color', 
        array(
            'default'           =>  $colorDefaults['foot_bg_color'],
            'sanitize_callback' => 'shopexcel_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Shopexcel_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'foot_bg_color', 
            array(
                'label'       => __( 'Background Color', 'shopexcel' ),
                'section'     => 'footer_settings',
            )
        )
    );
}
endif;
add_action( 'customize_register', 'shopexcel_customize_register_footer' );