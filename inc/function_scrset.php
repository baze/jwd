<?php 

function srcset_post_thumbnail($defaultSize = 'medium')
{
$thumbnailSizes = [
'thumbnail',
'medium',
'large',
'full'
];
$html = '<img sizes="';
$html .= '(max-width: 30em) 100vw, ';
$html .= '(max-width: 50em) 50vw, ';
$html .= 'calc(33vw - 100px)" ';
$html .= 'srcset="';
$thumb_id = get_post_thumbnail_id();
for ($i = 0; $i < count($thumbnailSizes); $i++) {
$thumb = wp_get_attachment_image_src($thumb_id, $thumbnailSizes[$i], true);
$url = $thumb[0];
$width = $thumb[1];
$html .= $url . ' ' . $width . 'w';
if ($i < count($thumbnailSizes) - 1) {
$html .= ', ';
}
}
$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
$thumbMedium = wp_get_attachment_image_src($thumb_id, $defaultSize, true);
$html .= '" ';
$html .= 'src="' . $thumbMedium[0] . '" alt="' . $alt . '">';
return $html;
}