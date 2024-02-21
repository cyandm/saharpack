<?php
if ( post_password_required() ) {
	return;
}

comment_form(
	array(
		'logged_in_as' => null,
		'title_reply' => "شماهم توی این بحث شرکت کنید",
		'title_reply_to' => "ارسال پاسخ به %s",
		'comment_field' => '
		<div class="input-group">

		<div class="input-box"><i class="iconsax"
		icon-name="mail"></i><input id="mail" name="mail" class="comment-input" rows="1" maxlength="6525" placeholder="ایمیل شما" required/>
		</div>

		<div class="input-box"><i class="iconsax"
		icon-name="user-1"></i><input id="name" name="name" class="comment-input" rows="1" maxlength="6525" placeholder="نام شما" required/></div>
		
		<div class="input-box"><i class="iconsax"
		icon-name="message-dots"></i>
		<textarea id="comment" name="comment" class="comment-input" rows="3" maxlength="65525" placeholder="نظرتون رو اینجا بنویسید" required></textarea></div></div>',
		'id_submit' => "submit-commentform",
		'class_submit' => "btn-primary cursor-pointer",
		'name_submit' => "submit-commentform",
		'label_submit' => 'ارسال دیدگاه',
		'submit_field' => '<div class="form-submit">%1$s %2$s</div>',
		'comment_notes_before' => '',
		''

	)
);


if ( have_comments() ) :
	?>
	<div class="comment-list"
		 id="comment-list">

		<?php
		$list = wp_list_comments(
			array(
				'walker' => null,
				'max_depth' => '',
				'style' => 'div',
				'callback' => null,
				'end-callback' => null,
				'type' => 'all',
				'page' => '',
				'per_page' => '',
				'avatar_size' => 32,
				'reverse_top_level' => null,
				'reverse_children' => '',
				'format' => current_theme_supports( 'html5', 'comment-list' ) ? 'html5' : 'xhtml',
				'short_ping' => true,
				'echo' => true,

			)
		);
		?>
	</div>
	<?php
else :
	?>
	<div class="comment-list">

		<p style="margin-top: 1rem;">دیدگاهی وجود ندارد.</p>
	</div>
	<?php
endif;





?>
<?php
//---- Add buttons to top of post content
function ip_post_likes( $content ) {
	// Check if single post
	if ( is_singular( 'post' ) ) {
		ob_start();

		?>
		<ul class="likes">
			<li class="likes__item likes__item--like">
				<a href="<?php echo add_query_arg( 'post_action', 'like' ); ?>">
					Like (<?php echo ip_get_like_count( 'likes' ) ?>)
				</a>
			</li>
			<li class="likes__item likes__item--dislike">
				<a href="<?php echo add_query_arg( 'post_action', 'dislike' ); ?>">
					Dislike (<?php echo ip_get_like_count( 'dislikes' ) ?>)
				</a>
			</li>
		</ul>
		<?php

		$output = ob_get_clean();

		return $output . $content;
	} else {
		return $content;
	}
}

add_filter( 'the_content', 'ip_post_likes' );

//---- Get like or dislike count
function ip_get_like_count( $type = 'likes' ) {
	$current_count = get_post_meta( get_the_id(), $type, true );

	return ( $current_count ? $current_count : 0 );
}

//---- Process like or dislike
function ip_process_like() {
	$processed_like = false;
	$redirect = false;

	// Check if like or dislike
	if ( is_singular( 'post' ) ) {
		if ( isset( $_GET['post_action'] ) ) {
			if ( $_GET['post_action'] == 'like' ) {
				// Like
				$like_count = get_post_meta( get_the_id(), 'likes', true );

				if ( $like_count ) {
					$like_count = $like_count + 1;
				} else {
					$like_count = 1;
				}

				$processed_like = update_post_meta( get_the_id(), 'likes', $like_count );
			} elseif ( $_GET['post_action'] == 'dislike' ) {
				// Dislike
				$dislike_count = get_post_meta( get_the_id(), 'dislikes', true );

				if ( $dislike_count ) {
					$dislike_count = $dislike_count + 1;
				} else {
					$dislike_count = 1;
				}

				$processed_like = update_post_meta( get_the_id(), 'dislikes', $dislike_count );
			}

			if ( $processed_like ) {
				$redirect = get_the_permalink();
			}
		}
	}

	// Redirect
	if ( $redirect ) {
		wp_redirect( $redirect );
		die;
	}
}

add_action( 'template_redirect', 'ip_process_like' );
?>