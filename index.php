<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var $window = $(window);
		var $pane = $('#pane1');

		function Utils() { }
		Utils.prototype = {
			constructor: Utils,
			isElementInView: function (element, fullyInView) {
				var pageTop = $(window).scrollTop();
				var pageBottom = pageTop + $(window).height();
				var elementTop = $(element).offset().top;
				var elementBottom = elementTop + $(element).height();

				if (fullyInView === true) {
					return ((pageTop < elementTop) && (pageBottom > elementBottom));
				} else {
					return ((elementTop <= pageBottom) && (elementBottom >= pageTop));
				}
			}
		};
		var Utils = new Utils();

		function isScrolledIntoView(elem) {
			var docViewTop = $(window).scrollTop();
			var docViewBottom = docViewTop + $(window).height();

			var elemTop = $(elem).offset().top;
			var elemBottom = elemTop + $(elem).height();

			return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
		}

		function checkHeaderStyling() {
			var isElementInView = Utils.isElementInView($('.carousel'), false);
			if (isElementInView) {
				$('.header').css({'background-color': 'transparent'});
				$('.website-title').css({'color': '#FDFFEF'});
				$('.open-button').css({'filter':'invert(1)'});
				$('.logo').css({'filter':'invert(1)'});
			} else {
				$('.header').css({'background-color': 'rgba(253, 255, 239, .7)'});
				$('.website-title').css({'color': '#000000'});
				$('.open-button').css({'filter':'none'});
				$('.logo').css({'filter':'none'});
			}
		}

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

		$(window).scroll(function(){
			checkHeaderStyling();
		});

		$(document).ready(function() {
			wrapped();
			checkHeaderStyling();
			$('.opacity-overlay').hover(function(){
				$(this).prev('.entry-title-right').css({'text-decoration': 'underline'});
				$('.entry-title-right a:link').css({'text-decoration-color': '#506CCF'});
			}, function() {
				$(this).prev('.entry-title-right').css('text-decoration', 'none');
			});

			document.addEventListener('click', function (event) {
				if (event.target.closest('.open-button')) {
					$('.website-title a:link').css({'color': '#000000'});
					$('.website-title a:visited').css({'color': '#000000'});
					$('.website-title a:hover').css({'color': '#000000'});
				}
				if (event.target.closest('.close-button')) {
					checkHeaderStyling();
				}
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
<div class="body">
	<div id="carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
		<?php $posts = new WP_Query(array(
        	'orderby' => 'post_date'
        ));
		$index = 0;
		if ($posts -> have_posts()) {
			while ($posts -> have_posts() and $index < 5):
				$posts->the_post();?>
				<div class="carousel-item<?php if($index == 0) { echo ' active'; }?>">
					<a href="<?php the_permalink(); ?>">
						<img class="d-block h-100 w-100" style="object-fit: cover;" src="<?php the_post_thumbnail_url('full'); ?>">
						<div class="carousel-caption p-4 m-3">
							<?php the_title() ?>
						</div>
					</a>
				</div>
				<?php $index++;
			endwhile; wp_reset_query();
		}  ?>
		</div>
	</div>

	<div class="page-container px-5" style="">
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
					<div class="mb-5 row w-100 no-gutters single-post">
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
				<div class="mb-5 row w-100 no-gutters single-post">
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
							<div class="mb-5 row w-100 no-gutters single-post">
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
						<div class="mb-5 row w-100 no-gutters single-post">
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
						<div class="mb-5 row w-100 no-gutters single-post">
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
					<div class="mb-5 row w-100 no-gutters single-post">
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
