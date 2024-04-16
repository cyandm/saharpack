<?php
if (post_password_required()) {
	return;
}

$your_email = pll__("your-email");
$your_name = pll__("your-name");
$your_comment = pll__("write-your-comment-here");

$login_url = pll_current_language() === 'en' ? '/en/login-page' : '/login';
$login_text = pll__('please-logged-for-comments');

if (is_user_logged_in()) {
	comment_form(
		array(
			'logged_in_as' => null,
			'title_reply' => pll__("join-in-this-discussion"),
			'title_reply_to' => pll__("send-reply-to") . " %s",
			'fields' => apply_filters('comment_form_default_fields', [
				'author' => '<div class="input-box name"><i class="iconsax"
		 	icon-name="user-1"></i><input id="name" name="name" class="comment-input" rows="1" maxlength="6525" placeholder="' . $your_name . '" required/></div>',
				'email' => '<div class="input-box email"><i class="iconsax"
		 	icon-name="mail"></i><input id="mail" name="mail" class="comment-input" rows="1" maxlength="6525" placeholder= "' . $your_email . '" required/>
		 	</div>',
				'url' => '',
				'cookies' => ''
			]),
			'comment_field' => '<div class="input-box text-area"><i class="iconsax" icon-name="message-dots"></i>
			<textarea id="comment" name="comment" class="comment-input" rows="3" maxlength="65525" placeholder="' . $your_comment . '" required></textarea>
			</div>',
			'id_submit' => "submit-commentform",
			'class_submit' => "btn-primary cursor-pointer",
			'name_submit' => "submit-commentform",
			'label_submit' => pll__('submit-comment'),
			'submit_field' => '<div class="form-submit">%1$s %2$s</div>',
			'comment_notes_before' => '',
			''

		)
	);
} else {
	echo "<a class=\"travel__content__items__btn\" href=\"$login_url\">  $login_text</a>";
}

if (have_comments()) :
?>
	<div class="comment-list" id="comment-list">

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
				'format' => current_theme_supports('html5', 'comment-list') ? 'html5' : 'xhtml',
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
		<p style="margin-top: 1rem;"><?php pll_e("there-are-no-comments") ?></p>
	</div>
<?php
endif;





?>