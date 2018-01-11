<?php
/*
Template Name: blog
*/
?>
<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php if (zm_get_option('slider')) { ?>
				<?php
					if ( !is_paged() ) :
						get_template_part( 'inc/slider' );
					endif;
				?>
			<?php } ?>
			<?php
				$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				$notcat = explode(',',zm_get_option('not_cat_n'));
				$args = array(
					'category__not_in' => $notcat,
				    'ignore_sticky_posts' => 1, 
					'paged' => $paged
				);
				query_posts( $args );
		 	?>
			<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template/content', get_post_format() ); ?>

				<?php get_template_part('ad/ads', 'archive'); ?>

			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'template/content', 'none' ); ?>
			<?php endif; ?>

			<?php if (zm_get_option('scroll')) { ?>
				<?php zm_page_nav( 'nav-below' ); ?>
			<?php } ?>

		</main><!-- .site-main -->

		<?php pagenavi(); ?>

	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php if (zm_get_option('scroll')) { ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/infinite-scroll.js"></script>
<script type="text/javascript">$(document).ready(function(){var infinite_scroll={loading:{img:"<?php echo get_template_directory_uri(); ?>/img/infinite.gif",msgText:"",finishedMsg:""},nextSelector:"#nav-below .nav-previous a",navSelector:"#nav-below",itemSelector:"article",maxPage:"<?php echo zm_get_option('scroll_n'); ?>",contentSelector:"#main"};$(infinite_scroll.contentSelector).infinitescroll(infinite_scroll)});</script>
<?php } ?>
<script type="text/javascript">
    document.onkeydown = chang_page;function chang_page(e) {
        var e = e || event,
        keycode = e.which || e.keyCode;
        if (keycode == 37) location = '<?php echo get_previous_posts_page_link(); ?>';
        if (keycode == 39) location = '<?php echo get_next_posts_page_link(); ?>';
    }
</script>
<?php get_footer(); ?>