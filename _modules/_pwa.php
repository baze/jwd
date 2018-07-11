<?php
	
	if ( is_ssl() ) {
	
	if ( get_field('pwa__manifest', 'option') ) { 
		$manifest = get_field('pwa__manifest', 'option'); 
	}
	
	if ( get_field('pwa__serviceworker', 'option') ) {
		
		$base = ABSPATH;
		$base_url = get_site_url();
		$serviceworker_upload = get_field('pwa__serviceworker', 'option');
		$serviceworker_url = $serviceworker_upload["url"];
		$serviceworker_filename = $serviceworker_upload["filename"];

		$url = $serviceworker_url;
		$destination_folder = ABSPATH;

	    $newfname = $destination_folder . $serviceworker_filename;

	    $file = fopen ($url, "rb");

	    if ($file) {
	      $newf = fopen ($newfname, "a");

	      if ($newf)
	      while(!feof($file)) {
	        fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );

	      }
	    }

	    if ($file) {
	      fclose($file);
	    }

	    if ($newf) {
	      fclose($newf);
	    }

	    $serviceworker = $base_url .'/'. $serviceworker_filename;

	}
	
	if ( get_field('site__color', 'option') && !get_field('pwa__color', 'option') ) {
		$color = get_field('site__color', 'option');
	}
	elseif ( get_field('pwa__color', 'option') ) {
		$color = get_field('pwa__color', 'option');	
	}
	 
	if ( get_field('pwa__icon', 'option') ) {
		$icon = get_field('pwa__icon', 'option');
	}

	if ( isset($manifest) && isset($serviceworker) && isset($color) && isset($icon) ) {
	
?>

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $icon["sizes"]["icon-57x57"]; ?>">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $icon["sizes"]["icon-60x60"]; ?>">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $icon["sizes"]["icon-72x72"]; ?>">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $icon["sizes"]["icon-76x76"]; ?>">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $icon["sizes"]["icon-114x114"]; ?>">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $icon["sizes"]["icon-120x120"]; ?>">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $icon["sizes"]["icon-144x144"]; ?>">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $icon["sizes"]["icon-152x152"]; ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $icon["sizes"]["icon-180x180"]; ?>">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $icon["sizes"]["icon-192x192"]; ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $icon["sizes"]["icon-32x32"]; ?>">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $icon["sizes"]["icon-96x96"]; ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $icon["sizes"]["icon-16x16"]; ?>">
<link rel="manifest" href="<?php echo $manifest; ?>">

<meta name="theme-color" content="<?php echo $color; ?>">
<meta name="msapplication-navbutton-color" content="<?php echo $color; ?>">
<meta name="apple-mobile-web-app-status-bar-style" content="<?php echo $color; ?>">

<script>
  if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {
    navigator.serviceWorker.register('<?php echo $serviceworker; ?>').then(function(registration) {
      console.log('ServiceWorker registration successful with scope: ', registration.scope);
    }, function(err) {
      console.log('ServiceWorker registration failed: ', err);
    });
  });
} 
</script>

<?php } } ?>