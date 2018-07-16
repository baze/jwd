<?php
/*
Template Name: Storefinder
*/
get_header();

	if ( have_posts() ) : while ( have_posts() ) : the_post();

	echo '<div class="container">';
	
		$stores = get_field('companies', 'option');
		$api_key = gmaps_api();
		$stores__count = 0;
		$marker__count = 0;

		echo '<script src="https://maps.googleapis.com/maps/api/js?key=' . $api_key . '"></script>';

		echo '<div class="storefinder__map">';

			echo '<div class="acf-map">';
				foreach ($stores as $marker) {
					
					++$marker__count;
					$entry = $marker["company__location__map"];
					
					if ( is_array ($entry) ) {
						echo '<div class="marker" data-lat="' . $entry["lat"] . '" data-lng="' . $entry["lng"] . '" >';
							echo '<div><strong>' . $marker["company__name"] . '</strong></div>';
							echo '<div>';
								echo  $marker["company__streetaddress"] . ', ' . $marker["company__zipcode"] . ' ' . $marker["company__city"];
							echo '</div>';
							echo '<a class="btn btn--negative" href="#store__location--' . $marker__count . '">Zum Eintrag</a>';
						echo '</div>';
					}
					
				}
			echo '</div>';

		echo '</div>';

		echo '<div class="container__inner">';

		echo '<div class="storelist">';

		foreach ($stores as $location) {
			
			++$stores__count;

			echo '<article id="store__location--'. $stores__count . '" class="storelist__location">';

					echo '<div class="row">';

						if ( $location["company__image"] ) {
							echo '<div class="storelist__location__img"><img alt="' . $location["company__name"] . '" title="' . $location["company__name"] . '" src ="' . $location["company__image"] . '"; ></div>';
						}

						echo '<div class="storelist__location__info">';
							
							echo '<h2 class="storelist__location__info__headline">' . $location["company__name"] . '</h2>';
							
							echo '<div class="storelist__location__info__address">';
								
								echo '<div class="storelist__location__info__address__streetaddress"><span>' . $location["company__streetaddress"] . '</span> <span>' . $location["company__zipcode"] . '</span> <span>' . $location["company__city"] . '</span></div>';																
								
								echo '<div storelist__location__info__address__country>';
									
									if ($location["company__state"]) {
										echo '<span>' . $location["company__state"] . '</span>,';
									}
									
									if ($location["company__country"]) {
										echo '<span>' . $location["company__country"] . '</span>';
									}
									
								echo '</div>';
								
							echo '</div>';

							$openinghours = $location["openinghours"];
							$openinghours__headline = $location["openinghours__headline"];

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

							echo '<div class="storelist__location__info__contact">';

								if ($location["company__fon"]) {
									echo '<div class="company__fon"><a href="tel:' . $location["company__fon"] . '">' . $location["company__fon"] . '</a></div>';
								}

								if ($location["company__email"]) {
									echo '<div class="company__email"><a href="mailto:' . $location["company__email"] . '">' . $location["company__email"] . '</a></div>';
								}

								if ($location["company__fax"]) {
									echo '<div class="company__fax"><a href="fax:' . $location["company__fax"] . '">' . $location["company__fax"] . '</a></div>';
								}

							echo '</div>';

						echo '</div>';

					echo '</div>';

					if ( $location["company__location__map"] ) {
					
						echo '<div class="storelist__location__map row">';

							echo '<div class="storelist__location__map__container">';
								echo '<div class="acf-map">';
									echo '<div class="marker" data-lat="' . $location["company__location__map"]["lat"] . '" data-lng="'. $location["company__location__map"]["lng"] . '"></div>';
								echo '</div>';
							echo '</div>';

							echo '<div class="storelist__location__map__text">';
								echo $location["company__location__txt"];
							echo '</div>';

						echo '</div>';

					}
			
			echo  '<script type="application/ld+json">{ "@context": "http://schema.org", "@type": "ProfessionalService", "@id": "' . get_home_url() . '", "name": "' . $location["company__name"] . '", "image": "' . $location["company__image"] . '", "priceRange": "' . $location["company__priceRange"] . '", "address": { "@type": "PostalAddress", "streetAddress": "' . $location["company__streetaddress"] . '", "addressLocality": "' . $location["company__city"] . '", "addressRegion": "' . $location["company__state__short"] . '", "postalCode": "' . $location["company__zipcode"] . '", "addressCountry": "' . $location["company__country"] . '" }, "telephone": "' . $location["company__fon"] . '", "geo": { "@type": "GeoCoordinates", "latitude": ' . $location["company__location__map"]["lat"] . ', "longitude": ' . $location["company__location__map"]["lng"] . '}, "aggregateRating": { "@type": "AggregateRating", "ratingValue": "' . $location["company__rating"]["company__ratingValue"] . '", "bestRating": "100", "worstRating": "1", "ratingCount": "' . $location["company__rating"]["company__ratingCount"] . '"},';
			echo '"openingHours":[';
	  		if ( $openinghours ) {
				foreach ($openinghours as $day) {
					$weekday = $day["openinghours__day"];
					$from = $day["openinghours__from"];
					$to = $day["openinghours__to"];
					echo '"' . $weekday . ' ' . $from . '-' . $to .'",';
				}
			}
			echo ']}}</script>';


			echo '</article>';
		}

		echo '</div>';

	endwhile; 
	
	echo '</div></div>';

	else:

	endif;


get_footer();

?>