<?php
/**
 * Title Setting
 *
 * @package Shopexcel
 */
if ( ! function_exists( 'shopexcel_customize_register_titleofcustomizer_section' ) ) : 

function shopexcel_customize_register_titleofcustomizer_section( $wp_customize ) {

    $wp_customize->add_section(
		new Shopexcel_Group_Title(
			$wp_customize,
			'core',
            array(
                'title'    => __( 'Core', 'shopexcel' ),
                'priority' => 99,
            )
		)
	);

	$wp_customize->add_section(
		new Shopexcel_Group_Title(
			$wp_customize,
			'general',
            array(
                'title' => __( 'General Settings', 'shopexcel' ),
				'priority' => 5,
            )
		)
	);

	$wp_customize->add_section(
		new Shopexcel_Group_Title(
			$wp_customize,
			'posts',
            array(
                'title' => __( 'Posts and Pages', 'shopexcel' ),
				'priority' => 45,
            )
		)
	);

	if( shopexcel_pro_is_activated() ){
		$wp_customize->add_section(
			new Shopexcel_Group_Title(
				$wp_customize,
				'misc_settings',
				array(
					'title' => __( 'Additional Settings', 'shopexcel' ),
					'priority' => 70,
				)
			)
		);
	}

}
endif;
add_action( 'customize_register', 'shopexcel_customize_register_titleofcustomizer_section' );