<?php
/**
 * Header Setting
 *
 * @package Shopexcel
 */
if ( ! function_exists( 'shopexcel_customize_register_header_general_settings' ) ) : 

function shopexcel_customize_register_header_general_settings( $wp_customize ) {    
    $defaults = shopexcel_get_general_defaults();

    /** Header Settings */
    $wp_customize->add_section(
        'header_settings',
        array(
            'title'    => __( 'General', 'shopexcel' ),
            'priority' => 10,
            'panel'    => 'main_header_settings',
        )
    );
    
    /** Enable Header Search */
    $wp_customize->add_setting( 
        'ed_header_search', 
        array(
            'default'           => $defaults['ed_header_search'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'ed_header_search',
			array(
				'section'     => 'header_settings',
				'label'	      => __( 'Header Search', 'shopexcel' ),
			)
		)
	);
    
    /** Phone Label*/
    $wp_customize->add_setting(
        'header_phone_label',
        array(
            'default'           => $defaults['header_phone_label'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'header_phone_label',
        array(
            'type'    => 'text',
            'section' => 'header_settings',
            'label'   => __( 'Phone Label', 'shopexcel' ),
            'priority' => 11,
        )
    );

    $wp_customize->selective_refresh->add_partial( 'header_phone_label', array(
        'selector'        => '.contact-phone-label',
        'render_callback' => 'shopexcel_header_phone_label',
    ) );

    /** Phone */
    $wp_customize->add_setting(
        'header_phone',
        array(
            'default'           => $defaults['header_phone'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'header_phone',
        array(
            'type'    => 'text',
            'section' => 'header_settings',
            'label'   => __( 'Phone Number', 'shopexcel' ),
            'priority' => 11,
        )
    );

    $wp_customize->selective_refresh->add_partial( 'header_phone', array(
        'selector'        => '.contact-phone-wrap',
        'render_callback' => 'shopexcel_header_phone_partial',
    ) );
    
    if( shopexcel_is_woocommerce_activated() ){
        /** Enable WooCommerce Account */
        $wp_customize->add_setting( 
            'ed_woo_account', 
            array(
                'default'           => $defaults['ed_woo_account'],
                'sanitize_callback' => 'shopexcel_sanitize_checkbox'
            ) 
        );
        
        $wp_customize->add_control(
            new Shopexcel_Toggle_Control( 
                $wp_customize,
                'ed_woo_account',
                array(
                    'section' => 'header_settings',
                    'label'   => __( 'Show My Account', 'shopexcel' ),
                    'priority' => 14,
                )
            )
        );

        /** Enable WooCommerce Wishlist */
        $wp_customize->add_setting( 
            'ed_woo_wishlist', 
            array(
                'default'           => $defaults['ed_woo_wishlist'],
                'sanitize_callback' => 'shopexcel_sanitize_checkbox'
            ) 
        );
        
        $wp_customize->add_control(
            new Shopexcel_Toggle_Control( 
                $wp_customize,
                'ed_woo_wishlist',
                array(
                    'section' => 'header_settings',
                    'label'   => __( 'Show Wishlist', 'shopexcel' ),
                    'priority' => 15,
                )
            )
        );

        /** Enable WooCommerce Cart */
        $wp_customize->add_setting( 
            'ed_woo_cart', 
            array(
                'default'           => $defaults['ed_woo_cart'],
                'sanitize_callback' => 'shopexcel_sanitize_checkbox'
            ) 
        );
        
        $wp_customize->add_control(
            new Shopexcel_Toggle_Control( 
                $wp_customize,
                'ed_woo_cart',
                array(
                    'section' => 'header_settings',
                    'label'   => __( 'Show Cart', 'shopexcel' ),
                    'priority' => 16,
                )
            )
        );
    } else{
        $wp_customize->add_setting(
			'woocommerce_recommend',
			array(
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			new Shopexcel_Plugin_Recommend_Control(
				$wp_customize,
				'woocommerce_recommend',
				array(
					'section'     => 'header_settings',
					'capability'  => 'install_plugins',
					'plugin_slug' => 'woocommerce',//This is the slug of recommended plugin.
					'description' => sprintf( __( 'Please install and activate the recommended plugin %1$sWooCommerce%2$s. After that, option related with this section will be visible.', 'shopexcel' ), '<strong>', '</strong>' ),
                    'priority'    => -1,
                )
			)
		);
    }
    // /** Header Settings Ends */
}
endif;
add_action( 'customize_register', 'shopexcel_customize_register_header_general_settings' );