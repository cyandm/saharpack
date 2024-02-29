<?php

add_action( 'init', 'cyn_post_type_register' );
add_action( 'init', 'cyn_taxonomy_register' );
add_action( 'init', 'cyn_term_register' );
add_action( 'init', 'cyn_page_register' );


function cyn_post_type_register() {
	$GLOBALS["form-post-type"] = $post_type = 'form';
	cyn_make_post_type( 'فرم ', $post_type, 'dashicons-email-alt2', true, [ 'title' ] );
	cyn_make_post_type( 'فرصت شغلی ', 'job-offer', 'dashicons-groups', true );
}


function cyn_taxonomy_register() {
	cyn_make_taxonomy( 'دسته بندی فرم ', 'form-cat', 'form', true );
}


function cyn_make_post_type( $name, $slug, $icon, $menu = true, $supports = [ 'title', 'thumbnail', 'editor' ] ) {
	$labels = [ 
		'name' => $name,
		'singular_name' => $name,
		'menu_name' => $name . '‌' . 'ها',
		'name_admin_bar' => $name,
		'add_new' => 'افزودن ' . $name,
		'add_new_item' => 'افزودن ' . $name . ' جدید',
		'new_item' => $name . ' جدید',
		'edit_item' => 'ویرایش ' . $name,
		'view_item' => 'دیدن ' . $name,
		'all_items' => 'همه ' . $name . ' ها',
		'search_items' => 'جستجو ' . $name,
		'not_found' => $name . '‌ای پیدا نشد',
		'not_found_in_trash' => $name . ' پیدا نشد'
	];

	$args = [ 
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => $menu,
		'query_var' => true,
		'rewrite' => [ 'slug' => $slug ],
		'exclude_from_search' => false,
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => $icon,
		'supports' => $supports,

	];

	register_post_type( $slug, $args );
}


function cyn_make_taxonomy( $name, $slug, $post_types, $is_hierarchical = true ) {
	$labels = [ 
		'name' => $name . '‌ها',
		'singular_name' => $name,
		'search_items' => 'ها' . $name . 'جستجو در',
		'all_items' => 'همه ' . $name . '‌ ها',
		'edit_item' => ' ویرایش ' . $name,
		'update_item' => 'به روز رسانی' . $name,
		'add_new_item' => 'افزودن ' . $name . ' جدید',
		'new_item_name' => $name . ' جدید',
		'menu_name' => $name,
	];

	$args = [ 
		'hierarchical' => $is_hierarchical,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => [ 'slug' => $slug ],
	];

	register_taxonomy( $slug, $post_types, $args );
}

function cyn_term_register() {
	wp_insert_term( 'درخواست قیمت', 'form-cat', [ 'slug' => 'pricing' ] );

}

function cyn_page_register() {
	if ( ! get_option( 'cyn_theme_installed' ) ) {

		wp_insert_post( [ 
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => __( 'درباره ی ما', 'cyn-dm' ),
			'post_name' => 'about-us',
			'page_template' => 'templates/about-us.php'
		] );

		wp_insert_post( [ 
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => __( 'پیام لاگین', 'cyn-dm' ),
			'post_name' => 'alert-login',
			'page_template' => 'templates/alert-login.php'
		] );

		wp_insert_post( [ 
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => __( 'بلاگ', 'cyn-dm' ),
			'post_name' => 'blog',
			'page_template' => 'templates/blog.php'
		] );

		wp_insert_post( [ 
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => __( 'تماس با ما', 'cyn-dm' ),
			'post_name' => 'contact-us',
			'page_template' => 'templates/contact-us.php'
		] );
		
		wp_insert_post( [ 
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => __( 'صفحه اصلی', 'cyn-dm' ),
			'post_name' => 'home',
			'page_template' => 'templates/home.php'
		] );
	
		wp_insert_post( [ 
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => __( 'فرصت های شغلی', 'cyn-dm' ),
			'post_name' => 'job-offer',
			'page_template' => 'templates/job-offer.php'
		] );

		wp_insert_post( [ 
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => __( 'فرصت های شغلی', 'cyn-dm' ),
			'post_name' => 'journey',
			'page_template' => 'templates/journey.php'
		] );

		wp_insert_post( [ 
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => __( 'ورود', 'cyn-dm' ),
			'post_name' => 'login',
			'page_template' => 'templates/login.php'
		] );

		wp_insert_post( [ 
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => __( 'سفارش های من', 'cyn-dm' ),
			'post_name' => 'my-order',
			'page_template' => 'templates/my-order.php'
		] );

		wp_insert_post( [ 
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => __( 'ارسال کد لاگین', 'cyn-dm' ),
			'post_name' => 'otp',
			'page_template' => 'templates/otp.php'
		] );
		
		wp_insert_post( [ 
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => __( 'درخواست سفارش اختصاصی', 'cyn-dm' ),
			'post_name' => 'pricing',
			'page_template' => 'templates/pricing.php'
		] );
		
		wp_insert_post( [ 
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => __( 'راهنمای خرید', 'cyn-dm' ),
			'post_name' => 'shopping-guide',
			'page_template' => 'templates/shopping-guide.php'
		] );

		update_option( 'cyn_theme_installed', true );
	}
}