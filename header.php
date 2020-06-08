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
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="header w-100">
		<div class="row no-gutters title justify-content-center text-align-center">
			<?php bloginfo( 'name' ); ?>
		</div>
		<div class="nav row justify-content-center">
			<a href="/latest" class="mx-3 col-auto">The Latest</a>
			<a href="/reviews" class="mx-3 col-auto">Reviews</a>
			<a href="/editorials" class="mx-3 col-auto">Editorials</a>
			<a href="/features" class="mx-3 col-auto">Features</a>
		</div>
		<div class="row pt-5 justify-content-center">
			<img class="col-auto" width="150px" height="200px" src="wp-content/themes/latentimages/img/logo.png"></img>
		</div>
</div>
