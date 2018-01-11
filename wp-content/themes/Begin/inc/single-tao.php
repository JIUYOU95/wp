<div class="single-goods">
	<?php 
		$loop = new WP_Query( array( 'post_type' => 'tao', 'orderby' => 'rand', 'posts_per_page' => zm_get_option('single_tao_n') ) );
		while ( $loop->have_posts() ) : $loop->the_post();
	?>

	<div class="tl4 tm4">
		<div class="single-goods-main">
			<figure class="single-goods-img">
				<?php 
					if (zm_get_option('lazy_s')) { tao_thumbnail_h(); } else { tao_thumbnail(); }
				?>
			</figure>
			<div class="clear"></div>
		</div>
	</div>

	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
	<div class="clear"></div>
</div>