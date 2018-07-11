<?php
 
function category_name() {
$category = get_the_category();
echo $category[0]->cat_name;
}