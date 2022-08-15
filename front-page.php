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

    <!-- FEATURE REELS -->
    <section class="feature-reel">
        <div class="container">
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
                    <h2 class="secondary-text mb-3"><?php echo do_shortcode( $new_reel_header ); ?></h2>
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
                    <a href="" class="white-text button me-4 view-web-team active-button ">Web Design Team</a>
                    <a href="" class="white-text button view-film-team">Filmography Team</a>
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
                    $align = 'order-md-2';
                } else {
                    $align = '';
                }
                ?>
                <div class="row team-content align-items-center">
                    <div class="col-md-8 <?php echo esc_attr( $align ); ?>">
                        <p class="head-font mb-0"><span class="h3"><?php echo esc_html( $name ); ?></span><span class="primary-text"> <?php echo esc_html( $position ); ?></span></p>
                        <p class="head-font"><?php echo esc_html( $subhead ); ?></p>
                        <?php echo do_shortcode( $bio ); ?>
                    </div>
                    <div class="col-md-4 team-image">
                        <div class="team-wrap">
                            <?php echo wp_get_attachment_image( $image, 'medium', false, array( 'class' => 'object-cover' ) ); ?>
                        </div>
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
                    $align = 'order-md-2';
                } else {
                    $align = '';
                }
                ?>
                <div class="row team-content align-items-center ">
                    <div class="col-md-8 <?php echo esc_attr( $align ); ?>">
                        <p class="head-font mb-0"><span class="h3"><?php echo esc_html( $name ); ?></span><span class="primary-text"> <?php echo esc_html( $position ); ?></span></p>
                        <p class="head-font"><?php echo esc_html( $subhead ); ?></p>
                        <?php echo do_shortcode( $bio ); ?>
                    </div>
                    <div class="col-md-4 team-image">
                        <div class="team-wrap">
                            <?php echo wp_get_attachment_image( $image, 'medium', false, array( 'class' => 'object-cover' ) ); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            
        </div>
    </section>

    <!-- SERVICES -->
    <section class="services container">
        <div class="row">
            <div class="col-lg-6 services-text">
                <?php
                $services_header = get_field( 'services_header' );
                $video_service = get_field( 'videography' );
                $web_service = get_field( 'web_design' );
                ?>
                <?php if ( $services_header ) : ?>
                <h2 class="secondary-text mb-3"><?php echo esc_html(  $services_header ); ?></h2>
                <?php endif; ?>
                <?php if ( get_field( 'services_copy' ) ) :?>
                <div class="dark-grey-text"><?php echo do_shortcode( get_field( 'services_copy' ) );?></div>
                <?php endif; ?>
                <a href="" class="button dark-grey-text video-button me-4 active-button">Videography</a>
                <a href="" class="button dark-grey-text web-button ">Web Design</a>
            </div>
        </div>
        <!-- VIDEO SERVICES -->
        <div class="video-service">
            <?php foreach( $video_service as $item ) : ?>
            <div class="row align-items-center">
                <!-- image -->
               <div class="service-image-wrap col-lg-6">
                    <div class="service-image">
                        <?php echo wp_get_attachment_image($item['image'], 'large', false, array( 'class' => 'object-cover' )) ; ?>
                        <div class="service-title"><p class="primary-text head-font"><?php echo esc_html( $item['header']) ; ?></p></div>
                    </div>
               </div>
               <!-- copy -->
               <div class="col-lg-6">
                    <div class="service-content">
                    <?php echo do_shortcode( $item['copy'] );?>
                    </div>
               </div>
            </div><!-- end of row -->
            <?php endforeach; ?>
        </div>
        <!-- WEB SERVICES -->
        <div class="web-service">
            <?php foreach( $web_service as $item ) : ?>
            <div class="row align-items-center">
                <!-- image -->
               <div class="service-image-wrap col-lg-6">
                    <div class="service-image">
                        <?php echo wp_get_attachment_image($item['image'], 'large', false, array( 'class' => 'object-cover')) ; ?>
                        <div class="service-title"><p class="primary-text head-font"><?php echo esc_html( $item['header']) ; ?></p></div>
                    </div>
               </div>
               <!-- copy -->
               <div class="col-lg-6">
                    <div class="service-content">
                    <?php echo do_shortcode( $item['copy'] );?>
                    </div>
               </div>
            </div><!-- end of row -->
            <?php endforeach; ?>
        </div>
    </section>

    <!-- RENTAL -->
    <section class="black-bg white-text rental">
        <div class="container">
            <div class="row align-items-end mb-5">
                <div class="col-lg-6">
                    <?php
                    $r_header   = get_field( 'rental_header' );
                    $r_copy     = get_field( 'rental_copy' );
                    $r_sub_head = get_field( 'rental_sub_head' );
                    $r_sub_copy = get_field( 'rental_sub_copy' );
                    ?>
                    <h2 class="mb-3"><?php echo esc_html( $r_header ); ?></h2>
                    <div class="rental-copy"><?php echo do_shortcode( $r_copy  ); ?></div>
                    <p class="h3 primary-text head-text"><?php echo esc_html( $r_sub_head ); ?></p>
                    <div class="rental-sub-copy"><?php echo do_shortcode( $r_sub_copy ); ?></div>
                </div>
                <div class="col-lg-6">
                    <div class="rental-image"><?php echo wp_get_attachment_image( get_field( 'rental_image' ), 'large', false, array( 'class' => 'object-cover' ) );?></div>
                </div>
            </div>
            <a href="#contact" class="white-text button"><?php echo esc_html( get_field( 'contact_link_text' ) );?></a>
        </div>
    </section>


<?php get_footer();?>