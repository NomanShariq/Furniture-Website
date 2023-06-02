<?php
/**
 * Button Settings
 *
 * @package Shopexcel
*/
if ( ! function_exists( 'shopexcel_customize_register_general_button' ) ) : 

function shopexcel_customize_register_general_button( $wp_customize ){
    $btnDefault    = shopexcel_get_button_defaults();
    $typoDefaults  = shopexcel_get_typography_defaults();
    $colorDefaults = shopexcel_get_color_defaults();

    $wp_customize->add_section( 
        'general_button_section',
        array(
            'priority' => 40,
            'title'    => __( 'Button', 'shopexcel' ),
            'panel'    => 'general_settings'
        ) 
    );

    $wp_customize->add_setting(
        'button_tabs_settings',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        new Customizer_Tabs_Control(
            $wp_customize, 'button_tabs_settings', array(
            'section' => 'general_button_section',
                'tabs'    => array(
                    'general' => array(
                        'nicename' => esc_html__( 'General', 'shopexcel' ),
                        'controls' => array(
                            'button_roundness',
                            'button_padding',
                            'btn_typography_group',
                        ),
                    ),
                    'design' => array(
                        'nicename' => esc_html__( 'Design', 'shopexcel' ),
                        'controls' => array(
                            'btn_initial_state_text',
                            'btn_text_color_initial',
                            'btn_bg_color_initial',
                            'btn_border_color_initial',
                            'btn_hover_state_text',
                            'btn_text_color_hover',
                            'btn_bg_color_hover',
                            'btn_border_color_hover',
                        ),
                    )
                ),
            )
        )
    );

    /** Button Roundness */    
    $wp_customize->add_setting(
        'button_roundness[top]',
        array(
            'default'           => $btnDefault['button_roundness']['top'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'button_roundness[right]',
        array(
            'default'           => $btnDefault['button_roundness']['right'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'button_roundness[bottom]',
        array(
            'default'           => $btnDefault['button_roundness']['bottom'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'button_roundness[left]',
        array(
            'default'           => $btnDefault['button_roundness']['left'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );   

    $wp_customize->add_control(
        new Shopexcel_Spacing_Control(
            $wp_customize,
            'button_roundness',
            array(
                'type'     => 'shopexcel-spacing',
                'label'    => __( 'Button Roundness', 'shopexcel' ),
                'section'  => 'general_button_section',
                'settings' => array(
                    'desktop_top'    => 'button_roundness[top]',
                    'desktop_right'  => 'button_roundness[right]',
                    'desktop_bottom' => 'button_roundness[bottom]',
                    'desktop_left'   => 'button_roundness[left]',
                ),
                'element'  => 'button',
            )
        )
    );

    /** Button Padding */

    $wp_customize->add_setting(
        'button_padding[top]',
        array(
            'default'           => $btnDefault['button_padding']['top'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'button_padding[right]',
        array(
            'default'           => $btnDefault['button_padding']['right'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'button_padding[bottom]',
        array(
            'default'           => $btnDefault['button_padding']['bottom'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'button_padding[left]',
        array(
            'default'           => $btnDefault['button_padding']['left'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );   

    $wp_customize->add_control(
        new Shopexcel_Spacing_Control(
            $wp_customize,
            'button_padding',
            array(
                'type'     => 'shopexcel-spacing',
                'label'    => esc_html__( 'Button Padding', 'shopexcel' ),
                'section'  => 'general_button_section',
                'settings' => array(
                    'desktop_top'    => 'button_padding[top]',
                    'desktop_right'  => 'button_padding[right]',
                    'desktop_bottom' => 'button_padding[bottom]',
                    'desktop_left'   => 'button_padding[left]',
                ),
                'element'  => 'button',
            )
        )
    );

    /**
     *  Button Typography
     */

    $wp_customize->add_setting(
        'btn_typography_group',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Group_Control( 
            $wp_customize,
            'btn_typography_group',
            array(
                'id'          => 'btn_typography_group',
                'label'       => __( 'Button Typography', 'shopexcel' ),
                'section'     => 'general_button_section',
                'type'        => 'group',
                'style'       => 'collapsible',
            )
        )
    );

    $wp_customize->add_setting(
        'button[family]',
        array(
            'default'           => $typoDefaults['button']['family'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'button[variants]',
        array(
            'default'           => $typoDefaults['button']['variants'],
            'sanitize_callback' => 'shopexcel_sanitize_variants',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'button[category]',
        array(
            'default'           => $typoDefaults['button']['category'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_setting(
        'button[weight]',
        array(
            'default'           => $typoDefaults['button']['weight'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'button[transform]',
        array(
            'default'           => $typoDefaults['button']['transform'],
            'sanitize_callback' => 'sanitize_key',
            'transport'         => 'postMessage',

        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'button_typography',
            array(
                'section'  => 'general_button_section',
                'settings' => array(
                    'family'    => 'button[family]',
                    'variant'   => 'button[variants]',
                    'category'  => 'button[category]'
                ),
                'group' => 'btn_typography_group'
            )
        )
    );
    
    /** Site Title Font Size */
    $wp_customize->add_setting(
        'button[desktop][font_size]',
        array(
            'default'           => $typoDefaults['button']['desktop']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'button[tablet][font_size]',
        array(
            'default'           => $typoDefaults['button']['tablet']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'button[mobile][font_size]',
        array(
            'default'           => $typoDefaults['button']['mobile']['font_size'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'button[font_size]',
            array(
                'label'    => __( 'Size', 'shopexcel' ),
                'section'  => 'general_button_section',
                'settings' => array(
                    'desktop' => 'button[desktop][font_size]',
                    'tablet'  => 'button[tablet][font_size]',
                    'mobile'  => 'button[mobile][font_size]',
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
                'group' => 'btn_typography_group'
            )
        )
    );

    $wp_customize->add_setting(
        'button[desktop][line_height]',
        array(
            'default'           => $typoDefaults['button']['desktop']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'button[tablet][line_height]',
        array(
            'default'           => $typoDefaults['button']['tablet']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'button[mobile][line_height]',
        array(
            'default'           => $typoDefaults['button']['mobile']['line_height'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_floatval',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'button[line_height]',
            array(
                'label'    => __( 'Line Height', 'shopexcel' ),
                'section'  => 'general_button_section',
                'settings' => array(
                    'desktop' => 'button[desktop][line_height]',
                    'tablet'  => 'button[tablet][line_height]',
                    'mobile'  => 'button[mobile][line_height]',
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
                'group' => 'btn_typography_group'
            )
        )
    );

    /** Heading Five Letter Spacing */
    $wp_customize->add_setting(
        'button[desktop][letter_spacing]',
        array(
            'default'           => $typoDefaults['button']['desktop']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'button[tablet][letter_spacing]',
        array(
            'default'           => $typoDefaults['button']['tablet']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'button[mobile][letter_spacing]',
        array(
            'default'           => $typoDefaults['button']['mobile']['letter_spacing'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'button[letter_spacing]',
            array(
                'label'    => __( 'Letter Spacing', 'shopexcel' ),
                'section'  => 'general_button_section',
                'settings' => array(
                    'desktop' => 'button[desktop][letter_spacing]',
                    'tablet'  => 'button[tablet][letter_spacing]',
                    'mobile'  => 'button[mobile][letter_spacing]',
                ),
                'choices' => array(
                    'desktop' => array(
                        'min'  => 1,
                        'max'  => 20,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                    'tablet' => array(
                        'min'  => 1,
                        'max'  => 20,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                    'mobile' => array(
                        'min'  => 1,
                        'max'  => 20,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                ),
                'group' => 'btn_typography_group'
            )
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'general_button_section_weight',
            array(
                'section'  => 'general_button_section',
                'settings' => array(
                    'weight'    => 'button[weight]'
                ),
                'group' => 'btn_typography_group'
            )
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Typography_Customize_Control(
            $wp_customize,
            'general_button_section_transform',
            array(
                'section'  => 'general_button_section',
                'settings' => array(
                    'transform' => 'button[transform]',
                ),
                'group' => 'btn_typography_group'
            )
        )
    );

    /**
     *  Button Appearance
     */

    $wp_customize->add_setting(
        'btn_initial_state_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Shopexcel_Note_Control( 
            $wp_customize,
            'btn_initial_state_text',
            array(
                'section'   => 'general_button_section',
                'label'     => sprintf( __( '%1$sButton Initial State%2$s', 'shopexcel' ), '<span class="shply-customizer-title">', '</span>'),
            )
        )
    );

    $wp_customize->add_setting(
        'btn_text_color_initial',
        array(
            'default'           => $colorDefaults['btn_text_color_initial'],
            'transport'         => 'postMessage',
            'sanitize_callback' => 'shopexcel_sanitize_rgba',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Alpha_Color_Customize_Control(
            $wp_customize,
            'btn_text_color_initial',
            array(
                'label'    => __( 'Text Color', 'shopexcel' ),
                'section'  => 'general_button_section'
            )
        )
    );

    $wp_customize->add_setting(
        'btn_bg_color_initial',
        array(
            'default'           => $colorDefaults['btn_bg_color_initial'],
            'transport'         => 'postMessage',
            'sanitize_callback' => 'shopexcel_sanitize_rgba',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Alpha_Color_Customize_Control(
            $wp_customize,
            'btn_bg_color_initial',
            array(
                'label'   => __( 'Background', 'shopexcel' ),
                'section' => 'general_button_section',
            )
        )
    );

    $wp_customize->add_setting(
        'btn_border_color_initial',
        array(
            'default'           => $colorDefaults['btn_border_color_initial'],
            'transport'         => 'postMessage',
            'sanitize_callback' => 'shopexcel_sanitize_rgba',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Alpha_Color_Customize_Control(
            $wp_customize,
            'btn_border_color_initial',
            array(
                'label'   => __( 'Border', 'shopexcel' ),
                'section' => 'general_button_section'
            )
        )
    );

    $wp_customize->add_setting(
        'btn_hover_state_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Shopexcel_Note_Control( 
            $wp_customize,
            'btn_hover_state_text',
            array(
                'section'   => 'general_button_section',
                'label'     => sprintf( __( '%1$sButton Hover State%1$s', 'shopexcel' ), '<span class="shply-customizer-title">', '</span>'),
            )
        )
    );

    $wp_customize->add_setting(
        'btn_text_color_hover',
        array(
            'default'           => $colorDefaults['btn_text_color_hover'],
            'transport'         => 'postMessage',
            'sanitize_callback' => 'shopexcel_sanitize_rgba',
        )
    );
    
    $wp_customize->add_control(
        new Shopexcel_Alpha_Color_Customize_Control(
            $wp_customize,
            'btn_text_color_hover',
            array(
                'label'   => __( 'Text Color', 'shopexcel' ),
                'section' => 'general_button_section'
            )
        )
    );

    $wp_customize->add_setting(
        'btn_bg_color_hover',
        array(
            'default'           => $colorDefaults['btn_bg_color_hover'],
            'transport'         => 'postMessage',
            'sanitize_callback' => 'shopexcel_sanitize_rgba',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Alpha_Color_Customize_Control(
            $wp_customize,
            'btn_bg_color_hover',
            array(
                'label'   => __( 'Background', 'shopexcel' ),
                'section' => 'general_button_section'
            )
        )
    );

    $wp_customize->add_setting(
        'btn_border_color_hover',
        array(
            'default'           => $colorDefaults['btn_border_color_hover'],
            'transport'         => 'postMessage',
            'sanitize_callback' => 'shopexcel_sanitize_rgba',
        )
    );
    
    $wp_customize->add_control(
        new Shopexcel_Alpha_Color_Customize_Control(
            $wp_customize,
            'btn_border_color_hover',
            array(
                'label'   => __( 'Border', 'shopexcel' ),
                'section' => 'general_button_section'
            )
        )
    );
}
endif;
add_action( 'customize_register', 'shopexcel_customize_register_general_button' );