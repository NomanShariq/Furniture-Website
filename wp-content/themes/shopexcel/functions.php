<?php
/**
 * Shopexcel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Shopexcel
 */

$shopexcel_theme_data = wp_get_theme();
if( ! defined( 'SHOPEXCEL_THEME_VERSION' ) ) define( 'SHOPEXCEL_THEME_VERSION', $shopexcel_theme_data->get( 'Version' ) );
if( ! defined( 'SHOPEXCEL_THEME_NAME' ) ) define( 'SHOPEXCEL_THEME_NAME', $shopexcel_theme_data->get( 'Name' ) );
if( ! defined( 'SHOPEXCEL_THEME_TEXTDOMAIN' ) ) define( 'SHOPEXCEL_THEME_TEXTDOMAIN', $shopexcel_theme_data->get( 'TextDomain' ) );   

/**
 * Customizer defaults.
 */
require get_template_directory() . '/inc/defaults.php';

/**
 * Custom Functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Standalone Functions.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Template Functions.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom functions for selective refresh.
 */
require get_template_directory() . '/inc/partials.php';

/**
 * Custom Controls
 */
require get_template_directory() . '/inc/custom-controls/custom-control.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Social Links
 */
require get_template_directory() . '/inc/social-links.php';

/**
 * Typography Functions
 */
require get_template_directory() . '/inc/typography/typography.php';

/**
 * Load google fonts locally
 */
require get_template_directory() . '/inc/class-webfont-loader.php';

/**
 * Dynamic Styles
 */
require get_template_directory() . '/css/style.php';

/**
 * Add block patterns
 */ 
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Plugin Recommendation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Getting Started
*/
require get_template_directory() . '/inc/getting-started/getting-started.php';

/**
 * Add theme compatibility function for woocommerce if active
*/
if( shopexcel_is_woocommerce_activated() ){
    require get_template_directory() . '/inc/woocommerce-functions.php';    
}