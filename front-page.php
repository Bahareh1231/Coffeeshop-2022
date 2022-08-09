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
            <div class="col-lg-6 reel-text">
                <?php
                $reel_header = get_field( 'feature_header' );
                if ( $reel_header ) {
                    $new_reel_header = str_replace('[', '<span class="primary-text">', $reel_header );
                    $new_reel_header = str_replace(']', '</span><br>', $new_reel_header);
                }
                ?>
                <?php if ( $reel_header ) : ?>
                <h2 class="secondary-text text-shadow mb-3"><?php echo do_shortcode( $new_reel_header ); ?></h2>
                <?php endif; ?>
                <?php if ( get_field( 'feature_copy' ) ) :?>
                <div class="dark-grey-text"><?php echo do_shortcode( get_field( 'feature_copy' ) );?></div>
                <?php endif; ?>
                <a href="" class="button dark-grey-text film-button me-4 active-button">Film Reel</a>
                <a href="" class="button dark-grey-text drone-button ">Drone Reel</a>
            </div>
            <div class="col-lg-6 reel-videos">
                <?php
                foreach( get_field( 'feature_reels' ) as $item ) : 
                $reel_url   = $item['url'];
                $reel_cover = $item['cover_image'];
                $class      = $item['type'];
                embed_video($reel_url, $reel_cover, $class);
                endforeach; ?>
            </div>
        </div>
    </section>

    <!--  THE TEAM  -->
    <section class="team black-bg white-text">
        <div class="container">
            <div class="row">
                <div class="col-md-7 team-header">
                    <?php
                    $team_title = get_field( 'bio_heading' );
                    $team_copy  = get_field( 'bio_copy' );
                    $film_team  = get_field( 'film_bio' );
                    $web_team   = get_field( 'web_bio' );
                    if ( $team_title ) {
                        $new_team_title = str_replace('[', '', $team_title );
                        $new_team_title = str_replace(']', '<br>', $new_team_title);
                    }
                    ?>
                    <?php if ( $team_title ) : ?>
                    <h2 class="mb-3"><?php echo do_shortcode( $new_team_title ); ?></h2>
                    <?php endif; ?>
                    <?php if ( $team_copy ) : ?>
                    <div><?php echo do_shortcode( $team_copy ); ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="film-team">
                <?php
                foreach( $film_team as $item ) :
                $name     = $item['name'];
                $position = $item['position'];
                $subhead  = $item['subhead'];
                $bio      = $item['bio'];
                $image    = $item['image'];

                if ( $item ['content_right' ] ) {
                    $align = 'order-lg-2';
                } else {
                    $align = '';
                }
                ?>
                <div class="row team-content">
                    <div class="col-lg-8 <?php echo esc_attr( $align ); ?>">
                        <p class="head-font mb-0"><span class="h3"><?php echo esc_html( $name ); ?></span><span class="primary-text"><?php echo esc_html( $position ); ?></span></p>
                        <p class="head-font"><?php echo esc_html( $subhead ); ?></p>
                        <?php echo do_shortcode( $bio ); ?>
                    </div>
                    <div class="col-lg-4 team-image">

                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="web-team">
                <?php
                foreach( $film_team as $item ) :
                $name     = $item['name'];
                $position = $item['position'];
                $subhead  = $item['subhead'];
                $bio      = $item['bio'];
                $image    = $item['image'];

                if ( $item ['content_right' ] ) {
                    $align = 'order-lg-2';
                } else {
                    $align = '';
                }
                ?>
                <div class="row team-content">
                    <div class="col-lg-8 <?php echo esc_attr( $align ); ?>">
                        <p class="head-font mb-0"><span class="h3"><?php echo esc_html( $name ); ?></span><span class="primary-text"><?php echo esc_html( $position ); ?></span></p>
                        <p class="head-font"><?php echo esc_html( $subhead ); ?></p>
                        <?php echo do_shortcode( $bio ); ?>
                    </div>
                    <div class="col-lg-4 team-image">

                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <a href="" class="white-text button active-button view-web-team">Web Design Team</a>
            <a href="" class="white-text button view-film-team">Filmography Team</a>
        </div>
    </section>


<?php get_footer();?>