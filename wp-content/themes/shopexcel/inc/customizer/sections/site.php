<?php
/**
 * Shopexcel Customizer
 *
 * @package Shopexcel
 */
if ( ! function_exists( 'shopexcel_customize_register' ) ) : 

function shopexcel_customize_register( $wp_customize ) {
	
    $defaults      = shopexcel_get_site_defaults();
    $typoDefaults  = shopexcel_get_typography_defaults();
    $colorDefaults = shopexcel_get_color_defaults();

    /** Add postMessage support for site title and description */
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_section( 'title_tagline' )->priority     = 5;
	$wp_customize->get_control( 'custom_logo' )->priority       = 5;
	$wp_customize->get_control( 'blogname' )->priority          = 7;
	$wp_customize->get_control( 'blogdescription' )->priority   = 8;
	$wp_customize->get_control( 'site_icon' )->priority         = 9;
	$wp_customize->remove_control( 'header_text' );

    if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'shopexcel_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'shopexcel_customize_partial_blogdescription',
		) );
	}
    
    $wp_customize->add_setting(
        'hide_title',
        array(
            'default'           => $defaults['hide_title'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Toggle_Control(
            $wp_customize,
            'hide_title',
            array(
                'label'    => __( 'Hide Site Title', 'shopexcel' ),
                'section'  => 'title_tagline',
                'priority' => 7,
            )
        )
    );

    $wp_customize->add_setting(
        'hide_tagline',
        array(
            'default'           => $defaults['hide_tagline'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Toggle_Control(
            $wp_customize,
            'hide_tagline',
            array(
                'label'    => __( 'Hide Site Tagline', 'shopexcel' ),
                'section'  => 'title_tagline',
                'priority' => 8,
            )
        )
    );

    /** Logo Width */
    $wp_customize->add_setting(
        'logo_width',
        array(
            'default'           => $defaults['logo_width'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'tablet_logo_width',
        array(
            'default'           => $defaults['tablet_logo_width'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'mobile_logo_width',
        array(
            'default'           => $defaults['mobile_logo_width'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'logo_width',
            array(
                'label'    => __( 'Logo Width', 'shopexcel' ),
                'section'  => 'title_tagline',
                'priority' => 6,
                'settings' => array(
                    'desktop' => 'logo_width',
                    'tablet'  => 'tablet_logo_width',
                    'mobile'  => 'mobile_logo_width'
                ),
                'choices' => array(
                    'desktop' => array(
                        'min'  => 30,
                        'max'  => 400,
                        'step' => 10,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                    'tablet' => array(
                        'min'  => 30,
                        'max'  => 400,
                        'step' => 10,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                    'mobile' => array(
                        'min'  => 30,
                        'max'  => 400,
                        'step' => 10,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                ),
            )
        )
    );

    /** Site Title Hr */
    $wp_customize->add_setting(
        'site_title_group',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Group_Control( 
            $wp_customize,
            'site_title_group',
            array(
                'id'          => 'site_title_group',
                'label'       => __( 'Site Title Typography', 'shopexcel' ),
                'section'     => 'title_tagline',
                'type'        => 'group',
                'style'       => 'collapsible',
                'priorit'     => 13,
            )
        )
    );

    $wp_customize->add_setting(
        'site_title[family]',
        array(
            'default'           => $typoDefaults['site_title']['family'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'site_title[variants]',
        array(
            'default'           => $typoDefaults['site_title']['variants'],
            'sanitize_callback' => 'shopexcel_sanitize_variants',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_setting(
        'site_title[category]',
        array(
            'default'           => $typoDefaults['site_title']['category'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'site_title[weight]',
        array(
            'default'           => $typoDefaults['site_title']['weight'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'site_title[transform]',
        array(
            'default'           => $typoDefaults['site_title']['transform'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'site_title_typography',
            array(
                'section'  => 'title_tagline',
                'settings' => array(
                    'family'    => 'site_title[family]',
                    'variant'   => 'site_title[variants]',
                    'category'  => 'site_title[category]'
                ),
                'priority' => 13,
                'group'    => 'site_title_group',
            )
        )
    );
    
    /** site_title Font Size */
    $wp_customize->add_setting(
        'site_title[desktop][font_size]',
        array(
            'default'           => $typoDefaults['site_title']['desktop']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'site_title[tablet][font_size]',
        array(
            'default'           => $typoDefaults['site_title']['tablet']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'site_title[mobile][font_size]',
        array(
            'default'           => $typoDefaults['site_title']['mobile']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'site_title[font_size]',
            array(
                'label'    => __( 'Font Size', 'shopexcel' ),
                'section'  => 'title_tagline',
                'settings' => array(
                    'desktop' => 'site_title[desktop][font_size]',
                    'tablet'  => 'site_title[tablet][font_size]',
                    'mobile'  => 'site_title[mobile][font_size]',
                ),
                'choices' => array(
                    'desktop' => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                    'tablet' => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                    'mobile' => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),    
                ),
                'priority' => 13,
                'group'    => 'site_title_group',
            )
        )
    );

    /** site_title Line Height */
    $wp_customize->add_setting(
        'site_title[desktop][line_height]',
        array(
            'default'           => $typoDefaults['site_title']['desktop']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'site_title[tablet][line_height]',
        array(
            'default'           => $typoDefaults['site_title']['tablet']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'site_title[mobile][line_height]',
        array(
            'default'           => $typoDefaults['site_title']['mobile']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'site_title[line_height]',
            array(
                'label'    => __( 'Line Height', 'shopexcel' ),
                'section'  => 'title_tagline',
                'settings' => array(
                    'desktop' => 'site_title[desktop][line_height]',
                    'tablet' => 'site_title[tablet][line_height]',
                    'mobile' => 'site_title[mobile][line_height]',
                ),
                'priority' => 13,
                'group'    => 'site_title_group',
                'choices' => array(
                    'desktop' => array(
                        'min'  => 1,
                        'max'  => 20,
                        'step' => 0.01,
                        'edit' => true,
                        'unit' => 'em',
                    ),
                    'tablet' => array(
                        'min'  => 1,
                        'max'  => 20,
                        'step' => 0.01,
                        'edit' => true,
                        'unit' => 'em',
                    ),
                    'mobile' => array(
                        'min'  => 1,
                        'max'  => 20,
                        'step' => 0.01,
                        'edit' => true,
                        'unit' => 'em',
                    ),
                ),
            )
        )
    );

    /** site_title Letter Spacing */
    $wp_customize->add_setting(
        'site_title[desktop][letter_spacing]',
        array(
            'default'           => $typoDefaults['site_title']['desktop']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'site_title[tablet][letter_spacing]',
        array(
            'default'           => $typoDefaults['site_title']['tablet']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'site_title[mobile][letter_spacing]',
        array(
            'default'           => $typoDefaults['site_title']['mobile']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'site_title[letter_spacing]',
            array(
                'label'    => __( 'Letter Spacing', 'shopexcel' ),
                'section'  => 'title_tagline',
                'settings' => array(
                    'desktop' => 'site_title[desktop][letter_spacing]',
                    'tablet'  => 'site_title[tablet][letter_spacing]',
                    'mobile'  => 'site_title[mobile][letter_spacing]',
                ),
                'priority' => 13,
                'group'    => 'site_title_group',
                'choices' => array(
                    'desktop' => array(
                        'max'  => 20,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                    'tablet' => array(
                        'max'  => 20,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                    'mobile' => array(
                        'max'  => 20,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                ),
            )
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'site_title_typography_weight',
            array(
                'section'  => 'title_tagline',
                'settings' => array(
                    'weight'    => 'site_title[weight]'
                ),
                'priority' => 13,
                'group'    => 'site_title_group',
            )
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'site_title_typography_transform',
            array(
                'section'  => 'title_tagline',
                'settings' => array(
                    'transform' => 'site_title[transform]',
                ),
                'priority' => 13,
                'group'    => 'site_title_group',
            )
        )
    );


    /** Site Title Color*/
    $wp_customize->add_setting(
        'site_title_color',
        array(
            'default'           => $colorDefaults['site_title_color'],
            'transport'         => 'postMessage',
            'sanitize_callback' => 'shopexcel_sanitize_rgba',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Alpha_Color_Customize_Control(
            $wp_customize,
            'site_title_color',
            array(
                'label'    => __( 'Site Title Color', 'shopexcel' ),
                'section'  => 'title_tagline',
                'priority' => 14,
            )
        )
    );

    /** Site Title Color*/
    $wp_customize->add_setting( 
        'site_tagline_color', 
        array(
            'default'           => $colorDefaults['site_tagline_color'],
            'sanitize_callback' => 'shopexcel_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Shopexcel_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'site_tagline_color', 
            array(
                'label'       => __( 'Site Tagline Color', 'shopexcel' ),
                'section'     => 'title_tagline',
                'priority'    => 14,
            )
        )
    );
    
}
endif;
add_action( 'customize_register', 'shopexcel_customize_register' );