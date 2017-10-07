<div id="progression-studios-header-top"></div>
<div id="habitat-progression-header-top">
	<div class="width-container-pro">
		
		<div class="habitat-header-left">
			<?php wp_nav_menu( array('theme_location' => 'progression-studios-header-top-left', 'container_id' => 'progression-header-top-left-container', 'menu_class' => 'sf-menu', 'fallback_cb' => false, 'walker'  => new ProgressionFrontendWalker ) ); ?>
			<?php dynamic_sidebar( 'progression-studios-header-top-left' ); ?>
			<div class="habitat-header-icons-left"><?php get_template_part( 'header/header', 'icons' ); ?></div>
			<div class="clearfix-pro"></div>
		</div>

		<div class="habitat-header-right">
			<?php dynamic_sidebar( 'progression-studios-header-top-right' ); ?>
			<div class="habitat-header-icons-right"><?php get_template_part( 'header/header', 'icons' ); ?></div>
			<?php wp_nav_menu( array('theme_location' => 'progression-studios-header-top-right', 'container_id' => 'progression-header-top-right-container', 'menu_class' => 'sf-menu', 'fallback_cb' => false, 'walker'  => new ProgressionFrontendWalker ) ); ?>
			<div class="clearfix-pro"></div>
		</div>
		
		<div class="clearfix-pro"></div>
	</div>
</div><!-- close #header-top -->