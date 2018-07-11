<?php 

if ( $faq ) {
	
	if ($faq__expandable) {
		echo '<dl class="faq faq--expandable">';
	} else{
		echo '<dl class="faq">';
	}

		foreach ($faq as $question) {
			echo '<dt class="faq__question">' . $question["faq__question"] . '</dt>';
			echo '<dd class="faq__answer">' . $question["faq__answer"] . '</dd>';
		}

	echo '</dl>';
}

?>