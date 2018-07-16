<?php 
	$header__logo = get_field('header__logo', 'option');
	
	if ( $header__logo["logo__select"] == "Bild" ) {

		$logo__img = $header__logo["logo__img"]["url"];
		echo '<div class="header__logo"><a href="' . get_bloginfo('url') . '?rel=logo"><img src="' . $logo__img . '" alt="Logo von ' . get_bloginfo('name') . '" ></a></div>';

	} elseif ( $header__logo["logo__select"] == "SVG" ) {
		echo '<div class="header__logo">' . $header__logo["logo__svg"] . '</div>';
	} else {
		//do nothing
	}

?>