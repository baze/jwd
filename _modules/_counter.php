<?php 
	
	if ( $counters ) {
	
		echo '<div class="counter row">';

			foreach ($counters as $counter) {

				echo '<div class="counter__entry counter--' . $counter["counter__text-align"] . ' column columns-' . $counter["column-width"] . '">';
				echo 	'<span class="counter__text">' . $counter["counter__text"] . '</span>';
				echo 	'<span class="counter__number">' . $counter["counter__number"] . '</span>';
				echo '</div>';
			}

		echo '</div>';

	}

?>