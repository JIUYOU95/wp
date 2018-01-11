<ul id="scroll">
	<li><a class="scroll-h" title="返回顶部"><i class="fa fa-angle-up"></i></a></li>
	<?php if(is_single() || is_page()) { ?><li><a class="scroll-c" title="评论"><i class="fa fa-comment-o"></i></a></li><?php } ?>
	<li><a class="scroll-b" title="转到底部"><i class="fa fa-angle-down"></i></a></li>
	<?php if (zm_get_option('gb2')) { ?><li><a name="gb2big5" id="gb2big5"><span>繁</span></a></li><?php } ?>
	<?php if (zm_get_option('qr_img')) { ?>
		<li><a href="javascript:void(0)" class="qr" title="二维码"><i class="fa fa-qrcode"></i><span class="qr-img"><div id="output"><img class="alignnone"src="<?php echo zm_get_option('qr_icon'); ?>" /></div></span></a></li>
		<script type="text/javascript">$(document).ready(function(){if(!+[1,]){present="table";} else {present="canvas";}$('#output').qrcode({render:present,text:window.location.href,width:"150",height:"150"});});</script>
	<?php } ?>
</ul>

