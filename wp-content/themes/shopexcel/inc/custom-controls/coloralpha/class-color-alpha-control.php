<?php
// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Shopexcel_Alpha_Color_Customize_Control' ) ) :
class Shopexcel_Alpha_Color_Customize_Control extends WP_Customize_Control {
	/**
	 * Official control name.
	 */
	public $type = 'shopexcel-color-alpha';
	/**
	 * Add support for palettes to be passed in.
	 *
	 * Supported palette values are true, false, or an array of RGBa and Hex colors.
	 */
	public $palette;
	/**
	 * Add support for showing the opacity value on the slider handle.
	 */
	public $show_opacity;
	/**
	 * Enqueue scripts and styles.
	 *
	 * Ideally these would get registered and given proper paths before this control object
	 * gets initialized, then we could simply enqueue them here, but for completeness as a
	 * stand alone class we'll register and enqueue them here.
	 */
	
	public function enqueue() {
		wp_enqueue_script(
			'shopexcel-color-alpha-picker',
			trailingslashit( get_template_directory_uri() ) . 'inc/custom-controls/coloralpha/color-alpha-picker.js',
			array( 'jquery', 'wp-color-picker' ),
			SHOPEXCEL_THEME_VERSION,
			true
		);
		wp_enqueue_style(
			'shopexcel-color-alpha-picker',
			trailingslashit( get_template_directory_uri() ) . 'inc/custom-controls/coloralpha/color-alpha-picker.css',
			array( 'wp-color-picker' ),
			SHOPEXCEL_THEME_VERSION
		);
	}

	public function to_json() {
		parent::to_json();
		$this->json['palette']      = $this->palette;
		$this->json['defaultValue'] = $this->setting->default;
		$this->json['link']         = $this->get_link();
		$this->json['show_opacity'] = $this->show_opacity;

		if ( is_array( $this->json['palette'] ) ) {
			$this->json['palette'] = implode( ',', $this->json['palette'] );
		} else {
			// Default to true.
			$this->json['palette'] = ( false === $this->json['palette'] || 'false' === $this->json['palette'] ) ? 'false' : 'true';
		}

		// Support passing show_opacity as string or boolean. Default to true.
		$this->json[ 'show_opacity' ] = ( false === $this->json[ 'show_opacity' ] || 'false' === $this->json[ 'show_opacity' ] ) ? 'false' : 'true';
	}

	/**
	 * Render the control.
	 */
	public function render_content() {}

	public function content_template() {
		?>
		<div class="shopexcel-alpha-color">
			<# if ( data.label && '' !== data.label ) { #>
				<span class="customize-control-title">{{ data.label }}</span>
			<# } #>
			<input class="shopexcel-color-alpha-control" type="text" data-palette="{{{ data.palette }}}" data-default-color="{{ data.defaultValue }}" {{{ data.link }}} />
		</div>
		<?php
	}
}
endif;