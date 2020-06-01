<div class="body">
	<?php
	/**
	 * Home Page
	 * @package latentimages
	 */

	get_header();
	?>
		<div class="home-container">

			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content-home', get_post_type() );

				endwhile;


			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

		</div><!-- #main -->

	<?php
	get_footer();
	?>
</div>
