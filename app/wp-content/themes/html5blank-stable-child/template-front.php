<?php
/*
 * Template Name: Main Template
 */
 get_header(); 
 ?>
<!-- Smoke effect -->
<canvas id="canvas"></canvas>
<script>
(function () {
    var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
    window.requestAnimationFrame = requestAnimationFrame;
})();

var canvas = document.getElementById("canvas"),
    ctx = canvas.getContext("2d");

canvas.height = document.body.offsetHeight;
canvas.width = 105;

var parts = [],
    minSpawnTime = 240,
    lastTime = new Date().getTime(),
    maxLifeTime = Math.min(10000, (canvas.height/(1.5*60)*8000)),
    emitterX = canvas.width / 2,
    emitterY = canvas.height - 10,
    smokeImage = new Image();

    function spawn() {
        if(new Date().getTime() > lastTime + minSpawnTime) {
          lastTime = new Date().getTime();
          parts.push(new smoke(emitterX, emitterY));
        }
    }

function render() {
    var len = parts.length;
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    while (len--) {
        if (parts[len].y < 0 || parts[len].lifeTime > maxLifeTime) {
            parts.splice(len, 1);
        } else {
            parts[len].update();

            ctx.save();
            var offsetX = -parts[len].size/2,
                offsetY = -parts[len].size/2;
         
            ctx.translate(parts[len].x-offsetX, parts[len].y-offsetY);
            ctx.rotate(parts[len].angle / 180 * Math.PI);
            ctx.globalAlpha  = parts[len].alpha;
            ctx.drawImage(smokeImage, offsetX,offsetY, parts[len].size, parts[len].size);
            ctx.restore();
        }
    }
    spawn();
    requestAnimationFrame(render);
}

function smoke(x, y, index) {
    this.x = x;
    this.y = y;

    this.size = 1;
    this.startSize = 32;
    this.endSize = 40;

    this.angle = Math.random() * 359;

    this.startLife = new Date().getTime();
    this.lifeTime = 0;

    this.velY = -1 - (Math.random()*0.01);
    this.velX = Math.floor(Math.random() * (-6) + 3) / 90;
}

smoke.prototype.update = function () {
    this.lifeTime = new Date().getTime() - this.startLife;
    this.angle += 0.2;
    
    var lifePerc = ((this.lifeTime / maxLifeTime) * 100);

    this.size = this.startSize + ((this.endSize - this.startSize) * lifePerc * .1);

    this.alpha = 1 - (lifePerc * .01);
    this.alpha = Math.max(this.alpha,0);
    
    this.x += this.velX;
    this.y += this.velY;
}

smokeImage.src = "https://www.pngarts.com/files/3/Smoke-PNG-Picture.png";
smokeImage.onload = function () {
    render();
}


window.onresize = resizeMe;
window.onload = resizeMe;
function resizeMe() {
   canvas.height = document.body.offsetHeight;
}
</script>

 <div id="back-image">
 <?php atominktheme_generate_posts('images' , '' , 'rand' , '' , '' , 'header-back-images' , 'header-top-images' ); ?>
 </div>
 <div class="image-overlay"></div>
 	<!-- wrapper -->
	<div id="wrapper" >

	<main role="main" id="home">

         <?php atominktheme_generate_posts('post' , 'meta_value' , 'ASC' , '_custom_post_order' , '' , 'category_name' , 'front-page-post' ); ?>
    
	</main>
    
<?php get_sidebar(); ?>

<?php get_footer(); ?>