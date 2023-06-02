<?php
/**
 * Right Buttons Panel.
 *
 * @package Shopexcel
 */
?>
<div class="panel-right">
	<?php do_action( 'shopexcel_updates_html' ); ?>
	<?php if( !shopexcel_pro_is_activated() ): ?>
		<div class="panel-aside">
			<h4><?php esc_html_e( 'Upgrade To Pro', 'shopexcel' ); ?></h4>
			<p><?php esc_html_e( 'With the Pro version, you can change the look and feel of your website in seconds. The premium version lets you have better control over the theme as it comes with more customization options. Not just that, the Pro version also has more layout options as compared to the free version. The Pro version is multi-language compatible as well.', 'shopexcel' ); ?></p>
			<p><?php esc_html_e( 'You will also get more frequent updates and quicker support with the Pro version.', 'shopexcel' ); ?></p>
			<a class="button button-primary" href="<?php echo esc_url( 'https://blossomthemes.com/wordpress-themes/shopexcel-pro/' ); ?>" title="<?php esc_attr_e( 'View Premium Version', 'shopexcel' ); ?>" target="_blank">
				<?php esc_html_e( 'Read More About the Pro Version', 'shopexcel' ); ?>
			</a>
		</div><!-- .panel-aside Theme Support -->
	<?php endif; ?>

	<!-- Knowledge base -->
	<div class="panel-aside">
		<h4><?php esc_html_e( 'Visit the Knowledge Base', 'shopexcel' ); ?></h4>
		<p><?php esc_html_e( 'Need help with using the WordPress as quickly as possible? Visit our well-organized Knowledge Base!', 'shopexcel' ); ?></p>
		<p><?php esc_html_e( 'Our Knowledge Base has step-by-step video and text tutorials, from installing the WordPress to working with themes and more.', 'shopexcel' ); ?></p>

		<a class="button button-primary" href="<?php echo esc_url( 'https://docs.blossomthemes.com/' . SHOPEXCEL_THEME_TEXTDOMAIN . '/' ); ?>" title="<?php esc_attr_e( 'Visit the knowledge base', 'shopexcel' ); ?>" target="_blank"><?php esc_html_e( 'Visit the Knowledge Base', 'shopexcel' ); ?></a>
	</div><!-- .panel-aside knowledge base -->

	<div class="panel-aside">
		<h4><?php _e( 'Submit your site for social share', 'shopexcel' ); ?></h4>
		<p><?php _e( 'We regularly share and feature websites made using our themes on our social media accounts( Facebook, Instagram, Twitter and Pinterest ).', 'shopexcel' ); ?></p>
		<p><?php _e( 'If you would like to get your website shared and featured, please submit your website by clicking the link below.', 'shopexcel' ); ?></p>

		<a class="button button-primary" href="<?php echo esc_url( 'https://blossomthemes.com/submit-your-site-for-social-share/' ); ?>" title="<?php esc_attr_e( 'Submit your site for social share', 'shopexcel' ); ?>" target="_blank"><?php _e( 'Submit Here', 'shopexcel' ); ?></a>
	</div><!-- .panel-aside knowledge base -->
</div><!-- .panel-right -->