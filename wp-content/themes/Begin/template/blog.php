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

			<?php if (zm_get_option('cms_top')) { ?>
				<?php
					if ( !is_paged() ) :
						get_template_part( 'inc/cms-top' );
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
				<?php if ( !is_paged() ) { ?><?php zm_page_nav( 'nav-below' ); ?><?php } ?>
			<?php } ?>

		</main><!-- .site-main -->

		<?php pagenavi(); ?>

	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>