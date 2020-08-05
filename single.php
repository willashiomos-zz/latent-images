<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.read-more-thumbnail').hover(function(){
				$(this).parent().parent().next('.read-more-title').css({'text-decoration': 'underline'});
			}, function() {
				$(this).parent().parent().next('.read-more-title').css('text-decoration', 'none');
			});
		});
	</script>
</head>

<?php
	/**
	 * The template for displaying all single posts
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
	 *
	 * @package latentimages
	 */

	get_header();
?>
<div class="body" style="padding-top: 110px;">
	<div class="single-container container">
		<div class="row">
			<?php
				while ( have_posts() ) :
					the_post();
					$fname = get_the_author_meta('first_name');
					$lname = get_the_author_meta('last_name');
					$full_name = "by {$fname} {$lname}";

					$categories = get_the_category();
					$category_id = $categories[0]->cat_ID;
					$category_name = get_cat_name($category_id);
					$category_name = strtoupper($category_name);
					
					$date = get_the_date();
					$date = strtoupper($date);
				?>
			<div class="col-sm-12 col-md-12">
				<div class="row">
					<div class="col-sm-8">
							<div class="text-roboto-slab font-weight-light" style="font-size: 12px;">
								<span class="text-pink font-weight-bold"><?php echo $category_name?></span>
								<span class="mx-2">|</span>
								<?php echo $date?>
							</div>
							<div class="" style="font-size:72px;"><?php echo the_title()?></div>
							<div class="text-blue mb-4 font-weight-light" style="font-size: 18px;"><?php echo $full_name ?></div>

						<?php echo the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full post-thumbnail mb-5']);?>
						
				
						<div class="text-roboto-slab mb-5"> 
							<?php echo the_content()?>
						</div>

					</div>

					<div class="col-sm-12 col-lg-8 col-md-12">
						<div class="horizontal-line my-3"></div>
						<div class="ml-4" style="font-size: 36px;">Read More</div>
						<div class="horizontal-line my-3"></div>
						<?php
							$the_query = new WP_Query( array(
								'posts_per_page' => 3,
								'post__not_in' => [get_the_ID()]
								));
						?>
						<div class="row m-0">
							<?php if ( $the_query->have_posts() ) : ?>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<div class="col-lg-4 col-md-4 col-sm-4">
										<a href="<?php the_permalink(); ?>">
											<?php echo the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full read-more-thumbnail']);?>
										</a>
									<div class="my-3 read-more-title" style="font-size: 24px;">
										<a href="<?php the_permalink(); ?>" class="text-black">
											<?php the_title(); ?>
										</a>
									</div>
								</div>
							<?php endwhile; ?>
							<?php endif; ?>
							<?php wp_reset_postdata(); ?>
						</div>
						<div class="horizontal-line my-3"></div>
					</div>
				</div>
			</div>
		</div>
		<?php
		endwhile;
		?>
	</div>

	<?php get_footer(); ?>
</div>