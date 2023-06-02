<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shopexcel
 */
    /**
     * Doctype Hook
     * 
     * @hooked shopexcel_doctype
    */
    do_action( 'shopexcel_doctype' );
?>
<head itemscope itemtype="https://schema.org/WebSite">
	<?php 
    /**
     * Before wp_head
     * 
     * @hooked shopexcel_head
    */
    do_action( 'shopexcel_before_wp_head' );
    
    wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

<?php
    wp_body_open();
    
    /**
     * Before Header
     * 
     * @hooked shopexcel_page_start - 20 
    */
    do_action( 'shopexcel_before_header' );
    
    /**
     * Header
     * 
     * @hooked shopexcel_header - 20     
    */
    do_action( 'shopexcel_header' );
    
    /**
     * Before Content
     *
    */
    do_action( 'shopexcel_after_header' );
    
    /**
     * Content
     * 
     * @hooked shopexcel_content_start
    */
    do_action( 'shopexcel_content' );