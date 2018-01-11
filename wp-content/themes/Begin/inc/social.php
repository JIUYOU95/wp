<div class="clear"></div>
<div id="social">
	<div class="social-main">
		<span class="like">
	         <a href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" title="我赞" class="favorite<?php if(isset($_COOKIE['zm_like_'.$post->ID])) echo ' done';?>"><i class="fa fa-thumbs-up"></i>赞 <i class="count">
	            <?php if( get_post_meta($post->ID,'zm_like',true) ){
					echo get_post_meta($post->ID,'zm_like',true);
				} else {
					echo '0';
				}?></i>
	        </a>
		</span>
		<span class="shang-p"><a href="#shang" id="shang-p" title="<?php echo zm_get_option('alipay_t'); ?>"><?php echo zm_get_option('alipay_name'); ?></a></span>
		<span class="share-sd">
				<span class="share-s"><a href="javascript:void(0)" id="share-s" title="分享"><i class="fa fa-share-alt"></i>分享</span></a>
				<?php if (zm_get_option('share')) { ?><?php get_template_part( 'inc/share' ); ?><?php } ?>
		</span>
		<div class="clear"></div>
	</div>

	<div id="shang">
		<div class="shang-main">
			<?php if ( zm_get_option('alipay_h') == '' ) { ?><?php } else { ?><h4><?php echo zm_get_option('alipay_h'); ?></h4><?php } ?>
			<?php if ( zm_get_option('qr_a') == '' ) { ?>
			<?php } else { ?>
				<img title="<?php echo zm_get_option('alipay_z'); ?>" src="<?php echo zm_get_option('qr_a'); ?>" />
				<?php if ( zm_get_option('alipay_z') == '' ) { ?><?php } else { ?><h4><?php echo zm_get_option('alipay_z'); ?></h4><?php } ?>
			<?php } ?>

			<?php if ( zm_get_option('qr_b') == '' ) { ?>
			<?php } else { ?>
				<img title="<?php echo zm_get_option('alipay_z'); ?>" src="<?php echo zm_get_option('qr_b'); ?>" />
				<?php if ( zm_get_option('alipay_w') == '' ) { ?><?php } else { ?><h4><?php echo zm_get_option('alipay_w'); ?></h4><?php } ?>
			<?php } ?>
		</div>
	</div>
</div>