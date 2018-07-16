<?php 
	$companies = get_field('companies', 'options');
	$openinghours__headline = $companies[0]["openinghours__headline"];
	$openinghours = $companies[0]["openinghours"];

	if ( $openinghours ) {
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
}

?>

<script type="application/ld+json">
{
        "@context": "http://schema.org",
        "@type": "ProfessionalService",
        "name": "<?php echo $companies[0]["company__name"]; ?>",
        "description": "<?php echo get_bloginfo('description'); ?>",
        "openingHours":[<?php 
			if ( $openinghours ) {
				foreach ($openinghours as $day) {
					$weekday = $day["openinghours__day"];
					$from = $day["openinghours__from"];
					$to = $day["openinghours__to"];
					echo '"' . $weekday . ' ' . $from . '-' . $to .'",';
				}
			}
		?>],
        "isAccessibleForFree": true,
        "currenciesAccepted": "EUR",
        "paymentAccepted":"Cash, Credit Card",
        "url":"<?php echo get_bloginfo('url'); ?>"
}
</script>