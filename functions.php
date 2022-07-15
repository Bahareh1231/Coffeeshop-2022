<?php

// add stylesheets and js files
function coffee_scripts() {

    // STYLES

    //google font
    wp_enqueue_style('googlefont', 'https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,600;0,800;1,300&display=swap', array(), null);


    //bootstrap
    wp_enqueue_style('bootstrapcss', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css', array(), '5.2.0');

    // css
    wp_enqueue_style('css', get_template_directory_uri() . '/styles/main.css', array('googlefont'), null);

    
    // SCRIPTS
    
    //jquery
    wp_enqueue_script('jquery', true);

    //main JS + jquery
    wp_enqueue_script('script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js', array(), '5.2.0', true );
    
    //main JS + jquery
    wp_enqueue_script('script', get_template_directory_uri() . '/scripts/scripts.js', array('jquery'), '1.2.0', true );
}
add_action('wp_enqueue_scripts', 'coffee_scripts');


