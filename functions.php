<?php
if ( ! function_exists( 'bhmt_setup') ) :
function bhmt_setup() {
	remove_action('wp_head', 'wp_generator');
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	
	add_filter( 'show_admin_bar', '__return_false' );	
	
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
	add_theme_support( 'post-formats', array('aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'));	
	
	// Enable thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );
	
	// Create custom sizes
	// This is then pulled through to your theme useing the_post_thumbnail('custombig');
	if ( function_exists( 'add_image_size' ) ) {
	}
	
	// Custom CSS for the login page
	// Create wp-login.css in your theme folder
	function wpfme_loginCSS() {
		echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/wp-login.css"/>';
	}
	add_action('login_head', 'wpfme_loginCSS');

	// Add custom menus
	register_nav_menus( array(
		'hoofdmenu' => __('Hoofdmenu', 'bhmt'),
		'footermenu' => __('Footermenu', 'bhmt')
	) );
}

endif;
add_action( 'after_setup_theme', 'bhmt_setup' );

function bhmt_scripts() {
	wp_enqueue_style('bootstrap-min', get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style('owlcarousel', get_template_directory_uri().'/css/owl.carousel.css');
	wp_enqueue_style('bhmt-css', get_template_directory_uri().'/css/style.css');
	wp_enqueue_style('gravityforms', get_template_directory_uri().'/css/gf.css');
	wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700', false);
	wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', false);
	
	wp_deregister_script('jquery');
    if(is_ssl())
	{
		wp_register_script('jquery', ('https://code.jquery.com/jquery-latest.min.js'), false, null, false);
    	wp_enqueue_script('jquery');
	}
	else
	{
		wp_register_script('jquery', ('//code.jquery.com/jquery-latest.min.js'), false, null, false);
    	wp_enqueue_script('jquery');
	}
	
	wp_register_script('bootstrap', (get_template_directory_uri().'/js/bootstrap.min.js'), false, null, true);
	wp_enqueue_script('bootstrap');
	
	wp_register_script('matchheight', (get_template_directory_uri().'/js/matchheight.min.js'), false, null, true);
	wp_enqueue_script('matchheight');
	
	wp_register_script('smoothscroll', (get_template_directory_uri().'/js/smoothscroll.min.js'), false, null, true);
	wp_enqueue_script('smoothscroll');
	
	wp_register_script('owlcarousel', (get_template_directory_uri().'/js/owl.carousel.min.js'), false, null, true);
	wp_enqueue_script('owlcarousel');
	
	wp_register_script('fitvids', (get_template_directory_uri().'/js/fitvids.js'), false, null, true);
	wp_enqueue_script('fitvids');
	
	wp_register_script('scripts', (get_template_directory_uri().'/js/scripts.js'), false, null, true);
	wp_enqueue_script('scripts');
}
add_action('wp_enqueue_scripts', 'bhmt_scripts');

function delete_associated_media($id)
{
    if ('auto' !== get_post_type($id)) return;

    $media = get_children(array(
        'post_parent' => $id,
        'post_type' => 'attachment'
    ));
    if (empty($media)) return;

    foreach ($media as $file)
    {
        wp_delete_attachment($file->ID);
        unlink(get_attached_file($file->ID));
    }
}
add_action('before_delete_post', 'delete_associated_media');

function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

function custom_wp_nav_menu($var) {
  return is_array($var) ? array_intersect($var, array(
		'current_page_item',
		'current_page_parent',
		'current_page_ancestor',
		'first',
		'last',
		'vertical',
		'horizontal'
		)
	) : '';
}
add_filter('nav_menu_css_class', 'custom_wp_nav_menu');
add_filter('nav_menu_item_id', 'custom_wp_nav_menu');
add_filter('page_css_class', 'custom_wp_nav_menu');

function current_to_active($text){
	$replace = array(
		'current_page_item' => 'active',
		'current_page_parent' => 'active',
		'current_page_ancestor' => 'active',
	);
	$text = str_replace(array_keys($replace), $replace, $text);
		return $text;
	}
add_filter ('wp_nav_menu','current_to_active');

function strip_empty_classes($menu) {
    $menu = preg_replace('/ class=""| class="sub-menu"/','',$menu);
    return $menu;
}
add_filter ('wp_nav_menu','strip_empty_classes');

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

//add_filter("gform_currencies", "update_currency");

function update_currency($currencies) {
    $currencies['EUR'] = array("name" => __("Euro", "gravityforms"),
        "symbol_left" => '€',
        "symbol_right" => "",
        "symbol_padding" => "",
        "thousand_separator" => ',',
        "decimal_separator" => '.',
        "decimals" => 3);
    return $currencies;
}

if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page(array(
		'page_title' 	=> 'Opties',
		'menu_title'	=> 'Opties',
		'menu_slug' 	=> 'opties',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));	
}

// Add a custom user role

$result = add_role( 'klant', __(
'Klant' ),
array(
'read' => true, // true allows this capability
'edit_posts' => true, // Allows user to edit their own posts
'edit_pages' => true, // Allows user to edit pages
'edit_others_posts' => true, // Allows user to edit others posts not just their own
'create_posts' => true, // Allows user to create new posts
'manage_categories' => true, // Allows user to manage post categories
'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
)
);