<?php 
/*
* Template for the Homepage
*
 */
get_header();?>


<main>
    <!-- HERO -->
    <section class="hero d-flex align-items-center">
        <div class="hero-media">
        <?php
        $media_type = get_field( 'video_or_image_hero' );
        if ( $media_type === 'video' && $hero_video ) : ?>
            <video preload="true" playsinline autoplay loop muted src="<?php echo wp_get_attachment_url( get_field( 'hero_video' ) ); ?>"></video>
        <?php else : ?>
            <?php echo wp_get_attachment_image( get_field( 'hero_image' ), 'large', false, array( 'class' => 'object-cover') ); ?>
        <?php endif; ?>
        </div><!-- end of hero-media -->
        
        <div class="container">
            <div class="hero-content">
                <?php echo wp_get_attachment_image( get_field( 'white_logo' ), 'medium', false, array( 'class' => 'header-logo' ) );?>
                <h1 class="visually-hidden"><?php echo get_bloginfo( 'name' ); ?></h1>
                <?php if ( get_field( 'hero_header' ) ): ?><p class="h1 hero-header text-uppercase white-text"><?php echo esc_html( get_field( 'hero_header' ) ); ?></p><?php endif; ?>
                <?php if ( get_field( 'hero_subheader' ) ): ?><p class="hero-subhead white-text"><?php echo esc_html( get_field( 'hero_subheader' ) ); ?></p><?php endif; ?>
                <?php if ( get_field( 'hero_link' ) ): ?><a href="/<?php echo esc_html( get_field( 'hero_link' )['url'] ); ?>" class="button white-text text-uppercase bold"><?php echo esc_html( get_field( 'hero_link' )['text'] ); ?></a><?php endif; ?>
            </div>
        </div><!-- hero-content -->
    </section>

    <!-- HEADER QUOTE -->
    <section class="quote primary-bg text-center">
        <div class="container">
            <?php if ( get_field( 'header_quote' ) ) : ?>
            <p class=" dark-grey-text large text-uppercase head-font"><?php echo esc_html( get_field( 'header_quote' ) ); ?></p>
            <?php endif;?>
            <?php if ( get_field( 'header_author' ) ) : ?>
            <p class="text-shadow white-text bold small"><?php echo esc_html( get_field( 'header_author' ) ); ?></p>
            <?php endif;?>
        </div>
    </section>

    <!-- FEATURE REELS -->
    <section class="feature-reel container">
        <div class="row">
            <div class="col-md-6">
                <?php
                $reel_header = get_field( 'feature_header' );
                if ( $reel_header ) {
                    $new_reel_header = str_replace('[', '<span class="primary-text">', $reel_header );
                    $new_reel_header = str_replace(']', '</span><br>', $new_reel_header);
                }
                ?>
                <?php if ( $reel_header ) : ?>
                <h2 class="secondary-text text-shadow"><?php echo do_shortcode( $new_reel_header ); ?></h2>
                <?php endif; ?>
                <?php if ( get_field( 'feature_copy' ) ) :?>
                <p class="dark-grey-text"><?php echo do_shortcode( get_field( 'feature_copy' ) );?></p>
                <?php endif; ?>
                <a href="" class="button dark-grey-text film-button me-4 active-button">Film Reel</a>
                <a href="" class="button dark-grey-text drone-button ">Drone Reel</a>
            </div>
            <div class="col-md-6">
                <?php
                foreach( get_field( 'feature_reels' ) as $item ) : 
                $reel_url = $item['url'];
                $reel_cover = $item['cover_image'];
                embed_video($reel_url, $reel_cover);
                endforeach; ?>
            </div>
        </div>
    </section>


<?php get_footer();?>