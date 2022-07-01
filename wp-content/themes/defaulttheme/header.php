<!DOCTYPE html>
<html>

<?php
$default_logo = get_field('default_logo', 'option');
$default_logo_inverse = get_field('default_logo_inverse', 'option');
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?= THEMEDIR ?>/favicon.png">
	<link rel="apple-touch-icon" href="<?= THEMEDIR ?>/apple-touch-icon.png">
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>><?php wp_body_open(); ?>
	<main id="main">
		<header class="main-header">
			<!-- SKIP HEADER GO TO MAIN CONTENT -->
			<a id='skip-nav' class='screenreader-text' href='#main'>
				Skip Navigation or Skip to Content
			</a>	
				
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-3 col-lg-3 brand">
						<a class="default-logo" href="<?= get_home_url(); ?>">
							<img src="<?= $default_logo_inverse['url']; ?>" class="logo transparent" alt="default logo transparent" loading="lazy" >
							<img src="<?= $default_logo['url']; ?>" class="logo" alt="default logo" loading="lazy" >
						</a>
					</div>

					<div class="col-sm-6 col-md-9 col-lg-9 menu">
						<?php 
						$array_menu = wp_get_menu_array();

						//WPML menu
						$languages = apply_filters( 'wpml_active_languages', NULL, 'skip_missing=0');
						$headerCallToAction = get_field('header_call_to_action', 'option');
						?>

						<?php if($array_menu) { ?>
							<desktop-navigation cta='<?= json_encode($headerCallToAction); ?>' languages='<?= ($languages ? json_encode($languages) : ''); ?>' menuitems='<?= json_encode($array_menu); ?>' ></desktop-navigation>
							<mobile-navigation cta='<?= json_encode($headerCallToAction); ?>' languages='<?= ($languages ? json_encode($languages) : ''); ?>' menuitems='<?= json_encode($array_menu); ?>'></mobile-navigation>
						<?php } ?>
					</div>
				</div>
			</div>
		</header>
		<!-- Ends in footer.php -->


