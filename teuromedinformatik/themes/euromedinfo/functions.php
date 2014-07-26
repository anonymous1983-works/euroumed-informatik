<?php

//AJOUTER JQUERY
wp_enqueue_script('jquery');
add_theme_support('menus');
add_theme_support('post-thumbnails');

function the_excerpt_max_charlength($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;
    if (strlen($excerpt) > $charlength) {
        $subex = substr($excerpt, 0, $charlength - 5);
        $exwords = explode(" ", $subex);
        $excut = -(strlen($exwords[count($exwords) - 1]));
        if ($excut < 0) {
            echo substr($subex, 0, $excut);
        } else {
            echo $subex;
        }
        echo "...";
    } else {
        echo $excerpt;
    }
}

if (class_exists('MultiPostThumbnails')) {

    new MultiPostThumbnails(array(
        'label' => 'Seconde image à la Une (634 * 422)',
        'id' => 'secondary-image',
        'post_type' => 'post'
            ));
}

// Add specific CSS class by filter
add_filter('body_class','my_class_names');
function my_class_names($classes) {
	// add 'class-name' to the $classes array
        if(is_single() || is_page()){
            $classes[] = 'no-home page-article page-detail';
        }else{
            $classes[] = 'no-home page-article';
        }
	// return the $classes array
	return $classes;
}


/////////////////////////////////////////////////////////////////////////////////////////////****************************************////////////////////////////////////////////////////////////////////////////////

add_filter('show_admin_bar', '__return_false');


remove_action('wp_head', 'wp_generator');
add_filter('login_errors', create_function('$a', "return null;"));


?>