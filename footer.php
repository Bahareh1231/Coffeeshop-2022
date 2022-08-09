</main>

<footer>
	<!-- FOOTER QUOTE -->
	<?php
	$quote = get_field( 'quote' )
	?>
	<?php if ( $quote['content'] || $quote['author'] ) : ?>
	<section class="quote primary-bg text-center">
		<div class="container">
			<p class=" dark-grey-text large text-uppercase head-font"><?php echo esc_html( $quote['content']); ?></p>
			<p class="text-shadow white-text bold small"><?php echo esc_html( $quote['author'] ); ?></p>
		</div>
    </section>
	<?php endif;?>
	<div class="container">
        
    </div>

</footer>
			

	<?php wp_footer(); ?>
</body>
</html>