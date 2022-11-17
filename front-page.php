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
            <div class="d-md-block d-none">
                <?php
                $media_type = get_field( 'video_or_image_hero' );
                if ( $media_type === 'video' || $media_type === 'videourl' ) :
                    // if video clip
                    if ( $media_type === 'video' ) : ?>
                    <video preload="true" playsinline autoplay loop muted src="<?php echo wp_get_attachment_url( get_field( 'hero_video' ) ); ?>"></video>
                    <!-- if vimeo video file link -->
                    <?php elseif ( $media_type === 'videourl' ) : ?>
                    <video  preload="auto" autoplay="" loop="" muted="">
                        <source src="<?php echo esc_url( get_field( 'hero_video_url' ) ); ?>" type="video/mp4">
                    </video>
                    <?php endif; ?>
                <?php elseif ( $media_type === 'image' ) : ?>
                    <?php echo wp_get_attachment_image( get_field( 'hero_image' ), 'full', false, array( 'class' => 'object-cover') ); ?>
                <?php endif; ?>
            </div>
            <div class="d-md-none mobile-header">
                
            </div>
        </div><!-- end of hero-media -->
        
        <div class="container">
            <div class="hero-content">
                <?php echo wp_get_attachment_image( get_field( 'white_logo' ), 'medium', false, array( 'class' => 'header-logo d-inline', 'loading' => false, ) );?>
                <h1 class="visually-hidden"><?php echo get_bloginfo( 'name' ); ?></h1>
                <?php if ( get_field( 'hero_header' ) ): ?><p class="h1 hero-header text-uppercase white-text"><?php echo esc_html( get_field( 'hero_header' ) ); ?></p><?php endif; ?>
                <?php if ( get_field( 'hero_subheader' ) ): ?><p class="hero-subhead white-text"><?php echo esc_html( get_field( 'hero_subheader' ) ); ?></p><?php endif; ?>
                <?php if ( get_field( 'hero_link' ) ): ?><a href="<?php echo esc_attr( get_field( 'hero_link' )['url'] ); ?>" class=" button white-text text-uppercase bold"><?php echo esc_html( get_field( 'hero_link' )['text'] ); ?></a><?php endif; ?>
            </div>
        </div><!-- hero-content -->
    </section>

    <!-- FEATURE REELS -->
    <section class="feature-reel" id="reel">
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
                    <a href="" class="button dark-grey-text film-button me-5 active-button">Feature Reel</a>
                    <!-- <a href="" class="button dark-grey-text drone-button delay">Drone Reel</a> -->
                </div>
                <div class="col-lg-6 reel-videos animate fadeleft">
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
                <div class="col-xl-6 col-lg-6 team-header">
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
                    <div class="a"><?php echo do_shortcode( $team_copy ); ?></div>
                    <?php endif; ?>
                    <a href="" class="white-text button view-film-team active-button me-5">Videography Team</a>
                    <a href="" class="white-text button  delay view-web-team  ">Web Design Team</a>
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
                <div class="row team-content align-items-center ">
                    <div class="col-xl-7 col-lg-8 team-bio <?php echo esc_attr( $align ); ?>">
                        <p class="head-font mb-0 h3"><?php echo esc_html( $name ); ?></p>
                        <p class="head-font mb-0 h4 primary-text bio-detail"><?php echo esc_html( $position ); ?></p>
                        <p class="head-font bio-hobby"><?php echo esc_html( $subhead ); ?></p>
                        <?php echo do_shortcode( $bio ); ?>
                    </div>
                    <div class="col-xl-5 col-lg-4 team-image animate fadeup">
                        <div class="team-wrap">
                            <?php echo wp_get_attachment_image( $image, 'medium-large', false, array( 'class' => 'object-cover' ) ); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="web-team">
                <?php
                foreach( $web_team as $item ) :
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
                    <div class="col-xl-7 col-lg-7 team-bio <?php echo esc_attr( $align ); ?>">
                    <p class="head-font mb-0 h3"><?php echo esc_html( $name ); ?></p>
                        <p class="head-font mb-0 h4 primary-text bio-detail"><?php echo esc_html( $position ); ?></p>
                        <p class="head-font bio-hobby"><?php echo esc_html( $subhead ); ?></p>
                        <?php echo do_shortcode( $bio ); ?>
                    </div>
                    <div class="col-xl-5 col-lg-4 team-image animate fadeup">
                        <div class="team-wrap">
                            <?php echo wp_get_attachment_image( $image, 'medium-large', false, array( 'class' => 'object-cover' ) ); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            
        </div>
    </section>

    <!-- WORKS -->
    <section class="works container">
        <div class="row mb-5">
            <div class="col-lg-6 works-text">
                <?php
                $works_header = get_field( 'works_heading' );
                $film_works = get_field( 'video' );
                $film_works = array_reverse( $film_works );
                $web_works = get_field( 'website' );
                $web_works = array_reverse( $web_works );
                ?>
                <?php if ( $works_header ) : ?>
                <h2 class="secondary-text mb-3"><?php echo esc_html(  $works_header ); ?></h2>
                <?php endif; ?>
                <?php if ( get_field( 'works_copy' ) ) :?>
                <div class="dark-grey-text"><?php echo do_shortcode( get_field( 'works_copy' ) );?></div>
                <?php endif; ?>
                <a href="" class="button dark-grey-text film-work-button me-4 active-button">Film & Video</a>
                <a href="" class="button dark-grey-text web-work-button delay">Web Design</a>
            </div>
        </div>
        <!-- LIST OF FILMSS -->
        <div class="film-works">
            <?php
            $i = 1;
            foreach( $film_works as $item ) :
            ?>
            <div class="row align-items-center film-work-item <?php echo esc_attr( 'film-' . $i ); ?>">
                <!-- image -->
                <div class="works-media-wrap col-lg-6 animate faderight">
                    <div class="works-media">
                    <?php embed_video($item['url'], $item['cover_photo'], null); ?>
                    </div>  
                </div>
                <!-- copy -->
                <div class="col-lg-6 works-content">
                    <p class="h4 mb-0 primary-text head-font"><?php echo esc_html( $item['subhead']); ?></p>
                    <p class="head-font h3 dark-grey-tex"><?php echo do_shortcode( $item['title'] ); ?></p>
                    <div class="dark-grey-tex"><?php echo do_shortcode( $item['content'] ); ?></div>
               </div>
            </div><!-- end of row -->
            <?php 
            $i++;
            endforeach;
            ?>
            <a href="" class="indent-button-row mt-5 view-more-film button dark-grey-text">View All Videos</a>
        </div>
        <!-- LIST OF SITES -->
        <div class="web-works">
            <?php
            $i = 1;
            foreach( $web_works as $item ) :
            ?>
            <div class="row align-items-center web-work-item <?php echo esc_attr( 'web-' . $i ); ?>">
                <!-- image -->
                <div class="works-media-wrap col-lg-6 animate faderight">
                    <div class="works-media">
                    <?php echo wp_get_attachment_image($item['cover_photo'], 'medium-large', false, array( 'class' => 'object-cover', 'loading' => false, ) );  ?>
                    </div>
                </div>
                <!-- copy -->
                <div class="col-lg-6  works-content">
                    <p class="h4 mb-0 primary-text head-font"><?php echo esc_html( $item['subhead']); ?></p>
                    <p class="head-font h3"><?php echo do_shortcode( $item['title'] ); ?></p>
                    <div class="dark-grey-tex"><?php echo do_shortcode( $item['content'] ); ?></div>
                    <?php
                    $web_url = str_replace('https://', '', $item['url'] );
                    $web_url = str_replace('http://', '', $web_url );
                    $web_url = str_replace('www.', '', $web_url );
                    $web_url = str_replace('/', '', $web_url );
                    ?>
                    <a target="_blank" href="<?php echo esc_attr( $item['url'] );?>" class="button black-text site-url"><?php echo esc_html( $web_url ); ?></a>
               </div>
            </div><!-- end of row -->
            <?php 
            $i++;
            endforeach;
            ?>
            <a href="" class="indent-button-row mt-5 view-more-web button dark-grey-text">View More</a>
        </div>
    </section>

    <!-- SERVICES -->
    <section class="services light-alt-bg" id="services">
        <div class="container">
            <div class="row mb-5">
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
                    <a href="" class="button dark-grey-text web-button delay">Web Design</a>
                </div>
            </div>
        </div>
        <!-- VIDEO SERVICES -->
        <div class="video-service container">
            <?php foreach( $video_service as $item ) : ?>
            <div class="row align-items-center anim">
                <!-- image -->
               <div class="service-image-wrap col-lg-6 animate">
                    <div class="service-image animate fadedown">
                        <?php echo wp_get_attachment_image($item['image'], 'medium-large', false, array( 'class' => 'object-cover ' )) ; ?>
                    </div>
               </div>
               <!-- copy -->
               <div class="col-lg-6">
                    <div class="service-content">
                    <p class=" primary-text head-font service-title"><?php echo esc_html( $item['header']) ; ?></p>
                    <?php echo do_shortcode( $item['copy'] );?>
                    </div>
               </div>
            </div><!-- end of row -->
            <?php endforeach; ?>
        </div>
        <!-- WEB SERVICES -->
        <div class="web-service container">
            <?php foreach( $web_service as $item ) : ?>
            <div class="row align-items-center">
                <!-- image -->
               <div class="service-image-wrap col-lg-6">
                    <div class="service-image animate fadedown">
                        <?php echo wp_get_attachment_image($item['image'], 'medium-large', false, array( 'class' => 'object-cover')) ; ?>
                        <div class="service-title"><p class=" primary-text head-font"><?php echo esc_html( $item['header']) ; ?></p></div>
                    </div>
               </div>
               <!-- copy -->
               <div class="col-lg-6">
                    <div class="service-content">
                    <p class="primary-text head-font service-title"><?php echo esc_html( $item['header']) ; ?></p>
                    <?php echo do_shortcode( $item['copy'] );?>
                    </div>
               </div>
            </div><!-- end of row -->
            <?php endforeach; ?>
        </div>
        <div class="container">
            <a href="#contact" class="indent-button dark-grey-text button">Let's Connect</a>
        </div>
    </section>

    <!-- RENTAL -->
    <div class="desktop-rental-slider d-sm-none rental-slider animate fadedown">
        <?php
        $rental_images = get_field( 'rental_images');
        ?>
        <?php foreach ( $rental_images as $item ) : ?>
        <div>
			<?php echo wp_get_attachment_image( $item['ID'], 'medium-large', false, array( 'class' => 'object-cover ' ) );?>
		</div>
        <?php endforeach; ?>
    </div>
    <section class="black-bg white-text rental">
        <div class="container">
            <div class="row align-items-end justify-space-between mb-5">
                <div class="col-lg-6">
                    <?php
                    $r_header   = get_field( 'rental_header' );
                    $r_copy     = get_field( 'rental_copy' );
                    $r_sub_head = get_field( 'rental_sub_head' );
                    $r_sub_copy = get_field( 'rental_sub_copy' );
                    ?>
                    <h2 class="mb-3"><?php echo esc_html( $r_header ); ?></h2>
                    <div class="rental-copy"><?php echo do_shortcode( $r_copy  ); ?></div>
                    <p class="h4 primary-text head-font"><?php echo esc_html( $r_sub_head ); ?></p>
                    <div class="rental-sub-copy"><?php echo do_shortcode( $r_sub_copy ); ?></div>
                </div>
                <div class="col-lg-6 d-none d-sm-block rental-image-wrap animate fadeleft">
                    <div class="rental-image rental-slider-2">
                    <?php foreach ( $rental_images as $item ) : ?>
						<div>
						<?php echo wp_get_attachment_image( $item['ID'], 'medium-large', false, array( 'class' => 'object-cover', 'loading' => false, ) );?>
						</div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <a href="#contact" class="white-text button indent-button">Studio Booking</a>
        </div>
    </section>
    
    <!-- FOOTER QUOTE -->
    <?php
    $quote = get_field( 'quote' )
    ?>
    <?php if ( $quote['content'] || $quote['author'] ) : ?>
	<section class="quote primary-bg text-center d-none d-sm-block">
		<div class="container">
			<p class=" dark-grey-text large text-uppercase head-font"><?php echo esc_html( $quote['content']); ?></p>
			<p class="text-shadow white-text bold small"><?php echo esc_html( $quote['author'] ); ?></p>
		</div>
    </section>
	<?php endif;?>


<?php get_footer();?>