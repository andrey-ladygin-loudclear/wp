<?php
/**
 * @var $widget GL\Widgets\Block
 */
?>

<?php use GL\Classes\View; ?>

<?php
$types = array(
    'page' => 'For all pages (page)',
    'single' => 'For single page (single)',
    'category' => 'For category page (category)',
    'tag' => 'For tag page (tag)',
    'taxonomy' => 'For taxonomy page (taxonomy)',
    'archive' => 'For archive page (archive)',
    'footer' => 'For footer',
);
?>

<?php $selectedType = !empty($_GET['type']) ? $_GET['type'] : NULL; ?>

<form>
	<input type="hidden" name="page" value="grid-templates">
	<h6>You can check this <a href="https://developer.wordpress.org/themes/basics/template-hierarchy/" target="_blank">page</a> for more details.</h6>
    <div class="form-group">
        <label for="type">Select Type</label>
		<select name="type" id="type" onchange="jQuery(this).closest('form').submit()">
			<option value="">Select</option>
			<?php foreach($types as $type => $description) { ?>
				<option value="<?= $type; ?>" <?= $selectedType == $type ? 'selected' : ''; ?>><?= $description; ?></option>
			<?php } ?>
		</select>
    </div>
</form>

<?php if($selectedType) { ?>

	<input type="hidden" name="action" value="gl_save_widget_action">
	<input type="hidden" name="widget-name" value="">
	<input type="hidden" name="widget-id" value="">
	<input type="hidden" name="parent_type" id="parent_type" value="<?= $selectedType; ?>">

<?php
$layout = new \GL\Classes\Layout();
$widgets = $layout->getGrid(NULL, $selectedType);
?>

<?php View::load('Templates/Components/layout/widgets-nav'); ?>
<?php View::load('Templates/Components/grid', array('widgets' => $widgets)); ?>
<?php View::load('Templates/Components/layout/popup'); ?>

<?php } ?>
