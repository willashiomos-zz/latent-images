<div class="post-container">
	<?php
	/**
	 * Display post on home page
	 * @package latentimages
	 */

	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<div class="entry-title">', '</h1>' );
			else :
				the_title( '<div class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></div>' );
			endif;
			?>
		</header><!-- .entry-header -->

		<div class="thumbnail">
			<?php latentimages_post_thumbnail(); ?>
		</div>

	</article><!-- #post-<?php the_ID(); ?> -->
</div>
