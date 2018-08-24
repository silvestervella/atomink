/**
 * Document.ready
 * 
 * 0. Generic functions
 * 1. Home post pagination
 * 2. Menu animations
 * 3. Menu li height
 * 4. No scroll on open menu
 * 
 * Window.load
 * 
 * 1. Top home images animaiton
 * 2. Gallery pagination
 */

jQuery(document).ready(function(){
  var postsOuter = jQuery('.post-outer'),
   numOfPosts = postsOuter.length,
   menuLi = jQuery('#menu-main > li'),
   numOfLi = menuLi.length,
   drops = jQuery(".drop"),
   currNum = 0;

  var mousewheelevt=(/Firefox/i.test(navigator.userAgent))? "DOMMouseScroll" : "mousewheel" //FF doesn't recognize mousewheel as of FF3.x

  /**
   * 0. Generic functions
   */
  // Remove class
  function rmvClass(selector , classToRemove) {
    jQuery(selector).removeClass(classToRemove);
  }
  // Find and add class
  function findAddClass(selector , find , classToAdd) {
    jQuery(selector).find(find).addClass(classToAdd);
  }
  // Scrolling
  function scrollinFunc(prevDiv , nextDiv) {
    jQuery(window).on(mousewheelevt, function(event) {
      if (event.originalEvent.wheelDelta >= 0) {
        prevDiv();
        } else {
          nextDiv();
        }
    });
  }


  /*
  * 1. Home post pagination
  */
   // Add class to first home post and drop
   jQuery(postsOuter).first().addClass("visible-post");
   jQuery(drops).first().addClass("active");

  // Next article function
  function nextPost() {
    if(currNum < (numOfPosts-1)) {
      jQuery(".visible-post").stop().fadeOut(function() {

        jQuery(this).next(".post-outer").addClass("visible-post").fadeIn(function(){

        }).prev().removeClass("visible-post");
        jQuery(".drop.active").next().addClass('active').prev().removeClass('active');
        currNum ++;
      });
    } else {
      jQuery(".visible-post").stop().fadeOut(function() {
        rmvClass(this, "visible-post");

        jQuery(postsOuter).first().addClass("visible-post").fadeIn(function(){
          jQuery(".drop.active").removeClass('active');
          drops.first().addClass('active');
        });
        currNum = 0;
      });
    }
}
  // Previous article function
  function prevPost() {
    if(currNum > 0) {

      jQuery(".visible-post").stop().fadeOut(function() {

        jQuery(this).prev(".post-outer").addClass("visible-post").fadeIn(function(){

        }).next().removeClass("visible-post");
        jQuery(".drop.active").prev().addClass('active').next().removeClass('active');
        currNum --;

        
      });

    } else {

      jQuery(".visible-post").stop().fadeOut(function() {

        rmvClass(this, "visible-post");

        jQuery(postsOuter).last().addClass("visible-post").fadeIn(function(){
          jQuery(".drop.active").removeClass('active');
          drops.last().addClass('active');
        });
        currNum = numOfPosts-1;

      });
      
    }

}
   // Scrolling function call
   if(jQuery('body.home').length) {
    scrollinFunc(prevPost , nextPost);
   }
   // Next/Prev Buttons function call
   if(jQuery('body.home').length) {
    jQuery(".next-article").click(function () {
      nextPost();
    });
    jQuery(".prev-article").click(function () {
      prevPost();
    });
  }

  

  /*
  * 2. Menu animations
  */
 jQuery('.menu-button').click(function() {
  jQuery('#main-nav-outer').fadeIn(400,function(){
    jQuery('#main-nav-outer > nav').fadeIn(200, function(){
          jQuery('#wrapper').hide();
        });
  });
});
jQuery('#menu-close').click(function(){
  jQuery('#main-nav-outer').fadeOut(400, function(){
    jQuery('#wrapper').show();
  });
});



/**
 * 3. Menu li height
*/
menuLi.css('height', 100 / numOfLi + "%");



/**
 * 4. No scroll on open menu
 */
jQuery('#main-nav-outer').on(mousewheelevt, function(e) {
  e.preventDefault();
  e.stopPropagation();
  return false;
})

/**
var p = jQuery( ".buttons" );
var position = p.position();
jQuery( ".sb-page-title" ).css([ "left: " + position.left ]);
 */




// End of document.ready
});



jQuery(window).load(function(){


/**
 * 1. Top home images animaiton
 */
var imageOuter = jQuery('.image-outer');

jQuery(imageOuter).first().addClass("current");

function topImgFade() {
    var current = jQuery('.current');
    var currentIndex = imageOuter.index(current),
        nextIndex = currentIndex + 1;

    if (nextIndex >= imageOuter.length) {
        nextIndex = 0;
    }

    var next = imageOuter.eq(nextIndex);

    next.stop().fadeIn(2000, function() {
        jQuery(this).addClass('current');
    });

    current.stop().fadeOut(2000, function() {
        jQuery(this).removeClass('current');
        setTimeout(topImgFade, 4000);
    });
}
if (jQuery('body.home').length > 0) {
  topImgFade();
}





/**
 * 2. Gallery pagination
*/
jQuery('.gallery-post').first().addClass('active-post');
var galleryPost = jQuery('.gallery-post'),
    imgPosts = galleryPost.length-1,
    imgCount = 0,
    activeSrc = jQuery('.active-post > img').attr('src');


function activeSrcFunc() {
  jQuery('#active-post').fadeOut(function(){
    jQuery(this).find('img').attr('src' , activeSrc);
    jQuery(this).children('#active-post-blur').css({
      'background-image' : 'url('+ activeSrc +')'
    })
  }).fadeIn();
};
activeSrcFunc();

// Gallery prev/next
jQuery('#prev-post').click(function(){
  var active = jQuery('.active-post');
  if (imgCount == 0) {
    active.removeClass('active-post');
    galleryPost.last().addClass('active-post');
    imgCount = imgPosts;
    activeSrc  = jQuery('.active-post > img').attr('src');
    activeSrcFunc();
  } else {
    active.prev().addClass('active-post').next().removeClass('active-post');
    imgCount--;
    activeSrc = jQuery('.active-post > img').attr('src');
    activeSrcFunc();
  }
});
jQuery('#next-post').click(function(){
  var active = jQuery('.active-post');
  if (imgCount < imgPosts) {
    active.next().addClass('active-post').prev().removeClass('active-post');
    imgCount++;
    activeSrc = jQuery('.active-post > img').attr('src');
    activeSrcFunc();
  } else {
    active.removeClass('active-post');
    galleryPost.first().addClass('active-post');
    imgCount = 0;
    activeSrc = jQuery('.active-post > img').attr('src');
    activeSrcFunc();
  }
});
// Gallery thumbnail click
galleryPost.on('click' , function(){
  jQuery('.active-post').removeClass('active-post');
  jQuery(this).addClass('active-post');
  activeSrc = jQuery('.active-post > img').attr('src');
  imgCount = jQuery(this).index();
  activeSrcFunc();
})



/**
 * 3. Gallery thumbs positioning using jquery masonary
*/
jQuery('#gallery-posts-outer').masonry({
  // options...
  itemSelector: '.gallery-post'
});


// End of window.load
});


jQuery(window).on("resize",function(){ 
  

  /*
  if(jQuery(window).width()<992) {
    jQuery(".home-h3").addClass("opacTrans-anim2");
  } else {
    jQuery(".home-h3").addClass("opacTrans-anim");
  }  
*/
// End of window.resize  
})