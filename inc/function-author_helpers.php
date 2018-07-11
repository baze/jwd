<?php
 
function author_link() {
$authorURL = get_the_author_link();
echo $authorURL;
}
 
function author_name() {
$authorName = get_the_author();
echo $authorName;
}