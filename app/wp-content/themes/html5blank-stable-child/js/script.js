jQuery(document).ready(function(){var t,s,r=jQuery(".post-outer"),e=r.length,i=jQuery("#menu-main > li"),a=i.length,o=jQuery(".drop"),u=0,n=/Firefox/i.test(navigator.userAgent)?"DOMMouseScroll":"mousewheel";function c(e,t){jQuery(e).removeClass(t)}function l(){u<e-1?jQuery(".visible-post").stop().fadeOut(function(){jQuery(this).next(".post-outer").addClass("visible-post").fadeIn(function(){}).prev().removeClass("visible-post"),jQuery(".drop.active").next().addClass("active").prev().removeClass("active"),u++}):jQuery(".visible-post").stop().fadeOut(function(){c(this,"visible-post"),jQuery(r).first().addClass("visible-post").fadeIn(function(){jQuery(".drop.active").removeClass("active"),o.first().addClass("active")}),u=0})}function v(){0<u?jQuery(".visible-post").stop().fadeOut(function(){jQuery(this).prev(".post-outer").addClass("visible-post").fadeIn(function(){}).next().removeClass("visible-post"),jQuery(".drop.active").prev().addClass("active").next().removeClass("active"),u--}):jQuery(".visible-post").stop().fadeOut(function(){c(this,"visible-post"),jQuery(r).last().addClass("visible-post").fadeIn(function(){jQuery(".drop.active").removeClass("active"),o.last().addClass("active")}),u=e-1})}jQuery(r).first().addClass("visible-post"),jQuery(o).first().addClass("active"),jQuery(".drop").click(function(){var e=jQuery(this).index();console.log(e),jQuery(".visible-post").stop().fadeOut(function(){jQuery(r).eq(e).addClass("visible-post")}).removeClass("visible-post"),u=jQuery(this).index()}),(jQuery("body.home").length||jQuery("body.postid-293").length)&&(t=v,s=l,jQuery(window).on(n,function(e){0<=e.originalEvent.wheelDelta?t():s()})),jQuery("body.home").length&&(jQuery(".next-article").click(function(){l()}),jQuery(".prev-article").click(function(){v()})),jQuery(".menu-button").click(function(){jQuery("#main-nav-outer").fadeIn(400,function(){jQuery("#main-nav-outer > nav").fadeIn(200,function(){jQuery("#wrapper").hide()})})}),jQuery("#menu-close").click(function(){jQuery("#main-nav-outer").fadeOut(400,function(){jQuery("#wrapper").show()})}),i.css("height",100/a+"%"),jQuery("#main-nav-outer").on(n,function(e){return e.preventDefault(),e.stopPropagation(),!1})}),jQuery(window).load(function(){var e,t,s,r,i=jQuery(".image-outer");jQuery(i).first().addClass("current"),0<jQuery("body.home").length&&(e=jQuery(".current"),t=jQuery(".image-outer"),s=0,r=t.length-1,console.log(r),setInterval(function(){s==r?(t.last().fadeOut(800,function(){jQuery(this).removeClass("current"),t.first().fadeIn(800,function(){jQuery(this).addClass("current")})}),s=0):e.fadeOut(800,function(){jQuery(this).removeClass("current").next(".image-outer").fadeIn(800,function(){jQuery(this).addClass("current")}),s++})},6e3)),jQuery(".gallery-post").first().addClass("active-post");var a=jQuery(".gallery-post"),o=a.length-1,u=0,n=jQuery(".active-post > img").attr("src"),c=jQuery(".active-post > input").attr("value");function l(){jQuery("#active-post").fadeOut(function(){if(jQuery(this).find("img").attr("src",n),jQuery(this).find("#share > a").attr("href","https://www.facebook.com/sharer/sharer.php?u="+c+"&text=The Ink"),0<jQuery("body.post-template-template-ink-page").length&&jQuery(this).children("#active-post-blur").css({"background-image":"url("+n+")"}),0<jQuery("body.home").length){if(0==u)var e=a.last().children("img").attr("src");else e=jQuery(".active-post").prev().children("img").attr("src");if(u==o)var t=a.first().children("img").attr("src");else t=jQuery(".active-post").next().children("img").attr("src");jQuery(this).siblings("#ink-back-imgs").fadeOut(function(){jQuery(this).children(".back-prev").css({"background-image":"url("+e+")"}).siblings(".back-next").css({"background-image":"url("+t+")"})}).fadeIn()}}).fadeIn()}l(),jQuery("#prev-post").click(function(){var e=jQuery(".active-post");0==u?(e.removeClass("active-post"),a.last().addClass("active-post"),u=o):(e.prev().addClass("active-post").next().removeClass("active-post"),u--),n=jQuery(".active-post > img").attr("src"),c=jQuery(".active-post > input").attr("value"),l()}),jQuery("#next-post").click(function(){var e=jQuery(".active-post");u<o?(e.next().addClass("active-post").prev().removeClass("active-post"),u++):(e.removeClass("active-post"),a.first().addClass("active-post"),u=0),n=jQuery(".active-post > img").attr("src"),c=jQuery(".active-post > input").attr("value"),l()}),a.on("click",function(){jQuery(".active-post").removeClass("active-post"),jQuery(this).addClass("active-post"),n=jQuery(".active-post > img").attr("src"),c=jQuery(".active-post > input").attr("value"),u=jQuery(this).index(),l()}),jQuery("#gallery-posts-outer").masonry({itemSelector:".gallery-post"})}),jQuery(window).on("resize",function(){});