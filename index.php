<div class="body">
	<?php
	/**
	 * Home Page
	 * @package latentimages
	 */

	get_header();
	?>
		<div class="home-container px-5">
			<div class="section-title row">
				Reviews
			</div>

			<?php $reviews = new WP_Query(array(
				'cat' => get_cat_ID('Reviews'),
				'orderby' => 'post_date'
			));

			$index = 0;?>
			<div class="section-content section-content-left row">
				<?php if( $reviews->have_posts() ) :
					while( $reviews->have_posts() and $index < 2 ):
						$reviews->the_post();?>
						<div class="mb-5 row">
							<div class="opacity-overlay">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full homepage-thumbnail', 'title' => 'Feature image']);?>
								</a>
							</div>
							<?php the_title( '<div class="entry-title entry-title-left"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></div>' );?>
						</div>
						<?php $index++;
					endwhile;
				endif;?>

			<a href="/reviews" class="row justify-content-end text-decoration-none" style="width:450px">
				<div class="col-auto see-more">See More</div>
				<img class="col-auto align-self-center" width="72px" height="23px" src="wp-content/themes/latentimages/img/right_pink_arrow.png"></img>
			</a>
		</div>

			<?php wp_reset_postdata();?>

			<div class="text-right">
				<div class="section-title">
					Editorials
				</div>

				<?php
					$editorials = new WP_Query(array(
						'cat' => get_cat_ID('Editorials'),
						'orderby' => 'post_date'
					));

					$index = 0;?>
					<div class="section-content section-content-right row justify-content-end">
						<?php if( $editorials->have_posts() ) :
							while( $editorials->have_posts() and $index < 2 ):
								$editorials->the_post();?>
								<div class="mb-5 row">
									<?php the_title( '<div class="entry-title entry-title-right"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></div>' );?>
									<div class="opacity-overlay">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full homepage-thumbnail', 'title' => 'Feature image']);?>
										</a>
									</div>
									
								</div>
								<?php $index++;
							endwhile;
						endif;?>
					</div>
					
					<?php wp_reset_postdata();?>
			</div>

			<div class="section-title">
				Features
			</div>
		
			
			<?php
				$features = new WP_Query(array(
					'cat' => get_cat_ID('Features'),
					'orderby' => 'post_date'
				));

				$index = 0;?>

				<div class="section-content section-content-left row">
					<?php if( $features->have_posts() ) :
						while( $features->have_posts() and $index < 2 ):
							$features->the_post();?>
							<div class="mb-5 row">
								<div class="opacity-overlay">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full homepage-thumbnail', 'title' => 'Feature image']);?>
									</a>
								</div>
								<?php the_title( '<div class="entry-title entry-title-right"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></div>' );?>
							</div>
							<?php $index++;
						endwhile;
					endif;?>
					<a href="/features" class="row justify-content-end text-decoration-none" style="width:450px">
						<div class="col-auto see-more">See More</div>
						<img class="col-auto align-self-center" width="72px" height="23px" src="wp-content/themes/latentimages/img/right_pink_arrow.png"></img>
					</a>
				</div>

				<?php wp_reset_postdata();?>

		</div><!-- #main -->

	<?php
	get_footer();
	?>
</div>
