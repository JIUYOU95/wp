<?php $recent = new WP_Query( array( 'posts_per_page' => zm_get_option('news_n'), 'category__not_in' => explode(',',zm_get_option('not_news_n'))) ); ?>
<?php while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; ?>
<?php get_template_part( 'template/content', get_post_format() ); ?>
<?php endwhile; ?>
<div class="clear"></div>