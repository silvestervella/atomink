jQuery(document).ready(function(){var t,s,r=jQuery(".post-outer"),e=r.length,a=jQuery("#menu-main > li"),i=a.length,u=jQuery(".drop"),o=0,n=/Firefox/i.test(navigator.userAgent)?"DOMMouseScroll":"mousewheel";function c(e,t){jQuery(e).removeClass(t)}function l(){o<e-1?jQuery(".visible-post").stop().fadeOut(function(){jQuery(this).next(".post-outer").addClass("visible-post").fadeIn(function(){}).prev().removeClass("visible-post"),jQuery(".drop.active").next().addClass("active").prev().removeClass("active"),o++}):jQuery(".visible-post").stop().fadeOut(function(){c(this,"visible-post"),jQuery(r).first().addClass("visible-post").fadeIn(function(){jQuery(".drop.active").removeClass("active"),u.first().addClass("active")}),o=0})}function d(){0<o?jQuery(".visible-post").stop().fadeOut(function(){jQuery(this).prev(".post-outer").addClass("visible-post").fadeIn(function(){}).next().removeClass("visible-post"),jQuery(".drop.active").prev().addClass("active").next().removeClass("active"),o--}):jQuery(".visible-post").stop().fadeOut(function(){c(this,"visible-post"),jQuery(r).last().addClass("visible-post").fadeIn(function(){jQuery(".drop.active").removeClass("active"),u.last().addClass("active")}),o=e-1})}jQuery(r).first().addClass("visible-post").fadeIn(),jQuery(u).first().addClass("active"),jQuery(".drop").click(function(){jQuery(".drop.active").removeClass("active"),jQuery(this).addClass("active");var e=jQuery(this).index();jQuery(".visible-post").stop().fadeOut(function(){jQuery(r).eq(e).addClass("visible-post").fadeIn()}).removeClass("visible-post"),o=jQuery(this).index()}),(jQuery("body.home").length||jQuery("body.postid-293").length)&&(t=d,s=l,jQuery(window).on(n,function(e){0<=e.originalEvent.wheelDelta?t():s()})),jQuery("body.home").length&&(jQuery(".next-article").click(function(){l()}),jQuery(".prev-article").click(function(){d()})),jQuery(".menu-button").click(function(){jQuery("#main-nav-outer").fadeIn(400,function(){jQuery("#main-nav-outer > nav").fadeIn(200,function(){jQuery("#wrapper").hide()})})}),jQuery("#menu-close").click(function(){jQuery("#main-nav-outer").fadeOut(400,function(){jQuery("#wrapper").show()})}),a.css("height",100/i+"%"),jQuery("#main-nav-outer").on(n,function(e){return e.preventDefault(),e.stopPropagation(),!1}),0<jQuery("body.home").length&&(jQuery(".team-post").first().addClass("active").fadeIn(),jQuery(".prod-post").first().addClass("active").fadeIn(),jQuery("#prev-team").click(function(){var e,t=jQuery(this);e=".team-post.active",jQuery(t).first()?jQuery(e).stop().fadeOut(function(e,t){c(t,"active"),jQuery(e).last().addClass("active").fadeIn()}):jQuery(e).stop().fadeOut(function(e){jQuery(this).prev(e).addClass("active").fadeIn().next(e).removeClass("active")})}),jQuery("#next-team").click(function(){var e,t=jQuery(this);e=".team-post.active",jQuery(t).last()?jQuery(e).stop().fadeOut(function(e,t){c(t,"active"),jQuery(e).first().addClass("active").fadeIn()}):jQuery(e).stop().fadeOut(function(e){jQuery(this).next(e).addClass("active").fadeIn().prev(e).removeClass("active")})}))}),jQuery(window).load(function(){var e,t,s,r,a=jQuery(".image-outer");jQuery(a).first().addClass("current").fadeIn(),0<jQuery("body.home").length&&(e=jQuery(".current"),t=jQuery(".image-outer"),s=0,r=t.length-1,setInterval(function(){s==r?(t.last().fadeOut(800,function(){jQuery(this).removeClass("current"),t.first().fadeIn(800,function(){jQuery(this).addClass("current")})}),s=0):e.fadeOut(800,function(){jQuery(this).removeClass("current").next(".image-outer").fadeIn(800,function(){jQuery(this).addClass("current")}),s++})},6e3)),jQuery(".gallery-post").first().addClass("active-post");var i=jQuery(".gallery-post"),u=i.length-1,o=0,n=jQuery(".active-post > img").attr("src"),c=jQuery(".active-post > input").attr("value");function l(){jQuery("#active-post").fadeOut(function(){if(jQuery(this).find("img").attr("src",n),jQuery(this).find("#share > a").attr("href","https://www.facebook.com/sharer/sharer.php?u="+c+"&text=The Ink"),0<jQuery("body.post-template-template-ink-page").length&&jQuery(this).children("#active-post-blur").css({"background-image":"url("+n+")"}),0<jQuery("body.home").length){if(0==o)var e=i.last().children("img").attr("src");else e=jQuery(".active-post").prev().children("img").attr("src");if(o==u)var t=i.first().children("img").attr("src");else t=jQuery(".active-post").next().children("img").attr("src");jQuery(this).siblings("#ink-back-imgs").fadeOut(function(){jQuery(this).children(".back-prev").css({"background-image":"url("+e+")"}).siblings(".back-next").css({"background-image":"url("+t+")"})}).fadeIn()}}).fadeIn()}l(),jQuery("#home-prev-img").click(function(){var e=jQuery(".active-post");0==o?(e.removeClass("active-post"),i.last().addClass("active-post"),o=u):(e.prev().addClass("active-post").next().removeClass("active-post"),o--),n=jQuery(".active-post > img").attr("src"),c=jQuery(".active-post > input").attr("value"),l()}),jQuery("#home-next-img").click(function(){var e=jQuery(".active-post");o<u?(e.next().addClass("active-post").prev().removeClass("active-post"),o++):(e.removeClass("active-post"),i.first().addClass("active-post"),o=0),n=jQuery(".active-post > img").attr("src"),c=jQuery(".active-post > input").attr("value"),l()}),i.on("click",function(){jQuery(".active-post").removeClass("active-post"),jQuery(this).addClass("active-post"),n=jQuery(".active-post > img").attr("src"),c=jQuery(".active-post > input").attr("value"),o=jQuery(this).index(),l()}),jQuery("#gallery-posts-outer").masonry({itemSelector:".gallery-post"}),jQuery(function(){jQuery("#gallery-posts-outer").slimScroll({height:"600px",railColor:"#DAD6CC",railOpacity:"0.8"}).css("opacity","1")})}),jQuery(window).on("resize",function(){});