<?php
/**
 * Instagram Settings
 *
 * @package Shopexcel
 */
if ( ! function_exists( 'shopexcel_customize_register_general_instagram' ) ) : 

function shopexcel_customize_register_general_instagram( $wp_customize ) {
    $defaults = shopexcel_get_general_defaults();

    /** Instagram Settings */
    $wp_customize->add_section(
        'instagram_settings',
        array(
            'title'    => __( 'Instagram Settings', 'shopexcel' ),
            'priority' => 40,
        )
    );
    
    if( shopexcel_is_btif_activated() ){
        /** Enable Instagram Section */
        $wp_customize->add_setting( 
            'ed_instagram', 
            array(
                'default'           => $defaults['ed_instagram'],
                'sanitize_callback' => 'shopexcel_sanitize_checkbox'
            ) 
        );
        
        $wp_customize->add_control(
            new Shopexcel_Toggle_Control( 
                $wp_customize,
                'ed_instagram',
                array(
                    'section'     => 'instagram_settings',
                    'label'	      => __( 'Instagram Section', 'shopexcel' ),
                    'description' => __( 'Enable to show Instagram Section', 'shopexcel' ),
                )
            )
        );
        
        /** Note */
        $wp_customize->add_setting(
            'instagram_text',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post' 
            )
        );
        
        $wp_customize->add_control(
            new Shopexcel_Note_Control( 
                $wp_customize,
                'instagram_text',
                array(
                    'section'	  => 'instagram_settings',
                    'description' => sprintf( __( 'You can change the setting BlossomThemes Social Feed %1$sfrom here%2$s.', 'shopexcel' ), '<a href="' . esc_url( admin_url( 'admin.php?page=class-blossomthemes-instagram-feed-admin.php' ) ) . '" target="_blank">', '</a>' )
                )
            )
        );        
    }else{
        $wp_customize->add_setting(
			'instagram_recommend',
			array(
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			new Shopexcel_Plugin_Recommend_Control(
				$wp_customize,
				'instagram_recommend',
				array(
					'section'     => 'instagram_settings',
					'capability'  => 'install_plugins',
					'plugin_slug' => 'blossomthemes-instagram-feed',//This is the slug of recommended plugin.
					'description' => sprintf( __( 'Please install and activate the recommended plugin %1$sBlossomThemes Social Feed%2$s. After that, option related with this section will be visible.', 'shopexcel' ), '<strong>', '</strong>' ),
				)
			)
		);
    }
    
}
endif;
add_action( 'customize_register', 'shopexcel_customize_register_general_instagram' );