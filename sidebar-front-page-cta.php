<aside <?php hybrid_attr( 'sidebar', 'front-page-cta' ); ?>>
	
	<?php if ( is_active_sidebar( 'front-page-cta' ) ) : // If the sidebar has widgets. ?>

		<?php dynamic_sidebar( 'front-page-cta' ); // Displays the front-page-cta sidebar. ?>

	<?php else : // If the sidebar has no widgets. ?>

		<?php the_widget(
			'WP_Widget_Text',
			array(
				'title'  => __( 'Call To Action Banner', 'kepler' ),
				/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
				'text'   => sprintf( __( '<div class="cta-left">This is a great place to write something specific that you want your visitors to read.</div><div class="cta-right"><a class="button" href="#">Contact Us Today</a></div><br/><small>%sclick to change%s</small>', 'kepler' ), current_user_can( 'edit_theme_options' ) ? '<a style="color:#eee;" href="' . admin_url( 'widgets.php' ) . '">' : '', current_user_can( 'edit_theme_options' ) ? '</a>' : '' ),
				'filter' => true,
			),
			array(
				'before_widget' => '<section class="widget_cta"><div class="cta-wrap">',
				'after_widget'  => '</div></section>',
				'before_title'  => '<h3 class="cta-title">',
				'after_title'   => '</h3>'
			)
		);

		endif; // End widgets check. ?>
			
</aside><!-- #sidebar-front-page-cta -->