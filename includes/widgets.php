<?php

if(!defined('ABSPATH')) die();

class HealthPilates_Clases_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'healthPilates_widget',
			esc_html__( 'healthPilates Clases', 'healthPilates' ), 
			array( 'description' => esc_html__( 'Agrega las Clases como Widget', 'healthPilates' ), )
		);
	}

	public function widget( $args, $instance ) {
        ?>
            <ul class="clases-sidebar">
                <?php
                $args = array(
                    'post_type' => 'healthpilates_clases',
                    'posts_per_page' => $instance['cantidad'],
                    'order' => 'ASC',
                    'orderby' => 'title'
                );

                $clases = new WP_Query($args);
                while($clases->have_posts()) {
                    $clases->the_post();
                    ?>
                        <li>
                            <div class="imagen">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </div>
                            <div class="contenido-clase">
                            <a href="<?php the_permalink(); ?>" >
                            <h3> <?php the_title(); ?> </h3>
                            </a>
                            <?php
                            $hora_inicio = get_field('hora_de_inicio');
                            $hora_fin = get_field('hora_de_fin');
                            ?>
                            <p> <?php the_field('dias_clase'); ?> -
                            <?php echo $hora_inicio . " a " . $hora_fin; ?> </p>
                            </div>

                        </li>
                    <?php

                }
                wp_reset_postdata();

                ?>
            </ul>
        <?php
	}

    	public function form( $instance ) {
            $cantidad = !empty($instance['cantidad']) ? $instance['cantidad'] : esc_html('¿Cuántas clases deseas mostrar?');
            ?>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('cantidad')) ?>">

                    <?php esc_attr_e('¿Cuántas clases deseas mostrar?') ?>

                <label>
                
                <input
                    class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('cantidad')) ?>"
                    name="<?php echo esc_attr($this->get_field_name('cantidad')) ?>"
                    type="number"
                    value="<?php echo esc_attr($cantidad) ?>"
                />
            </p>

            <?php
   	}

	public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['cantidad'] = (!empty($new_instance['cantidad'])) ? sanitize_text_field($new_instance ['cantidad']) : '';
        return $instance;
	}
} 

function healthPilates_registrar_widget() {
    register_widget( 'HealthPilates_Clases_Widget' );
}
add_action( 'widgets_init', 'healthPilates_registrar_widget' );