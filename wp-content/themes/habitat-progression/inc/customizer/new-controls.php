<?php

// See full blog post here
// http://progression.kiwi.nz/2014/07/how-to-add-a-color-control-with-alphaopacity-to-the-wordpress-theme-customizer/


function progression_studios_enqueue_customizer_controls_styles() {

  wp_register_style( 'progression-customizer-controls', get_template_directory_uri() . '/inc/customizer/css/customizer-controls.css', NULL, NULL, 'all' );
  wp_enqueue_style( 'progression-customizer-controls' );

	wp_register_script( 'customizer-admin-js', get_template_directory_uri() . '/inc/customizer/js/customizer-admin.js', array( 'jquery' ), NULL, true );
	wp_enqueue_script( 'customizer-admin-js' );

	wp_enqueue_script( 'jquery-ui-button' ); // for ButtonSet

  }


add_action( 'customize_controls_print_styles', 'progression_studios_enqueue_customizer_controls_styles' );


//  See full blog post here
//  http://pluto.kiwi.nz/2014/07/how-to-add-a-color-control-with-alphaopacity-to-the-wordpress-theme-customizer/

function progression_studios_add_customizer_custom_controls( $wp_customize ) {

    class progression_studios_Customize_Alpha_Color_Control extends WP_Customize_Control {
    
        public $type = 'alphacolor';
        //public $palette = '#3FADD7,#555555,#666666, #F5f5f5,#333333,#404040,#2B4267';
        public $palette = true;
        public $default = '';
		
		

		public function enqueue() {

			
	
		}
    
        protected function render() {
            $id = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', $this->id ) );
            $class = 'customize-control customize-control-' . $this->type; ?>
            <li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
                <?php $this->render_content(); ?>
            </li>
        <?php }
    
        public function render_content() { ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <input type="text" data-palette="<?php echo esc_html( $this-> palette ); ?>" data-default-color="<?php echo esc_html( $this-> default ); ?>" value="<?php echo intval( $this->value() ); ?>" class="progression-color-control" <?php $this->link(); ?>  />
            </label>
			

        <?php }
    }
	
	
	
	/**
	 * Create a Radio-Buttonset control.
	 */
	class progression_studios_Controls_Radio_Buttonset_Control extends WP_Customize_Control {

		public $type = 'radio-buttonset';

		public function render_content() {

			if ( empty( $this->choices ) ) {
				return;
			}

			$name = '_customize-radio-' . $this->id;

			?>
			<span class="customize-control-title">
				<?php echo esc_attr( $this->label ); ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<?php // The description has already been sanitized in the Fields class, no need to re-sanitize it. ?>
					<span class="description customize-control-description"><?php echo esc_html( $this-> description ); ?></span>
				<?php endif; ?>
			</span>

			<div id="input_<?php echo esc_html( $this-> id ); ?>" class="buttonset">
				<?php foreach ( $this->choices as $value => $label ) : ?>
					<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr($this->id) . esc_attr( $value ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
						<label for="<?php echo esc_attr($this->id) . esc_attr( $value ); ?>">
							<?php echo esc_html( $label ); ?>
						</label>
					</input>
				<?php endforeach; ?>
			</div>

			
			<script>jQuery(document).ready(function($) { $( '[id="input_<?php echo esc_html( $this-> id ); ?>"]' ).buttonset(); });</script>
			<?php
		}

	}
	
	
	/**
	 * Create a jQuery slider control.
	 * TODO: Migrate to an HTML5 range control. Range control are hard to style 'cause they don't display the value
	 */
	class progression_studios_Controls_Slider_Control extends WP_Customize_Control {

		public $type = 'slider';

		public function render_content() { ?>
			<label>

				<span class="customize-control-title">
					<?php echo esc_attr( $this->label ); ?>
					<?php if ( ! empty( $this->description ) ) : ?>
						<?php // The description has already been sanitized in the Fields class, no need to re-sanitize it. ?>
						<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
					<?php endif; ?>
				</span>
			</label>
			
			<input type="number" class="progression-slider" id="input_<?php echo esc_html( $this-> id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" step="<?php echo esc_attr($this->choices['step']); ?>" <?php $this->link(); ?>/>
			
			
			<input type="text" class="progression-slider-hidden" id="input_<?php echo esc_html( $this-> id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" step="<?php echo esc_attr($this->choices['step']); ?>" <?php $this->link(); ?>/>
			

			
			<div id="slider_<?php echo esc_html( $this-> id ); ?>" class="ss-slider"></div>
			<script>
			jQuery(document).ready(function($) {
				$( '[id="slider_<?php echo esc_html( $this-> id ); ?>"]' ).slider({
						value : <?php echo esc_attr( $this->value() ); ?><?php if ( $this->value() == 0 ) : ?>0<?php endif; ?>,
						min   : <?php echo esc_attr($this->choices['min'] ); ?>,
						max   : <?php echo esc_attr($this->choices['max'] ); ?>,
						step  : <?php echo esc_attr($this->choices['step'] ); ?>,
						slide : function( event, ui ) { $( '[id="input_<?php echo esc_html( $this-> id ); ?>"]' ).val(ui.value).keyup(); }
				});
				$( '[id="input_<?php echo esc_html( $this-> id ); ?>"]' ).val( $( '[id="slider_<?php echo esc_html( $this-> id ); ?>"]' ).slider( "value" ) );

				$( '[id="input_<?php echo esc_html( $this-> id ); ?>"]' ).change(function() { 
					$( '[id="slider_<?php echo esc_html( $this-> id ); ?>"]' ).slider({
						value : $( this ).val()
					});	
				});

			});
			</script>
			<?php

		}
	}
	
	
	

}
add_action( 'customize_register', 'progression_studios_add_customizer_custom_controls' );

