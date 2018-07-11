<?php if ( !is_admin() && get_field('tag_manager_id', 'option') ) { ?>
	<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php the_field('tag_manager_id', 'option'); ?>"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
<?php } ?>