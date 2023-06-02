<?php
/**
 * Support Panel.
 *
 * @package Shopexcel
 */
?>
<!-- Demo Import panel -->
<div id="demo-panel" class="panel-left">
	<h4><?php echo esc_html( 'Import Shopexcel Templates'); ?></h4>

	<div class="text-block">
		<p><?php printf(__( 'Shopexcel includes variety of starter templates suited for e-commerce websites. New designs are added frequently to the collection. Visit %1$shere%2$s to see all the templates.', 'shopexcel' ), '<a href="https://blossomthemes.com/shopexcel-demo/" target="_blank">', '</a>' );?>
	</div>	

	<?php if ( ! is_plugin_active( 'demo-importer-plus/demo-importer-plus.php' ) ) { ?>
		<div class="gs-demo-import-plugin" style="margin-top: 30px;">
			<?php if ( file_exists( WP_CONTENT_DIR . '/plugins/' . 'demo-importer-plus/demo-importer-plus.php' ) ) {
				//activate if there is file on the wp-content/plugins ?>
				<a class="activate-now button button-primary " data-slug="<?php echo esc_attr( 'demo-importer-plus' ); ?>" href="#" aria-label="<?php echo esc_attr( __( 'Demo Importer Plus','shopexcel' ) ); ?>" data-init="<?php echo esc_attr( 'demo-importer-plus/demo-importer-plus.php' ); ?>" data-settings-link="<?php echo admin_url( 'themes.php?page=demo-importer-plus' ); ?>">
					<?php echo esc_html__( 'Activate Demo Importer Plus', 'shopexcel' ); ?>        
				</a>
			<?php }else { //install if there are not any plugins which are listed on wp-content/plugins ?>   
				<a class="install-now button " data-slug="<?php echo esc_attr( 'demo-importer-plus' ); ?>" href="#" aria-label="<?php echo esc_attr( __( 'Demo Importer Plus','shopexcel' ) ); ?>" data-init="<?php echo esc_attr( 'demo-importer-plus/demo-importer-plus.php' ); ?>" data-settings-link="<?php echo admin_url( 'themes.php?page=demo-importer-plus' ); ?>">
					<?php echo esc_html__( 'Install and Activate Demo Importer Plus', 'shopexcel' ); ?>        
				</a>
			<?php } ?>
		</div>
	<?php } else { ?>
		<a class="button button-primary" href="<?php echo admin_url( 'themes.php?page=demo-importer-plus' ); ?>" style="margin-top: 30px;" title=<?php esc_attr_e("Browse Starter Templates", "shopexcel" ); ?>>
			<?php esc_html_e( 'Browse Starter Templates', 'shopexcel' ); ?>
		</a>
	<?php } ?>	
</div><!-- .panel-left support -->