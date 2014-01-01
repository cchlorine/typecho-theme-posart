if($.browser.msie&&($.browser.version < "9.0")){
	$('html').addClass('ie');
}
$(document).ready(function(){
	//$('.sidebar').masonry({ singleMode: true });
	arrivedAtBottom = $(window).scrollTop() >= $(document).height() - $(window).height() - 30;
	$(window).scroll(function(event){
		event.stopPropagation();
		arrivedAtBottom = $(window).scrollTop() >= $(document).height() - $(window).height() - 30;
		if (arrivedAtBottom) {
			$('.totop').removeClass("go_bottom");
			$('.totop').addClass("go_top");
		} 
		else {
			$('.totop').removeClass("go_top");
			$('.totop').addClass("go_bottom");
		}
	});
	$('.totop').click(function(){
		if (arrivedAtBottom) {
			$('html,body').animate({scrollTop: 0}, 500);
		} else {
			$('html,body').animate({scrollTop: $(document).height() - $(window).height()}, 500);	
		}
	});
	$('.tocomments').click(function(){
		$('html,body').animate({scrollTop: $(".comments").offset().top - 40}, 500);
	});  
});

jQuery(document).ready(function($) {
	var comments = $(".comments"), // 评论部分id
		ajaxed = false;
	comments.on("click", ".page-navigator li a", function(e){
		e.preventDefault();
		var _this = $(this),
			_thisP = _this.parent();
		if(_thisP.hasClass('current') || ajaxed==true) return; // 判断是否是当前页面
		var _list = $('.comment-list'),
			url = _this.attr("href").replace("#comments", "") + "?action=ajax_comments";
		$.ajax({ // Ajax请求
			url: url,
			beforeSend: function() {
				ajaxed = true;
			},
			success: function(data) {
				comments.html(data);
				ajaxed = false;
				jQuery('html, body').animate({scrollTop:$(comments).offset().top - 100}, 'slow');
			}
		});
		return false;
	});
	var posts = $(".posts-list"), // 评论部分id
		ajaxed = false;
		posts.on("click", ".page-navigator li a", function(e){
		e.preventDefault();
		var _this = $(this),
			_thisP = _this.parent();
		if(_thisP.hasClass('current') || ajaxed==true) return; // 判断是否是当前页面
		var _list = $('.posts-list'),
			url = _this.attr("href") + "?action=index_ajax_navi";
		$.ajax({ // Ajax请求
			url: url,
			beforeSend: function() {
				ajaxed = true;
			},
			success: function(data) {
				posts.html(data);
				ajaxed = false;
				jQuery('html, body').animate({scrollTop:$(posts).offset().top - 100}, 'slow');
			}
		});
		return false;
	});
});
