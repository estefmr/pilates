<?php

/* includes */
require get_template_directory() . '/includes/widgets.php';
require get_template_directory() . '/includes/queries.php';

function healthPilates_setup() {
/* img destacad */
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'healthPilates_setup');

function pilates_menus() {
    register_nav_menus( array(
        'menu-principal' => __('Menu principal', 'healthPilates')
    ) );

}

add_action('init', 'pilates_menus');

function healthPilates_scripts_styles() {

    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize'), '1.0.0');
    wp_enqueue_style('lightboxcss', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.4');

    wp_enqueue_style('normalize', 'https://necolas.github.io/normalize.css/8.0.1/normalize.css', array(), '8.0.1');
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css', array(), '9.1.1');
    /* js */
    wp_enqueue_script('lightboxjs', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.4', true);
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', array(), '9.1.1', true);
    wp_enqueue_script('anime', 'https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js', array(), '2.0.2', true);
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('swiper-js', 'anime'), '1.0.0', true);

}

add_action('wp_enqueue_scripts', 'healthPilates_scripts_styles');


/* definir wdget */
function healthPilates_widgets() {
    register_sidebar( array(
        'name' => 'sidebar 1',
        'id' => 'sidebar_1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center text-primary">',
        'after_wtitle' => '</h3>'
    ));

    register_sidebar( array(
        'name' => 'sidebar 2',
        'id' => 'sidebar_2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center text-primary">',
        'after_wtitle' => '</h3>'
    ));

    register_sidebar( array(
        'name' => 'sidebar 3',
        'id' => 'sidebar_3',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center text-primary">',
        'after_wtitle' => '</h3>'
    ));

}

add_action('widgets_init', 'healthPilates_widgets');

/* imagenes background */
function healthPilates_hero_imagen() {
/* obtener id */
    $front_id = get_option('page_on_front');
/* obtener imagen */
    $id_imagen = get_field('hero_image', $front_id);

/* obtener ruta */
    $imagen = wp_get_attachment_image_src($id_imagen, 'full')[0];
    
/*crear css */
    wp_register_style('custom', false);
    wp_enqueue_style('custom');

    $imagen_destacada_css = "
    body.home .header{
        background-image: linear-gradient(rgb( 0 0 0 / .75),rgb( 0 0 0 / .75) ), url($imagen);
     }
    ";
/* inyectar css */
    wp_add_inline_style('custom', $imagen_destacada_css);
}
add_action('init', 'healthPilates_hero_imagen');

