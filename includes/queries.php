<?php

function healthPilates_lista_clases($cantidad = -1) {
    ?>
    <ul class="listado-grid"> 
            <?php
                $args = array(
                    'post_type' => 'healthpilates_clases',
                    'posts_per_page' => $cantidad
                );

                $clases = new WP_Query($args);

                while($clases->have_posts()) {
                    $clases->the_post();
                ?>
                <li class="card">
                    <?php the_post_thumbnail(); ?>
                    <div class="contenido"> 
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

function healthPilates_testimoniales() {
    ?>
<ul class="listado-testimoniales swiper-wrapper">
    <?php
        $args = array(
        'post_type' => 'testimoniales'
        );
        $testimoniales = new WP_Query($args);
        while($testimoniales->have_posts()) {
            $testimoniales->the_post();
        ?>
            <li class="testimonial text-center swiper-slide">
                <blockquote>
                    <?php the_content(); ?>
                </blockquote>

                <footer class="testimonial-footer">
                    <?php the_post_thumbnail('thumbnail') ?>
                    <p>
                    <?php the_title(); ?>
                    </p>
                </footer>
            </li>
        <?php   
        }
        wp_reset_postdata();
        ?>
    </ul>
    <?php  
}