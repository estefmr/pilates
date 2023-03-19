<?php

    /* 
    * Template Name: Listado de clases
    */
    get_header()
?>

    <main class="contenedor seccion ">
        <?php
            get_template_part('template-parts/pagina');
        ?>
        <ul class="listado-grid"> 
            <?php
                $args = array(
                    'post_type' => 'healthpilates_clases'
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

    <main>

<?php
get_footer()
?>
