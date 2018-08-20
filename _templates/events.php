<?php
/*
Template Name: Veranstaltungskalender
*/
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php 
		echo '<section class="section event__calendar"><div class="container"><div class="container__inner">';
		
			$dates = array();

			$args = array(
				'post_type'              => array( 'veranstaltung' ),
				'nopaging'               => true,
			);

			$timezone = new DateTimeZone('Europe/Berlin');
			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {
				
				echo '<div id="calendar"></div>';

				$events = $query->posts;

				foreach ($events as $event) {
					$event__id = $event->ID;
					$event__title = $event->post_title;
					$event__date = get_field('event__date', $event__id);
					$event__date__start = $event__date["event__date__start"];
					$start_iso = new DateTime($event__date__start, $imezone);
					$start_iso_string = $start_iso->format('Y-m-d H:i:s');
					$event__date__end = $event__date["event__date__end"];
					$end_iso = new DateTime($event__date__end, $timezone);
					$end_iso_string = $end_iso->format('Y-m-d H:i:s');
					$event__url = get_permalink($event__id);

					if ( $event__date["event__date__allday"] == true ) {
						$event__allday = "true";
					} else{
						$event__allday = "false";
					}

					$event__data = [
						"event__id" => $event__id,
						"event__title" => $event__title,
						"event__date__start" => $start_iso_string,
						"event__date__end" => $end_iso_string,
						"event__url" => $event__url,
						"event__allday" => $event__allday,				
					];

					$dates[] = $event__data;
				}

			}

			echo '<div class="calendar__desc">';
				the_content();
			echo '</div>';

		echo '</div></div></section>'; 
	?>

<?php endwhile; else: ?>

<?php endif; ?>

<?php get_footer(); ?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">

<script type="text/javascript">

$(document).ready(function() {	

		var settings = { 
							"id":"calendar", 
							"locale":"de_DE",
							header: {
        								left: 'prev,next today',
        								center: 'title',
        								right: 'month,listWeek'
      						},
							"buttonText" : { 
												today:"Aktuelles Datum", 
												month: "Monat", 
												week: "Woche", 
												day: "Tag", 
												list:"Liste"
											},
							allDayText: "ganztägig",
							"events":[<?php foreach ($dates as $date) {
										echo '{"title": "' . $date["event__title"] . '",';
										echo '"post_id": ' . $date["event__id"] . ',';
										echo '"url": "' . $date["event__url"] . '",';
										echo '"allDay": ' . $date["event__allday"] . ',';
										echo '"start":"' . $date["event__date__start"] . '",';
										echo '"end":"' . $date["event__date__end"] . '"}, ';
									};?>],
							timeFormat: 'H:mm',
							displayEventTime: true,
							displayEventEnd: true
		};

		if( $('#'+settings.id).length ) {
	        
	        $('#'+settings.id).fullCalendar(settings);
	        
	    }
});


</script>