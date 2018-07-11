<div class="widget" id="widget__contacts">
	<?php
	global $post;
	$ID = $post->ID;

	$post_objects = get_field('contact__entries', $ID);

	//dd($post_objects);

	if( $post_objects ): ?>

	    <?php foreach( $post_objects as $post): ?>
	        <?php setup_postdata($post); ?>
			<?php get_template_part( '_modules/_contact' ); ?>
	    <?php endforeach; ?>
	    <?php wp_reset_postdata(); ?>
	<?php endif; ?>

</div>