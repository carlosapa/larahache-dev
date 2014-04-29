<?php



function init_setup () {
	//habilitación lenguaje:
	load_theme_textdomain( 'larahache', get_template_directory() . '/languages' );	
	//habilitación feed
	add_theme_support( 'automatic-feed-links' );
	//registra menu
	register_nav_menu( 'primary', __( 'Primary Menu', 'larahache' ) );
	//meter imágenes
	add_theme_support( 'post-thumbnails' );
	//tipos de entrada para el blog
	add_theme_support( 'post-formats', array( 'image', 'video' ) );
}
add_action('after_setup_theme', 'init_setup' );

/*function add_scripts () {
	wp_enqueue_script("main-admin-obj", get_template_directory_uri().'/js/main.js');
}
add_action('admin_init', 'add_scripts');*/

function add_admin_scripts( $hook ) {
    global $post;
    if ( $hook == 'post-new.php' || $hook == 'post.php' || $hook == 'edit.php' ) {
              wp_enqueue_script(  'main', get_stylesheet_directory_uri().'/js/main.js' , true, '0.1', true);
    }
}
add_action( 'admin_enqueue_scripts', 'add_admin_scripts', 10, 1 );

function content_to ($_id) {
	$post = get_post($_id);
	$link = '<a href="' . $post->guid . '">Seguir leyendo</a>';
	if (!empty( $post->post_excerpt)) {
		$text = get_page($_id);
		$content = apply_filters('the_content', $text->post_excerpt);
		$content = str_replace(']]>', ']]&gt;', $content);
		$content .= $link;

	} else {
		$text = get_page($_id);
		$content = apply_filters('the_content', $text->post_content);
		$content = str_replace(']]>', ']]&gt;', $content);
	}
	
	return $content;
}

function get_the_formated_date($id) {
	$date = get_the_date($id);
	return $date;
}

function get_formated_author($num) {
	$authors = array(
		'1' => 'Lara',
		'2' => 'Admin',
		'3' => 'IU'
	);
	return $authors[$num];
}

function format_date_agenda ($date) {
	$months = array (
		'Jan' => 'Ene', 
		'Feb' => 'Feb', 
		'Mar' => 'Mar', 
		'Apr' => 'Abr', 
		'May' => 'May', 
		'Jun' => 'Jun', 
		'Jul' => 'Jul', 
		'Aug' => 'Ago', 
		'Sep' => 'Sep', 
		'Oct' => 'Oct', 
		'Nov' => 'Nov', 
		'Dec' => 'Dec'		
	);

	//echo $date;
	$month = substr($date, 0, 3);
	$value = $months[$month]; //translate string

	$day = substr($date, -2 , 2);
	echo '<div class="day">' . $day . '</div>';
	echo '<div class="month">' . $month . '</div>';
}

function today ($date) {
	$class_name = 'today';
	$today = date('M-d');
	if ($date === $today) {
		echo $class_name;
	}
}

// Register Custom Post Type
function slider_custom_post_type() {

	$labels = array(
		'name'                => _x( 'Slider', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Sliders', 'text_domain' ),
		'parent_item_colon'   => __( 'Elemento superior:', 'text_domain' ),
		'all_items'           => __( 'Todos los elementos', 'text_domain' ),
		'view_item'           => __( 'Ver elemento', 'text_domain' ),
		'add_new_item'        => __( 'Añadir elemento', 'text_domain' ),
		'add_new'             => __( 'Añadir nuevo', 'text_domain' ),
		'edit_item'           => __( 'Editar elemento', 'text_domain' ),
		'update_item'         => __( 'Actualizar elemento', 'text_domain' ),
		'search_items'        => __( 'Buscar', 'text_domain' ),
		'not_found'           => __( 'No encontrado', 'text_domain' ),
		'not_found_in_trash'  => __( 'No encontrado en papelera', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'slider', 'text_domain' ),
		'description'         => __( 'slider', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail', 'gallery' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 4,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'slider', $args );

}

// Hook into the 'init' action
add_action( 'init', 'slider_custom_post_type', 0 );


// My function to display gallery
function get_gallery_from_post($id) {

	function get_string_between($string, $start, $end){ //Justin Cook.
	    $string = " ".$string;
	    $ini = strpos($string,$start);
	    if ($ini == 0) return "";
	    $ini += strlen($start);
	    $len = strpos($string,$end,$ini) - $ini;
	    return substr($string,$ini,$len);
	}

	//procesado de galería
	$page = get_page($id);
	$text = $page->post_content;
	$raw_data = array();


	//el formato es: Blablabla [gallery] Blabla [gallery]
	//$text = wpautop($text);
	$text = str_replace("]", "[", $text);
	$text = explode("[", $text);

	for ($i = 0; $i < count($text); $i++) {
		
		if ($text !== '') {
			if ($i % 2 === 0) {
				$raw_data[$i] = trim($text[$i]);
			} else {
				$data = get_string_between($text[$i], 'ids="', '"');
				$data = explode(',', $data);
				$raw_data[$i] = $data;
			}
		} else {
			continue;
		}
	}

	return $raw_data;
}

function max_words ($title, $num = 8, $more = '...') {
	$title = htmlentities($title);
	$title_out = '';
	$title = explode(' ', $title);
	for ($i = 0; $i < $num; $i++) {
		$title_out .= $title[$i] . ' ';
	}
	if(count($title) > $num) {
		$title_out .= $more;
	}
	return html_entity_decode($title_out);
}
?>