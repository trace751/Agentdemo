<?php

//add theme customizer
add_action( 'customize_register', 'custom_customizer_kreativ' );


//add CSS function
add_action( 'wp_head', 'customizer_head_styles' );

//add nav color
add_action( 'wp_head', 'nav_color' );

//ihomefinder color option
add_action('wp_head', 'ihomefinder_panel_color');


//header top bar
add_action('wp_head', 'header_top_bar');

//header top bar link
add_action('wp_head', 'header_top_link');

//add footer image
add_action('wp_head', 'footer_image');

//add footer background color
add_action('wp_head', 'footer_color');

//add featured one image
add_action('wp_head', 'featured_one');

//add featured two image
add_action('wp_head', 'featured_two');

//add featured three image
add_action('wp_head', 'featured_three');


function custom_customizer_kreativ( $wp_customize ) {

//SECTIONS	
// add new color section
$wp_customize->add_section( 'header-color', array(
	'title' => __( 'Header Color', 'kreativ-pro' ),
	'priority' => 100
) );


//Footer Section
$wp_customize->add_section( 'footer', array(
	'title' => __( 'Footer', 'kreativ-pro' ),
	'priority' => 120
) );


//Featured Section
$wp_customize->add_section( 'featured', array(
	'title' => __( 'Featured', 'kreativ-pro' ),
	'priority' => 130
) );




// featured image setting
$wp_customize->add_setting( 'featured_one', array(
	'default' => get_template_directory_uri() . '/images/f1.jpg',
	'type' => 'theme_mod'
) );

// featured image control
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featured_one', array(
	'label' => __('First Featured Image', 'kreativ-pro'),
	'section' => 'featured',
	'settings' => 'featured_one'
) ) );

// Second featured image setting
$wp_customize->add_setting( 'featured-two', array(
	'default' => get_template_directory_uri() . '/images/f2.jpg',
	'type' => 'theme_mod'
) );

// Second featured image control
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featured-two', array(
	'label' => __('Second Featured Image', 'kreativ-pro'),
	'section' => 'featured',
	'settings' => 'featured-two'
) ) );

// Third featured image setting
$wp_customize->add_setting( 'featured-three', array(
	'default' => get_template_directory_uri() . '/images/f3.jpg',
	'type' => 'theme_mod'
) );

// Third featured image control
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featured-three', array(
	'label' => __('Third Featured Image', 'kreativ-pro'),
	'section' => 'featured',
	'settings' => 'featured-three'
) ) );






// footer image setting
$wp_customize->add_setting( 'footer_image', array(
	'default' => get_template_directory_uri() . '/images/footer.jpg',
	'type' => 'theme_mod'
) );

// footer image control
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_image', array(
	'label' => __('Footer Image', 'kreativ-pro'),
	'section' => 'footer',
	'settings' => 'footer_image'
) ) );


// footer color setting
$wp_customize->add_setting( 'footer_color', array(
	'default' => '#222222',
	'type' => 'theme_mod'
) );

// footer color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_color', array(
	'label' => __('Footer Background Color', 'kreativ-pro'),
	'section' => 'footer',
	'settings' => 'footer_color'
) ) );


// add color picker setting
$wp_customize->add_setting( 'link_color', array(
	'default' => '#fff'
) );

// add color picker control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
	'label' => 'Header Color',
	'section' => 'header-color',
	'settings' => 'link_color',
) ) );




// add color for header nav link
$wp_customize->add_setting( 'nav_color', array(
	'default' => '#000'
) );

// add color picker control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_color', array(
	'label' => 'Navigation Link Color',
	'section' => 'header-color',
	'settings' => 'nav_color',
) ) );



// Change Ihomefinder title panel
$wp_customize->add_setting( 'ihomefinder_panel_color', array(
	'default' => '#CCCCCC'
) );

// add color picker control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ihomefinder_panel_color', array(
	'label' => 'IDX Accent Color',
	'section' => 'header-color',
	'settings' => 'ihomefinder_panel_color',
) ) );


// Header top bar color
$wp_customize->add_setting( 'header_top_bar', array(
	'default' => '#ffffff'
) );

// add color picker control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_top_bar', array(
	'label' => 'Header Top Bar',
	'section' => 'header-color',
	'settings' => 'header_top_bar',
) ) );


// Header top bar color
$wp_customize->add_setting( 'header_top_link', array(
	'default' => '#CCCCCC'
) );

// add color picker control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_top_link', array(
	'label' => 'Header Top Link Color',
	'section' => 'header-color',
	'settings' => 'header_top_link',
) ) );

}














//adding header color
function customizer_head_styles() {
	$link_color = get_theme_mod( 'link_color' ); 
	
	if ( $link_color != '#CCCCCC' ) :
	?>
		<style type="text/css">
			.site-header,.nav-primary, button.sub-menu-toggle, .menu-toggle, .sub-menu-toggle, ul.sub-menu{
				background-color: <?php echo $link_color; ?>;
			}
		</style>
	<?php
	endif;
}

//navigation color
function nav_color() {
	$nav_color = get_theme_mod( 'nav_color' ); 
	
	if ( $nav_color != '#000' ) :
	?>
		<style type="text/css">
			.site-header .genesis-nav-menu > li > a,.sub-menu-toggle::before, button#genesis-mobile-nav-primary, .menu-toggle::before, .genesis-nav-menu a {
				color: <?php echo $nav_color; ?>;
			}
		</style>
	<?php
	endif;
}


//Ihomefinder accent/panel color
function ihomefinder_panel_color() {
	$ihf_panel_color = get_theme_mod( 'ihomefinder_panel_color' ); 
	
	if ( $ihomefinder_panel_color != '#CCCCCC' ) :
	?>
		<style type="text/css">
			#ihf-main-container .title-bar-1, .ihf-map-icon, #ihf-main-container .btn-primary, #ihf-main-container .dropdown-menu>.active>a, #ihf-main-container .dropdown-menu>.active>a:focus, .ihf-gallery-slider-paging a{
				background-color: <?php echo $ihf_panel_color; ?>;
			}
		</style>
	<?php
	endif;
}


//Header Top Bar
function header_top_bar() {
	$header_top_bar = get_theme_mod( 'header_top_bar' ); 
	
	if ( $header_top_bar != '#CCCCCC' ) :
	?>
		<style type="text/css">
			.site-topbar {
				background-color: <?php echo $header_top_bar; ?>;
			}
		</style>
	<?php
	endif;
}


//Header Top Bar Link Color
function header_top_link() {
	$header_top_link = get_theme_mod( 'header_top_link' ); 
	
	if ( $header_top_link != '#CCCCCC' ) :
	?>
		<style type="text/css">
			.site-topbar a, .site-topbar li {
				color: <?php echo $header_top_link; ?>;
			}
		</style>
	<?php
	endif;
}



//Footer Image
function footer_image() {
	$footer_image = get_theme_mod( 'footer_image' ); 
	
	if ( $footer_image != '#CCCCCC' ) :
	?>
		<style type="text/css">
			.footer-widgets {
				background: -webkit-linear-gradient(0deg,rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.9)), url(<?php echo $footer_image; ?>;);

				background: -o-linear-gradient(0deg,rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.9)), url(<?php echo $footer_image; ?>;);

				background: -ms-linear-gradient(0deg,rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.9)), url(<?php echo $footer_image; ?>;);

				background: -moz-linear-gradient(0deg,rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.9)), url(<?php echo $footer_image; ?>;);

				background: linear-gradient(0deg,rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.9)), url(<?php echo $footer_image; ?>;);
			}
		</style>
	<?php
	endif;
}


//Footer background color
function footer_color() {
	$footer_color = get_theme_mod( 'footer_color' ); 
	
	if ( $footer_color != '#222222' ) :
	?>
		<style type="text/css">
			.footer-widgets {
				background-color: <?php echo $footer_color; ?>;
			}
		</style>
	<?php
	endif;
}


//First Featured Image
function featured_one() {
	$featured_one = get_theme_mod( 'featured_one' ); 
	
	if ( $featured_one != get_template_directory_uri() . '/images/f1.jpg' ) :
	?>
		<style type="text/css">
			.featured-one {
				background: -webkit-linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)), url(<?php echo $featured_one; ?>;) no-repeat center center;

				background: -o-linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.292)), url(<?php echo $featured_one; ?>;) no-repeat center center;

				background: -ms-linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)), url(<?php echo $featured_one; ?>;) no-repeat center center;

				background: -moz-linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)), url(<?php echo $featured_one; ?>;) no-repeat center center;

				background: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)), url(<?php echo $featured_one; ?>;) no-repeat center center;
			}
		</style>
	<?php
	endif;
}


//Second Featured Image
function featured_two() {
	$featured_two = get_theme_mod( 'featured-two' ); 
	
	if ( $featured_two != get_template_directory_uri() . '/images/f2.jpg' ) :
	?>
		<style type="text/css">
			.featured-two {
				background: -webkit-linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)), url(<?php echo $featured_two; ?>;) no-repeat center center;

				background: -o-linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.292)), url(<?php echo $featured_two; ?>;) no-repeat center center;

				background: -ms-linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)), url(<?php echo $featured_two; ?>;) no-repeat center center;

				background: -moz-linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)), url(<?php echo $featured_two; ?>;) no-repeat center center;

				background: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)), url(<?php echo $featured_two; ?>;) no-repeat center center;
			}
		</style>
	<?php
	endif;
}


//Third Featured Image
function featured_three() {
	$featured_three = get_theme_mod( 'featured-three' ); 
	
	if ( $featured_three != get_template_directory_uri() . '/images/f3.jpg' ) :
	?>
		<style type="text/css">
			.featured-three {
				background: -webkit-linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)), url(<?php echo $featured_three; ?>;) no-repeat center center;

				background: -o-linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.292)), url(<?php echo $featured_three; ?>;) no-repeat center center;

				background: -ms-linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)), url(<?php echo $featured_three; ?>;) no-repeat center center;

				background: -moz-linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)), url(<?php echo $featured_three; ?>;) no-repeat center center;

				background: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)), url(<?php echo $featured_three; ?>;) no-repeat center center;
			}
		</style>
	<?php
	endif;
}