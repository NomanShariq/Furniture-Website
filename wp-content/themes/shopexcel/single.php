<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Shopexcel
 */

get_header(); ?>
    <div class="page-grid">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">

            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'single' );

            endwhile; // End of the loop.
            ?>

            </main><!-- #main -->
            
            <?php
            /**
             * @hooked shopexcel_navigation    - 15
             * @hooked shopexcel_author        - 20
             * @hooked shopexcel_comment       - 40
            */
            do_action( 'shopexcel_after_post_content' );
            ?>
            
        </div><!-- #primary -->     
        <?php get_sidebar(); ?>
    </div>
    <?php shopexcel_related_posts(); ?>
<?php
get_footer();