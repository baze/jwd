<?php
	function custom_upload_mimes ( $existing_mimes=array() ) {
	// add the file extension to the array
	$existing_mimes['svg'] = 'mime/type';
    // call the modified list of extensions
	return $existing_mimes;
}
add_filter('upload_mimes', 'custom_upload_mimes');