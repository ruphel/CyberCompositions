<aside <?php hybrid_attr( 'sidebar', 'front-page-intro' ); ?>>
	
	<?php if ( is_active_sidebar( 'front-page-intro' ) ) : // If the sidebar has widgets. ?>

		<?php dynamic_sidebar( 'front-page-intro' ); // Displays the front-page-intro sidebar. ?>

	<?php else : // If the sidebar has no widgets. ?>


		<?php the_widget(
			'WP_Widget_Text',
			array(
				'title'  => __( 'Crafted Digital Experiences', 'kepler' ),
				/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
				'text'   => sprintf( __( '<p class="introduction">Bringing Ideas and Innovation to life!<br><br><a href="#" class="button">Our Work</a><br><small>%sclick to change%s</small></p>', 'kepler' ), current_user_can( 'edit_theme_options' ) ? '<a href="' . admin_url( 'widgets.php' ) . '">' : '', current_user_can( 'edit_theme_options' ) ? '</a>' : '' ),
				'filter' => true,
			),
			array(
				'before_widget' => '<section class="widget front_intro widget_text">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="intro-title">',
				'after_title'   => '</h3>'
			) ); 

		?>
		
	<?php endif; // End widgets check. ?>
			
</aside><!-- #sidebar-front-page-intro -->