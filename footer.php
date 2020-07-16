<?php
/**
 * FOOTER
 * @package latentimages
 */

?>

<div class="footer d-flex align-items-center">
	<div class="container">
		<div class="row justify-content-center mb-4">
			<img class="col-auto" width="150px" height="150px" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" ></img>
		</div>
		<div class="row justify-content-center align-items-center footer-links">
			<div class="col-sm-4 col-md-auto col-lg-auto">
			<?php
				$reviews_link = get_category_link( get_cat_ID( 'Reviews' ) );
				$editorials_link = get_category_link( get_cat_ID( 'Editorials' ) );
				$features_link = get_category_link( get_cat_ID( 'Features' ) );
				$latest_link = get_permalink( get_page_by_path( 'latest' ) );
				$about_link = get_permalink( get_page_by_path( 'about' ) );	
			?>
				<div class="row">
					<div class="col-sm-12 col-md-7 col-lg-7">
						<a href="<?php echo $latest_link ?>">The Latest</a>
					</div>
					<div class="col-md-5 col-sm-12 col-lg-5">
						<a href="<?php echo $editorials_link ?>">Editorials</a>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12 col-md-7 col-lg-7">
						<a href="<?php echo $reviews_link ?>">Reviews</a>
					</div>
					<div class="col-sm-12 col-md-5 col-lg-5">
						<a href="<?php echo $features_link ?>">Features</a>
					</div>
				</div>
			</div>
				
			<div class="col-auto mx-4">
				<div class="vertical-line"></div>
			</div>

			<div class="col-sm-4 col-md-auto col-lg-auto">
				<div class="row">
					<div class="col-sm-12">
						<a href="<?php echo $about_link ?>">About Us</a>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<a href="mailto:filmsfromthemargin.ec@gmail.com">Contact</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
