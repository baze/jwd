<?php 

function post_thumbnail_caption() {
                    global $post;
                    $thumb_id = get_post_thumbnail_id($post->id);

                    $args = array(
                        'post_type' => 'attachment',
                        'post_status' => null,
                        'post_parent' => $post->ID,
                        'include'  => $thumb_id
                        ); 

                    $thumbnail_image = get_posts($args);

                    if ($thumbnail_image && isset($thumbnail_image[0])) {
                    echo $thumbnail_image[0]->post_excerpt; 
                    }
}

function post_thumbnail_description() {
                    global $post;
                    $thumb_id = get_post_thumbnail_id($post->id);

                    $args = array(
                        'post_type' => 'attachment',
                        'post_status' => null,
                        'post_parent' => $post->ID,
                        'include'  => $thumb_id
                        ); 

                    $thumbnail_image = get_posts($args);

                    if ($thumbnail_image && isset($thumbnail_image[0])) {
                    echo $thumbnail_image[0]->post_content; 

                  }
}


function post_thumbnail_alt() {
                    global $post;
                    $thumb_id = get_post_thumbnail_id($post->id);

                    $args = array(
                        'post_type' => 'attachment',
                        'post_status' => null,
                        'post_parent' => $post->ID,
                        'include'  => $thumb_id
                        ); 

                    $thumbnail_image = get_posts($args);

                    if ($thumbnail_image && isset($thumbnail_image[0])) {
                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                    if(count($alt)) echo $alt;
                  }
}