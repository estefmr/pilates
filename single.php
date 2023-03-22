<?php
    get_header()
?>

<main class="contenedor seccion">
    <?php
        get_template_part('template-parts/post');
    ?>

    <div class="comentarios">
        <?php comment_form(); ?>

        <?php
        $comentarios = get_comments( array(
            'post_id' => $post->ID,
            'status' => 'approve'
        ));

        if (count($comentarios) > 0) {
            echo '<h3 class="text-center text-primary comentarios">' . count($comentarios) . ' Comentarios</h3>';
            wp_list_comments( array(
                'per_page' => 10,
                'reverse_top_level' => false
            ), $comentarios);
        }
        ?>
    </div>
</main>



    <?php
get_footer()
?>