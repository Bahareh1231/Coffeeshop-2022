<?php

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title>Coffeeshop Film & Creative</title>
<meta name="description" content="Welcome to Coffeeshop Creative. We are a passionate team of web design & videography artists specializing in creating your custom content.">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<?php wp_head(); ?>
</head>


    <header>
		<div class="container">
            <h1 class="visually-hidden"><?php echo get_bloginfo( 'name' ); ?></h1>
        <?php 
            $args = ( array(
                    'theme_location' => 'header-menu',
                    'container' => 'nav',
                    'container_class' => 'header-menu',
                    'menu_class' => 'd-flex justify-content-end white-text animate fadedown delay',
                )
            );
            wp_nav_menu($args)	
            ?>
		</div>
    </header>