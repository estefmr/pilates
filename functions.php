<?php

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
    wp_enqueue_style('normalize', 'https://necolas.github.io/normalize.css/8.0.1/normalize.css', array(), '8.0.1');

}

add_action('wp_enqueue_scripts', 'healthPilates_scripts_styles');
