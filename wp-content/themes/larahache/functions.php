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
	add_theme_support( 'post-formats', array( 'image', 'video', 'quote', 'status' ) );
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
	$text = get_page($_id);
	$content = apply_filters('the_content', $text->post_content);
	$content = str_replace(']]>', ']]&gt;', $content);
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




?>