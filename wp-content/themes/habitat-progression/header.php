<?php
/**
 * The Header for our theme.
 *
 * @package pro
 * @since pro 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php get_template_part( 'header/social', 'sharing' ); ?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php get_template_part( 'header/page', 'loader' ); ?>
	<div id="boxed-layout-pro"<?php progression_studios_page_title(); ?>>
		
		<div id="progression-studios-header-position" class="<?php echo esc_attr( get_theme_mod('progression_studios_nav_align', 'progression-studios-nav-left') ); if (is_page() && get_post_meta($post->ID, 'progression_studios_header_floated', true) == 'on') { echo ' top-floated-header-pro'; } ;?>">
		<?php get_template_part( 'header/header', 'top' ); ?>
		
		<?php if (get_theme_mod( 'progression_studios_header_sticky', 'none-sticky-pro' ) == 'sticky-pro' ) : ?><div id="progression-sticky-header"><?php endif; ?>
			<header id="masthead-pro" class="progression-studios-site-header <?php echo esc_attr( get_theme_mod('progression_studios_nav_align', 'progression-studios-nav-left') ); if (is_page() && get_post_meta($post->ID, 'progression_studios_header_floated', true) == 'on') { echo ' floated-header-pro'; } ;?> ">

					<div id="logo-nav-pro">
						
						<?php if (get_theme_mod( 'progression_studios_logo_location', 'progression-studios-logo-location-inline' ) == 'progression-studios-logo-location-inline' ) : ?>
						<div class="width-container-pro progression-studios-logo-container">
							<h1 id="logo-pro" class="logo-inside-nav-pro noselect"><?php progression_studios_logo(); ?></h1>
						</div><!-- close .width-container-pro -->
						<?php else: ?>
							<?php progression_studios_logo_sticky_only(); ?>
						<?php endif; ?>

						<?php progression_studios_navigation(); ?>
						
					</div><!-- close #logo-nav-pro -->
					<div id="header-border-bottom-progression-studios"></div>
					<?php get_template_part( 'header/mobile', 'navigation' ); ?>
					
			</header>
		<?php if (get_theme_mod( 'progression_studios_header_sticky', 'none-sticky-pro' ) == 'sticky-pro' ) : ?></div><!-- close #progression-sticky-header --><?php endif; ?>
		
		
		<?php if (get_theme_mod( 'progression_studios_logo_location', 'progression-studios-logo-location-inline' ) == 'progression-studios-logo-location-below' ) : ?>
		<div id="header-container-logo-progression">
			<div class="width-container-pro progression-studios-logo-container">
				<h1 id="logo-pro" class="logo-inside-nav-pro noselect"><?php progression_studios_logo(); ?></h1>
				<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
		<?php endif; ?>
		
		
		<div class="clearfix-pro"></div>