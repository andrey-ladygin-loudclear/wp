<?php
/**
 * @var $schema GL\Helpers\SchemaHelper
 */
?>

<label for="<?=$schema->name;?>"><?=$schema->label;?></label>
<input type="text" name="<?=$schema->name;?>" class="form-control" id="<?=$schema->name;?>" placeholder="<?=$schema->placeholder;?>" value="<?=$schema->value;?>">