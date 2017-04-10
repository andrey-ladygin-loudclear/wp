<?php
/**
 * @var $widget GL\Widgets\Block
 */
?>
    
<?php
$types = array(
    'page' => 'For all pages',
    'single' => 'For single page',
    'category' => 'For category page',
    'tag' => 'For tag page',
    'taxonomy' => 'For taxonomy page',
    'archive' => 'For archive page',
);
?>

<p>You can check this <a href="https://developer.wordpress.org/themes/basics/template-hierarchy/">page</a> for more details.</p>

<form>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox"> Check me out
        </label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

<?php //use GL\Classes\View; ?>
<!---->
<?php //View::load('Templates/Components/flashMessage', array('widget' => $widget)) ?>
<?php //View::load('Templates/Components/form/head', array('widget' => $widget)) ?>
<!---->
<?php
//$layout = new \GL\Classes\Layout();
//$widgets = $layout->getGrid($widget->getId(), 'glyph');
//?>
<!---->
<?php //if(!empty($_GET['showBackButton'])) { ?>
<!--    <div class="btn-group btn-group-widgets">-->
<!--        <a class="btn btn-default" href="javascript:window.history.back();">Back</a>-->
<!--    </div>-->
<?php //} ?>
<!---->
<?php //if(get_post_type() == 'grid') { ?>
<!--    <div class="pull-right">-->
<!--        You can use shortcode to this layout: <span class="label label-default">[gl-grid-tag id="--><?//= get_the_ID(); ?><!--"]</span>-->
<!--    </div>-->
<?php //} ?>
<!---->
<?php //View::load('Templates/Components/layout/widgets-nav'); ?>
<?php //View::load('Templates/Components/grid', array('widgets' => $widgets)); ?>
<?php //View::load('Templates/Components/layout/popup'); ?>