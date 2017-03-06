<?php
	$formId = get_field('form', get_the_ID());
	$header	= (get_field('top_form_header', get_the_ID()) == '' ? 'Learn more' : get_field('top_form_header', get_the_ID()));
	$defaultDes = "<p>Complete this form to learn more about <strong>Griffith's accelerated online programs</strong> and how to apply today.</p>";
	$description = (get_field('top_form_description', get_the_ID()) == ''? $defaultDes : get_field('top_form_description', get_the_ID()));
?>
<aside class="<?php if ($formId): ?> expanded<?php endif ?>" id="enquiry-form">
	<div class="top-form-header">
		<div class="header">
		    <h2><?php echo $header; ?></h2>
		   	<?php echo $description; ?>
		    <button type="button" class="expand-toggle" title="Expand form toggle" aria-label="Expand form toggle"></button>
		</div>
		<?php if (!$formId) $formId = LaurusCRM::getDefaultForm(); ?>
		<?php echo FrmFormsController::show_form($formId) ?>
	</div>
</aside>
