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

    wp_enqueue_style('fancyboxcss', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css', '1.3.4', null);

    // slick slider
    wp_enqueue_style('slickcss', get_template_directory_uri() . '/styles/slick.css', array(), null);

    
    // SCRIPTS
    
    //jquery
    wp_enqueue_script('jquery', true);

    //main JS + jquery
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js', array(), '5.2.0', true );
    
    //main JS + jquery
    wp_enqueue_script('script', get_template_directory_uri() . '/scripts/scripts.js', array('jquery'), '1.2.0', true );

    // Font Awesome
    wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/f1acd6f9dc.js', array(), '6.1.2', false);

    wp_enqueue_script('fancyboxjs', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array('jquery'), '1.3.4', false);

     //slick slider
     wp_enqueue_script('slickjs', get_template_directory_uri() . '/scripts/slick.min.js', array('jquery'), '1.2.0', true );

}
add_action('wp_enqueue_scripts', 'coffee_scripts');

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page( array(
        'page_title'  => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'	 => false
    ));
	
}

// creates the menus
function coffee_menu() {
    // Wordpress function
    register_nav_menus( array(
        'header-menu' => "Main Menu",
        // add more menus to the array here
    ) );

}
add_action('init', 'coffee_menu');

// embeds youtube or vimeo videos and sets them into a lightbox
function embed_video($url, $photo, $class) {
    //This is a general function for generating an embed link of an FB/Vimeo/Youtube Video.
    $finalUrl = '';
    if(strpos($url, 'vimeo.com/') !== false) {
        //it is Vimeo video
        $videoId = explode("vimeo.com/",$url)[1];
        if(strpos($videoId, '&') !== false){
            $videoId = explode("&",$videoId)[0];
        }
        $finalUrl ='https://player.vimeo.com/video/'.$videoId;

    }else if(strpos($url, 'youtube.com/') !== false) {
        //it is Youtube video
        $videoId = explode("v=",$url)[1];
        if(strpos($videoId, '&') !== false){
        $videoId = explode("&",$videoId)[0];
        }
        $finalUrl ='https://www.youtube.com/embed/'.$videoId;

    }else if(strpos($url, 'youtu.be/') !== false){
        //it is Youtube video
        $videoId = explode("youtu.be/",$url)[1];
        if(strpos($videoId, '&') !== false){
            $videoId = explode("&",$videoId)[0];
        }
        $finalUrl ='https://www.youtube.com/embed/'.$videoId;
    }else {
        $finalUrl = $url;
    }

    echo '<div class="video-embed ' . $class . '">';
    if ( $photo ) {
        echo wp_get_attachment_image($photo, 'large', false, array( 'class' => 'video-overlay object-cover' )); 
        echo '<a href="' . esc_url( $finalUrl ) . '" class="fancybox"></a><span class="play-button"></span>';
    } else {
        echo '<iframe width="100%"  src="' . esc_url( $finalUrl ) . '" frameborder="0" allowfullscreen></iframe></div>';
    }
    echo '</div>';
}
