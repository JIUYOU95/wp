<?php get_header(); ?>
<section id="tao" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php $posts = query_posts($query_string . '&orderby=date&showposts=16');?>
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="tao-box">
					<figure class="tao-img">
						<?php if (zm_get_option('lazy_s')) { tao_thumbnail_h(); } else { tao_thumbnail(); } ?>
					</figure>
					<div class="product-box">
						<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						<div class="product"><?php $price = get_post_meta($post->ID, 'product', true);{ echo $price; }?></div>
						<div class="ded">
							<ul class="price">
								<li class="pricex"><strong>￥ <?php $price = get_post_meta($post->ID, 'pricex', true);{ echo $price; }?>元</strong></li>
								<?php if ( get_post_meta($post->ID, 'pricey', true) ) : ?>
									<li class="pricey"><del>市场价：<?php $price = get_post_meta($post->ID, 'pricey', true);{ echo $price; }?>元</del></li>
								<?php endif; ?>
							</ul>
							<div class="go-url">
								<div class="taourl">
									<?php if ( get_post_meta($post->ID, 'taourl', true) ) { ?>
										<a target="_blank" rel="external nofollow" href="<?php $url = get_post_meta($post->ID, 'taourl', true);{ echo $url; }?>" >购买</a>
									<?php } else { ?>
										<a href="<?php the_permalink(); ?>" >购买</a>
									<?php } ?>
								</div>
								<div class="detail"><a href="<?php the_permalink(); ?>" rel="bookmark">详情</a></div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			<div class="clear"></div>
		</article>
		<?php endwhile; ?>

		<?php if (zm_get_option('scroll')) { ?>
			<?php zm_page_nav( 'nav-below' ); ?>
		<?php } ?>

	</main><!-- .site-main -->

	<div class="clear"></div>
	<?php pagenavi(); ?>

</section><!-- .content-area -->

<?php get_footer(); ?>