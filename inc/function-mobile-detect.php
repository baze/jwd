<?php 
	
	function isMobile() {
		$detect = new Mobile_Detect;

		return $detect->isMobile();
	}