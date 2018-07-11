<?php
function my_post_thumbnail_url($post, $size = 'full') {
	$thumbnailURL = wp_get_attachment_url( get_post_thumbnail_id($post->ID), $size);
	echo $thumbnailURL;
}