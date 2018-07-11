<?php  
function get_terms_dropdown_grade_level($taxonomies, $args){
            $myterms = get_terms($taxonomies, $args);
            $output ="<select name='rechtsgebiete'>"; //CHANGE ME!
            $output .="<option value=''>Rechtsgebiet auswählen</option>"; //CHANGE ME TO YOUR LIKING!
            foreach($myterms as $term){
                    $root_url = get_bloginfo('url');
                    $term_taxonomy=$term->taxonomy;
                    $term_slug=$term->slug;
                    $term_name =$term->name;
                    $link = $term_slug;
                    $output .="<option value='".$link."'>".$term_name."</option>";
            }
            $output .="</select>";
    return $output;
    }
?>