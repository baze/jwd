<?php 
	global $post;
	$id= $post->ID;
	$slug = $post->post_name;
	$parent = $post->post_parent;
	$parent_link = get_permalink( $parent );

	$site__color = get_field('site__color', 'option');
	$subnavi = get_field('subnavi__settings', $parent);

	$company = get_field('companies', 'option');
	$company__fon = $company[0]["company__fon"];

	$openinghours = $company[0]["openinghours"];
	$openinghours__headline = $company[0]["openinghours__headline"];

	$value_header_classes = get_field('header__classes', 'option'); 

	if ( is_array($value_header_classes) ) {
		$header_classes = implode(' ', $value_header_classes);
	} else {
		$header_classes = $value_header_classes;
	}

	if ( $subnavi["subnavi__show"] ) { echo '<header class="header header--flexible subnavi--active ' . $header_classes . '" id="header" role="header">'; } 
	else { echo '<header class="header header--flexible ' . $header_classes . '" id="header" role="header">'; }	

	 $header__rows = get_field('header__rows', 'option');

	 if ( $header__rows ) {
	 	
	 	echo '<div class="header__container">';

	 	$row__number = 0;

	 	foreach ($header__rows as $row) {

			$row__number = ++$row__number;	 		

	 		$background = $row["header__row__design"]["background"];
	 		$color = $row["header__row__design"]["color"];
 		
	 		$header__rows__content = $row["header__rows__content"];

	 		echo '<div class="header__row row row-number-' . $row__number .'">';

 				echo '<style> .row-number-' . $row__number . ', .row-number-' . $row__number . ' .menu-item a, .row-number-' . $row__number . ' .openinghours__headline{ background-color:' . $background . '; color:' . $color . ' !important; }</style>';


	 			if ( $header__rows__content ) {
	 				
	 				foreach ($header__rows__content as $layout) {

	 					$layout__class = $layout["acf_fc_layout"];
	 					$layout__width = $layout["column-width"];
	 					$fon__direction = $layout["header__fon__direction"];

	 					echo '<div class="' . $layout__class . ' column columns-' . $layout__width . '">';

		 					if ( $layout__class == 'header__search' ) {

		 						get_search_form();
		 					
		 					} elseif ( $layout__class == 'header__logo' ) {
		 					
		 						get_template_part('_modules/_header__logo');
		 					
		 					} elseif ( $layout__class == 'header__openinghours' ) {
		 					
		 						if ( $openinghours ) {
							
									echo '<div class="storelist__location__info__openinghours">';

										echo '<div class="openinghours">';

											if ($openinghours__headline) {
												echo '<h4 class="openinghours__headline">' . $openinghours__headline . '</h4>';
											}

											foreach ($openinghours as $day) {
						
												$weekday = $day["openinghours__day"];
												$from = $day["openinghours__from"];
												$to = $day["openinghours__to"];

												echo '<div class="openinghours__entry">';
													echo '<span class="openinghours__weekday">' . $weekday . '</span>';
													echo '<span class="openinghours__from">' . $from . ' </span>';
													echo '<span class="openinghours__spacer">–</span>';
													echo '<span class="openinghours__to">' . $to . '</span>';	
												echo '</div>';
											}

										echo '</div>';

									echo '</div>';									
							}
		 					
		 					} elseif ($layout__class == 'header__fon') {
		 					
		 						echo '<a href="tel:'. $company__fon . '" style="text-align:' . $fon__direction . ';"><i class="fa fa-phone"></i> ' . $company__fon . '</a>';
		 					
		 					} elseif ( $layout__class == 'header__navigation' ) {
		 					
		 						echo '<nav class="header__navigation navigation" role="navigation">';
									get_template_part('_menus/_menu-primary');
									get_template_part('_modules/_cta');
								echo '</nav>';
		 					
		 					} elseif ( $layout__class == 'header__custom__menu' ) {

		 						echo '<nav class="header__navigation__custom navigation" role="navigation">';
		 							get_template_part('_menus/_menu-custom');
		 						echo '</nav>'; 						

		 					} elseif ( $layout__class == 'header__text' ) {
		 						echo $layout["header__text__content"];
		 					}

	 					echo '</div>';


	 				}

	 			}

	 		echo '</div>';
	 	}

	 	echo '</div>';

	 }
	
	include(locate_template('_modules/_mega-menu.php')); 
	
	if ( $subnavi["subnavi__show"] ) {	
		include(locate_template('_modules/_subnavi.php'));
	}

	if ($body__maxwidth) {
		echo '<style>.header.header--fixed{ max-width: ' . $body__maxwidth . 'px !important; }</style>';
	}	 


echo '</header>';
?>