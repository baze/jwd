<?php 

	if ( get_field('local__cta') ) {
		echo '<div class="cta__container">';
			$cta__link = get_field('local__cta');
			$cta__text = get_field('local__cta__text');
			echo '<a class="menu__cta expand" href="' . $cta__link . '?rel=cta">' . $cta__text . '</a>';
		echo '</div>';
	} elseif ( get_field('global__cta', 'option') ) {
		echo '<div class="cta__container">';
			$cta__link = get_field('global__cta', 'option');
			$cta__text = get_field('global__cta__text', 'option');
			echo '<a class="menu__cta expand" href="' . $cta__link . '?rel=cta">' . $cta__text . '</a>';
		echo '</div>';
	} else {
		//do nothing
	}

?>