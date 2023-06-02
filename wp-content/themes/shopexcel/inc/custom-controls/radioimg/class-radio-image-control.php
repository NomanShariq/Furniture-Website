<?php
/**
 * Shopexcel Customizer Radio Image Control.
 * 
 * @package Shopexcel
*/

// Exit if accessed directly.
if( ! defined( 'ABSPATH' ) ){
	exit;
}

if( ! class_exists( 'Shopexcel_Radio_Image_Control' ) ){
	/**
	 * Radio Image control (modified radio).
    */
	class Shopexcel_Radio_Image_Control extends WP_Customize_Control {

		public $type    = 'shopexcel-radio-image';
		public $tooltip = '';
		public $col     = 'col-2';
		public $svg     = false;
		public $group;
		public $collapsed = true;
        
		public function to_json() {
			parent::to_json();
			
            if ( isset( $this->default ) ) {
				$this->json['default'] = $this->default;
			} else {
				$this->json['default'] = $this->setting->default;
			}
			
			$this->json['value']   = $this->value();
			
			foreach ( $this->choices as $key => $value ) {
				$this->json['choices'][ $key ]        = $value['path'];
				$this->json['choices_titles'][ $key ] = $value['label'];
			}

            //$this->json['choices'] = $this->choices;
            $this->json['link']      = $this->get_link();
            $this->json['id']        = $this->id;
            $this->json['tooltip']   = $this->tooltip;
            $this->json['svg']       = $this->svg;
            $this->json['group']     = $this->group;
            $this->json['col']       = $this->col;
            $this->json['collapsed'] = $this->collapsed;
						
            $this->json['inputAttrs'] = '';
			foreach ( $this->input_attrs as $attr => $value ) {
				$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
			}
		}
        
        public function enqueue() {            
            wp_enqueue_style( 'shopexcel-radio-image', get_template_directory_uri() . '/inc/custom-controls/radioimg/radio-image.css', null );
            wp_enqueue_script( 'shopexcel-radio-image', get_template_directory_uri() . '/inc/custom-controls/radioimg/radio-image.js', array( 'jquery' ), false, true ); //for radio-image                
        }

		protected function content_template() {
			?>
			<# if ( data.tooltip ) { #>
				<a href="#" class="tooltip hint--left" data-hint="{{ data.tooltip }}"><span class='dashicons dashicons-info'></span></a>
			<# } #>
			<div class="<# if ( ! data.collapsed ) { #>is-active<# } #><# if ( data.group ) { #>_{{ data.group }}<# } #>">
				<label class="customizer-text">
					<# if ( data.label ) { #>
						<span class="customize-control-title">{{{ data.label }}}</span>
					<# } #>
					<# if ( data.description ) { #>
						<span class="description customize-control-description">{{{ data.description }}}</span>
					<# } #>
				</label>
				<div id="input_{{ data.id }}" class="image" data-col="{{ data.col }}">
					<# for ( key in data.choices ) { #>
						<div class="img-input-wrapper">
							<input {{{ data.inputAttrs }}} class="image-select" type="radio" value="{{ key }}" name="_customize-radio-{{ data.id }}" id="{{ data.id }}{{ key }}" {{{ data.link }}}<# if ( data.value === key ) { #> checked="checked"<# } #>>
							<label for="{{ data.id }}{{ key }}">
								<# if ( data.svg ) { #>
									<span>
										{{{ data.choices[ key ] }}}
									</span>
								<# }else{ #>
									<img src="{{ data.choices[ key ] }}">
								<# } #>
								<span class="image-clickable" title="{{ data.choices_titles[ key ] }}"></span>
							</label>
						</div>
					<# } #>
				</div>
			</div>
			<?php
		}
	}
}