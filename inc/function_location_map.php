<?php

	function abstract_map($type) {

		$adr_arr = array();
							$adr_arr[] = get_field($type.'-streetaddress');
							$adr_arr[] = get_field($type.'-postalcode');
							$adr_arr[] = get_field($type.'-city');
							$adr_arr[] = get_field($type.'-state');
							$adr_arr[] = get_field($type.'-country');
						
						$adr_string = implode (' ', $adr_arr);

						$mymap = new Mappress_Map();
						$address = $adr_string;
						$mypoi_1 = new Mappress_Poi(array("address" => $address ));
						$mypoi_1->geocode();
						$mymap->pois = array($mypoi_1);

						return $mymap->display();
	}

	function location_map() {
		return abstract_map('location');
	}

	function event_map() {
		return abstract_map('event');
	}