<?php

define('IMG_URL', get_template_directory_uri(  ).'/img');

add_action( 'after_setup_theme', 'frankastin_setup' );

function frankastin_setup() {
    load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts_styles' );

function enqueue_scripts_styles() {
    wp_enqueue_style( 'blankslate-style', get_stylesheet_uri() );
    wp_enqueue_style( 'main-style', get_template_directory_uri() .'/scss/index.css',[],time());
    wp_enqueue_script( 'jquery' );
    
    wp_enqueue_script( 'tween', 'https://code.createjs.com/1.0.0/tweenjs.min.js', [], time(), true );
    wp_enqueue_script( 'text-stuff', get_template_directory_uri(  ).'/js/skills.js', [], time(), true );
}

function register_portfolio_post_type() {
    $labels = array(
        'name'              => _x( 'Years', 'taxonomy general name' ),
        'singular_name'     => _x( 'Year', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Years' ),
        'all_items'         => __( 'All Years' ),
        'parent_item'       => __( 'Parent Year' ),
        'parent_item_colon' => __( 'Parent Year:' ),
        'edit_item'         => __( 'Edit Year' ),
        'update_item'       => __( 'Update Year' ),
        'add_new_item'      => __( 'Add New Year' ),
        'new_item_name'     => __( 'New Year Name' ),
        'menu_name'         => __( 'Year' ),
    );
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'years' ],
    );
    register_taxonomy( 'year', [ 'portfolio' ], $args );

	$labels = array(
		'name'                  => _x( 'Portfolio Entries', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'Portfolio Entry', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'Portfolio Entries', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'Portfolio Entry', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New Portfolio Entry', 'textdomain' ),
		'new_item'              => __( 'New Portfolio Entry', 'textdomain' ),
		'edit_item'             => __( 'Edit Portfolio Entry', 'textdomain' ),
		'view_item'             => __( 'View Portfolio Entry', 'textdomain' ),
		'all_items'             => __( 'All Portfolio Entries', 'textdomain' ),
		'search_items'          => __( 'Search Portfolio Entries', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent Portfolio Entries:', 'textdomain' ),
		'not_found'             => __( 'No Portfolio Entries found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No Portfolio Entries found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'Portfolio Entry Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Portfolio Entry archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into Portfolio Entry', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Portfolio Entry', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter Portfolio Entries list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Portfolio Entries list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Portfolio Entries list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
        'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'work' ),
        'taxonomies' => array( 'post_tag','year','category'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		  'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'post-formats', 'custom-fields' ),
	);

	register_post_type( 'portfolio', $args );

 
}

add_action( 'init', 'register_portfolio_post_type' );

add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
global $wp_version;
if ( $wp_version !== '4.7.1' ) {
   return $data;
}

$filetype = wp_check_filetype( $filename, $mimes );

return [
	'ext'             => $filetype['ext'],
	'type'            => $filetype['type'],
	'proper_filename' => $data['proper_filename']
];

}, 10, 4 );

function cc_mime_types( $mimes ){
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
echo '<style type="text/css">
	  .attachment-266x266, .thumbnail img {
		   width: 100% !important;
		   height: auto !important;
	  }
	  </style>';
}
add_action( 'admin_head', 'fix_svg' );

