<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>

<head>
<?php wp_head(); // Hook required for scripts, styles, and other <head> items. ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>

	<div id="container">

		<?php hybrid_get_menu( 'primary' ); // Loads the menu/primary.php template. ?>

		<div class="wrap">

			<header <?php hybrid_attr( 'header' ); ?>>

				<?php if ( display_header_text() ) : // If user chooses to display header text. ?>

					<hgroup id="branding">
						<h1 <?php hybrid_attr( 'site-title' ); ?>><a href="<?php echo home_url(); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<h2 <?php hybrid_attr( 'site-description' ); ?>><?php bloginfo( 'description' ); ?></h2>
					</hgroup><!-- #branding -->

				<?php endif; // End check for header text. ?>

				<?php hybrid_get_menu( 'secondary' ); // Loads the menu/secondary.php template. ?>

			</header><!-- #header -->

			<?php hybrid_get_sidebar( 'front-page-intro' ); // Loads the sidebar-front-page-intro.php template. ?>

			<div id="main" class="main">

			

