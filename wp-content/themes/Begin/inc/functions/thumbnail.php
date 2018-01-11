<?php
// 自动缩略图
function zm_thumbnail() {
    global $post;
    if ( get_post_meta($post->ID, 'thumbnail', true) ) {
    	$image = get_post_meta($post->ID, 'thumbnail', true);
        echo '<a href="'.get_permalink().'"><img src=';
        echo $image;
        echo ' alt="'.$post->post_title .'" /></a>';
    } else {
	    if ( has_post_thumbnail() ) {
	        echo '<a href="'.get_permalink().'">';
	        the_post_thumbnail('content', array('alt' => get_the_title()));
	        echo '</a>';
		} else {
	        $content = $post->post_content;
	        preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
	        $n = count($strResult[1]);
	        if($n > 0){
				echo '<a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/timthumb.php?src='.$strResult[1][0].'&w='.zm_get_option('img_w').'&h='.zm_get_option('img_h').'&zc=1" alt="'.$post->post_title .'" /></a>';
	        } else { 
				$random = mt_rand(1, 20);
				echo '<a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/random/'. $random .'.jpg" alt="'.$post->post_title .'" /></a>';
	        }
		}
	}
}

function zm_thumbnail_h() {
    global $post;
    if ( get_post_meta($post->ID, 'thumbnail', true) ) {
    	$image = get_post_meta($post->ID, 'thumbnail', true);
        echo '<a href="'.get_permalink().'"><img src="' . get_template_directory_uri() . '/img/loading.gif" data-echo=';
        echo $image;
        echo ' alt="'.$post->post_title .'" /></a>';
    } else {
	    if ( has_post_thumbnail() ) {
	        echo '<a href="'.get_permalink().'">';
	        the_post_thumbnail('content', array('alt' => get_the_title()));
	        echo '</a>';
		} else {
	        $content = $post->post_content;
	        preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
	        $n = count($strResult[1]);
	        if($n > 0){
				echo '<a href="'.get_permalink().'"><img src="' . get_template_directory_uri() . '/img/loading.gif" data-echo="'.get_template_directory_uri().'/timthumb.php?src='.$strResult[1][0].'&w='.zm_get_option('img_w').'&h='.zm_get_option('img_h').'&zc=1" alt="'.$post->post_title .'" /></a>';
	        } else { 
	        	$random = mt_rand(1, 20);
				echo '<a href="'.get_permalink().'"><img src="' . get_template_directory_uri() . '/img/loading.gif" data-echo="'.get_template_directory_uri().'/img/random/'. $random .'.jpg" alt="'.$post->post_title .'" /></a>';
	        }
		}
	}
}

function zm_long_thumbnail() {
    global $post;
	$content = $post->post_content;
	preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
	$n = count($strResult[1]);
	if($n > 0){
		echo '<a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/timthumb.php?src='.$strResult[1][0].'&w=530&h=200&zc=1" alt="'.$post->post_title .'" /></a>';
	} else { 
		echo '<a class="random-img" href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/random/long.jpg" alt="'.$post->post_title .'" /></a>';
	}
}

function zm_long_thumbnail_h() {
    global $post;
	$content = $post->post_content;
	preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
	$n = count($strResult[1]);
	if($n > 0){
		echo '<a href="'.get_permalink().'"><img src="' . get_template_directory_uri() . '/img/loading.gif" data-echo="'.get_template_directory_uri().'/timthumb.php?src='.$strResult[1][0].'&w=530&h=200&zc=1" alt="'.$post->post_title .'" /></a>';
	} else { 
		echo '<a class="random-img" href="'.get_permalink().'"><img src="' . get_template_directory_uri() . '/img/loading.gif" data-echo="'.get_template_directory_uri().'/img/random/long.jpg" alt="'.$post->post_title .'" /></a>';
	}
}

function video_thumbnail() {
    global $post;
    $img = get_post_meta($post->ID, 'big', true);
    if ( get_post_meta($post->ID, 'small', true) ) {
    	$image = get_post_meta($post->ID, 'small', true);
        echo '<a class="videos" href="'.$img.'"><img src=';
        echo $image;
        echo ' alt="'.$post->post_title .'" /><i class="fa fa-play-circle-o"></i></a>';
    } else {
	    if ( has_post_thumbnail() ) {
	        echo '<a class="videos" href="'.$img.'">';
	        the_post_thumbnail('content', array('alt' => get_the_title()));
	        echo '<i class="fa fa-play-circle-o"></i></a>';
		}
	}
}

function videos_thumbnail() {
    global $post;
    if ( get_post_meta($post->ID, 'small', true) ) {
    	$image = get_post_meta($post->ID, 'small', true);
        echo '<a class="videos" href="'.get_permalink().'"><img src=';
        echo $image;
        echo ' alt="'.$post->post_title .'" /><i class="fa fa-play-circle-o"></i></a>';
    } else {
	    if ( has_post_thumbnail() ) {
	        echo '<a class="videos" href="'.get_permalink().'">';
	        the_post_thumbnail('content', array('alt' => get_the_title()));
	        echo '<i class="fa fa-play-circle-o"></i></a>';
		}
	}
}

function videos_thumbnail_h() {
    global $post;
    if ( get_post_meta($post->ID, 'small', true) ) {
    	$image = get_post_meta($post->ID, 'small', true);
        echo '<a class="videos" href="'.get_permalink().'"><img src="' . get_template_directory_uri() . '/img/loading.gif" data-echo=';
        echo $image;
        echo ' alt="'.$post->post_title .'" /><i class="fa fa-play-circle-o"></i></a>';
    } else {
	    if ( has_post_thumbnail() ) {
	        echo '<a class="videos" href="'.get_permalink().'">';
	        the_post_thumbnail('content', array('alt' => get_the_title()));
	        echo '<i class="icon-btnPlay"></i></a>';
		}
	}
}

function videor_thumbnail_h() {
    global $post;
    if ( get_post_meta($post->ID, 'small', true) ) {
    	$image = get_post_meta($post->ID, 'small', true);
        echo '<a class="videor" href="'.get_permalink().'"><img src="' . get_template_directory_uri() . '/img/loading.gif" data-echo=';
        echo $image;
        echo ' alt="'.$post->post_title .'" /><i class="fa fa-play-circle-o"></i></a>';
    } else {
	    if ( has_post_thumbnail() ) {
	        echo '<a class="videor" href="'.get_permalink().'">';
	        the_post_thumbnail('content', array('alt' => get_the_title()));
	        echo '<i class="icon-btnPlay"></i></a>';
		}
	}
}

function videor_thumbnail() {
    global $post;
    if ( get_post_meta($post->ID, 'small', true) ) {
    	$image = get_post_meta($post->ID, 'small', true);
        echo '<a class="videor" href="'.get_permalink().'"><img src=';
        echo $image;
        echo ' alt="'.$post->post_title .'" /><i class="fa fa-play-circle-o"></i></a>';
    } else {
	    if ( has_post_thumbnail() ) {
	        echo '<a class="videor" href="'.get_permalink().'">';
	        the_post_thumbnail('content', array('alt' => get_the_title()));
	        echo '<i class="icon-btnPlay"></i></a>';
		}
	}
}

function tao_thumbnail() {
		global $post;
		$url = get_post_meta($post->ID, 'taourl', true);
		if ( get_post_meta($post->ID, 'thumbnail', true) ) {
		$image = get_post_meta($post->ID, 'thumbnail', true);
		echo '<a href="'.esc_url( get_permalink() ).'"><img src=';
		echo $image;
		echo ' /></a>';
    } else {
	    $content = $post->post_content;
	    preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
	    $n = count($strResult[1]);
	    if($n > 0){
			echo '<a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/timthumb.php?src='.$strResult[1][0].'&w=300&h=300&zc=1" alt="'.$post->post_title .'" /></a>';
	    }
	}
}

function tao_thumbnail_h() {
		global $post;
		$url = get_post_meta($post->ID, 'taourl', true);
		if ( get_post_meta($post->ID, 'thumbnail', true) ) {
		$image = get_post_meta($post->ID, 'thumbnail', true);
		echo '<a href="'.esc_url( get_permalink() ).'"><img src="' . get_template_directory_uri() . '/img/loading.gif" data-echo=';
		echo $image;
		echo ' /></a>';
    } else {
	    $content = $post->post_content;
	    preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
	    $n = count($strResult[1]);
	    if($n > 0){
			echo '<a href="'.get_permalink().'"><img src="' . get_template_directory_uri() . '/img/loading.gif" data-echo="'.get_template_directory_uri().'/timthumb.php?src='.$strResult[1][0].'&w=300&h=300&zc=1" alt="'.$post->post_title .'" /></a>';
	    }
	}
}

// 所有图片
function all_img($soContent){
	$soImages = '~<img [^\>]*\ />~';
	preg_match_all( $soImages, $soContent, $thePics );
	$allPics = count($thePics);
	if( $allPics > 0 ){ 
		$count=0;
			foreach($thePics[0] as $v){
				 if( $count == 4 ){break;}
				 else { echo '<ul><div class="f4"><li class="format-img">',$v,'<div class="clear"></div></li></div></ul>'; }
				$count++;
			}
	}
}
