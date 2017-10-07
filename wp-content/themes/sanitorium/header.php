 <?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Sanitorium
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
		
		<div id="topbar">
			<div class="container">	
				<div class="row">
					<div class="col-md-5 col-sm-12 col-sm-5">
						<div class="top-nav">
							<?php wp_nav_menu( array('theme_location'  => 'top') ); ?>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-12 col-sm-3">
						<div class="top-social">
                        <?php if(get_theme_mod('facebook_link','#') != '') { ?>
							<a href="<?php echo esc_url(get_theme_mod('facebook_link','#')); ?>"><i class="fa fa-facebook fa-lg"></i></a>
                        <?php } ?>
                        <?php if(get_theme_mod('twitter_link','#') != '') { ?>
                            <a href="<?php echo esc_url(get_theme_mod('twitter_link','#')); ?>"><i class="fa fa-twitter fa-lg"></i></a>
                        <?php } ?>
                        <?php if(get_theme_mod('linked_link','#') != '') { ?>
                            <a href="<?php echo esc_url(get_theme_mod('linked_link','#')); ?> "><i class="fa fa-linkedin fa-lg"></i></a>
                        <?php } ?>
                        <?php if(get_theme_mod('gplus_link','#') != '') { ?>
                            <a href="<?php echo esc_url(get_theme_mod('gplus_link','#')); ?>"><i class="fa fa-google-plus fa-lg"></i></a>
                        <?php } ?>
						<div class="clear"></div></div>
					</div>
					
					<div class="col-md-4 col-sm-4">
						<div class="top-search">
						<?php echo get_search_form();?>
						</div>
					</div>
				</div>
			</div>			
		</div>		
		
		<div id="header">
            <div class="container">	
				<div class="row">				
						<div class="logo">
							<?php sanitorium_the_custom_logo(); ?>
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h1>

					<?php $description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p><?php echo $description; ?></p>
					<?php endif; ?>
						</div>
                    
						<div class="toggle">
							<a class="toggleMenu" href="#"><?php _e('Menu','sanitorium'); ?></a>
						</div> 						
						<div class="main-nav">
							<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>							
						</div>						
				</div><!--row-->
            </div><!--container-->               
		</div><!-- header -->
		
		
		<div id="appoint">
			<div class="container">
				<div class="row">
					<div class="appoint-inner">
						<div class="col-md-4 col-sm-4">
							<div class="appoint-col">
								<div class="appoint-icon"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/phone.png" /></div>
								<div class="appoint-details">
									<h3><?php echo esc_attr(get_theme_mod('firstcol_num',__('Call Today 012 345 6789','sanitorium'))); ?></h3>
                                    <h4><?php echo esc_attr(get_theme_mod('firstcol_text',__('Lorem ipsum dolor sit amet','sanitorium'))); ?></h4>								
								</div>
							</div>
						</div>

						<div class="col-md-4 col-sm-4">
							<div class="appoint-col">
								<div class="appoint-icon"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/hours.png" /></div>
								<div class="appoint-details">
									<h3><?php echo esc_attr(get_theme_mod('secondcol_num',__('Open Hours','sanitorium'))); ?></h3>
                                    <h4><?php echo esc_attr(get_theme_mod('secondcol_text',__('Mon - Sat: 8 am - 5 pm, Sunday: CLOSED','sanitorium'))); ?></h4>
								</div>
							</div>
						</div>
						
						<div class="col-md-4 col-sm-4">
							<div class="appoint-col">
								<div class="appoint-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/appoint.png" /></div>
								<div class="appoint-details">
									<h3><?php echo esc_attr(get_theme_mod('thirdcol_num',__('Make an Appointment','sanitorium'))); ?></h3>
                                    <h4><?php echo esc_attr(get_theme_mod('thirdcol_text',__('Its so fast','sanitorium'))); ?></h4>								
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	
		
<?php if ( is_front_page() && !is_home() ) { ?>
	<?php $hideslide = get_theme_mod('hide_slider', '1'); ?>
		<?php if($hideslide == ''){ ?>
                <!-- Slider Section -->
                <?php for($sld=7; $sld<10; $sld++) { ?>
                	<?php if( get_theme_mod('page-setting'.$sld)) { ?>
                	<?php $slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$sld,true)); ?>
                	<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
                			$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
                			$img_arr[] = $image;
               				$id_arr[] = $post->ID;
                		endwhile;
                	}
                }
                ?>
<?php if(!empty($id_arr)){ ?>
        <div id="slider" class="nivoSlider">
            <?php 
            $i=1;
            foreach($img_arr as $url){ ?>
            <?php if(!empty($url)){ ?>
            <img src="<?php echo $url; ?>" title="#slidecaption<?php echo $i; ?>" />
            <?php }else{ ?>
            <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/default-slide.jpg" title="#slidecaption<?php echo $i; ?>" />
            <?php } ?>
            <?php $i++; }  ?>
        </div>   
<?php 
	$i=1;
		foreach($id_arr as $id){ 
		$title = get_the_title( $id ); 
		$post = get_post($id); 
		$content = apply_filters('the_content', substr(strip_tags($post->post_content), 0, 150)); 
?>                 
<div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
    <div class="top-bar">
    	<h2><?php echo $title; ?></h2>
    	<?php echo $content; ?>
    	<a class="read-more" href="<?php the_permalink(); ?>"><?php echo get_theme_mod('slidelink_text','Read More'); ?></a>
    </div>
</div>      
    <?php $i++; } ?>       
     </div>
<div class="clear"></div>        
</section>
<?php } else { ?>
<div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
    <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider1.jpg" alt="" title="#slidecaption1" />
    <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider2.jpg" alt="" title="#slidecaption2" />
    <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider3.jpg" alt="" title="#slidecaption3" />
    </div>                    
      <div id="slidecaption1" class="nivo-html-caption">
        <div class="top-bar">
                <h2><?php esc_html_e('Welcome to Sanitorium.','sanitorium'); ?></h2>
                <p><?php esc_html_e('Our number one goal is to make sure every one of our patients leaves 100% happy 
and with a bright, white smile on their face!','sanitorium'); ?></p>
                <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'sanitorium');?></a>
        </div>
        </div>
        
        <div id="slidecaption2" class="nivo-html-caption">
            <div class="top-bar">
                   <h2><?php esc_html_e('Dental care for life.','sanitorium'); ?></h2>
                <p><?php esc_html_e('For title, description, image and link go to Pages and add title, description featured image.','sanitorium'); ?></p>
                <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'sanitorium');?></a>
            </div>
        </div>
        
        <div id="slidecaption3" class="nivo-html-caption">
            <div class="top-bar">
                    <h2><?php esc_html_e('We provide 24x7 Support.','sanitorium'); ?></h2>
                <p><?php esc_html_e('For title, description, image and link go to Pages and add title, description featured image.','sanitorium'); ?></p>
                <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'sanitorium');?></a>
            </div>
        </div>
<div class="clear"></div>
<!-- Slider Section -->
<?php } } } ?>

      <div class="main-container">
         <?php if( function_exists('is_woocommerce') && is_woocommerce() ) { ?>
		 	<div class="content-area">
                <div class="middle-align content_sidebar">
                	<div id="sitemain" class="site-main">
         <?php } ?>