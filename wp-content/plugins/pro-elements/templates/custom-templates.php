<?php

/**
 * Default Templates
 */




add_action( 'vc_load_default_templates_action','template_home_progression_studios' ); // Hook in
function template_home_progression_studios() {
    $data               = array(); // Create new array
    $data['name']       = __( ' Home Page', 'pro-elements' ); // Assign name for your custom template
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/highlight_1_template_thumb.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['content']    = <<<CONTENT
		[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1479026809024{margin-top: -60px !important;margin-bottom: 50px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_column][rev_slider_vc alias="habitat_slider"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces"][vc_column][vc_custom_heading text="OUR PROGRAMS" font_container="tag:h4|font_size:24px|text_align:center|color:%23238eba" use_theme_fonts="yes"][vc_column_text css=".vc_custom_1479027005378{margin-bottom: 80px !important;padding-right: 15% !important;padding-left: 15% !important;}"]
		<h3 style="text-align: center; font-size: 48px; text-transform: none; font-weight: inherit;">We focus on <strong>protecting</strong> and <strong>preserving</strong>
		the <strong>environment</strong></h3>
		[/vc_column_text][progression_program program_post_count="4" program_sorting_pro="" program_text_bg_color="#0ed768" program_heading_color="#0f0e07" program_description_color="#0f0e07" button_bg_color="#ffffff" button_text_color="#262626"][/vc_column][/vc_row][vc_row][vc_column][vc_column_text]

		[/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1479027304030{margin-bottom: 10px !important;padding-top: 30px !important;padding-bottom: 30px !important;}"][vc_column][vc_custom_heading text="UPCOMING EVENTS" font_container="tag:h2|font_size:42px|text_align:center|color:%23238eba" use_theme_fonts="yes" css=".vc_custom_1479027178940{margin-top: 13px !important;margin-bottom: 40px !important;}"][pro_event event_posts_pro="3"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1478425611053{margin-bottom: -95px !important;}"][vc_column][vc_row_inner css=".vc_custom_1477755386178{margin-bottom: 0px !important;padding-top: 60px !important;padding-bottom: 60px !important;background-image: url(https://habitat.progressionstudios.com/wp-content/uploads/2016/09/highlight-background.jpg?id=273) !important;}"][vc_column_inner css=".vc_custom_1477755377130{margin-bottom: 0px !important;padding-bottom: 0px !important;}"][vc_custom_heading text="We need your help! Join our cause." font_container="tag:h3|font_size:48|text_align:center|color:%230ed768" use_theme_fonts="yes"][vc_column_text]
		<p style="text-align: center;"><span style="color: #7e7c71; font-size: 21px;">She packed her seven versalia, put her initial into the belt and made herself.</span></p>
		[/vc_column_text][vc_btn title="Donate" style="custom" custom_background="#ffffff" custom_text="#0f0e07" shape="round" align="center" css=".vc_custom_1477755856784{border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-right: 20px !important;padding-left: 20px !important;}"][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1477755392497{margin-top: 0px !important;padding-top: 0px !important;}"][vc_column_inner css=".vc_custom_1477755399938{margin-top: 0px !important;padding-top: 0px !important;}"][vc_media_grid element_width="3" gap="0" item="275" grid_id="vc_gid:1479027280085-98af2600-5d65-6" include="278,277,280,279" css=".vc_custom_1477755337232{border-top-width: 6px !important;border-right-width: 6px !important;border-bottom-width: 6px !important;border-left-width: 6px !important;border-left-color: #ffffff !important;border-left-style: solid !important;border-right-color: #ffffff !important;border-right-style: solid !important;border-top-color: #ffffff !important;border-top-style: solid !important;border-bottom-color: #ffffff !important;border-bottom-style: solid !important;}"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}


add_action( 'vc_load_default_templates_action','tempalte_about_progression_studios' ); // Hook in
function tempalte_about_progression_studios() {
    $data               = array(); // Create new array
    $data['name']       = __( ' Our Mission Page', 'pro-elements' ); // Assign name for your custom template
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/highlight_2_template_thumb.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['content']    = <<<CONTENT
	[vc_row][vc_column][vc_column_text css=".vc_custom_1479027615676{margin-top: 6px !important;padding-right: 15% !important;padding-left: 15% !important;}"]
	<h3 style="text-align: center; font-size: 48px; text-transform: none; font-weight: inherit;">We focus on <strong>protecting</strong> and <strong>preserving</strong> the <strong>environment</strong></h3>
	[/vc_column_text][vc_column_text css=".vc_custom_1479027856882{margin-bottom: 40px !important;padding-right: 15% !important;padding-left: 15% !important;}"]
	<p style="text-align: left; font-size: 20px;"><span style="color: #238eba;"><strong>She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown </strong></span></p>
	[/vc_column_text][vc_video link="https://vimeo.com/24456787" align="center" css=".vc_custom_1479027965011{margin-bottom: 45px !important;}"][vc_column_text css=".vc_custom_1479028217261{margin-bottom: 82px !important;padding-right: 15% !important;padding-left: 15% !important;}"]Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way. On her way she met a copy.

	The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their projects again and again.[/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1479028258439{padding-top: 50px !important;background-color: #f7f8f8 !important;}"][vc_column][vc_custom_heading text="Our Focus" font_container="tag:h2|font_size:24px|text_align:center|color:%23238eba" use_theme_fonts="yes"][vc_custom_heading text="What We Do" font_container="tag:h3|font_size:48px|text_align:center" use_theme_fonts="yes" css=".vc_custom_1479028352077{margin-bottom: 70px !important;}"][progression_program program_post_count="4" program_sorting_pro="" program_text_bg_color="#0e8ed7" program_heading_color="#ffffff" program_description_color="#ffffff"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1479028503046{margin-bottom: -60px !important;padding-top: 80px !important;padding-bottom: 90px !important;background-image: url(https://habitat.progressionstudios.com/wp-content/uploads/2016/11/highlight-2.jpg?id=340) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][vc_column_text]
	<h3 style="text-align: left; font-size: 48px; text-transform: none; font-weight: inherit;">We can't do it alone.
	<strong>Learn how to help.</strong></h3>
	[/vc_column_text][vc_column_text]The copy warned the Little Blind Text, that where it came
	from it would have been rewritten a thousand times and
	everything that was left from its origin would be the word.[/vc_column_text][vc_btn title="Take Action" style="custom" custom_background="#db444f" custom_text="#ffffff" shape="round" link="url:https%3A%2F%2Fhabitat.progressionstudios.com%2Fshop%2F|||" css=".vc_custom_1479028461033{margin-top: 20px !important;}"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}



add_action( 'vc_load_default_templates_action','template_menu_progression_studios' ); // Hook in
function template_menu_progression_studios() {
    $data               = array(); // Create new array
    $data['name']       = __( ' Programs Page', 'pro-elements' ); // Assign name for your custom template
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/homepage_template_thumb.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['content']    = <<<CONTENT
		[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1479028632342{margin-top: -25px !important;}"][vc_column][progression_program program_sorting_pro="true" program_text_bg_color="#f7f7f7"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1478247486893{margin-bottom: -60px !important;}"][vc_column][vc_row_inner css=".vc_custom_1477755386178{margin-bottom: 0px !important;padding-top: 60px !important;padding-bottom: 60px !important;background-image: url(https://habitat.progressionstudios.com/wp-content/uploads/2016/09/highlight-background.jpg?id=273) !important;}"][vc_column_inner css=".vc_custom_1477755377130{margin-bottom: 0px !important;padding-bottom: 0px !important;}"][vc_custom_heading text="We need your help! Join our cause." font_container="tag:h3|font_size:48|text_align:center|color:%230ed768" use_theme_fonts="yes"][vc_column_text]
		<p style="text-align: center;"><span style="color: #7e7c71; font-size: 21px;">She packed her seven versalia, put her initial into the belt and made herself.</span></p>
		[/vc_column_text][vc_btn title="Donate" style="custom" custom_background="#ffffff" custom_text="#0f0e07" shape="round" align="center" css=".vc_custom_1477755856784{border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-right: 20px !important;padding-left: 20px !important;}"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}


add_action( 'vc_load_default_templates_action','template_no_slider_progression_studios' ); // Hook in
function template_no_slider_progression_studios() {
    $data               = array(); // Create new array
    $data['name']       = __( ' Contact Page', 'pro-elements' ); // Assign name for your custom template
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/homepage_template_thumb.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['content']    = <<<CONTENT
		[vc_row][vc_column width="1/2"][vc_row_inner css=".vc_custom_1479334758921{margin-bottom: 0px !important;padding-bottom: 0px !important;}"][vc_column_inner width="3/4"][vc_custom_heading text="Address" font_container="tag:h3|font_size:30px|text_align:left|color:%230f0e07" use_theme_fonts="yes" css=".vc_custom_1476730254515{margin-bottom: 5px !important;}"][/vc_column_inner][vc_column_inner width="1/4" css=".vc_custom_1479334848324{margin-bottom: 0px !important;padding-bottom: 0px !important;}"][vc_icon icon_fontawesome="fa fa-map-marker" color="custom" size="lg" align="right" custom_color="#0eb2d7" css=".vc_custom_1479335085323{margin-top: 5px !important;margin-bottom: -5px !important;padding-bottom: 0px !important;}" el_class="progression-hide-on-mobile"][/vc_column_inner][/vc_row_inner][vc_column_text css=".vc_custom_1476730664589{margin-bottom: 10px !important;}"]<span style="color: #000000; font-size: 18px;">1600 Wildrock, Santa Rosa, CA 95407</span>[/vc_column_text][vc_separator style="dotted" css=".vc_custom_1476730489895{margin-bottom: 10px !important;}"][vc_row_inner css=".vc_custom_1479334758921{margin-bottom: 0px !important;padding-bottom: 0px !important;}"][vc_column_inner width="3/4"][vc_custom_heading text="Call" font_container="tag:h3|font_size:30px|text_align:left|color:%230f0e07" use_theme_fonts="yes" css=".vc_custom_1476730498758{margin-bottom: 10px !important;}"][/vc_column_inner][vc_column_inner width="1/4" css=".vc_custom_1479334848324{margin-bottom: 0px !important;padding-bottom: 0px !important;}"][vc_icon icon_fontawesome="fa fa-phone" color="custom" size="lg" align="right" custom_color="#0eb2d7" css=".vc_custom_1479335090709{margin-top: 5px !important;margin-bottom: -5px !important;padding-bottom: 0px !important;}" el_class="progression-hide-on-mobile"][/vc_column_inner][/vc_row_inner][vc_column_text css=".vc_custom_1476730739141{margin-bottom: 10px !important;}"]<span style="color: #000000; font-size: 18px;">(700) 225-0221</span>[/vc_column_text][vc_separator style="dotted" css=".vc_custom_1476730525649{margin-bottom: 10px !important;}"][vc_row_inner css=".vc_custom_1479334758921{margin-bottom: 0px !important;padding-bottom: 0px !important;}"][vc_column_inner width="3/4"][vc_custom_heading text="Email" font_container="tag:h3|font_size:30px|text_align:left|color:%230f0e07" use_theme_fonts="yes" css=".vc_custom_1476730533324{margin-bottom: 10px !important;}"][/vc_column_inner][vc_column_inner width="1/4" css=".vc_custom_1479334848324{margin-bottom: 0px !important;padding-bottom: 0px !important;}"][vc_icon icon_fontawesome="fa fa-envelope-o" color="custom" size="lg" align="right" custom_color="#0eb2d7" css=".vc_custom_1479335095997{margin-top: 5px !important;margin-bottom: -5px !important;padding-bottom: 0px !important;}" el_class="progression-hide-on-mobile"][/vc_column_inner][/vc_row_inner][vc_column_text css=".vc_custom_1476730760045{margin-bottom: 10px !important;}"]<span style="color: #000000; font-size: 18px;">contanct@youremailaddress.com</span>[/vc_column_text][vc_separator style="dotted" css=".vc_custom_1476730545962{margin-bottom: 10px !important;}"][/vc_column][vc_column width="1/2"][vc_custom_heading text="Get in touch" font_container="tag:h3|font_size:36px|text_align:left|color:%230f0e07" use_theme_fonts="yes"][vc_column_text]Far far away, <span style="text-decoration: underline;">behind the word</span> mountains, far from the countries Vokalia and Consonantia, there live the blind texts.

		Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.

		Suspendisse auctor urna eros, at finibus leo lacinia quis. Nam nec lacus convallis, hendrerit libero eu, tincidunt orci.

		Nulla pellentesque aliquam mauris. Aliquam imperdiet lorem nec enim commodo sollicitudin. Donec vel quam ultricies, pretium sem tempor, elementum mauris. Phasellus sodales aliquet varius.[/vc_column_text][contact-form-7 id="239"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1476732053961{margin-top: 60px !important;margin-bottom: -60px !important;}"][vc_column][pro_google_maps map_address_pro="Brooklyn, NY"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}


