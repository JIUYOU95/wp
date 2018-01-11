<?php
if (!isset($locking)) {
	require get_template_directory() . '/inc/functions/widgets.php';
	require get_template_directory() . '/inc/functions/comment-template.php';
	require get_template_directory() . '/inc/functions/custom-field.php';
	require get_template_directory() . '/inc/functions/notify.php';
	require get_template_directory() . '/inc/functions/metabox.php';
	require get_template_directory() . '/inc/options/options-framework.php';
	if (is_admin() && $_GET['activated'] == 'true') {
		header("Location: themes.php?page=options-framework");
	}
	require get_template_directory() . '/inc/functions/guide.php';
	require get_template_directory() . '/inc/functions/post-type.php';
	require get_template_directory() . '/inc/functions/default.php';
	require get_template_directory() . '/inc/functions/thumbnail.php';
	require get_template_directory() . '/inc/functions/addclass.php';
	require get_template_directory() . '/inc/functions/local-avatars.php';
	if (zm_get_option('smart_ideo')) {
		require get_template_directory() . '/inc/functions/smartideo.php';
	}
	if (zm_get_option('qt')) {
		require get_template_directory() . '/inc/functions/qaptcha.php';
	}
	if (zm_get_option('auto_tags')) {
		add_action('save_post', 'auto_add_tags');
	}
	if (zm_get_option('page_html')) {
		add_action('init', 'html_page_permalink', -1);
	}
	function begin_title()
	{
		get_template_part('inc/functions/seo');
	}
	function setTitle()
	{
		$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
		echo $title = $term->name;
	}
	function zm_category()
	{
		$category = get_the_category();
		if ($category[0]) {
			echo '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->cat_name . '</a>';
		}
	}
	if (zm_get_option('check_admin')) {
		if (!is_user_logged_in()) {
			add_filter('preprocess_comment', 'usercheck');
		}
	}
	if (zm_get_option('no') !== 'no') {
		if (!zm_get_option('gravatar_url') || zm_get_option('gravatar_url') == 'cn') {
			add_filter('get_avatar', 'cn_avatar');
		}
		if (zm_get_option('gravatar_url') == 'duoshuo') {
			add_filter('get_avatar', 'duoshuo_avatar');
		}
		if (zm_get_option('gravatar_url') == 'ssl') {
			add_filter('get_avatar', 'ssl_avatar');
		}
	}
}
add_action('media_buttons', 'begin_select', 11);
add_action('admin_notices', 'showadminmessages');
add_action('admin_head', 'begin_button_js');
add_action('save_post', 'clear_archives_cache');
add_filter('user_contactmethods', 'zm_user_contact');
add_filter('esc_html', 'zm_post_formats');
add_action('wp_head', 'head_color');
add_action('wp_head', 'head_css');
add_action('wp_head', 'zm_width');
add_shortcode('reply', 'reply_read');
add_shortcode('password', 'secret');
add_shortcode('img', 'gallery');
add_shortcode('file', 'button_a');
add_shortcode('button', 'button_b');
add_shortcode('url', 'button_url');
add_shortcode('videos', 'my_videos');
add_action('wp_ajax_nopriv_zm_ding', 'begin_ding');
add_action('wp_ajax_zm_ding', 'begin_ding');
add_shortcode('s', 'show_more');
add_shortcode("p", 'section_content');
add_filter('category_description', 'deletehtml');
add_filter('comment_text', 'message_img');
add_action('init', 'begin_smilies', 5);