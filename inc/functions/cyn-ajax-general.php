<?php

function cyn_verify_nonce( $nonce ) {
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
		return wp_send_json_error( [ 'verify_nonce' => false ], 403 );
}

function cyn_render_by_query( $query, $post_type, array $args = [] ) {
	ob_start();

	if ( $query->have_posts() ) {


		while ( $query->have_posts() ) :

			$query->the_post();
			get_template_part( '/templates/components/cards/' . $post_type, null, $args );

		endwhile;
	} else {
		get_template_part( '/templates/components/archive/not-found' );
	}

	wp_reset_postdata();

	return ob_get_clean();
}

function cyn_make_query(
	$post_type,
	$slug = null,
	$taxonomy = null,
	$meta = null,
	$order = null,
	$post_per_page = null,
	$paged = 1 ) {

	$args = [ 
		'post_type' => $post_type,
		'post_per_page' => $post_per_page,
		'paged' => $paged,

	];

	if ( isset( $slug ) && $slug !== 'default' ) {
		$args = array_merge( $args,
			[ 
				'tax_query' => [ 
					[ 
						'taxonomy' => $taxonomy,
						'field' => 'slug',
						'terms' => [ $slug ]
					]
				]
			] );
	}

	if ( isset( $order ) ) {
		$args = array_merge( $args, [ 
			'order' => $order,
			'orderby' => 'meta_value_num',
			'meta_key' => $meta,
		] );
	}



	return new WP_Query( $args );
}