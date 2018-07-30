<?php
/*
Template Name: Local SEO
*/
get_header();

	echo '<div class="container"><div class="container__inner">';

	if ( have_posts() ) : while ( have_posts() ) : the_post();

		$local__business = get_field('select__local__business');
		$companies = get_field('companies', 'option');
		$api_key = gmaps_api();
		echo '<script src="https://maps.googleapis.com/maps/api/js?key=' . $api_key . '"></script>';
		
		foreach ($companies as $location) {
			if ($location["company__name"] === $local__business) {

				echo '<div class="store row">';

					echo '<aside class="store__info column columns-3">';
						
						if ( $location["company__image"] ) {
							echo '<div class="storelist__location__img"><img alt="' . $location["company__name"] . '" title="' . $location["company__name"] . '" src ="' . $location["company__image"] . '"; ></div>';
						}

						echo '<h2 class="storelist__location__info__headline">' . $location["company__name"] . '</h2>';

						echo '<div class="storelist__location__info__address">';
								
								echo '<div class="storelist__location__info__address__streetaddress"><span>' . $location["company__streetaddress"] . ',</span> <span>' . $location["company__zipcode"] . '</span> <span>' . $location["company__city"] . '</span></div>';																
								
								echo '<div storelist__location__info__address__country>';
									
									if ($location["company__state"]) {
										echo '<span>' . $location["company__state"] . '</span>, ';
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

								if ($location["company__mobile"]) {
									echo '<div class="company__mobile"><a href="tel:' . $location["company__mobile"] . '">' . $location["company__mobile"] . '</a></div>';
								}

								if ($location["company__email"]) {
									echo '<div class="company__email"><a href="mailto:' . $location["company__email"] . '">' . $location["company__email"] . '</a></div>';
								}

								if ($location["company__fax"]) {
									echo '<div class="company__fax"><a href="fax:' . $location["company__fax"] . '">' . $location["company__fax"] . '</a></div>';
								}

							echo '</div>';

					echo '</aside>';

					echo '<div class="store__content columns columns-9">';
						
						if ( $location["company__location__map"] ) {
					
						echo '<div class="storelist__location__map">';

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

						echo '<div class="store__copy">';
							the_content();
						echo '</div>';

					echo '</div>';

				echo '</div>';

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

			}
		}

	endwhile; else: endif;

	echo '</div></div>';




get_footer();

?>