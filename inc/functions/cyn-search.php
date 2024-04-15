<?php
add_action('wp_ajax_cyn_ajax_search', 'cyn_ajax_search');
add_action('wp_ajax_nopriv_cyn_ajax_search', 'cyn_ajax_search');


function cyn_ajax_search()
{


	list(
		'_nonce' => $nonce,
		'value' => $value,
		'postType' => $post_type
	) = $_POST;

	cyn_verify_nonce($nonce);

	$q = new WP_Query([
		'post_type' => $post_type,
		'posts_per_page' => 3,
		's' => $value
	]);

	$html = cyn_render_by_query($q, 'search');


	wp_send_json([
		'html' => $html,
		'foundPosts' => $q->found_posts,
	]);
}

add_action('wp_ajax_cyn_ajax_search_page', 'cyn_ajax_search_page');
add_action('wp_ajax_nopriv_cyn_ajax_search_page', 'cyn_ajax_search_page');
function cyn_ajax_search_page()
{


	list(
		'_nonce' => $nonce,
		'post_type' => $post_type,
		's' => $s,
	) = $_POST;



	cyn_verify_nonce($nonce);

	$q = new WP_Query([
		'post_type' => $post_type === 'default' ? null : $post_type,
		'posts_per_page' => -1,
		'orderby' => 'relevance',
		'order' => 'DESC',
		's' => $s
	]);


	$html = cyn_render_by_query($q, 'search', ['complete' => true]);

	wp_send_json([
		'html' => $html,
		'foundPosts' => $q->found_posts,
	]);
}



add_action('init', 'excludePostTypeFromSearch', 99);
function excludePostTypeFromSearch()
{
	global $wp_post_types;

	if (post_type_exists('page') && isset($wp_post_types['page'])) {
		$wp_post_types['page']->exclude_from_search = true;
	}
}
