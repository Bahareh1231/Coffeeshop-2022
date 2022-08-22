</main>

<footer>
	<section class="contact container" id="contact">
        <div class="row">
            <div class="col-lg-6 footer-content">
                <?php if ( get_field('footer_heading') ) : ?>
                <h2 class="secondary-text mb-3 animate fadeup-header"><?php echo esc_html(  get_field('footer_heading') ); ?></h2>
                <?php endif; ?>
                <?php if ( get_field( 'footer_copy' ) ) :?>
                <div class="dark-grey-text animate fadein"><?php echo do_shortcode( get_field( 'footer_copy' ) );?></div>
                <?php endif; ?>
            </div>
            <div class="col-lg-6 footer-form animate fadedown">
				<?php echo do_shortcode( '[contact-form-7 id="280" title="Contact form 1"]' ); ?>
			</div>
        </div>
    </section>
	<div class="container">
		<div class="footer-logo mt-4 animate fadein"><?php echo wp_get_attachment_image( get_field( 'logo' ), 'medium', false )?></div>
		<div class="footer-icons mt-4 animate fadedown">
			<a href="mailto:<?php echo esc_attr( get_field( 'email' ) ); ?>" class="black-icon bold white-text">EMAIL</a>
			<a href="tel:<?php echo esc_attr( get_field( 'phone_number' ) ); ?>" class="black-icon bold white-text">PHONE</a>
			<span class="socials">
			<?php
			$social = get_field( 'social' );
			foreach ( $social as $item ) :
				if ( $item['site'] === 'facebook' ) {
					$icon = 'facebook-f';
					$bg = 'primary-icon';
				} elseif ( $item['site'] === 'twitter' ) {
					$icon = 'twitter';
					$bg = 'primary-icon';
				} elseif ( $item['site'] === 'instagram') {
					$icon = 'instagram';
					$bg = 'primary-icon';
				} elseif ( $item['site'] === 'linkedin') {
					$icon = 'linkedin';
					$bg = 'primary-icon';
				} elseif ( $item['site'] === 'youtube') {
					$icon = 'youtube';
					$bg = 'black-icon';
				}
			?>
			
			<a href="<? echo esc_url( $item['url'] ); ?>" class="<?php echo esc_attr( $bg ); ?> white-text"><i class="white-text fa-brands fa-<?php echo esc_attr( $icon ); ?>"></i></a>
			
			<?php endforeach; ?>
			</span>
		</div>
		<p class="credits mt-3 small dark-grey-text">@<?php echo get_the_date('Y') . ' ' . get_bloginfo('name'); ?>. All Rights Reserved</p>
	</div>
</footer>
			

	<?php wp_footer(); ?>
</body>
</html>