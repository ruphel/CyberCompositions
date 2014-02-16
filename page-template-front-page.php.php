<?php 
/**
 * Template Name: Front Page
 *
 * @package Kepler
 * @subpackage Template
 * @since 1.0
 */
 
get_header('home'); // Loads the header.php template. ?>

<main <?php hybrid_attr( 'content' ); ?>>

	<h2 class="rtl latest"><?php _e( "Our Latest News", 'kepler' ); ?></h2>

	<?php
	$sticky = get_option( 'sticky_posts' );
	rsort( $sticky );

	$loop = new WP_Query( 
		array(
			'post__in' => array_slice( $sticky, 0, 2 ),
			'posts_per_page' => 3,
			'tax_query' => array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array(
						'post-format-aside',
						'post-format-audio',
						'post-format-chat',
						'post-format-link', 
						'post-format-quote',
						'post-format-status',
						'post-format-video'
					),
					'operator' => 'NOT IN'
				)
			)
		)); ?>

			

				<aside class="sidebar sidebar-col-3">

					<?php if ( $loop->have_posts() ) : ?>

						<?php while ( $loop->have_posts() ) : $loop->the_post(); $do_not_duplicate[] = get_the_ID();  ?>

						<section class="widget ltr sticky">

							<section id="post-<?php the_ID(); ?>">

							<h3 class="widget-title"><?php the_title(); ?></h3>
								<div class="ltr top-image">
									<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => 'Medium', 'size' => 'medium' ) ); ?>
								</div>

							
							<div class="ltr top-text"><?php the_excerpt(); ?></div>

							</section>

						</section>

						<?php endwhile; ?>

				</aside>

				<?php else : // If no posts were found. ?>

					<aside class="sidebar sidebar-col-1">

						<p><?php _e( "Please add three sticky posts with featured images.", 'kepler' ); ?></p>

					</aside>
			

				<?php endif; ?>
				
				<?php wp_reset_query(); ?>


			<?php hybrid_get_sidebar( 'front-page-cta' ); // Loads the sidebar-front-page-cta.php template. ?>

			<?php hybrid_get_sidebar( 'front-page-widgets' ); // Loads the sidebar-front-page-widgets.php template. ?>

	
</main><!-- #content -->

<?php get_footer(); // Loads the footer.php template. ?>