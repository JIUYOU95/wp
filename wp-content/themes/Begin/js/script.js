(function(a){if(typeof define!=="undefined"&&define.amd){define([],a)}else{if(typeof module!=="undefined"&&module.exports){module.exports=a()}else{window.scrollMonitor=a()}}})(function(){var c=function(){return window.pageYOffset||(document.documentElement&&document.documentElement.scrollTop)||document.body.scrollTop};var G={};var jh=604;var k=[];var E="visibilityChange";var B="enterViewport";var z="fullyEnterViewport";var o="exitViewport";var l="partiallyExitViewport";var w="locationChange";var n="stateChange";var p=[E,B,z,o,l,w,n];var F={top:0,bottom:0};var y=function(){return window.innerHeight||document.documentElement.clientHeight};var a=function(){return Math.max(document.body.scrollHeight,document.documentElement.scrollHeight,document.body.offsetHeight,document.documentElement.offsetHeight,document.documentElement.clientHeight)};G.viewportTop=null;G.viewportBottom=null;G.documentHeight=null;G.viewportHeight=y();var v;var s;var b;function t(){G.viewportTop=c();G.viewportBottom=G.viewportTop+G.viewportHeight;G.documentHeight=a();if(G.documentHeight!==v){b=k.length;while(b--){k[b].recalculateLocation()}v=G.documentHeight}}function r(){G.viewportHeight=y();t();q()}var d;function u(){clearTimeout(d);d=setTimeout(r,100)}var h;function q(){h=k.length;while(h--){k[h].update()}h=k.length;while(h--){k[h].triggerCallbacks()}}function m(P,I){var S=this;this.watchItem=P;if(!I){this.offsets=F}else{if(I===+I){this.offsets={top:I,bottom:I}}else{this.offsets={top:I.top||F.top,bottom:I.bottom||F.bottom}}}this.callbacks={};for(var N=0,M=p.length;N<M;N++){S.callbacks[p[N]]=[]}this.locked=false;var L;var Q;var R;var O;var H;var e;function K(i){if(i.length===0){return}H=i.length;while(H--){e=i[H];e.callback.call(S,s);if(e.isOne){i.splice(H,1)}}}this.triggerCallbacks=function J(){if(this.isInViewport&&!L){K(this.callbacks[B])}if(this.isFullyInViewport&&!Q){K(this.callbacks[z])}if(this.isAboveViewport!==R&&this.isBelowViewport!==O){K(this.callbacks[E]);if(!Q&&!this.isFullyInViewport){K(this.callbacks[z]);K(this.callbacks[l])}if(!L&&!this.isInViewport){K(this.callbacks[B]);K(this.callbacks[o])}}if(!this.isFullyInViewport&&Q){K(this.callbacks[l])}if(!this.isInViewport&&L){K(this.callbacks[o])}if(this.isInViewport!==L){K(this.callbacks[E])}switch(true){case L!==this.isInViewport:case Q!==this.isFullyInViewport:case R!==this.isAboveViewport:case O!==this.isBelowViewport:K(this.callbacks[n])}L=this.isInViewport;Q=this.isFullyInViewport;R=this.isAboveViewport;O=this.isBelowViewport};this.recalculateLocation=function(){if(this.locked){return}var U=this.top;var T=this.bottom;if(this.watchItem.nodeName){var j=this.watchItem.style.display;if(j==="none"){this.watchItem.style.display=""}var i=this.watchItem.getBoundingClientRect();this.top=i.top+G.viewportTop;this.bottom=i.bottom+G.viewportTop;if(j==="none"){this.watchItem.style.display=j}}else{if(this.watchItem===+this.watchItem){if(this.watchItem>0){this.top=this.bottom=this.watchItem}else{this.top=this.bottom=G.documentHeight-this.watchItem}}else{this.top=this.watchItem.top;this.bottom=this.watchItem.bottom}}this.top-=this.offsets.top;this.bottom+=this.offsets.bottom;this.height=this.bottom-this.top;if((U!==undefined||T!==undefined)&&(this.top!==U||this.bottom!==T)){K(this.callbacks[w])}};this.recalculateLocation();this.update();L=this.isInViewport;Q=this.isFullyInViewport;R=this.isAboveViewport;O=this.isBelowViewport}m.prototype={on:function(e,j,i){switch(true){case e===E&&!this.isInViewport&&this.isAboveViewport:case e===B&&this.isInViewport:case e===z&&this.isFullyInViewport:case e===o&&this.isAboveViewport&&!this.isInViewport:case e===l&&this.isAboveViewport:j.call(this,s);if(i){return}}if(this.callbacks[e]){this.callbacks[e].push({callback:j,isOne:i||false})}else{throw new Error("Tried to add a scroll monitor listener of type "+e+". Your options are: "+p.join(", "))}},off:function(H,I){if(this.callbacks[H]){for(var e=0,j;j=this.callbacks[H][e];e++){if(j.callback===I){this.callbacks[H].splice(e,1);break}}}else{throw new Error("Tried to remove a scroll monitor listener of type "+H+". Your options are: "+p.join(", "))}},one:function(e,i){this.on(e,i,true)},recalculateSize:function(){this.height=this.watchItem.offsetHeight+this.offsets.top+this.offsets.bottom;this.bottom=this.top+this.height},update:function(){this.isAboveViewport=this.top<G.viewportTop;this.isBelowViewport=this.bottom>G.viewportBottom;this.isInViewport=(this.top<=G.viewportBottom&&this.bottom>=G.viewportTop);this.isFullyInViewport=(this.top>=G.viewportTop&&this.bottom<=G.viewportBottom)||(this.isAboveViewport&&this.isBelowViewport)},destroy:function(){var I=k.indexOf(this),e=this;k.splice(I,1);for(var J=0,H=p.length;J<H;J++){e.callbacks[p[J]].length=0}},lock:function(){this.locked=true},unlock:function(){this.locked=false}};var g=function(e){return function(j,i){this.on.call(this,e,j,i)}};for(var C=0,A=p.length;C<A;C++){var f=p[C];m.prototype[f]=g(f)}try{t()}catch(D){try{window.$(t)}catch(D){throw new Error("If you must put scrollMonitor in the <head>, you must use jQuery.")
}}function x(e){s=e;t();q()}if(window.addEventListener){window.addEventListener("scroll",x);window.addEventListener("resize",u)}else{window.attachEvent("onscroll",x);window.attachEvent("onresize",u)}G.beget=G.create=function(i,j){if(typeof i==="string"){i=document.querySelector(i)}else{if(i&&i.length>0){i=i[0]}}var e=new m(i,j);k.push(e);e.update();return e};G.update=function(){s=null;t();q()};G.recalculateLocations=function(){G.documentHeight=0;G.update()};return G});


$(document).ready(function() {
// 菜单
    var $account = $('#top-header');
    var $header = $('#menu-box, #search-main, #mobile-nav');
    var $minisb = $('#content');
    var $footer = $('#footer');

    var accountWatcher = scrollMonitor.create($account);
    var headerWatcher = scrollMonitor.create($header);

    var footerWatcherTop = $minisb.height() + $header.height();
    var footerWatcher = scrollMonitor.create($footer, {
        top: footerWatcherTop
    });

    accountWatcher.lock();
    headerWatcher.lock();

    accountWatcher.visibilityChange(function() {
        $header.toggleClass('shadow', !accountWatcher.isInViewport);
    });
    headerWatcher.visibilityChange(function() {
        $minisb.toggleClass('shadow', !headerWatcher.isInViewport);
    });

    footerWatcher.fullyEnterViewport(function() {
        if (footerWatcher.isAboveViewport) {
            $minisb.removeClass('shadow').addClass('hug-footer')
        }
    });
    footerWatcher.partiallyExitViewport(function() {
        if (!footerWatcher.isAboveViewport) {
            $minisb.addClass('fixed').removeClass('hug-footer')
        }
    });
});


$(document).ready(function() {
// 跟随
    var $account = $('#sidebar');
    var $header = $('.sidebar-roll');
    var $minisb = $('#content');
    var $footer = $('#footer');

    var accountWatcher = scrollMonitor.create($account);
    var headerWatcher = scrollMonitor.create($header);

    var footerWatcherTop = $minisb.height() + $header.height();

    accountWatcher.lock();
    headerWatcher.lock();

    accountWatcher.visibilityChange(function() {
        $header.toggleClass('follow', !accountWatcher.isInViewport);
    });
});

$(document).ready(function() {
// 搜索
$(".nav-search").click(function(){
	$("#search-main").slideToggle(500);
});

// 菜单
$(".nav-mobile").click(function(){
	$("#mobile-nav").slideToggle(500);
});

// 目录
$(".log-button, .log-close").click(function(){
	$("#log-box").slideToggle(500);
});

// 引用
$(".backs").click(function(){
	$(".track").slideToggle("slow");
	return false;
});

// 弹出层
$(".qr").mouseover(function(){
    $(this).children(".qr-img").fadeIn(300);
})
$(".qr").mouseout(function(){
    $(this).children(".qr-img").hide();
});
$(".share-sd").mouseover(function(){
    $(this).children("#share").show();
})
$(".share-sd").mouseout(function(){
    $(this).children("#share").hide();
});

$(".weixin").mouseover(function(){
    $(this).children("#weixin-qr").show();
})
$(".weixin").mouseout(function(){
    $(this).children("#weixin-qr").hide();
});

// 赏
$('#shang-p').click(function () {
	$('#shang').animate({
		opacity: 'toggle'
	}, 300);
	return false;
});

// 邀请码
$('.to-code').click(function () {
	$('.to-code-way').animate({
		opacity: 'toggle'
	}, 300);
	return false;
});

// 关闭
$('.shut-error').click(function () {
	$('.user_error').animate({
		opacity: 'toggle'
	}, 100);
	return false;
});

// 文字展开
$(".show-more span").click(function(e){
	$(this).html(["<i class='fa fa-caret-down'></i>", "<i class='fa fa-caret-up'></i>"][this.hutia^=1]);
	$(this.parentNode.parentNode).next().slideToggle();
	e.preventDefault();
});

// 滚屏
$('.scroll-h').click(function () {
	$('html,body').animate({
		scrollTop: '0px'
	}, 800);
});
$('.scroll-c').click(function () {
	$('html,body').animate({
		scrollTop: $('.scroll-comments').offset().top
 	}, 800);
});
$('.scroll-b').click(function () {
	$('html,body').animate({
		scrollTop: $('.site-info').offset().top
	}, 800);
});

// 去边线
$(".message-widget li:last, .message-page li:last, .hot_commend li:last, .search-page li:last, .my-comment li:last").css("border","none");

// 表情
$('.emoji').click(function () {
	$('.emoji-box').animate({
		opacity: 'toggle',
		left: '50px'
	}, 1000).animate({
		left: '10px'
	}, 'fast');
	return false;
});

// 登录
$('#login-main, #login-mobile').leanModal({
	top: 110,
	overlay: 0.6,
	closeButton: '.hidemodal'
});

// 字号
$("#fontsize").click(function() {
    var _this = $(this);
    var _t = $(".single-content");
    var _c = _this.attr("class");
    if (_c == "size_s") {
        _this.removeClass("size_s").addClass("size_l");
        _this.text("A+");
        _t.removeClass("fontsmall").addClass("fontlarge");
    } else {
        _this.removeClass("size_l").addClass("size_s");
        _this.text("A-");
        _t.removeClass("fontlarge").addClass("fontsmall");
    };
});

// 目录显隐
if(document.body.clientWidth>1024){
	$(function(){
	    $(window).scroll(function(){
	        if($("#log-box").html() != undefined) {
	            var h = $("#title-2").offset().top;
	            if($(this).scrollTop()>h && $(this).scrollTop() < h+50){
	                $("#log-box").show();
	            }
	            var h = $("#title-1").offset().top;
	            if($(this).scrollTop()>h && $(this).scrollTop() < h+50){
	                $("#log-box").hide();
	            }
	        }
	    });
	})
}

// 图片文字
$(".picture-img,.img-box").hover(function(){
	$(this).find(".hide-box,.hide-excerpt,.img-title").fadeIn(500);
},
function(){
	$(this).find(".hide-box,.hide-excerpt,.img-title").hide();
})

// 锚链接
$('#catalog a[href*=#],area[href*=#]').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var $target = $(this.hash);
        $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
        if ($target.length) {
            var targetOffset = $target.offset().top;
            $('html,body').animate({
                scrollTop: targetOffset
            },
            800);
            return false;
        }
    }
});

// 图片数量
var i=$('.fancybox').size();
$('.myimg').html(' '+i+' 张图片');

// 结束
});

// 隐藏侧边
function pr() {
var R=document.getElementById("sidebar");
var L=document.getElementById("primary");
if (R.className=="sidebar")
	{
		R.className="sidebar-hide";
		L.className="";
	}
else
	{
		R.className="sidebar";
		L.className="primary";
	}
}

// 链接复制
function copy_code(text) {
  if (window.clipboardData) {
    window.clipboardData.setData("Text", text)
	alert("已经成功将原文链接复制到剪贴板！");
  } else {
	var x=prompt('你的浏览器可能不能正常复制\n请您手动进行：',text);
  }
};

// 评论贴图
function embedImage() {
  var URL = prompt('请输入图片 URL 地址:', 'http://');
  if (URL) {
    document.getElementById('comment').value = document.getElementById('comment').value + '[img]' + URL + '[/img]';
  }
};
// 文字滚动
(function($){$.fn.textSlider=function(settings){settings=jQuery.extend({speed:"normal",line:2,timer:1000},settings);return this.each(function(){$.fn.textSlider.scllor($(this),settings)})};$.fn.textSlider.scllor=function($this,settings){var ul=$("ul:eq(0)",$this);var timerID;var li=ul.children();var _btnUp=$(".up:eq(0)",$this);var _btnDown=$(".down:eq(0)",$this);var liHight=$(li[0]).height();var upHeight=0-settings.line*liHight;var scrollUp=function(){_btnUp.unbind("click",scrollUp);ul.animate({marginTop:upHeight},settings.speed,function(){for(i=0;i<settings.line;i++){ul.find("li:first").appendTo(ul)}ul.css({marginTop:0});_btnUp.bind("click",scrollUp)})};var scrollDown=function(){_btnDown.unbind("click",scrollDown);ul.css({marginTop:upHeight});for(i=0;i<settings.line;i++){ul.find("li:last").prependTo(ul)}ul.animate({marginTop:0},settings.speed,function(){_btnDown.bind("click",scrollDown)})};var autoPlay=function(){timerID=window.setInterval(scrollUp,settings.timer)};var autoStop=function(){window.clearInterval(timerID)};ul.hover(autoStop,autoPlay).mouseout();_btnUp.css("cursor","pointer").click(scrollUp);_btnUp.hover(autoStop,autoPlay);_btnDown.css("cursor","pointer").click(scrollDown);_btnDown.hover(autoStop,autoPlay)}})(jQuery);

// 表情
function grin(a){var d;a=" "+a+" ";if(document.getElementById("comment")&&document.getElementById("comment").type=="textarea"){d=document.getElementById("comment")}else{return false}if(document.selection){d.focus();sel=document.selection.createRange();sel.text=a;d.focus()}else{if(d.selectionStart||d.selectionStart=="0"){var c=d.selectionStart;var b=d.selectionEnd;var e=b;d.value=d.value.substring(0,c)+a+d.value.substring(b,d.value.length);e+=a.length;d.focus();d.selectionStart=e;d.selectionEnd=e}else{d.value+=a;d.focus()}}};

// 弹窗
(function(a){a.fn.extend({leanModal:function(d){var e={top:100,overlay:0.5,closeButton:null};var c=a("<div id='overlay'></div>");a("body").append(c);d=a.extend(e,d);return this.each(function(){var f=d;a(this).click(function(j){var i=a(this).attr("href");a("#overlay").click(function(){b(i)});a(f.closeButton).click(function(){b(i)});var h=a(i).outerHeight();var g=a(i).outerWidth();a("#overlay").css({"display":"block",opacity:0});a("#overlay").fadeTo(200,f.overlay);a(i).css({"display":"block","position":"fixed","opacity":0,"z-index":11000,"left":50+"%","margin-left":-(g/2)+"px","top":f.top+"px"});a(i).fadeTo(200,1);j.preventDefault()})});function b(f){a("#overlay").fadeOut(200);a(f).css({"display":"none"})}}})})(jQuery);

// 喜欢
$.fn.postLike=function(){if(jQuery(this).hasClass("done")){return false}else{$(this).addClass("done");var d=$(this).data("id"),c=$(this).data("action"),b=jQuery(this).children(".count");var a={action:"zm_ding",um_id:d,um_action:c};$.post(wpl_ajax_url,a,function(e){jQuery(b).html(e)});return false}};$(document).on("click",".favorite",function(){$(this).postLike()});