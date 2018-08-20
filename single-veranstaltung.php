<?php
/**
 * The Template for displaying all single posts
 * @package  WordPress
 */
get_header(); ?>

<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();

		echo '<section class="section event"><div class="container">';

			$id = get_the_ID();
			$title = get_the_title();
			$thumbnail = get_the_post_thumbnail_url($id, 'large');

			// dates
			$timezone = new DateTimeZone('Europe/Berlin');
			$event__date = get_field('event__date');
			$event__date__start = $event__date["event__date__start"];
			$event__date__end = $event__date["event__date__end"];
			$event__allday = $event__date["event__date__allday"];
			$now = new DateTime("now", $timezone);
			$start = new DateTime($event__date__start, $timezone);
			$end = new DateTime($event__date__end, $timezone);
			$starts_in = date_diff($now, $start);
			$duration = date_diff($start, $end);

			// event map
			$api_key = gmaps_api();
			
			if ( $api_key ) {
				
				$event__location = get_field('event__location');
				
				if ( $event__location ) {
					$event__location__address = $event__location["address"];
					$event__location__lat = $event__location["lat"];
					$event__location__lng = $event__location["lng"];
				}

			}

			// cost
			$event__cost = get_field('event__cost');
			// form
			$event__form = get_field('event__form');
			//content
			$event__description = get_field('event__description');

			echo '<div class="event__header">';
				echo '<h1 class="event__header__headline">' . $title . '</h1>';
				if ($thumbnail) {
					echo '<img class="event__header__img" src="' . $thumbnail . '" alt="' . $title . '">';
				}
				
			echo '</div>';

			echo '<div class="container__inner row">';

			echo '<aside class="event__sidebar"><div class="event__info">';

			if ( $event__date ) {
				echo '<div class="event__date">';
				echo '<h3>Zeiten:</h3>';

				if ( $event__date__start ) {
					echo '<div class="event__date__start">Beginn: ' . $start->format('d.m.Y, H:i') . '</div>';
				}

				if ( $event__date__end ) {
					echo '<div class="event__date__end">Ende: ' . $end->format('d.m.Y, H:i') . '</div>';
				}

				if ( $event__date__start && $event__date__end ) {

					if ($event__allday == true) {
						echo '<div class="event__date__duration">Dauer: ' . $duration->format('%d Tage') . '</div>';
					} else{
						echo '<div class="event__date__duration">Dauer: ' . $duration->format('%h Stunden') . '</div>';	
					}
					
				}

				echo '</div>';

			}

			
			if ( $event__cost ) {
				echo '<div class="event__cost">';
				echo '<h3>Preise:</h3>';
				foreach ($event__cost as $event__cost__entry) {
					echo '<div class="event__cost__entry">';
						echo '<span class="event__cost__description">' . $event__cost__entry["event__cost__description"] . ': </span>';
						echo '<span class="event__cost__amount">' . $event__cost__entry["event__cost__amount"] . '</span>';
						echo '<span class="event__cost__currency">' . $event__cost__entry["event__cost__currency"] . '</span>';
					echo '</div>';
				}
				echo '</div>';
			}

			if ( $event__form ) {
				echo '<a href="#event__form" class="btn btn--negative event__btn" >Anmelden</a>';
			}

			echo '</div></aside>';

			echo '<div class="event__main">';

			if ( $event__description ) {
				echo '<div class="event__description" id="event__description">' . $event__description . '</div>';
			}

			if ( $api_key && $event__location ) {
				echo '<script src="https://maps.googleapis.com/maps/api/js?key=' . $api_key . '"></script>';

				echo '<div class="event__location__map" id="event__location__map">';
					
					echo '<h3 class="event__location__headline">Anfahrt:</h3>';

					echo '<div class="acf-map" style="height: 400px;">';
						echo '<div class="marker" data-lat="' . $event__location__lat . '" data-lng="'. $event__location__lng . '"></div>';
					echo '</div>';

				echo '</div>';
			}
			
			if ( $event__form ) {
				echo '<div class="event__form" id="event__form">' . $event__form . '</div>';
			}

			echo '</div>';
			echo '</div>';
					
		echo '</div></section>';

	endwhile;

	else :

	endif;
?>

<?php get_footer(); ?>