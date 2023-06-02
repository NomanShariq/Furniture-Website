<?php
/**
 * Shopexcel Theme Customizer
 *
 * @package Shopexcel
 */

/**
 * Requiring customizer panels & sections
*/
$shopexcel_sections     = array(  'info', 'layout', 'site', 'appearance', 'title', 'colors', 'social-network', 'seo', 'instagram', 'blogpage', 'singlepage','archive', 'singlepost' );
$shopexcel_panels       = array( 'general', 'header', 'footer' );
$shopexcel_sub_sections = array(
    'general' => array( 'container', 'sidebar', 'scroll-to-top', 'button'),
	'header'  => array( 'general-header', 'social-media' ),
	'footer'  => array( 'footer-info', 'footer' ),
);
foreach( $shopexcel_panels as $p ){
    require get_template_directory() . '/inc/customizer/' . $p . '.php';
}

foreach( $shopexcel_sub_sections as $key => $sections ){
    foreach( $sections as $section ){        
        require get_template_directory() . '/inc/customizer/panels/' . $key . '/' . $section . '.php';
    }
}

foreach( $shopexcel_sections as $section ){
    require get_template_directory() . '/inc/customizer/sections/' . $section . '.php';
}

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Active Callbacks
*/
require get_template_directory() . '/inc/customizer/active-callback.php';

if( ! function_exists( 'shopexcel_customize_preview_js' ) ) :
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function shopexcel_customize_preview_js() {
	// Use minified libraries if SCRIPT_DEBUG is false
    $build    = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix   = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'shopexcel-customizer', get_template_directory_uri() . '/inc/js' . $build . '/customizer' . $suffix .'.js', array( 'customize-preview' ), SHOPEXCEL_THEME_VERSION, true );

	wp_localize_script(
		'shopexcel-customizer',
		'shopexcel_view_port',
		array(
			'mobile'               => shopexcel_get_media_query( 'mobile' ),
			'tablet'               => shopexcel_get_media_query( 'tablet' ),
			'desktop'              => shopexcel_get_media_query( 'desktop' ),
			'googlefonts'          => apply_filters( 'shopexcel_typography_customize_list', shopexcel_get_all_google_fonts() ),
			'systemfonts'          => apply_filters( 'shopexcel_typography_system_stack', '-apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"' ),
			'breadcrumb_sep_one'   => shopexcel_breadcrumb_icons_list('one'),
			'breadcrumb_sep_two'   => shopexcel_breadcrumb_icons_list('two'),
			'breadcrumb_sep_three' => shopexcel_breadcrumb_icons_list('three'),
		)
	);
}
endif;
add_action( 'customize_preview_init', 'shopexcel_customize_preview_js' );

if( ! function_exists( 'shopexcel_get_media_query' ) ) :
/**
 * Get the requested media query.
 *
 * @param string $name Name of the media query.
 */
function shopexcel_get_media_query( $name ) {

	// If the theme function doesn't exist, build our own queries.
	$desktop     = apply_filters( 'shopexcel_desktop_media_query', '(min-width:1024px)' );
	$tablet      = apply_filters( 'shopexcel_tablet_media_query', '(min-width: 720px) and (max-width: 1024px)' );
	$mobile      = apply_filters( 'shopexcel_mobile_media_query', '(max-width:719px)' );

	$queries = apply_filters(
		'shopexcel_media_queries',
		array(
			'desktop'     => $desktop,
			'tablet'      => $tablet,
			'mobile'      => $mobile,
		)
	);

	return $queries[ $name ];
}
endif;

if( ! function_exists( 'shopexcel_customize_script' ) ) :

function shopexcel_customize_script(){

	// Use minified libraries if SCRIPT_DEBUG is false
    $build    = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix   = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

    wp_enqueue_style( 'shopexcel-customize', get_template_directory_uri() . '/inc/css/customize.css', array(), SHOPEXCEL_THEME_VERSION );
	wp_enqueue_script( 'shopexcel-customize', get_template_directory_uri() . '/inc/js' . $build  . '/customize' . $suffix .'.js', array( 'jquery', 'customize-controls' ), SHOPEXCEL_THEME_VERSION, true );

	wp_localize_script( 'shopexcel-customize', 'shopexcel_cdata',
		array(
			'nonce'    => wp_create_nonce( 'shopexcel-local-fonts-flush' ),
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'flushit'  => __( 'Successfully Flushed!','shopexcel' ),
		)
	);

	wp_localize_script( 'shopexcel-typography-customizer', 'shopexcel_customize',
		array(
			'nonce' => wp_create_nonce( 'shopexcel_customize_nonce' )
		)
	);

	wp_localize_script(
		'shopexcel-typography-customizer',
		'shopexcelTypography',
		array(
			'googleFonts' => apply_filters( 'shopexcel_typography_customize_list', shopexcel_get_all_google_fonts() )
		)
	);

	wp_localize_script( 'shopexcel-typography-customizer', 'typography_defaults', shopexcel_typography_default_fonts() );
}
endif;
add_action( 'customize_controls_enqueue_scripts', 'shopexcel_customize_script' );

/*
 * Notifications in customizer
 */
require get_template_directory() . '/inc/customizer-plugin-recommend/customizer-notice/class-customizer-notice.php';

require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-install-helper.php';

require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-recommend.php';

$config_customizer = array(
	'recommended_plugins' => array(
		//change the slug for respective plugin recomendation
        'woocommerce' => array(
			'recommended' => true,
			'description' => sprintf(
				/* translators: %s: plugin name */
				esc_html__( 'If you want to take full advantage of the features this theme has to offer, please install and activate %s plugin.', 'shopexcel' ), '<strong>WooCommerce</strong>'
			),
		),
	),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'shopexcel' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'shopexcel' ),
	'activate_button_label'     => esc_html__( 'Activate', 'shopexcel' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'shopexcel' ),
);
Shopexcel_Customizer_Notice::init( apply_filters( 'shopexcel_customizer_notice_array', $config_customizer ) );
/**
 * Functions that removes default section in wp
 *
 * @param [type] $wp_customize
 * @return void
 */
function shopexcel_removing_default_sections( $wp_customize ){
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('background_image');
}
add_action( 'customize_register','shopexcel_removing_default_sections' );