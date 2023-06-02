<?php
/**
 * Shopexcel Customizer Group Control.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class Shopexcel_Group_Control extends WP_Customize_Control {
	/**
     * Lists of variables variable
     */
	public $type       = 'group';
	public $group_type = '';
	public $collapsed  = true;
	public $style      = 'default';

    public function to_json() {
        parent::to_json();
        
        if ( isset( $this->default ) ) {
            $this->json['default'] = $this->default;
        } else {
            $this->json['default'] = $this->setting->default;
        }
        
        $this->json['value']      = $this->value();
        $this->json['choices']    = $this->choices;
        $this->json['link']       = $this->get_link();
        $this->json['id']         = $this->id;
        $this->json['type']       = $this->type;
        $this->json['group_type'] = $this->group_type;
        $this->json['collapsed']  = $this->collapsed;
        $this->json['style']      = $this->style;
                    
        $this->json['inputAttrs'] = '';
        foreach ( $this->input_attrs as $attr => $value ) {
            $this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
        }
    }

    public function enqueue() {            
        wp_enqueue_style( 'shopexcel-group', get_template_directory_uri() . '/inc/custom-controls/group/group.css', null );
        wp_enqueue_script( 'shopexcel-group', get_template_directory_uri() . '/inc/custom-controls/group/group.js', array( 'jquery' ), false, true ); //for group        
    }

	public function content_template()
	{
		?>
		<#
			var renderDesc = 'content';
			if (data.style == 'edit') {
				renderDesc = 'head';
			}
		#>
		<div data-grpid="{{data.id}}" class="shopexcel-customizer-group shopexcel-customizer-group-{{ data.style }} <# if ( ! data.collapsed ) { #>is-active<# } #>">
			<div class="group-head">


				<# if ( data.style === 'collapsible' ) { #>
				
					<button class="head-label">
						<span aria-hidden="true">
							<svg class="hl-arrow" width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><g><path fill="none" d="M0,0h24v24H0V0z"></path></g><g><path d="M7.41,8.59L12,13.17l4.59-4.58L18,10l-6,6l-6-6L7.41,8.59z"></path></g></svg>
						</span>

						<# if ( data.label ) { #>
							<span class="title customize-control-title">{{{ data.label }}}</span>
						<# } #>	

					</button>
				
				<# } else { #>
					
					<div class="head-label">
						<# if ( data.label ) { #>
							<span class="title customize-control-title">{{{ data.label }}}</span>
						<# } #>	
						
						<# if ( renderDesc == 'head') { #>
							<span class="description">{{{ data.description }}}</span>
						<# } #>
					</div>

					<# if ( data.style == 'edit' ) { #>
						<button class="head-edit group-content-toggle" title="<?php echo esc_attr('Show Panel', 'bunyad-admin'); ?>">
							<i class="icon dashicons dashicons-edit"></i>
						</button>
					<# } #>

				<# } #>
			</div>

			<div class="group-content">

				<# if ( renderDesc == 'content' && data.description ) { #>
					<span class="description">{{{ data.description }}}</span>
				<# } #>

				<ul class="controls"></ul>

			</div>
		</div>

		<?php
	}

    protected function render_content(){
		//returns nothing right now
    }
}