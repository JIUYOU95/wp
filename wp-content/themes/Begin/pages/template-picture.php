<?php
/*
Template Name: 图片
*/
?>

<?php get_header(); ?>

<section id="picture" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		$taxonomy = 'gallery'; $terms = get_terms($taxonomy); foreach ($terms as $cat) {
		$catid = $cat->term_id;
		$args = array(
			'showposts' => 12,
			'tax_query' => array( array( 'taxonomy' => $taxonomy, 'terms' => $catid ) )
		);
		$query = new WP_Query($args);
		if( $query->have_posts() ) { ?>
		<div class="clear"></div>
		<h3 class="grid-cat"><a href="<?php echo get_term_link( $cat ); ?>" ><i class="fa fa-picture-o"></i><?php echo $cat->name; ?></a></h3>
		<div class="clear"></div>
		<?php while ($query->have_posts()) : $query->the_post();?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="picture-box">
					<figure class="picture-img">
						<?php if (zm_get_option('lazy_s')) { zm_thumbnail_h(); } else { zm_thumbnail(); } ?>
						<?php if (function_exists('zm_link')) { zm_link(); } ?><span class="grid"><span class="fa fa-thumbs-o-up">&nbsp;<?php zm_get_current_count(); ?></span></span>
					</figure>
					<?php the_title( sprintf( '<h3 class="picture-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
				</div>
				<div class="clear"></div>
			</article>
		<?php endwhile; ?>
		<?php } wp_reset_query(); ?>
		<?php } ?>
	</main>
	<div class="clear"></div>
</section>

<?php get_footer(); ?>