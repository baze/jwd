<?php 
	global $post;
	$id = $post->ID;
	$download = get_field('download__file', $id);
	$site_url = get_site_url();
	$download_url = $site_url . '/download.php?id=' . $download["id"];
	$download_meta = wp_prepare_attachment_for_js( $download["id"] );
?>

<article class="download card card--icon card--inline card--left grid-item">
	
	<div class="card__image">
		<img src="<?php echo $download["icon"]; ?>" alt="<?php echo $download["alt"]; ?>" class="download__img">
	</div>

	<div class="card__content">

		<?php 
			the_title( '<h3>', '</h3>', true, $id );
			the_excerpt();
			echo '<div class="download__meta"><i>' . $download["filename"] . ', ' . $download_meta['filesizeHumanReadable'] .'</i></div>';
		?>
		<a href="<?php echo $download_url; ?>" class="btn btn--inline" onClick="ga('send', 'event', 'Download', 'klick',
'<?php echo $download["filename"]; ?>', 1);"><?php _e("Download ...", "jwd"); ?></a>	
		
	</div>

</article>