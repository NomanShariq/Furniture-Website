<?php
/**
 * Shopexcel Appearance Settings
 *
 * @package Shopexcel
 */
if ( ! function_exists( 'shopexcel_customize_register_typography' ) ) : 

function shopexcel_customize_register_typography( $wp_customize ) {
    $defaults      = shopexcel_get_typography_defaults();
    $fontsdefaults = shopexcel_get_general_defaults();
    
    /** Typography */
    $wp_customize->add_section(
        'typography_settings',
        array(
            'title'    => __( 'Typography', 'shopexcel' ),
            'priority' => 10
        )
    );
    
    /** Primary Font */
    /** Primary Font Group */
    $wp_customize->add_setting(
        'primary_font_group',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Group_Control( 
            $wp_customize,
            'primary_font_group',
            array(
                'id'          => 'primary_font_group',
                'label'       => __( 'Base Font', 'shopexcel' ),
                'section'     => 'typography_settings',
                'type'        => 'group',
                'style'       => 'collapsible',
            )
        )
    );

    $wp_customize->add_setting(
        'primary_font[family]',
        array(
            'default'           => $defaults['primary_font']['family'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'primary_font[variants]',
        array(
            'default'           => $defaults['primary_font']['variants'],
            'sanitize_callback' => 'shopexcel_sanitize_variants',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'primary_font[category]',
        array(
            'default'           => $defaults['primary_font']['category'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'primary_font[weight]',
        array(
            'default'           => $defaults['primary_font']['weight'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'primary_font[transform]',
        array(
            'default'           => $defaults['primary_font']['transform'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',

        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'primary_font_typography',
            array(
                'section'  => 'typography_settings',
                'settings' => array(
                    'family'    => 'primary_font[family]',
                    'variant'   => 'primary_font[variants]',
                    'category'  => 'primary_font[category]',
                ),
                'group'    => 'primary_font_group',
            )
        )
    );
    
    /** Primary Font Size */
    $wp_customize->add_setting(
        'primary_font[desktop][font_size]',
        array(
            'default'           => $defaults['primary_font']['desktop']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'primary_font[tablet][font_size]',
        array(
            'default'           => $defaults['primary_font']['tablet']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'primary_font[mobile][font_size]',
        array(
            'default'           => $defaults['primary_font']['mobile']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'primary_font[font_size]',
            array(
                'label'    => __( 'Size', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'primary_font[desktop][font_size]',
                    'tablet'  => 'primary_font[tablet][font_size]',
                    'mobile'  => 'primary_font[mobile][font_size]',
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
                'group'    => 'primary_font_group',
            )
        )
    );

    /** Primary Font Line Height */
    $wp_customize->add_setting(
        'primary_font[desktop][line_height]',
        array(
            'default'           => $defaults['primary_font']['desktop']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_setting(
        'primary_font[tablet][line_height]',
        array(
            'default'           => $defaults['primary_font']['tablet']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_setting(
        'primary_font[mobile][line_height]',
        array(
            'default'           => $defaults['primary_font']['mobile']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'primary_font[line_height]',
            array(
                'label'    => __( 'Line Height', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'primary_font[desktop][line_height]',
                    'tablet' => 'primary_font[tablet][line_height]',
                    'mobile' => 'primary_font[mobile][line_height]',
                ),
                'group'    => 'primary_font_group',
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

    /** Primary Font Letter Spacing */
    $wp_customize->add_setting(
        'primary_font[desktop][letter_spacing]',
        array(
            'default'           => $defaults['primary_font']['desktop']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'primary_font[tablet][letter_spacing]',
        array(
            'default'           => $defaults['primary_font']['tablet']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'primary_font[mobile][letter_spacing]',
        array(
            'default'           => $defaults['primary_font']['mobile']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'primary_font[letter_spacing]',
            array(
                'label'    => __( 'Letter Spacing', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'primary_font[desktop][letter_spacing]',
                    'tablet'  => 'primary_font[tablet][letter_spacing]',
                    'mobile'  => 'primary_font[mobile][letter_spacing]',
                ),
                'group'    => 'primary_font_group',
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
            'primary_font_typography_weight',
            array(
                'section'  => 'typography_settings',
                'settings' => array(
                    'weight'    => 'primary_font[weight]',
                ),
                'group'    => 'primary_font_group',
            )
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'primary_font_typography_transform',
            array(
                'section'  => 'typography_settings',
                'settings' => array(
                    'transform' => 'primary_font[transform]',
                ),
                'group'    => 'primary_font_group',
            )
        )
    );

    /**===========================================
     * ======== Heading One Typography ========
     * ===========================================*/
    
    /** Heading 1 Group */
    $wp_customize->add_setting(
        'heading_one_group',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Group_Control( 
            $wp_customize,
            'heading_one_group',
            array(
                'id'          => 'heading_one_group',
                'label'       => __( 'H1 Heading', 'shopexcel' ),
                'section'     => 'typography_settings',
                'type'        => 'group',
                'style'       => 'collapsible',
            )
        )
    );
    
    $wp_customize->add_setting(
        'heading_one[family]',
        array(
            'default'           => $defaults['heading_one']['family'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'heading_one[variants]',
        array(
            'default'           => $defaults['heading_one']['variants'],
            'sanitize_callback' => 'shopexcel_sanitize_variants',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_one[category]',
        array(
            'default'           => $defaults['heading_one']['category'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'heading_one[weight]',
        array(
            'default'           => $defaults['heading_one']['weight'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_one[transform]',
        array(
            'default'           => $defaults['heading_one']['transform'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'headings_one_typography',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'family'    => 'heading_one[family]',
                    'variant'   => 'heading_one[variants]',
                    'category'  => 'heading_one[category]',
                ),
                'group' => 'heading_one_group'
            )
        )
    );
    
    /** Headings Font Size */
    $wp_customize->add_setting(
        'heading_one[desktop][font_size]',
        array(
            'default'           => $defaults['heading_one']['desktop']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_one[tablet][font_size]',
        array(
            'default'           => $defaults['heading_one']['tablet']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_one[mobile][font_size]',
        array(
            'default'           => $defaults['heading_one']['mobile']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_one[font_size]',
            array(
                'label'    => __( 'Size', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_one[desktop][font_size]',
                    'tablet'  => 'heading_one[tablet][font_size]',
                    'mobile'  => 'heading_one[mobile][font_size]',
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
                'group' => 'heading_one_group'
            )
        )
    );
    
    /** Headings Line Height */
    $wp_customize->add_setting(
        'heading_one[desktop][line_height]',
        array(
            'default'           => $defaults['heading_one']['desktop']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_one[tablet][line_height]',
        array(
            'default'           => $defaults['heading_one']['tablet']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_one[mobile][line_height]',
        array(
            'default'           => $defaults['heading_one']['mobile']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_one[line_height]',
            array(
                'label'    => __( 'Line Height', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_one[desktop][line_height]',
                    'tablet'  => 'heading_one[tablet][line_height]',
                    'mobile'  => 'heading_one[mobile][line_height]',
                ),
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
                'group' => 'heading_one_group'
            )
        )
    );

    /** Heading One Letter Spacing */
    $wp_customize->add_setting(
        'heading_one[desktop][letter_spacing]',
        array(
            'default'           => $defaults['heading_one']['desktop']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_one[tablet][letter_spacing]',
        array(
            'default'           => $defaults['heading_one']['tablet']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_one[mobile][letter_spacing]',
        array(
            'default'           => $defaults['heading_one']['mobile']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_one[letter_spacing]',
            array(
                'label'    => __( 'Letter Spacing', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_one[desktop][letter_spacing]',
                    'tablet'  => 'heading_one[tablet][letter_spacing]',
                    'mobile'  => 'heading_one[mobile][letter_spacing]',
                ),
                'group'    => 'heading_one_group',
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
            'headings_one_typography_weight',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'weight'    => 'heading_one[weight]',
                ),
                'group' => 'heading_one_group'
            )
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'headings_one_typography_transform',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'transform' => 'heading_one[transform]',
                ),
                'group' => 'heading_one_group'
            )
        )
    );

    /**===========================================
     * ======== Heading Two Typography ========
     * ===========================================*/
    
    /** Heading 2 Group */
    $wp_customize->add_setting(
        'heading_two_group',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Group_Control( 
            $wp_customize,
            'heading_two_group',
            array(
                'id'          => 'heading_two_group',
                'label'       => __( 'H2 Heading', 'shopexcel' ),
                'section'     => 'typography_settings',
                'type'        => 'group',
                'style'       => 'collapsible',
            )
        )
    );

    $wp_customize->add_setting(
        'heading_two[family]',
        array(
            'default'           => $defaults['heading_two']['family'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'heading_two[variants]',
        array(
            'default'           => $defaults['heading_two']['variants'],
            'sanitize_callback' => 'shopexcel_sanitize_variants',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_two[category]',
        array(
            'default'           => $defaults['heading_two']['category'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'heading_two[weight]',
        array(
            'default'           => $defaults['heading_two']['weight'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_two[transform]',
        array(
            'default'           => $defaults['heading_two']['transform'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'headings_two_typography',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'family'    => 'heading_two[family]',
                    'variant'   => 'heading_two[variants]',
                    'category'  => 'heading_two[category]',
                ),
                'group'    => 'heading_two_group',
            )
        )
    );
    
    /** Headings Two Font Size */
    $wp_customize->add_setting(
        'heading_two[desktop][font_size]',
        array(
            'default'           => $defaults['heading_two']['desktop']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_two[tablet][font_size]',
        array(
            'default'           => $defaults['heading_two']['tablet']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_two[mobile][font_size]',
        array(
            'default'           => $defaults['heading_two']['mobile']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_two[font_size]',
            array(
                'label'    => __( 'Size', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_two[desktop][font_size]',
                    'tablet'  => 'heading_two[tablet][font_size]',
                    'mobile'  => 'heading_two[mobile][font_size]',
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
                'group'    => 'heading_two_group',
            )
        )
    );
    
    /** Headings Line Height */
    $wp_customize->add_setting(
        'heading_two[desktop][line_height]',
        array(
            'default'           => $defaults['heading_two']['desktop']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_two[tablet][line_height]',
        array(
            'default'           => $defaults['heading_two']['tablet']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_two[mobile][line_height]',
        array(
            'default'           => $defaults['heading_two']['mobile']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_two[line_height]',
            array(
                'label'    => __( 'Line Height', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_two[desktop][line_height]',
                    'tablet'  => 'heading_two[tablet][line_height]',
                    'mobile'  => 'heading_two[mobile][line_height]',
                ),
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
                'group'    => 'heading_two_group',
            )
        )
    );

    /** Heading Two Letter Spacing */
    $wp_customize->add_setting(
        'heading_two[desktop][letter_spacing]',
        array(
            'default'           => $defaults['heading_two']['desktop']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_two[tablet][letter_spacing]',
        array(
            'default'           => $defaults['heading_two']['tablet']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_two[mobile][letter_spacing]',
        array(
            'default'           => $defaults['heading_two']['mobile']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_two[letter_spacing]',
            array(
                'label'    => __( 'Letter Spacing', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_two[desktop][letter_spacing]',
                    'tablet'  => 'heading_two[tablet][letter_spacing]',
                    'mobile'  => 'heading_two[mobile][letter_spacing]',
                ),
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
                'group'    => 'heading_two_group',
            )
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'headings_two_typography_weight',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'weight'    => 'heading_two[weight]',
                ),
                'group'    => 'heading_two_group',
            )
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'headings_two_typography_transform',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'transform' => 'heading_two[transform]',
                ),
                'group'    => 'heading_two_group',
            )
        )
    );

    /**===========================================
     * ======== Heading Three Typography ========
     * ===========================================*/
    
    /** Heading 3 Group */
    $wp_customize->add_setting(
        'heading_three_group',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Group_Control( 
            $wp_customize,
            'heading_three_group',
            array(
                'id'          => 'heading_three_group',
                'label'       => __( 'H3 Heading', 'shopexcel' ),
                'section'     => 'typography_settings',
                'type'        => 'group',
                'style'       => 'collapsible',
            )
        )
    );

    $wp_customize->add_setting(
        'heading_three[family]',
        array(
            'default'           => $defaults['heading_three']['family'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'heading_three[variants]',
        array(
            'default'           => $defaults['heading_three']['variants'],
            'sanitize_callback' => 'shopexcel_sanitize_variants',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_three[category]',
        array(
            'default'           => $defaults['heading_three']['category'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'heading_three[weight]',
        array(
            'default'           => $defaults['heading_three']['weight'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_three[transform]',
        array(
            'default'           => $defaults['heading_three']['transform'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'headings_three_typography',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'family'    => 'heading_three[family]',
                    'variant'   => 'heading_three[variants]',
                    'category'  => 'heading_three[category]',
                ),
                'group'    => 'heading_three_group',
            )
        )
    );
    
    /** Headings Three Font Size */
    $wp_customize->add_setting(
        'heading_three[desktop][font_size]',
        array(
            'default'           => $defaults['heading_three']['desktop']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_three[tablet][font_size]',
        array(
            'default'           => $defaults['heading_three']['tablet']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_three[mobile][font_size]',
        array(
            'default'           => $defaults['heading_three']['mobile']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_three[font_size]',
            array(
                'label'    => __( 'Size', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_three[desktop][font_size]',
                    'tablet'  => 'heading_three[tablet][font_size]',
                    'mobile'  => 'heading_three[mobile][font_size]',
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
                'group'    => 'heading_three_group',
            )
        )
    );
    
    /** Headings Three Line Height */
    $wp_customize->add_setting(
        'heading_three[desktop][line_height]',
        array(
            'default'           => $defaults['heading_three']['desktop']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_three[tablet][line_height]',
        array(
            'default'           => $defaults['heading_three']['tablet']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_three[mobile][line_height]',
        array(
            'default'           => $defaults['heading_three']['mobile']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_three[line_height]',
            array(
                'label'    => __( 'Line Height', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_three[desktop][line_height]',
                    'tablet'  => 'heading_three[tablet][line_height]',
                    'mobile'  => 'heading_three[mobile][line_height]',
                ),
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
                'group'    => 'heading_three_group',
            )
        )
    );

    /** Heading Three Letter Spacing */
    $wp_customize->add_setting(
        'heading_three[desktop][letter_spacing]',
        array(
            'default'           => $defaults['heading_three']['desktop']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_three[tablet][letter_spacing]',
        array(
            'default'           => $defaults['heading_three']['tablet']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_three[mobile][letter_spacing]',
        array(
            'default'           => $defaults['heading_three']['mobile']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_three[letter_spacing]',
            array(
                'label'    => __( 'Letter Spacing', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_three[desktop][letter_spacing]',
                    'tablet'  => 'heading_three[tablet][letter_spacing]',
                    'mobile'  => 'heading_three[mobile][letter_spacing]',
                ),
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
                'group'    => 'heading_three_group',
            )
        )
    );

    
    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'headings_three_typography_weight',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'weight'    => 'heading_three[weight]',
                ),
                'group'    => 'heading_three_group',
            )
        )
    );

    
    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'headings_three_typography_transform',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'transform' => 'heading_three[transform]',
                ),
                'group'    => 'heading_three_group',
            )
        )
    );

    /**===========================================
     * ======== Heading Four Typography ========
     * ===========================================*/
    
    /** Heading 4 Group */
    $wp_customize->add_setting(
        'heading_four_group',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Group_Control( 
            $wp_customize,
            'heading_four_group',
            array(
                'id'          => 'heading_four_group',
                'label'       => __( 'H4 Heading', 'shopexcel' ),
                'section'     => 'typography_settings',
                'type'        => 'group',
                'style'       => 'collapsible',
            )
        )
    );

    $wp_customize->add_setting(
        'heading_four[family]',
        array(
            'default'           => $defaults['heading_four']['family'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'heading_four[variants]',
        array(
            'default'           => $defaults['heading_four']['variants'],
            'sanitize_callback' => 'shopexcel_sanitize_variants',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_four[category]',
        array(
            'default'           => $defaults['heading_four']['category'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'heading_four[weight]',
        array(
            'default'           => $defaults['heading_four']['weight'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_four[transform]',
        array(
            'default'           => $defaults['heading_four']['transform'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'headings_four_typography',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'family'    => 'heading_four[family]',
                    'variant'   => 'heading_four[variants]',
                    'category'  => 'heading_four[category]',
                ),
                'group'    => 'heading_four_group',
            )
        )
    );

    /** Headings 4 Font Size */
    $wp_customize->add_setting(
        'heading_four[desktop][font_size]',
        array(
            'default'           => $defaults['heading_four']['desktop']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_four[tablet][font_size]',
        array(
            'default'           => $defaults['heading_four']['tablet']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_four[mobile][font_size]',
        array(
            'default'           => $defaults['heading_four']['mobile']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_four[font_size]',
            array(
                'label'    => __( 'Size', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_four[desktop][font_size]',
                    'tablet' => 'heading_four[tablet][font_size]',
                    'mobile' => 'heading_four[mobile][font_size]',
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
                'group'    => 'heading_four_group',
            )
        )
    );

    /** Headings Line Height */
    $wp_customize->add_setting(
        'heading_four[desktop][line_height]',
        array(
            'default'           => $defaults['heading_four']['desktop']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_four[tablet][line_height]',
        array(
            'default'           => $defaults['heading_four']['tablet']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_four[mobile][line_height]',
        array(
            'default'           => $defaults['heading_four']['mobile']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_four[line_height]',
            array(
                'label'    => __( 'Line Height', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_four[desktop][line_height]',
                    'tablet'  => 'heading_four[tablet][line_height]',
                    'mobile'  => 'heading_four[mobile][line_height]',
                ),
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
                'group'    => 'heading_four_group',
            )
        )
    );

    /** Heading Four Letter Spacing */
    $wp_customize->add_setting(
        'heading_four[desktop][letter_spacing]',
        array(
            'default'           => $defaults['heading_four']['desktop']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_four[tablet][letter_spacing]',
        array(
            'default'           => $defaults['heading_four']['tablet']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_four[mobile][letter_spacing]',
        array(
            'default'           => $defaults['heading_four']['mobile']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_four[letter_spacing]',
            array(
                'label'    => __( 'Letter Spacing', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_four[desktop][letter_spacing]',
                    'tablet'  => 'heading_four[tablet][letter_spacing]',
                    'mobile'  => 'heading_four[mobile][letter_spacing]',
                ),
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
                'group'    => 'heading_four_group',
            )
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'headings_four_typography_weight',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'weight'    => 'heading_four[weight]',
                ),
                'group'    => 'heading_four_group',
            )
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'headings_four_typography_transform',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'transform' => 'heading_four[transform]',
                ),
                'group'    => 'heading_four_group',
            )
        )
    );

    /**===========================================
     * ======== Heading Five Typography ========
     * ===========================================*/
    
    /** Heading 5 Group */
    $wp_customize->add_setting(
        'heading_five_group',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Group_Control( 
            $wp_customize,
            'heading_five_group',
            array(
                'id'          => 'heading_five_group',
                'label'       => __( 'H5 Heading', 'shopexcel' ),
                'section'     => 'typography_settings',
                'type'        => 'group',
                'style'       => 'collapsible',
            )
        )
    );

    $wp_customize->add_setting(
        'heading_five[family]',
        array(
            'default'           => $defaults['heading_five']['family'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'heading_five[variants]',
        array(
            'default'           => $defaults['heading_five']['variants'],
            'sanitize_callback' => 'shopexcel_sanitize_variants',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_five[category]',
        array(
            'default'           => $defaults['heading_five']['category'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'heading_five[weight]',
        array(
            'default'           => $defaults['heading_five']['weight'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_five[transform]',
        array(
            'default'           => $defaults['heading_five']['transform'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'headings_five_typography',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'family'    => 'heading_five[family]',
                    'variant'   => 'heading_five[variants]',
                    'category'  => 'heading_five[category]',
                ),
                'group'    => 'heading_five_group',
            )
        )
    );

    /** Headings 5 Font Size */
    $wp_customize->add_setting(
        'heading_five[desktop][font_size]',
        array(
            'default'           => $defaults['heading_five']['desktop']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_five[tablet][font_size]',
        array(
            'default'           => $defaults['heading_five']['tablet']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_five[mobile][font_size]',
        array(
            'default'           => $defaults['heading_five']['mobile']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_five[font_size]',
            array(
                'label'    => __( 'Size', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_five[desktop][font_size]',
                    'tablet'  => 'heading_five[tablet][font_size]',
                    'mobile'  => 'heading_five[mobile][font_size]',
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
                'group'    => 'heading_five_group',
            )
        )
    );

    /** Headings Line Height */
    $wp_customize->add_setting(
        'heading_five[desktop][line_height]',
        array(
            'default'           => $defaults['heading_five']['desktop']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_five[tablet][line_height]',
        array(
            'default'           => $defaults['heading_five']['tablet']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_five[mobile][line_height]',
        array(
            'default'           => $defaults['heading_five']['mobile']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_five[line_height]',
            array(
                'label'    => __( 'Line Height', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_five[desktop][line_height]',
                    'tablet'  => 'heading_five[tablet][line_height]',
                    'mobile'  => 'heading_five[mobile][line_height]',
                ),
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
                'group'    => 'heading_five_group',
            )
        )
    );

    /** Heading Five Letter Spacing */
    $wp_customize->add_setting(
        'heading_five[desktop][letter_spacing]',
        array(
            'default'           => $defaults['heading_five']['desktop']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_five[tablet][letter_spacing]',
        array(
            'default'           => $defaults['heading_five']['tablet']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_five[mobile][letter_spacing]',
        array(
            'default'           => $defaults['heading_five']['mobile']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_five[letter_spacing]',
            array(
                'label'    => __( 'Letter Spacing', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_five[desktop][letter_spacing]',
                    'tablet'  => 'heading_five[tablet][letter_spacing]',
                    'mobile'  => 'heading_five[mobile][letter_spacing]',
                ),
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
                'group'    => 'heading_five_group',
            )
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'headings_five_typography_weight',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'weight'    => 'heading_five[weight]',
                ),
                'group'    => 'heading_five_group',
            )
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'headings_five_typography_transform',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'transform' => 'heading_five[transform]',
                ),
                'group'    => 'heading_five_group',
            )
        )
    );

    /**===========================================
     * ======== Heading Six Typography ========
     * ===========================================*/
    
    /** Heading 5 Group */
    $wp_customize->add_setting(
        'heading_six_group',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Group_Control( 
            $wp_customize,
            'heading_six_group',
            array(
                'id'          => 'heading_six_group',
                'label'       => __( 'H6 Heading', 'shopexcel' ),
                'section'     => 'typography_settings',
                'type'        => 'group',
                'style'       => 'collapsible',
            )
        )
    );

    $wp_customize->add_setting(
        'heading_six[family]',
        array(
            'default'           => $defaults['heading_six']['family'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'heading_six[variants]',
        array(
            'default'           => $defaults['heading_six']['variants'],
            'sanitize_callback' => 'shopexcel_sanitize_variants',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_six[category]',
        array(
            'default'           => $defaults['heading_six']['category'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'heading_six[weight]',
        array(
            'default'           => $defaults['heading_six']['weight'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_six[transform]',
        array(
            'default'           => $defaults['heading_six']['transform'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'headings_six_typography',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'family'    => 'heading_six[family]',
                    'variant'   => 'heading_six[variants]',
                    'category'  => 'heading_six[category]',
                ),
                'group'    => 'heading_six_group',
            )
        )
    );

    /** Headings 6 Font Size */
    $wp_customize->add_setting(
        'heading_six[desktop][font_size]',
        array(
            'default'           => $defaults['heading_six']['desktop']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_six[tablet][font_size]',
        array(
            'default'           => $defaults['heading_six']['tablet']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_six[mobile][font_size]',
        array(
            'default'           => $defaults['heading_six']['mobile']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_six[font_size]',
            array(
                'label'    => __( 'Size', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_six[desktop][font_size]',
                    'tablet'  => 'heading_six[tablet][font_size]',
                    'mobile'  => 'heading_six[mobile][font_size]',
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
                'group'    => 'heading_six_group',
            )
        )
    );

    /** Headings Line Height */
    $wp_customize->add_setting(
        'heading_six[desktop][line_height]',
        array(
            'default'           => $defaults['heading_six']['desktop']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_six[tablet][line_height]',
        array(
            'default'           => $defaults['heading_six']['tablet']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_six[mobile][line_height]',
        array(
            'default'           => $defaults['heading_six']['mobile']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_six[line_height]',
            array(
                'label'    => __( 'Line Height', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_six[desktop][line_height]',
                    'tablet'  => 'heading_six[tablet][line_height]',
                    'mobile'  => 'heading_six[mobile][line_height]',
                ),
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
                'group'    => 'heading_six_group',
            )
        )
    );

    /** Heading Six Letter Spacing */
    $wp_customize->add_setting(
        'heading_six[desktop][letter_spacing]',
        array(
            'default'           => $defaults['heading_six']['desktop']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_six[tablet][letter_spacing]',
        array(
            'default'           => $defaults['heading_six']['tablet']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'heading_six[mobile][letter_spacing]',
        array(
            'default'           => $defaults['heading_six']['mobile']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'heading_six[letter_spacing]',
            array(
                'label'    => __( 'Letter Spacing', 'shopexcel' ),
                'section'  => 'typography_settings',
                'settings' => array(
                    'desktop' => 'heading_six[desktop][letter_spacing]',
                    'tablet'  => 'heading_six[tablet][letter_spacing]',
                    'mobile'  => 'heading_six[mobile][letter_spacing]',
                ),
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
                'group'    => 'heading_six_group',
            )
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'headings_six_typography_weight',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'weight'    => 'heading_six[weight]'
                ),
                'group'    => 'heading_six_group',
            )
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'headings_six_typography_transform',
            array(
                'section'  => 'typography_settings',
                'priority' => 10,
                'settings' => array(
                    'transform' => 'heading_six[transform]',
                ),
                'group'    => 'heading_six_group',
            )
        )
    );

    /* Load Google Fonts Locally */
    $wp_customize->add_setting(
        'ed_localgoogle_fonts',
        array(
            'default'           => $fontsdefaults['ed_localgoogle_fonts'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Shopexcel_Toggle_Control( 
            $wp_customize,
            'ed_localgoogle_fonts',
            array(
                'section'     => 'typography_settings',
                'label'       => __( 'Load Google Fonts Locally', 'shopexcel' ),
                'description' => __( 'This will load Google fonts from your server to speed up your site.', 'shopexcel' )
            )
        )
    );

    /* Preload Local Fonts */
    $wp_customize->add_setting(
        'ed_preload_local_fonts',
        array(
            'default'           => $fontsdefaults['ed_preload_local_fonts'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Shopexcel_Toggle_Control( 
            $wp_customize,
            'ed_preload_local_fonts',
            array(
                'section'         => 'typography_settings',
                'label'           => __( 'Preload Local Fonts', 'shopexcel' ),
                'description'     => __( 'Preloading Google fonts will speed up your website speed.', 'shopexcel' ),
                'active_callback' => 'shopexcel_performance_fonts'
            )
        )
    );

    $wp_customize->add_setting(
        'flush_google_fonts',
        array(
            'sanitize_callback' => 'wp_kses_post',
        )
    );

    $wp_customize->add_control(
        'flush_google_fonts',
        array(
            'label'       => __( 'Flush Local Fonts Cache', 'shopexcel' ),
            'description' => __( 'Click the button to reset the local fonts cache.', 'shopexcel' ),
            'type'        => 'button',
            'settings'    => array(),
            'section'     => 'typography_settings',
            'input_attrs' => array(
                'value' => __( 'Flush Local Fonts Cache', 'shopexcel' ),
                'class' => 'button button-primary flush-it',
            ),
            'active_callback' => 'shopexcel_performance_fonts'
        )
    );
}
endif;
add_action( 'customize_register', 'shopexcel_customize_register_typography' );