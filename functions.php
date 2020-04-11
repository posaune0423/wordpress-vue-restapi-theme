<?php
// Remove all default WP template redirects/lookups
remove_action( 'template_redirect', 'redirect_canonical' );


function gt_init() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5',
    array('comment-list', 'comment-form', 'search-form')
);
}

add_action('after_setup_theme', 'gt_init');


add_action('rest_api_init', 'lig_wp_add_thumbnail_to_JSON');

function lig_wp_add_thumbnail_to_JSON() {
//Add featured image
  register_rest_field('post',
    'featured_image', //NAME OF THE NEW FIELD TO BE ADDED - you can call this anything
    array(
      'get_callback' => 'lig_wp_get_image',
      'update_callback' => null,
      'schema' => null,
    )
  );
}

function lig_wp_get_image($object, $field_name, $request) {
  $feat_img_array = wp_get_attachment_image_src($object['featured_media'], 'large', true);
  return [
    'src' => $feat_img_array[0],
    'width' => $feat_img_array[1],
    'height' => $feat_img_array[2],
  ];
}



add_action( 'rest_api_init', 'register_rest_category_name');

if ( ! function_exists( 'register_rest_category_name' )) {
    function register_rest_category_name() {
        register_rest_field( 'post', 'category_name',
        array(
            'get_callback' => 'get_category_name'
        ));
    }
    function get_category_name( $object ) {
      // var_dump($object['categories']);
      if (!empty($object['categories'])) {
        $category = get_the_category($object[ 'id' ]);
        return $category[0]->cat_name;
      } else {
        return null;
      }
    }
}

add_action( 'rest_api_init', 'register_rest_format_date');

if ( ! function_exists( 'register_rest_format_date' )) {
    function register_rest_format_date() {
        register_rest_field( 'post', 'date',
        array(
            'get_callback' => 'get_format_date'
        ));
    }
    function get_format_date( $object ) {
        $date = get_the_date('F j, Y', $object[ 'id' ]);
        return $date;
    }
}


// Redirect all requests to index.php so the Vue app is loaded and 404s aren't thrown
function remove_redirects() {
	add_rewrite_rule( '^/(.+)/?', 'index.php', 'top' );
}
add_action( 'init', 'remove_redirects' );

// Load scripts
function load_vue_scripts() {
	wp_enqueue_script(
		'vuejs-wordpress-theme-starter-js',
		get_stylesheet_directory_uri() . '/dist/scripts/index.js',
		array( 'jquery' ),
		filemtime( get_stylesheet_directory() . '/dist/scripts/index.js' ),
		true
	);

	wp_enqueue_style(
		'vuejs-wordpress-theme-starter-css',
		get_stylesheet_directory_uri() . '/dist/styles.css',
		null,
		filemtime( get_stylesheet_directory() . '/dist/styles.css' )
	);
}
add_action( 'wp_enqueue_scripts', 'load_vue_scripts', 100 );

// アイキャッチ画像を有効
add_theme_support('post-thumbnails');   // カスタム投稿タイプ example で thumbnail を使うので追記

// カスタム投稿タイプ作成
function create_post_type() {
  $concertSupports = [
    'title',
    'editor',
    'thumbnail',
    'revisions'
  ];

  // add post type
  register_post_type( 'concerts',
    array(
      'label' => 'Concerts',
      'public' => true,
      'has_archive' => true,
      'menu_position' => 5,
      'show_in_rest' => true,
      'rest_base' => 'concerts',
      'supports' => $concertSupports
    )
  );

  // add taxonomy
  register_taxonomy(
    'concert_taxonomy',
    'category',
    array(
      'label' => 'category',
      'labels' => array(
        'all_items' => 'categories',
        'add_new_item' => 'Add New Category'
      ),
      'hierarchical' => true
    )
  );
}

add_action( 'init', 'create_post_type' );
