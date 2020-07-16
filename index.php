<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		var $window = $(window);
		var $pane = $('#pane1');

		function checkWidth() {
			var windowsize = $window.width();
			if (windowsize <= 768) {
				$("html").find("*").find('.entry-title').removeClass('col');
				$("html").find("*").find('.entry-title').addClass('row');
				$("html").find("*").find('.editorials-title').removeClass('justify-content-end');

				$('.entry-title-right').each(function() {
					var $post_title = $(this).children();
					var $mobile_title = $(this).next().next();
					$post_title.detach().prependTo($mobile_title);
					$mobile_title.removeClass('d-none');
					$(this).addClass('d-none');
				});
				
			}
			else {
				$("html").find("*").find('.entry-title').addClass('col');
				$("html").find("*").find('.entry-title').removeClass('row');
				$("html").find("*").find('.editorials-title').addClass('justify-content-end');

				$('.entry-title-mobile').each(function() {
					var $mobile_title = $(this).children();
					var $post_title = $(this).prev().prev();
					$mobile_title.detach().prependTo($post_title);
					$post_title.removeClass('d-none');
					$(this).addClass('d-none');
					wrapped();
				});
			}
		}
		// Execute on load
		checkWidth();
		// Bind event listener
		$(window).resize(checkWidth);
			
		function wrapped() {
			var windowsize = $window.width();
			if (windowsize > 768) {
				$('.entry-title').each(function() {
					if($(this).height() > 110) {
						var lines = $(this).height()/96;
						var marginTop = 220 - 40*lines;
					}
					$(this).css({'margin-top': marginTop});
					
				});
			}

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

<?php
	/**
	 * Home Page
	 * @package latentimages
	 */

	get_header();
?>
<div class="body" style="padding-top: 110px;">
	<div class="row pt-5 w-100 justify-content-center">
		<img class="col-auto" width="150px" height="200px" src="<?php echo get_template_directory_uri(); ?>/img/logo.png"></img>
	</div>

	<div class="page-container px-5">
		<div class="section-title row">
			<div class="col-auto">Reviews</div>
			<img class="col-auto align-self-center pink-curved-arrow" width="83px" height="100px" src="<?php echo get_template_directory_uri(); ?>/img/curved_pink_arrow.png"></img>
		</div>
		

		<?php $reviews = new WP_Query(array(
			'cat' => get_cat_ID('Reviews'),
			'orderby' => 'post_date'
		));

		$index = 0;?>

		<?php
			$reviews_link = get_category_link( get_cat_ID( 'Reviews' ) );
			$editorials_link = get_category_link( get_cat_ID( 'Editorials' ) );
			$features_link = get_category_link( get_cat_ID( 'Features' ) );
		?>

		<div class="section-content section-content-left row mb-5">
			<?php if( $reviews->have_posts() ) {
				while( $reviews->have_posts() and $index < 2 ):
					$reviews->the_post();?>
					<div class="mb-5 row no-gutters single-post">
						<div class="opacity-overlay col-auto">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full homepage-thumbnail']);?>
							</a>
						</div>
						<?php 
							$title = get_the_title();
							$title = mb_strimwidth($title, 0, 40, '...');
							$link = get_permalink();
						?>
						<div class="entry-title entry-title-left col"><a href=<?php echo $link ?>><?php echo $title ?></a></div>		
					</div>
					<?php $index++;
				endwhile;
				?>
				<a href="<?php echo $reviews_link ?>" class="row justify-content-end text-decoration-none see-more-container">
					<div class="col-auto see-more text-pink">See More</div>
					<img class="col-auto align-self-center" width="72px" height="23px" src="<?php echo get_template_directory_uri(); ?>/img/right_pink_arrow.png"></img>
				</a>
			<?php }
			else {?>
				<div class="mb-5 row no-gutters single-post">
					<div class="opacity-overlay col-auto">
						<img class="img-responsive responsive--full homepage-thumbnail" src="<?php echo get_template_directory_uri(); ?>/img/coming_soon.jpg"></img>
					</div>		
				</div>
			<?php } ?>

	</div>

		<?php wp_reset_postdata();?>

		<div class="text-right">
			<div class="section-title row justify-content-end editorials-title">
				<img class="col-auto align-self-center blue-curved-arrow" width="83px" height="100px" src="<?php echo get_template_directory_uri(); ?>/img/curved_blue_arrow.png"></img>
				<div class="col-auto">Editorials</div>
			</div>

			<?php
				$editorials = new WP_Query(array(
					'cat' => get_cat_ID('Editorials'),
					'orderby' => 'post_date'
				));

				$index = 0;?>
				<div class="section-content section-content-right row justify-content-end mb-5">
					<?php if( $editorials->have_posts() ) {
						while( $editorials->have_posts() and $index < 2 ):
							$editorials->the_post();?>
							<div class="mb-5 row no-gutters single-post">
								<?php 
									$title = get_the_title();
									$title = mb_strimwidth($title, 0, 40, '...');
									$link = get_permalink();
								?>
								<div class="entry-title entry-title-right text-right col"><a href=<?php echo $link ?>><?php echo $title ?></a></div>	
								<div class="opacity-overlay col-auto">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full homepage-thumbnail']);?>
									</a>
								</div>
								<div class="entry-title-mobile entry-title text-center row"></div>
								
							</div>
							<?php $index++;
						endwhile;?>
						<a href="<?php echo $editorials_link ?>" class="row justify-content-end text-decoration-none see-more-container">
							<div class="col-auto see-more text-blue">See More</div>
							<img class="col-auto align-self-center" width="72px" height="23px" src="<?php echo get_template_directory_uri(); ?>/img/right_blue_arrow.png"></img>
						</a>
					<?php } 
					else { ?>
						<div class="mb-5 row no-gutters single-post">
							<div class="opacity-overlay col-auto">
								<img class="img-responsive responsive--full homepage-thumbnail" src="<?php echo get_template_directory_uri(); ?>/img/coming_soon.jpg"></img>
							</div>		
						</div>
					<?php } ?>
					
				</div>
				
				<?php wp_reset_postdata();?>
		</div>

		<div class="section-title row">
			<div class="col-auto">Features</div>
			<img class="col-auto align-self-center pink-curved-arrow" width="83px" height="100px" src="<?php echo get_template_directory_uri(); ?>/img/curved_pink_arrow.png"></img>
		</div>
	
		
		<?php
			$features = new WP_Query(array(
				'cat' => get_cat_ID('Features'),
				'orderby' => 'post_date'
			));

			$index = 0;?>

			<div class="section-content section-content-left row mb-5">
				<?php if( $features->have_posts() ) {
					while( $features->have_posts() and $index < 2 ):
						$features->the_post();?>
						<div class="mb-5 row no-gutters single-post">
							<div class="opacity-overlay col-auto">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full homepage-thumbnail']);?>
								</a>
							</div>
							<?php 
								$title = get_the_title();
								$title = mb_strimwidth($title, 0, 40, '...');
								$link = get_permalink();
							?>
							<div class="entry-title entry-title-left col"><a href=<?php echo $link ?>><?php echo $title ?></a></div>		
						</div>
						<?php $index++;
					endwhile;?>
					<a href="<?php echo $features_link ?>" class="row justify-content-end text-decoration-none see-more-container" style="margin-bottom: 150px">
						<div class="col-auto text-pink see-more">See More</div>
						<img class="col-auto align-self-center" width="72px" height="23px" src="<?php echo get_template_directory_uri(); ?>/img/right_pink_arrow.png"></img>
					</a>
				<?php } else { ?>
					<div class="mb-5 row no-gutters single-post">
						<div class="opacity-overlay col-auto">
							<img class="img-responsive responsive--full homepage-thumbnail" src="<?php echo get_template_directory_uri(); ?>/img/coming_soon.jpg"></img>
						</div>		
					</div>
				<?php }?>
			</div>

			<?php wp_reset_postdata();?>

	</div><!-- #main -->
	<?php
	get_footer();
	?>
</div>
