<?php 

//delete default content
if (isset($_GET['activated']) && is_admin()){
        $defaultPage = get_page_by_title( 'Beispiel-Seite' );
        wp_delete_post( $defaultPage->ID );
        wp_delete_post(1, true);
}

if (isset($_GET['activated']) && is_admin()){

        $new_page_title = 'Startseite'; 
        $new_page_content = ''; 
        $new_page_template = 'front-page.php';

        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page', 
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
        }

}

if (isset($_GET['activated']) && is_admin()){

        $new_page_title = 'Kontakt'; 
        $new_page_content = ''; 
        $new_page_template = 'page.php';

        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page', 
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
        }

}

if (isset($_GET['activated']) && is_admin()){

        $new_page_title = 'Impressum'; 
        $new_page_content = ''; 
        $new_page_template = '/_templates/impressum.php';

        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page', 
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
        }

}

if (isset($_GET['activated']) && is_admin()){

        $new_page_title = 'Datenschutz'; 
        $new_page_content = ''; 
        $new_page_template = '/_templates/datenschutz.php';

        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page', 
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
        }

}

if (isset($_GET['activated']) && is_admin()){

        function create_main_menu() {
                $menu_name = 'Hauptmenü';
                $menu_exists = wp_get_nav_menu_object( $menu_name );
                if( !$menu_exists){ $menu_id = wp_create_nav_menu($menu_name); }
        }

}

if (isset($_GET['activated']) && is_admin()){

        function create_main_menu() {
                $menu_name = 'Footer-Menü';
                $menu_exists = wp_get_nav_menu_object( $menu_name );
                if( !$menu_exists){ 
                        $menu_id = wp_create_nav_menu($menu_name);

                        wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title' =>  __('Kontakt'),
                        'menu-item-url' => home_url( '/kontakt/' ), 
                        'menu-item-status' => 'publish')); 

                        wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title' =>  __('Impressum'),
                        'menu-item-url' => home_url( '/impressum/' ), 
                        'menu-item-status' => 'publish')); 

                        wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title' =>  __('Datenschutz'),
                        'menu-item-url' => home_url( '/datenschutz/' ), 
                        'menu-item-status' => 'publish')); 
                }
        }
        
}