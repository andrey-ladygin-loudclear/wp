<?php
/**
 * @var $widget GL\Widgets\Paralax
 */

// CHECK https://demo.themegrill.com/ample/
?>

<!--div class='<?= $widget->getClass(); ?>' id="<?= $id; ?>">
    <div class=""
         data-parallax="scroll"
         data-image-src="<?= $widget->data; ?>"
         style="height: 500px;position: relative;"
    >
        <?php foreach($widget->getChildren() as $child) { ?>
			<?php /** @var $child GL\Widgets\System\Glyph */ ?>
            <?php $child->draw(); ?>
        <?php } ?>
    </div>
</div-->

<ul id="scene" >
	<li class="layer" data-depth="0.00"><img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-128.png"></li>
	<li class="layer" data-depth="0.20"><img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-128.png"></li>
	<li class="layer" data-depth="0.40"><img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-128.png"></li>
	<li class="layer" data-depth="0.60"><img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-128.png"></li>
	<li class="layer" data-depth="0.80"><img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-128.png"></li>
	<li class="layer" data-depth="1.00"><img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-128.png"></li>
</ul>


<div class="parallax-window fullscreen" data-parallax="scroll" data-image-src="https://cdn.colorlib.com/shapely/wp-content/uploads/sites/12/2016/03/photo-1443527216320-7e744084f5a7-1.jpg">
	<div class="align-transform">
		<div class="row">
			<div class="top-parallax-section">
				<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center"><h1>We Change Everything WordPress</h1><p class="mb32">This is the only WordPress theme you will ever want to use. </p><a class="btn btn-lg btn-white" href="#">Read More</a><a class="btn btn-lg btn-filled" href="#">Download Now</a>                          </div>
			</div>
		</div>
	</div>
</div>

<div id="second" style="background-position: 50% 0px;">
	<div class="story"><div class="bg" style="background-position: 50% 100px;"></div>
		<div class="float-right">
			<h2>Multiple Backgrounds</h2>
			<p>The multiple backgrounds applied to this section are moved in a similar way to the first section -- every time the user scrolls down the page by a pixel, the positions of the backgrounds are changed.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nibh erat, sagittis sit amet congue at, aliquam eu libero. Integer molestie, turpis vel ultrices facilisis, nisi mauris sollicitudin mauris, volutpat elementum enim urna eget odio. Donec egestas aliquet facilisis. Nunc eu nunc eget neque ornare fringilla. Nam vel sodales lectus. Nulla in pellentesque eros. Donec ultricies, enim vitae varius cursus, risus mauris iaculis neque, euismod sollicitudin metus erat vitae sapien. Sed pulvinar.</p>
		</div>
	</div> <!--.story-->

</div>

<body style="zoom: 1;">
<div class="photo summer" data-stellar-background-ratio="0.5" style="background-position: 50% -371px;"><span>Summer</span></div>
<div class="photo autumn" data-stellar-background-ratio="0.5" style="background-position: 50% -146px;"><span>Autumn</span></div>
<div class="photo winter" data-stellar-background-ratio="0.5" style="background-position: 50% 79px;"><span>Winter</span></div>
<div class="photo spring" data-stellar-background-ratio="0.5" style="background-position: 50% 304px;"><span>Spring</span></div>
<div class="photo summer" data-stellar-background-ratio="0.5" style="background-position: 50% 529px;"><span>Summer</span></div>
<div class="photo autumn" data-stellar-background-ratio="0.5" style="background-position: 50% 754px;"><span>Autumn</span></div>
<div class="photo winter" data-stellar-background-ratio="0.5" style="background-position: 50% 979px;"><span>Winter</span></div>
<div class="photo spring" data-stellar-background-ratio="0.5" style="background-position: 50% 1204px;"><span>Spring</span></div>
</body>