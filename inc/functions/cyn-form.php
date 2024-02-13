<?php

/**
 * register forms
 * 
 * 
 */

add_action( 'wp_ajax_send_contact_form', 'cyn_send_contact_form' );
add_action( 'wp_ajax_nopriv_send_contact_form', 'cyn_send_contact_form' );


function cyn_send_contact_form() {
	if ( ! wp_verify_nonce( $_POST['_nonce'], 'ajax-nonce' ) )
		return wp_send_json_error( [ 'verify_nonce' => false ], 403 );


	$data = $_POST['data'];
	$dbData = array(
		'user_name' => sanitize_text_field( $data['name'] ),
		'user_phone' => sanitize_text_field( $data['phone-number'] ),
		'user_describe' => sanitize_textarea_field( $data['describe'] ),
	);

	$msg_content = "
                نام: " . $dbData['user_name'] . "\n
                شمار تماس: " . $dbData['user_phone'] . "\n
                پیام: " . $dbData['user_describe'] . "
            ";
	$new_post = array(
		'post_type' => $GLOBALS["form-post-type"],
		'post_title' => $dbData['user_name'],
		'post_content' => $msg_content,
		'post_status' => 'publish',
		'tax_input' => [ 'form-cat' => [ get_term_by( 'slug', 'contact-us', 'form-cat' )->term_id ] ],
		'post_author' => 1,
	);

	$insert_post = wp_insert_post( $new_post );

	if ( is_wp_error( $insert_post ) )
		return wp_send_json_error( [ 'insert_row' => false ], 500 );


	$send_email = wp_mail(
		'amirtanazzoh@gmail.com',
		'یک پیام جدی از : ' . $dbData['user_name'],
		$msg_content
	);

	if ( $send_email == false )
		return wp_send_json_error( [ 'user_name' => false ], 500 );

	return wp_send_json( [ 'success' => true ], 201 );
}

add_action( 'wp_ajax_cyn_pricing_form', 'cyn_pricing_form' );
add_action( 'wp_ajax_nopriv_cyn_pricing_form', 'cyn_pricing_form' );
function cyn_pricing_form() {

	$meta = [];

	if ( ! wp_verify_nonce( $_POST['_nonce'], 'ajax-nonce' ) )
		return wp_send_json_error( [ 'verify_nonce' => false ], 403 );


	if ( isset( $_FILES['file'] ) && $_FILES['file']['name'] !== '' ) {
		global $wp_filesystem;
		WP_Filesystem();

		$content_directory = $wp_filesystem->wp_content_dir() . 'uploads/';
		$wp_filesystem->mkdir( $content_directory . 'files' );
		$target_dir_location = $content_directory . 'files/';

		$ext = end( explode( '.', $_FILES['file']['name'] ) );
		$name_file = strtotime( 2000 ) . '.' . $ext;
		$tmp_name = $_FILES['file']['tmp_name'];
		move_uploaded_file( $tmp_name, $target_dir_location . $name_file );

		$meta['file_link'] = site_url() . '/wp-content/uploads/files/' . $name_file;
	}

	foreach ( $_POST as $key => $value ) {
		if ( in_array( $key, [ 'action', 'firstName', 'lastName', '_nonce' ] ) )
			continue;
		$meta[ $key ] = $value;
	}

	wp_send_json( [ $meta, $_FILES ] );

	wp_insert_post( [ 
		'post_type' => $GLOBALS['form-post-type'],
		'post_title' => $_POST['firstName'] . ' ' . $_POST['lastName'],
		'post_status' => 'private',
		'tax_input' => [ 'form-cat' => [ get_term_by( 'slug', 'pricing', 'form-cat' )->term_id ] ],
		'meta_input' => $meta,
	] );




}
