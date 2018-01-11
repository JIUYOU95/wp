<?php
/*
Template Name: 公司主页
*/
?>
<?php get_header(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/flexisel.js"></script>
<link rel="stylesheet" id='style-pany' href="<?php bloginfo('template_url'); ?>/css/css.css" />
<?php if (zm_get_option('pany_d')) { ?>
<script type="text/javascript">
$(document).ready(function(a) {
    if (typeof scrollMonitor != 'undefined') {
        a(".pany-contact, .section-box, #section .widget, .nbs-flexisel-container").each(function(i, el) {
            var ael = a(el),
            watcher = scrollMonitor.create(el, -100);
            ael.addClass('pany-hide');
            watcher.enterViewport(function(ev) {
                if (!ael.hasClass('pany-show')) {
                    ael.addClass('pany-show');
                }
            });
        });
    }
})
</script>
<?php } ?>
<style type="text/css">
#content {
    width: 100%;
	background: #fff;
    margin: 0 auto;
}
#primary {
	width: 100%;
	box-shadow: none;
}
#primary .page {
	background: transparent !important;
	padding: 0 !important;
	border: none !important;
	box-shadow: none !important;
}
.breadcrumb {
	display: none;
}
#slideshow {
	background: #555;
	font-size: 0;
	margin: 1px auto 0;
}
#menu-box {
 	transition-duration: .0s;
}
/** 链接 **/
#links {
	width: 1080px;
	margin: 0 auto;
	padding: 20px 0;
}
.link-f a {
	background: #fff;
	text-align: center;
	padding: 5px;
	display: block;
	white-space: nowrap;
	word-wrap: normal;
	text-overflow: ellipsis;
	overflow: hidden;
	border: 1px solid #fff;
	border-radius: 0;
	transition-duration: .5s;
	box-shadow: none;
}
@media screen and (max-width: 1080px) {
	#links {
		width: 100%;
	}
}
.ad-site {
	display: none;
}
</style>

<div class="container">

	<!-- 幻灯 -->
	<?php if (zm_get_option('slider')) { ?>
	<div class="row">
		<div class="home-slider">
			<?php get_template_part( '/pany/home-slider' ); ?>
		</div>
	</div>
	<?php } ?>

	<div id="section">

		<!-- 简介 -->
		<?php if (zm_get_option('pany_contact')) { ?>
		<div class="contact">
			<div class="row">
					<div class="col">
						<?php get_template_part( '/pany/contact' ); ?>
						<div class="clear"></div>
					</div>
			</div>
		</div>
		<?php } ?>

		<!-- 调用分类 -->
		<?php if (zm_get_option('cat_a')) { ?>
		<div class="row">
			<div class="col">
				<?php get_template_part( '/pany/cat' ); ?>
				<div class="clear"></div>
			</div>
		</div>
		<?php } ?>

		<!-- 调用文章 -->
		<?php if (zm_get_option('pageid')) { ?>
		<div class="row">
			<div class="col">
				<?php get_template_part( '/pany/pageid' ); ?>
				<div class="clear"></div>
			</div>
		</div>
		<?php } ?>

		<!-- 自定义文字 -->
		<?php if (zm_get_option('pany_custom')) { ?>
		<div class="row">
			<div class="col">
				<?php get_template_part( '/pany/custom' ); ?>
				<div class="clear"></div>
			</div>
		</div>
		<?php } ?>

		<!-- 单栏小工具A -->
		<?php if (zm_get_option('pany_one_a')) { ?>
		<div class="row">
			<div class="col">
				<?php if ( zm_get_option('pany_one_a_w') == '' ) { ?>
				<?php } else { ?>
					<h3 class="col-title"><?php echo zm_get_option('pany_one_a_w'); ?></h3>
				<?php } ?>
				<?php dynamic_sidebar( 'pany-one-a' ); ?>
				<div class="clear"></div>
			</div>
		</div>
		<?php } ?>

		<!-- 两栏小工具A -->
		<?php if (zm_get_option('pany_two_a')) { ?>
		<div class="row">
			<div class="col">
				<?php if ( zm_get_option('pany_two_a_w') == '' ) { ?>
				<?php } else { ?>
					<h3 class="col-title"><?php echo zm_get_option('pany_two_a_w'); ?></h3>
				<?php } ?>
				<?php dynamic_sidebar( 'pany-two-a' ); ?>
				<div class="clear"></div>
			</div>
		</div>
		<?php } ?>

		<!-- 单栏小工具B -->
		<?php if (zm_get_option('pany_one_b')) { ?>
		<div class="row">
			<div class="col">
				<?php if ( zm_get_option('pany_one_b_w') == '' ) { ?>
				<?php } else { ?>
					<h3 class="col-title"><?php echo zm_get_option('pany_one_b_w'); ?></h3>
				<?php } ?>
				<?php dynamic_sidebar( 'pany-one-b' ); ?>
				<div class="clear"></div>
			</div>
		</div>
		<?php } ?>

		<!-- 两栏小工具B -->
		<?php if (zm_get_option('pany_two_b')) { ?>
		<div class="row">
			<div class="col">
				<?php if ( zm_get_option('pany_two_b_w') == '' ) { ?>
				<?php } else { ?>
					<h3 class="col-title"><?php echo zm_get_option('pany_two_b_w'); ?></h3>
				<?php } ?>
				<?php dynamic_sidebar( 'pany-two-b' ); ?>
				<div class="clear"></div>
			</div>
		</div>
		<?php } ?>

		<!-- 产品展示 -->
		<?php if (zm_get_option('pany_scrolling')) { ?>
		<div class="row">
			<div class="col">
				<?php get_template_part( '/pany/scrolling' ); ?>
			</div>
		</div>
		<?php } ?>

		<!-- 单栏小工具C -->
		<?php if (zm_get_option('pany_one_c')) { ?>
		<div class="row">
			<div class="col">
				<?php if ( zm_get_option('pany_one_c_w') == '' ) { ?>
				<?php } else { ?>
					<h3 class="col-title"><?php echo zm_get_option('pany_one_c_w'); ?></h3>
				<?php } ?>
				<?php dynamic_sidebar( 'pany-one-c' ); ?>
				<div class="clear"></div>
			</div>
		</div>
		<?php } ?>

		<!-- 两栏小工具C -->
		<?php if (zm_get_option('pany_two_c')) { ?>
		<div class="row">
			<div class="col">
				<?php if ( zm_get_option('pany_two_c_w') == '' ) { ?>
				<?php } else { ?>
					<h3 class="col-title"><?php echo zm_get_option('pany_two_c_w'); ?></h3>
				<?php } ?>
				<?php dynamic_sidebar( 'pany-two-c' ); ?>
				<div class="clear"></div>
			</div>
		</div>
		<?php } ?>
	</div>
</div><!--  container end -->

<script type="text/javascript">
$("#section .row:even").addClass("line"); 
</script>

<div id="links">
	<ul>
		<?php wp_list_bookmarks('title_li=&before=<span class="lx7"><span class="link-f">&after=</span></span>&categorize=1&show_images=0&orderby=rating&order=DESC&category='.zm_get_option('link_f_cat')); ?>
		<?php if ( zm_get_option('link_url') == '' ) { ?><?php } else { ?><span class="lx7"><span class="link-f"><li><a href="<?php echo get_permalink( zm_get_option('link_url') ); ?>" target="_blank" title="全部链接">更多链接<i class="icon-li"></i></a></li></span></span><?php } ?>
	</ul>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>