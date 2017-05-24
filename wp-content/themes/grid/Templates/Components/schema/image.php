
<div class="form-group" data-fieldname="<?=$schema->name;?>">
    <div class="form-inline image-layout well">
        <?php if(!empty($schema->value)) { ?>
            <img src="<?= $schema->value; ?>" alt="">
            <input type="hidden" name="<?=$schema->name;?>" value="<?= $schema->value; ?>">
        <?php } ?>
    </div>

    <input class="upload-schema-image-btn button btn btn-info" type="button" value="Add Image" />
</div>