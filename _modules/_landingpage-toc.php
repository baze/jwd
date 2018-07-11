<?php

	if ( !get_field('volle_breite', 'option') ) {
    	$boxed = 'boxed';
    	$body__maxwidth = get_field('body__maxwidth', 'option');
  	}

	$landingpage_toc = get_field('landingpage-toc');
	$landingpage_toc__headlines = get_field('landingpage-toc__headlines');

	if ($landingpage_toc) {
		echo '<span class="landingpage-toc__hook"></span>';
	}

?>

<?php if ( $landingpage_toc ) {  ?>

	<script>
		var bodyMaxwidth = "<?php echo $body__maxwidth; ?>";
		var tocHeadlines = ".wrapper <?php echo $landingpage_toc__headlines; ?>";
	</script>

<?php } ?>