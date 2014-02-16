<?php
/**
 * This is child themes functions.php file. All modifications should be made in this file.
 *
 * All style changes should be in child themes style.css file.
 *
 * @package    Kepler
 * @version    1.0
 * @author     Ruairi Phelan <rory@cyberdesigncraft.com>
 * @copyright  Copyright (c) 2013, Ruairi Phelan
 * @link       http://cyberdesigncraft.com/about/
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Adds the child theme setup function to the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'kepler_theme_setup', 11 );

/**
 * Setup function.  All child themes should run their setup within this function.  The idea is to add/remove 
 * filters and actions after the parent theme has been set up.  This function provides you that opportunity.
 *
 * @since  1.0
 * @access public
 * @return void
 */
function kepler_theme_setup() {

	/* Change default background color. */
	add_theme_support(
	'custom-header',
	array(
		'default-image'      => '',
		'default-text-color' => '272727',
	));

	add_theme_support(
	'custom-background',
	array(
		'default-color' => 'eeeeee',
		'default-image' => '',
	));
	
	/* Change primary color. */
	add_filter( 'theme_mod_color_primary', 'kepler_primary_color' );
	
	/* Register sidebars. */
	add_action( 'widgets_init', 'kepler_register_sidebars', 6 );
	
	/* Adds custom attributes to the front-page-widgets sidebar. */
	add_filter( 'hybrid_attr_sidebar', 'kepler_front_page_widgets', 11, 2 );
	
}

/**
 * Change primary color
 *
 * @since 1.0
 * @access public
 * @param  string  $hex
 * @return string
 */
function kepler_primary_color( $color ) {

	return $color ? $color : '272727';
	
}

/**
 * Registers sidebars.
 *
 * @since  1.0
 * @access public
 * @return void
 */
function kepler_register_sidebars() {

	hybrid_register_sidebar(
		array(
			'id'          	=> 'front-page-intro',
			'name'        	=> _x( 'Front Page Intro', 'sidebar', 'kepler' ),
			'description' 	=> __( 'The Frontpage Intro dynamic sidebar.', 'kepler' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s front_intro">', // front_intro
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="intro-title">',
			'after_title'   => '</h3>'
	));

	hybrid_register_sidebar(
		array(
			'id'          	=> 'front-page-cta',
			'name'        	=> _x( 'Front Page Call to Action', 'sidebar', 'kepler' ),
			'description' 	=> __( 'This is the Call to Action siderbar on the Front Page.', 'kepler' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s widget_cta"><div class="cta-wrap">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h3 class="cta-title">',
			'after_title'   => '</h3>'
		)
	);

	hybrid_register_sidebar(
		array(
			'id'          	=> 'front-page-widgets',
			'name'        	=> _x( 'Front Page Widgets', 'sidebar', 'kepler' ),
			'description' 	=> __( 'Front Page Widgets. This widget area can contain contact information etc.', 'kepler' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s front_intro">',
			'after_widget'  => '</section>'
		)
	);
}

/**
 * Calculate number of widgets.
 *
 * @since  1.0
 * @access public
 * @param  array  $attr
 * @param  string $context
 * @return array
 */
function kepler_front_page_widgets( $attr, $context ) {

	if ( 'front-page-widgets' === $context ) {
		global $sidebars_widgets;

		if ( is_array( $sidebars_widgets ) && !empty( $sidebars_widgets[ $context ] ) ) {

			$count = count( $sidebars_widgets[ $context ] );

			if ( !( $count % 3 ) || $count % 2 )
				$attr['class'] .= ' sidebar-col-3';

			elseif ( !( $count % 2 ) )
				$attr['class'] .= ' sidebar-col-2';

			else
				$attr['class'] .= ' sidebar-col-1';

		}
	}

	return $attr;
}

/* Excerpt More */
function kepler_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'kepler' ) . '</a>';
}
add_filter( 'excerpt_more', 'kepler_excerpt_more' );