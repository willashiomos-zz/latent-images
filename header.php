<?php
/**
 * HEADER
 * @package latentimages
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			document.addEventListener('click', function (event) {
				if (event.target.closest('.open-button')) {
					$("html").find("*").find('.nav-content').removeClass('d-none');
					$("html").find("*").find('.close-button').removeClass('d-none');
					$("html").find("*").find('.open-button').addClass('d-none');
					$("html").find("*").find('.header').css({'background-color': 'transparent'});
				}
				if (event.target.closest('.close-button')) {
					$("html").find("*").find('.nav-content').addClass('d-none');
					$("html").find("*").find('.close-button').addClass('d-none');
					$("html").find("*").find('.open-button').removeClass('d-none');
				}
			});
		});
	</script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
	$reviews_link = get_category_link( get_cat_ID( 'Reviews' ) );
	$editorials_link = get_category_link( get_cat_ID( 'Editorials' ) );
	$features_link = get_category_link( get_cat_ID( 'Features' ) );
	$latest_link = get_permalink( get_page_by_path( 'latest' ) );
?>

<div class="nav-content d-none w-100 h-100 bg-pink">
	<ul class="navbar-nav ml-5">
		<li class="nav-item">
			<a class="nav-link" href="<?php echo $latest_link ?>">The Latest</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo $reviews_link ?>">Reviews</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo $editorials_link ?>">Editorials</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo $features_link ?>">Features</a>
		</li>
	</ul>
</div>

<div class="container-fluid">
	<div class="header row w-100 p-4 position-fixed d-flex align-items-center">
		<div class="website-title col m-3">
			<a href="<?php echo get_home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
		</div>
		<div class="open-menu col-auto justify-content-end m-3">
			<img src="<?php echo get_template_directory_uri(); ?>/img/hamburger_menu.svg" class="cursor-pointer open-button" height="40px"></img>
			<img src="<?php echo get_template_directory_uri(); ?>/img/x_icon.svg" class="cursor-pointer close-button d-none" height="40px"></img>
		</div>
	</div>
</div>