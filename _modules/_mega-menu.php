<?php
	$mega__menu = get_field('mega__menu__sections', 'option');

	if ( get_field( 'mega__menu__choice', 'option' ) == 1 ) { 
		
		echo '<nav class="mega__menu">';

			foreach ($mega__menu as $mega__menu__section) {

				//dd($mega__menu__section);

				echo '<div class="mega__menu__section">';
					echo '<h3>'. $mega__menu__section["mega__menu__section__icon"] . $mega__menu__section["mega__menu__section__headline"] . '</h3>';

					if ($mega__menu__section["mega__menu__entries"]) {
						
						echo '<ul class="mega__menu__list">';
							
							foreach ($mega__menu__section["mega__menu__entries"] as $mega__menu__entry) {
								
								$menu_id = $mega__menu__entry->ID;
								$page__url = get_permalink($menu_id);
								
								if ( $id == $menu_id ) {
									echo '<li class="mega__menu__entry current"><a title="' . $mega__menu__entry->post_title . '" href="' . $page__url . '">' . $mega__menu__entry->post_title . '</a></li>';
								} else {
									echo '<li class="mega__menu__entry"><a title="' . $mega__menu__entry->post_title . '" href="' . $page__url . '">' . $mega__menu__entry->post_title . '</a></li>';	
								}
								
							}

						echo '</ul>';

					}

				echo '</div>';
			}

		echo '</nav>';
	}

?>