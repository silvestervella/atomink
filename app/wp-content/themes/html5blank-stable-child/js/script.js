jQuery(document).ready(function(){var t,s,r=jQuery(".post-outer"),e=r.length,i=jQuery("#menu-main > li"),a=i.length,o=jQuery(".drop"),n=0,u=/Firefox/i.test(navigator.userAgent)?"DOMMouseScroll":"mousewheel";function c(e,t){jQuery(e).removeClass(t)}function l(){n<e-1?jQuery(".visible-post").stop().fadeOut(function(){jQuery(this).next(".post-outer").addClass("visible-post").fadeIn(function(){}).prev().removeClass("visible-post"),jQuery(".drop.active").next().addClass("active").prev().removeClass("active"),n++}):jQuery(".visible-post").stop().fadeOut(function(){c(this,"visible-post"),jQuery(r).first().addClass("visible-post").fadeIn(function(){jQuery(".drop.active").removeClass("active"),o.first().addClass("active")}),n=0})}function d(){0<n?jQuery(".visible-post").stop().fadeOut(function(){jQuery(this).prev(".post-outer").addClass("visible-post").fadeIn(function(){}).next().removeClass("visible-post"),jQuery(".drop.active").prev().addClass("active").next().removeClass("active"),n--}):jQuery(".visible-post").stop().fadeOut(function(){c(this,"visible-post"),jQuery(r).last().addClass("visible-post").fadeIn(function(){jQuery(".drop.active").removeClass("active"),o.last().addClass("active")}),n=e-1})}function v(e,t){0!==jQuery(t).index()?jQuery(t).stop().fadeOut(function(){jQuery(this).prev().addClass("active").fadeIn().next().removeClass("active")}):jQuery(t).stop().fadeOut(function(){jQuery(this).removeClass("active"),jQuery(e).last().addClass("active").fadeIn()})}function p(e,t){var s=jQuery(e).length-1;jQuery(t).index()!==s?jQuery(t).stop().fadeOut(function(){jQuery(this).next().addClass("active").fadeIn().prev().removeClass("active")}):jQuery(t).stop().fadeOut(function(){jQuery(this).removeClass("active"),jQuery(e).first().addClass("active").fadeIn()})}jQuery(r).first().addClass("visible-post").fadeIn(),jQuery(o).first().addClass("active"),jQuery(".drop").click(function(){jQuery(".drop.active").removeClass("active"),jQuery(this).addClass("active");var e=jQuery(this).index();jQuery(".visible-post").stop().fadeOut(function(){jQuery(r).eq(e).addClass("visible-post").fadeIn()}).removeClass("visible-post"),n=jQuery(this).index()}),(jQuery("body.home").length||jQuery("body.postid-293").length)&&991<=jQuery(window).innerWidth()&&(t=d,s=l,jQuery(window).on(u,function(e){0<=e.originalEvent.wheelDelta?t():s()})),jQuery("body.home").length&&(jQuery(".next-article").click(function(){l()}),jQuery(".prev-article").click(function(){d()})),jQuery(".menu-button").on("click",function(){jQuery("#main-nav-outer").fadeIn(400,function(){jQuery("#wrapper").css({opacity:"0.2","pointer-events":"none"})}).css({"-webkit-transform":"translateX(0%)"})}),jQuery("#menu-close").click(function(){jQuery("#main-nav-outer").css({"-webkit-transform":"translateX(-100%)"}).fadeOut(400,function(){jQuery("#wrapper").css({opacity:"1","pointer-events":"auto"})})}),i.css("height",100/a+"%"),jQuery("#main-nav-outer").on(u,function(e){return e.preventDefault(),e.stopPropagation(),!1}),0<jQuery("body.home").length&&(jQuery(".team-post").first().addClass("active").fadeIn(),jQuery("#prev-team").click(function(){v(".team-post",".team-post.active")}),jQuery("#next-team").click(function(){p(".team-post",".team-post.active")})),0<jQuery("body.postid-293").length&&(jQuery(".prod-post").first().addClass("active").fadeIn(),jQuery("#prev-prod").click(function(){v(".prod-post",".prod-post.active")}),jQuery("#next-prod").click(function(){p(".prod-post",".prod-post.active")}))}),jQuery(window).load(function(){var e,t,s,r,i=jQuery(".image-outer");jQuery(i).first().addClass("current").fadeIn(),0<jQuery("body.home").length&&(e=jQuery(".current"),t=jQuery(".image-outer"),s=0,r=t.length-1,setInterval(function(){s==r?(t.last().fadeOut(800,function(){jQuery(this).removeClass("current"),t.first().fadeIn(800,function(){jQuery(this).addClass("current")})}),s=0):e.fadeOut(800,function(){jQuery(this).removeClass("current").next(".image-outer").fadeIn(800,function(){jQuery(this).addClass("current")}),s++})},6e3)),jQuery(".gallery-post").first().addClass("active-post");var a=jQuery(".gallery-post"),o=a.length-1,n=0,u=jQuery(".active-post > img").attr("src"),c=jQuery(".active-post > input").attr("value");function l(){jQuery("#active-post").fadeOut(function(){if(jQuery(this).find("img").attr("src",u),jQuery(this).siblings(".control-share").find("#share > a").attr("href","https://www.facebook.com/sharer/sharer.php?u="+c+"&text=The Ink"),0<jQuery("body.post-template-template-ink-page").length&&jQuery(this).children("#active-post-blur").css({"background-image":"url("+u+")"}),0<jQuery("body.home").length){if(0==n)var e=a.last().children("img").attr("src");else e=jQuery(".active-post").prev().children("img").attr("src");if(n==o)var t=a.first().children("img").attr("src");else t=jQuery(".active-post").next().children("img").attr("src");jQuery(this).siblings("#ink-back-imgs").fadeOut(function(){jQuery(this).children(".back-prev").css({"background-image":"url("+e+")"}).siblings(".back-next").css({"background-image":"url("+t+")"})}).fadeIn()}991<=jQuery(window).innerWidth()&&jQuery(this).fadeIn()})}l(),jQuery("#home-prev-img").click(function(){var e=jQuery(".active-post");0==n?(e.removeClass("active-post"),a.last().addClass("active-post"),n=o):(e.prev().addClass("active-post").next().removeClass("active-post"),n--),u=jQuery(".active-post > img").attr("src"),c=jQuery(".active-post > input").attr("value"),l()}),jQuery("#home-next-img").click(function(){var e=jQuery(".active-post");n<o?(e.next().addClass("active-post").prev().removeClass("active-post"),n++):(e.removeClass("active-post"),a.first().addClass("active-post"),n=0),u=jQuery(".active-post > img").attr("src"),c=jQuery(".active-post > input").attr("value"),l()}),a.on("click",function(){jQuery(".active-post").removeClass("active-post"),jQuery(this).addClass("active-post"),u=jQuery(".active-post > img").attr("src"),c=jQuery(".active-post > input").attr("value"),n=jQuery(this).index(),l()}),991<=jQuery(window).innerWidth()&&jQuery("#gallery-posts-outer").masonry({itemSelector:".gallery-post"}),jQuery(function(){jQuery("#gallery-posts-outer").slimScroll({height:"100vh",size:"10px",distance:"1px",railColor:"#000",color:"#D9D6CC",railOpacity:"0.8",railVisible:!0,alwaysVisible:!0}).css("opacity","1"),jQuery("#checkout-page").slimScroll({height:"100vh",size:"10px",distance:"1px",railColor:"#000",color:"#D9D6CC",railOpacity:"0.8",railVisible:!0,alwaysVisible:!0})})}),jQuery(window).on("resize",function(){});