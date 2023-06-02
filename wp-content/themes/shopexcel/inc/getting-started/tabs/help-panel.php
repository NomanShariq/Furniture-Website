<?php
/**
 * Help Panel.
 *
 * @package Shopexcel
 */
?>
<!-- Help file panel -->
<div id="help-panel" class="panel-left">

    <div class="panel-aside">
        <h4><?php esc_html_e( 'View Our Documentation Link', 'shopexcel' ); ?></h4>
        <p><?php esc_html_e( 'New to the WordPress world? Our documentation has step by step procedure to create a beautiful website.', 'shopexcel' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://docs.blossomthemes.com/' . SHOPEXCEL_THEME_TEXTDOMAIN . '/' ); ?>" title="<?php esc_attr_e( 'Visit the Documentation', 'shopexcel' ); ?>" target="_blank">
            <?php esc_html_e( 'View Documentation', 'shopexcel' ); ?>
        </a>
    </div><!-- .panel-aside -->
    
    <div class="panel-aside">
        <h4><?php esc_html_e( 'Support Ticket', 'shopexcel' ); ?></h4>
        <p><?php printf( __( 'It\'s always a good idea to visit our %1$sKnowledge Base%2$s before you send us a support ticket.', 'shopexcel' ), '<a href="'. esc_url( 'https://docs.blossomthemes.com/docs/' . SHOPEXCEL_THEME_TEXTDOMAIN . '/' ) .'" target="_blank">', '</a>' ); ?></p>
        <p><?php esc_html_e( 'If the Knowledge Base didn\'t answer your queries, submit us a support ticket here. Our response time usually is less than a business day, except on the weekends.', 'shopexcel' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://blossomthemes.com/support-ticket/' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'shopexcel' ); ?>" target="_blank">
            <?php esc_html_e( 'Contact Support', 'shopexcel' ); ?>
        </a>
    </div><!-- .panel-aside -->

    <div class="panel-aside">
        <h4><?php printf( esc_html__( 'View Our %1$s Demo', 'shopexcel' ), SHOPEXCEL_THEME_NAME ); ?></h4>
        <p><?php esc_html_e( 'Visit the demo to get more ideas about our theme design.', 'shopexcel' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://blossomthemes.com/theme-demo/?theme=' . SHOPEXCEL_THEME_TEXTDOMAIN ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'shopexcel' ); ?>" target="_blank">
            <?php esc_html_e( 'View Demo', 'shopexcel' ); ?>
        </a>
    </div><!-- .panel-aside -->
</div>