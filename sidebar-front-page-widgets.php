<aside <?php hybrid_attr( 'sidebar', 'front-page-widgets' ); ?>>
	
			<?php if ( is_active_sidebar( 'front-page-widgets' ) ) : // If the sidebar has widgets. ?>

			<?php dynamic_sidebar( 'front-page-widgets' ); // Displays the front-page-middle sidebar. ?>

			<?php else : // If the sidebar has no widgets. ?>


		<aside class="sidebar sidebar-col-3" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	
	
				<section class="widget">
					<h3 class="widget-title">Hybrid Core</h3>
						<div class="textwidget">
							<p><img class="aligncenter" alt="image1" src="<?php bloginfo('stylesheet_directory'); ?>/images/sample2.png"/></p>

							Powered by the rock solid Hybrid Core Framework. Kepler is gonna last the distance. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
						</div>
				</section>

				<section class="widget">
					<h3 class="widget-title">Kepler</h3>
						<div class="textwidget">
							<p><img class="aligncenter" alt="image2" src="<?php bloginfo('stylesheet_directory'); ?>/images/sample3.png" /></p>

							<b>Kepler</b> is a nice theme Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget Lorem ipsum dolor sit amet, consectetuer adipiscing 
						</div>
				</section>

				<section class="widget">
					<h3 class="widget-title">Cyberdesign Craft</h3>
						<div class="textwidget">
							<p><img class="aligncenter" alt="image3" src="<?php bloginfo('stylesheet_directory'); ?>/images/sample4.png" /></p>

							<a href="#" alt="Cyberdesign Craft">Cyberdesign Craft</a> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget Lorem ipsum dolor sit amet Lorem ipsum dolor sit ame
						</div>
				</section>
				
		</aside>

		
		<?php endif; // End widgets check. ?>
			
</aside><!-- #sidebar-front-page-middle -->