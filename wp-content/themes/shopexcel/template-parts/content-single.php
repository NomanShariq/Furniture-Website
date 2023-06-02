<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Shopexcel
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
        /**
         * @hooked shopexcel_entry_header   - 15
         * @hooked shopexcel_post_thumbnail - 20
        */
        do_action( 'shopexcel_before_single_post_entry_content' );
    
        /**
         * @hooked shopexcel_entry_content - 15
         * @hooked shopexcel_entry_footer  - 20
        */
        do_action( 'shopexcel_single_post_entry_content' );
    ?>
</article><!-- #post-<?php the_ID(); ?> -->