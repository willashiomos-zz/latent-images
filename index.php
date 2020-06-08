<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		function wrapped() {
			$('.entry-title').each(function() {
				if($(this).height() > 110) {
					var lines = $(this).height()/96;
					var marginTop = 220 - 40*lines;
				}
				$(this).css({'margin-top': marginTop});
				
			});

		}
		$(document).ready(function() {
			wrapped();
			$('.opacity-overlay').hover(function(){
				$(this).prev('.entry-title-right').css({'text-decoration': 'underline'});
				$('.entry-title-right a:link').css({'text-decoration-color': '#506CCF'});
			}, function() {
				$(this).prev('.entry-title-right').css('text-decoration', 'none');
			});
		});
	</script>
</head>

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
				<div class="col-auto">Reviews</div>
				<img class="col-auto align-self-center pink-curved-arrow" width="83px" height="100px" src="wp-content/themes/latentimages/img/curved_pink_arrow.png"></img>
			</div>
			

			<?php $reviews = new WP_Query(array(
				'cat' => get_cat_ID('Reviews'),
				'orderby' => 'post_date'
			));

			$index = 0;?>
			<div class="section-content section-content-left row mb-5">
				<?php if( $reviews->have_posts() ) :
					while( $reviews->have_posts() and $index < 2 ):
						$reviews->the_post();?>
						<div class="mb-5 row no-gutters">
							<div class="opacity-overlay col-auto">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full homepage-thumbnail']);?>
								</a>
							</div>
							<?php 
								$title = get_the_title();
								$title = mb_strimwidth($title, 0, 40, '...');
							?>
							<div class="entry-title entry-title-left col"><a href="' . esc_url( get_permalink() ) . '"><?php echo $title ?></a></div>		
						</div>
						<?php $index++;
					endwhile;
				endif;?>

			<a href="/reviews" class="row justify-content-end text-decoration-none" style="width:450px">
				<div class="col-auto see-more text-pink">See More</div>
				<img class="col-auto align-self-center" width="72px" height="23px" src="wp-content/themes/latentimages/img/right_pink_arrow.png"></img>
			</a>
		</div>

			<?php wp_reset_postdata();?>

			<div class="text-right">
				<div class="section-title row justify-content-end">
					<img class="col-auto align-self-center blue-curved-arrow" width="83px" height="100px" src="wp-content/themes/latentimages/img/curved_blue_arrow.png"></img>
					<div class="col-auto">Editorials</div>
				</div>

				<?php
					$editorials = new WP_Query(array(
						'cat' => get_cat_ID('Editorials'),
						'orderby' => 'post_date'
					));

					$index = 0;?>
					<div class="section-content section-content-right row justify-content-end mb-5">
						<?php if( $editorials->have_posts() ) :
							while( $editorials->have_posts() and $index < 2 ):
								$editorials->the_post();?>
								<div class="mb-5 row no-gutters">
									<?php 
									$title = get_the_title();
									$title = mb_strimwidth($title, 0, 40, '...');
									?>
									<div class="entry-title entry-title-right col"><a href="' . esc_url( get_permalink() ) . '"><?php echo $title ?></a></div>	
									<div class="opacity-overlay col-auto">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full homepage-thumbnail']);?>
										</a>
									</div>
									
								</div>
								<?php $index++;
							endwhile;
						endif;?>
						<a href="/editorials" class="row justify-content-end text-decoration-none" style="width:450px">
							<div class="col-auto see-more text-blue">See More</div>
							<img class="col-auto align-self-center" width="72px" height="23px" src="wp-content/themes/latentimages/img/right_blue_arrow.png"></img>
						</a>
					</div>
					
					<?php wp_reset_postdata();?>
			</div>

			<div class="section-title row">
				<div class="col-auto">Features</div>
				<img class="col-auto align-self-center pink-curved-arrow" width="83px" height="100px" src="wp-content/themes/latentimages/img/curved_pink_arrow.png"></img>
			</div>
		
			
			<?php
				$features = new WP_Query(array(
					'cat' => get_cat_ID('Features'),
					'orderby' => 'post_date'
				));

				$index = 0;?>

				<div class="section-content section-content-left row mb-5">
					<?php if( $features->have_posts() ) :
						while( $features->have_posts() and $index < 2 ):
							$features->the_post();?>
							<div class="mb-5 row no-gutters">
								<div class="opacity-overlay col-auto">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full homepage-thumbnail']);?>
									</a>
								</div>
								<?php 
									$title = get_the_title();
									$title = mb_strimwidth($title, 0, 40, '...');
								?>
								<div class="entry-title entry-title-left col"><a href="' . esc_url( get_permalink() ) . '"><?php echo $title ?></a></div>		
							</div>
							<?php $index++;
						endwhile;
					endif;?>
					<a href="/features" class="row justify-content-end text-decoration-none" style="width:450px; margin-bottom: 150px">
						<div class="col-auto text-pink see-more">See More</div>
						<img class="col-auto align-self-center" width="72px" height="23px" src="wp-content/themes/latentimages/img/right_pink_arrow.png"></img>
					</a>
				</div>

				<?php wp_reset_postdata();?>

		</div><!-- #main -->

	<?php
	get_footer();
	?>
</div>
