<?php
	
	get_template_part('_modules/_landingpage-toc');
	//$layout = get_field('layout__editor');
	//dd($layout);
	//die();
	
	if( have_rows('layout__editor') ):

    while ( have_rows('layout__editor') ) : the_row();

    	$section_animation = get_sub_field('section_animation');

    	$value_section_classes = get_sub_field('section-classes'); 

		if ( is_array($value_section_classes) ) {
			$section_classes = implode(' ', $value_section_classes);
		} else {
			$section_classes = $value_section_classes;
		}
		

		$value_container_classes = get_sub_field('container-classes'); 
		
		if ( is_array($value_container_classes) ) {
			$container_classes = implode(' ', $value_container_classes);
		} else {
			$container_classes = $value_container_classes;
		}

		if ( $section_animation["animation_active"] ) {

			if ( get_field('site__color', 'option') && !get_sub_field('section-color') && strstr($section_classes, 'section--colored') ) {
			
				$section__color = get_field('site__color', 'option');
				
				echo '<section class="section ' . $section_classes . '" data-aos="' . $section_animation["animation_name"] .'" data-aos-delay="' . $section_animation["animation_delay"] . '" style="background-color:' . $section__color . ';">';

			}
			elseif( get_sub_field('section-color') ) {
				
				$section__color = get_sub_field('section-color');

				echo '<section class="section ' . $section_classes . '" data-aos="' . $section_animation["animation_name"] .'" data-aos-delay="' . $section_animation["animation_delay"] . '" style="background-color:' . $section__color . ';">';
			
			} else{
			
				echo '<section class="section ' . $section_classes . '" data-aos="' . $section_animation["animation_name"] .'" data-aos-delay="' . $section_animation["animation_delay"] . '">';
			
			}

		} else {

			if ( get_field('site__color', 'option') && !get_sub_field('section-color') && strstr($section_classes, 'section--colored') ) {
			
				$section__color = get_field('site__color', 'option');
				
				echo '<section class="section ' . $section_classes . '" style="background-color:' . $section__color . ';">';

			}
			elseif( get_sub_field('section-color') ) {
				
				$section__color = get_sub_field('section-color');
				echo '<section class="section ' . $section_classes . '" style="background-color:' . $section__color . ';">';
			
			} else{
			
				echo '<section class="section ' . $section_classes . '">';
			
			}

		}

			$container_animation = get_sub_field('container_animation');

			if ( $container_animation["animation_active"] ) {

				echo '<div class="no-penis container ' . $container_classes . '" data-aos="' . $container_animation["animation_name"] . '" data-aos-delay="' . $container_animation["anmation_delay"] . '">';

			} else{

				echo '<div class="container ' . $container_classes . ' ">';

			}
			
			
			if( have_rows('layout__editor__content') ): while ( have_rows('layout__editor__content') ) : the_row();

				        if( get_row_layout() == 'flex_cards' ):

				        	$cards_columns = get_sub_field('column-width');
				        	$cards_animation = get_sub_field('cards_animation');
				        	
				        	echo '<div class="container__inner row layout">';

								if( have_rows('cards') ): 
									$cards_rows = 0;
									while ( have_rows('cards') ) : the_row();

									include(locate_template('_modules/_card.php'));
									
	    						endwhile; else : endif;

    						echo '</div>';				        	

				        elseif( get_row_layout() == 'flex_pricing_table' ): 

				        	$pricingtable_animation = get_sub_field('pricing-table_animation');

				        	echo '<div class="container__inner layout">';
				        		
				        		echo '<div class="pricingtable">';
				        		if( have_rows('pricing-table') ): 
				        			$pricingtable_rows = 0;

				        			while ( have_rows('pricing-table') ) : the_row();
				        			
				        			include(locate_template('_modules/_pricing-table.php'));
		   						
		   						endwhile; else : endif;
		   						echo '</div>';

				        	echo '</div>';	

				        elseif( get_row_layout() == 'flex_tabs' ):

				        	$tabs_animation = get_sub_field('tabs_animation');

				        	echo '<div class="container__inner layout">';

				        		include(locate_template('_modules/_tabs.php'));
	    						
				        	echo '</div>';	

				        elseif( get_row_layout() == 'flex_accordion' ):

				        	$accordion_animation = get_sub_field('accordion_animation');

				        	echo '<div class="container__inner layout">';
				        		
							    include(locate_template('_modules/_accordion.php'));
	    						
				        	echo '</div>';	

				        elseif( get_row_layout() == 'flex_mosaic' ):  

				        	$mosaic_animation = get_sub_field('mosaic_animation');

				        	echo '<div class="container__inner layout">';
				        		
							    include(locate_template('_modules/_mosaic.php'));
	    						
				        	echo '</div>';

				        elseif( get_row_layout() == 'flex_text' ):

				        	$flex_text_animation = get_sub_field('flex_text_animation');

				        	echo '<div class="container__inner layout">';
				        		
				        		if ( $flex_text_animation["animation_active"] ) {
				        			echo '<div class="flex__text" data-aos="' . $flex_text_animation["animation_name"] .'" data-aos-delay="' . $flex_text_animation["animation_delay"] .'">';
				        		} else{
				        			echo '<div class="flex__text">';
				        		}				        		
				        			the_sub_field('flex_text__content');
				        			
				        		echo '</div>';
				        	
				        	echo '</div>';

				        elseif( get_row_layout() == 'flex_elements' ):

				        	echo '<div class="layout">';

				        		get_template_part( '_modules/_elements' );

				        	echo '</div>';

				        elseif( get_row_layout() == 'flex_testimonial' ): 
							
							echo '<div class="container__inner row layout">';
								
								$posts = get_sub_field('testimonial_entry');
								$testimonial_animation = get_sub_field('testimonial_animation');
								
								$testimonial_row = 0;
								
								if( $posts ): foreach( $posts as $post): 
							        
							        ++$testimonial_row;

							        setup_postdata($post);
							        include(locate_template('_modules/_testimonial.php'));

							    endforeach; wp_reset_postdata(); endif;

						    echo '</div>';

						elseif( get_row_layout() == 'loop' ):

							$loop__rows = get_sub_field('loop__rows');

							echo '<div class="container__inner grid grid-' . $loop__rows . ' layout">';
								include(locate_template('_modules/_loop.php'));
							echo '</div>';

						elseif( get_row_layout() == 'flex_table' ): 
							
							echo '<div class="container__inner layout">';
								$table = get_sub_field('table');
								include(locate_template('_modules/_table.php'));
							echo '</div>';

						elseif( get_row_layout() == 'flex_faq' ): 
							
							echo '<div class="container__inner layout">';
								$faq = get_sub_field('faq');
								$faq__expandable = get_sub_field('faq__expandable');
								include(locate_template('_modules/_faq.php'));
							echo '</div>';

						elseif( get_row_layout() == 'content__list' ):

							$content__list__rows = get_sub_field('content__list__rows');
							$content__list = get_sub_field('content__list');

							if ( $content__list ) {
								echo '<div class="grid grid-' . $content__list__rows["column-width"] . '">';
								foreach( $content__list as $post):
									setup_postdata($post);
									
										if ($post->post_type == 'downloads') {

											get_template_part( '_modules/_download' );
										
										} elseif ($post->post_type == 'produkte') {
											
											get_template_part( '_modules/_card--product' );
										
										} elseif ($post->post_type == 'ansprechpartner') {
											
											get_template_part( '_modules/_contact' );
										
										} else {
											
											get_template_part( '_modules/_card--post' );
										
										}

								endforeach;
								wp_reset_postdata();
								echo '</div>';
							}

						
				        endif;

				    endwhile;

				else :

				endif;					
					

			echo '</div>';

		echo '</section>';

    endwhile;

else :

	if ( !empty( get_the_content() ) ) {
		echo '<section class="section"><div class="container">';
			the_content();
		echo '</div></section>';
	}

	

endif;

?>