jQuery(document).ready(function(){var t,s,a=jQuery(".post-outer"),e=a.length,r=jQuery("#menu-main > li"),i=r.length,o=jQuery(".drop"),u=0,n=/Firefox/i.test(navigator.userAgent)?"DOMMouseScroll":"mousewheel";function c(e,t){jQuery(e).removeClass(t)}function l(){u<e-1?jQuery(".visible-post").stop().fadeOut(function(){jQuery(this).next(".post-outer").addClass("visible-post").fadeIn(function(){}).prev().removeClass("visible-post"),jQuery(".drop.active").next().addClass("active").prev().removeClass("active"),u++}):jQuery(".visible-post").stop().fadeOut(function(){c(this,"visible-post"),jQuery(a).first().addClass("visible-post").fadeIn(function(){jQuery(".drop.active").removeClass("active"),o.first().addClass("active")}),u=0})}function v(){0<u?jQuery(".visible-post").stop().fadeOut(function(){jQuery(this).prev(".post-outer").addClass("visible-post").fadeIn(function(){}).next().removeClass("visible-post"),jQuery(".drop.active").prev().addClass("active").next().removeClass("active"),u--}):jQuery(".visible-post").stop().fadeOut(function(){c(this,"visible-post"),jQuery(a).last().addClass("visible-post").fadeIn(function(){jQuery(".drop.active").removeClass("active"),o.last().addClass("active")}),u=e-1})}jQuery(a).first().addClass("visible-post"),jQuery(o).first().addClass("active"),jQuery(".drop").click(function(){var e=jQuery(this).index();console.log(e),jQuery(".visible-post").stop().fadeOut(function(){jQuery(a).eq(e).addClass("visible-post")}).removeClass("visible-post"),u=jQuery(this).index()}),jQuery("body.home").length&&(t=v,s=l,jQuery(window).on(n,function(e){0<=e.originalEvent.wheelDelta?t():s()})),jQuery("body.home").length&&(jQuery(".next-article").click(function(){l()}),jQuery(".prev-article").click(function(){v()})),jQuery(".menu-button").click(function(){jQuery("#main-nav-outer").fadeIn(400,function(){jQuery("#main-nav-outer > nav").fadeIn(200,function(){jQuery("#wrapper").hide()})})}),jQuery("#menu-close").click(function(){jQuery("#main-nav-outer").fadeOut(400,function(){jQuery("#wrapper").show()})}),r.css("height",100/i+"%"),jQuery("#main-nav-outer").on(n,function(e){return e.preventDefault(),e.stopPropagation(),!1})}),jQuery(window).load(function(){var a=jQuery(".image-outer");jQuery(a).first().addClass("current"),0<jQuery("body.home").length&&function e(){var t=jQuery(".current"),s=a.index(t)+1;s>=a.length&&(s=0),a.eq(s).stop().fadeIn(2e3,function(){jQuery(this).addClass("current")}),t.stop().fadeOut(2e3,function(){jQuery(this).removeClass("current"),setTimeout(e,4e3)})}(),jQuery(".gallery-post").first().addClass("active-post");var t=jQuery(".gallery-post"),s=t.length-1,r=0,i=jQuery(".active-post > img").attr("src");function o(){jQuery("#active-post").fadeOut(function(){jQuery(this).find("img").attr("src",i),jQuery(this).find("#share > a").attr("href","https://www.facebook.com/sharer/sharer.php?u="+activeShareVal+"&text=The Ink"),jQuery(this).children("#active-post-blur").css({"background-image":"url("+i+")"})}).fadeIn()}activeShareVal=jQuery(".active-post > input").attr("value"),o(),jQuery("#prev-post").click(function(){var e=jQuery(".active-post");0==r?(e.removeClass("active-post"),t.last().addClass("active-post"),r=s):(e.prev().addClass("active-post").next().removeClass("active-post"),r--),i=jQuery(".active-post > img").attr("src"),activeShareVal=jQuery(".active-post > input").attr("value"),o()}),jQuery("#next-post").click(function(){var e=jQuery(".active-post");r<s?(e.next().addClass("active-post").prev().removeClass("active-post"),r++):(e.removeClass("active-post"),t.first().addClass("active-post"),r=0),i=jQuery(".active-post > img").attr("src"),activeShareVal=jQuery(".active-post > input").attr("value"),o()}),t.on("click",function(){jQuery(".active-post").removeClass("active-post"),jQuery(this).addClass("active-post"),i=jQuery(".active-post > img").attr("src"),activeShareVal=jQuery(".active-post > input").attr("value"),r=jQuery(this).index(),o()}),jQuery("#gallery-posts-outer").masonry({itemSelector:".gallery-post"})}),jQuery(window).on("resize",function(){});