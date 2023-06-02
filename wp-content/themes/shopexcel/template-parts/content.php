<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Shopexcel
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); if( ! is_single() ) echo ' itemscope itemtype="https://schema.org/Blog"'; ?>>
	<?php 
        /**
         * @hooked shopexcel_post_thumbnail - 15
         * @hooked shopexcel_entry_header   - 20
        */
        do_action( 'shopexcel_before_post_entry_content' );
    
        /**
         * @hooked shopexcel_entry_content - 15
         * @hooked shopexcel_entry_footer  - 20
        */
        do_action( 'shopexcel_post_entry_content' );
    ?>
</article><!-- #post-<?php the_ID(); ?> -->