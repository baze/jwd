import $ from 'jquery';
import 'fullcalendar';

module.exports = function() {

	$('#calendar').fullCalendar({
		defaultView: 'month',
  		buttonText : {
  			today:    'Heute',
  			month:    'Monat',
  			week:     'Woche',
  			day:      'Tag',
  			list:     'Liste'
  		},
  		locale: 'de',
  		height: 'parent',
  		eventSources: [
    		'/../../eventlist.php'
  		]
	})

};