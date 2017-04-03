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
<div class="parallax-window fullscreen" data-parallax="scroll" data-image-src="https://cdn.colorlib.com/shapely/wp-content/uploads/sites/12/2016/03/photo-1443527216320-7e744084f5a7-1.jpg">
	<div class="align-transform">
		<div class="row">


			<div class="top-parallax-section">
				<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center"><h1>We Change Everything WordPress</h1><p class="mb32">This is the only WordPress theme you will ever want to use. </p><a class="btn btn-lg btn-white" href="#">Read More</a><a class="btn btn-lg btn-filled" href="#">Download Now</a>                          </div>
			</div>
			<!--end of row-->
		</div>
	</div>
</div>