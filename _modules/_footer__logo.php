<?php 
	$footer__logo = get_field('footer__logo', 'option');

	if ( $footer__logo["logo__select"] == "Bild" ) {

		$logo__img = $footer__logo["logo__img"]["url"];
		echo '<div class="footer__logo"><img src="' . $logo__img . '" alt="Logo von ' . get_bloginfo('name') . '" ></div>';

	} elseif ( $footer__logo["logo__select"] == "SVG" ) {
		echo '<div class="footer__logo">' . $footer__logo["logo__svg"] . '</div>';
	} else {
		//do nothing
	}

?>