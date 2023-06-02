<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shopexcel
 */
    
    /**
     * After Content
     * 
     * @hooked shopexcel_content_end - 20
    */
    do_action( 'shopexcel_before_footer' );
    
    /**
     * Footer
     * 
     * @hooked shopexcel_footer_instagram_section - 15
     * @hooked shopexcel_footer_start             - 20
     * @hooked shopexcel_footer_info              - 25
     * @hooked shopexcel_footer_top               - 30
     * @hooked shopexcel_footer_bottom            - 40
     * @hooked shopexcel_footer_end               - 50
    */
    do_action( 'shopexcel_footer' );
    
    /**
     * After Footer
     * 
     * @hooked shopexcel_scrolltotop  - 15
     * @hooked shopexcel_page_end     - 20
    */
    do_action( 'shopexcel_after_footer' );

    wp_footer(); ?>

</body>
</html>
