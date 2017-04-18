<div class="row">
    
    <?php $count = 0; ?>
    <?php foreach($widgets as $name => $widget_title) { ?>
    <?php $count++; ?>
    
    <?php if($count == 7) { ?>
        </div>
        <div class="row">
    <?php } ?>
    
    <div class="col-sm-6 col-md-2" data-name="<?= $name; ?>">
        <div class="thumbnail">
            <img src="http://www.freeiconspng.com/uploads/no-image-icon-8.png">
            <div class="caption">
                <p><?= $widget_title; ?></p>
            </div>
        </div>
    </div>
    <?php } ?>

</div>