window.onload = function(){
	$(".m-loading").fadeOut("fast");
}

$(document).ready(function(){
	//menu
	$(".g-hmg-nav").click(function(){
		  $(".g-main-nav").toggle("fast");
		  $(this).toggleClass("g-hmg-nav-active");
		  return false;
	});

	//banner
	$(".g-banner .g-banner-img li").eq(0).addClass("active");
	$(".g-banner .g-banner-btn li").eq(0).addClass("active");
	$count = $(".g-banner .g-banner-img li").length;
	$num = 0;
	$lis = '';

	$banner_btns = $(".g-banner-btn");
	for(var i=0;i<=$count-1;i++) {
		$lis += "<li></li>";
	} 
	$banner_btns.html($lis);

	var timer = setInterval(function(){
		$(".g-banner .g-banner-img li").removeClass("active");
		$(".g-banner .g-banner-btn li").removeClass("active");

		$(".g-banner .g-banner-img li").eq($num).addClass("active");
		$(".g-banner .g-banner-btn li").eq($num).addClass("active");
		$num++;
		if($num==$count){
			$num=0;
		}
	},3000);

	$(".g-banner-btn li").click(function(){
		var $index = $(this).index();
		$num = $index;
		$(".g-banner .g-banner-img li").removeClass("active");
		$(".g-banner .g-banner-btn li").removeClass("active");

		$(".g-banner .g-banner-img li").eq($num).addClass("active");
		$(".g-banner .g-banner-btn li").eq($num).addClass("active");
	});

	$flag = true;
	$(window).scroll(function(){
		if(($(this).scrollTop() >= 295) && $flag) {
			$(".g-main-page .g-right ").css({"position":"fixed","width":"22.4%"});
			$("#back-to-top").show("fast");
			$flag = false;
		}
		
		if(($(this).scrollTop() < 295) && !$flag) {
			$(".g-main-page .g-right ").css({"position":"static","width":"28%"});
			$("#back-to-top").hide("fast");
			$flag = true;
		}
	});

	$("#back-to-top").click(function(){
      $("html,body").animate({"scrollTop":"0"},"fast");
	});


	//图片预览
	$("#close-img-view").click(function(){
		$("#m-image-view").fadeOut("fast");
		return false;
	});

	$("a img").click(function(){
		$("#m-image-show").attr("src",$(this).attr("src"));
		$("#m-image-view").fadeIn("fast");
		$("#m-image-preview").attr("src",$(this).attr("src"));

		if(isShowMove()){
			initMoveBar();
			moveImage();			
		}

		$(this).parent().click(function(){
			return false;
		});
	});
});

function isShowMove() {
	$image_height = $("#m-image-show").height();
	$body_height = $(".g-image-box").height();

	if($image_height > $body_height)
		return true;

	return false;
} 

function initMoveBar() {
	$(".g-image-position ").show();
	$width = $("#m-image-preview").width();
	$height = $("#m-image-preview").height();
	$("#m-move").width($width);
	$("#m-move").css({"margin-left":-($("#m-move").outerWidth())/2+'px'});

	$image_height = $("#m-image-show").height();
	$body_height = $(".g-image-box").height();

	$i = $image_height / $body_height;
	$("#m-move").height($height / $i);

	$("#m-move").css({"top":0});
	$("#m-image-show").css({"margin-top":0+'px'});
}

function moveImage(){
	$height = $("#m-image-preview").height();
	$isMouseDown = false;
	$position_y = 0;
	$offsetTop = $(".g-image-position").eq(0).offset().top;
	$dir = 1;

	$("#m-move").mousedown(function(e) {
		$isMouseDown = true;
		$position_y = e.pageY - parseInt($("#m-move").css("top"));
	})

	$("body").mousemove(function(e){
		if($isMouseDown){
			$top=e.pageY - $position_y;
			if(!isMoveOut($top))
			{
				$("#m-move").css({"top":+$top+'px'});
				$margin = ($top/$height)*($("#m-image-show").height()-$(".g-image-box").height());
				$("#m-image-show").css({"margin-top":-$margin+'px'});
			}	
		}
	}).mouseup(function(e){
		$isMouseDown = false;
	});
}

function isMoveOut($top) {
	$height = $("#m-image-preview").height() - $("#m-move").outerHeight() +2;
	if($top <0 || $top >= $height)	
		return true;
	return false;
}