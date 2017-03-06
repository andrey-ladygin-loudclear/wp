# Formidable CMS config

## Before fields

	<div class="header">
		<h2>Learn more</h2>
		[form_description]
		<button type="button" class="expand-toggle" title="Expand form toggle" aria-label="Expand form toggle"></button>
	</div>
	<div class="content">

## I'm interested in

	<div id="frm_field_[id]_container" class="field field-program form-field">
		<label class="label" for="field_[key]">[field_name]</label>
		[input]
		[if error]<p class="error">[error]</p>[/if error]
	</div>

## My name

	<div id="frm_field_[id]_container" class="field form-field">
		<label class="label" for="field_[key]">[field_name]</label>
		[input]
		[if error]<p class="error">[error]</p>[/if error]
	</div>

## My email address

	<div id="frm_field_[id]_container" class="field form-field">
		<label class="label" for="field_[key]">[field_name]</label>
		[input]
		[if error]<p class="error">[error]</p>[/if error]
	</div>

## My phone number

	<div id="frm_field_[id]_container" class="field form-field">
		<label class="label" for="field_[key]">[field_name]</label>
		[input]
		[if error]<p class="error">[error]</p>[/if error]
	</div>

## Country

	<div id="frm_field_[id]_container" class="field form-field">
		<label class="label" for="field_[key]">[field_name]</label>
		[input]
		[if error]<p class="error">[error]</p>[/if error]
	</div>

## City

	<div id="frm_field_[id]_container" class="field form-field">
		<label class="label" for="field_[key]">[field_name]</label>
		[input]
		[if error]<p class="error">[error]</p>[/if error]
	</div>

## Postcode / ZIP

	<div id="frm_field_[id]_container" class="field form-field">
		<label class="label" for="field_[key]">[field_name]</label>
		[input]
		[if error]<p class="error">[error]</p>[/if error]
	</div>

## I'm looking for a qualification to:

	<div id="frm_field_[id]_container" class="clear field form-field">
		<p class="label">[field_name]</p>
		<ul>[input]</ul>
		[if error]<p class="error">[error]</p>[/if error]
	</div>

## My highest level of education:

	<div id="frm_field_[id]_container" class="field form-field">
		<p class="label">[field_name]</p>
		<ul>[input]</ul>
		[if error]<p class="error">[error]</p>[/if error]
	</div>

## Disclaimer

	<div id="frm_field_[id]_container" class="clear full field form-field">
		<p class="label">[field_name]</p>
		[input]
		[if error]<p class="error">[error]</p>[/if error]
	</div>

## After Fields

Empty!

## Submit Button

	<div class="field">
		<button type="submit" [button_action]>[button_label]</button>
	</div>
	</div>