<?php if ($widgets && reset($widgets)): ?>
    <aside class="widgets">
        <?php foreach ($widgets as $widget): ?>
            <div>
                <?php include 'widget/' . $widget . '.php' ?>
            </div>
        <?php endforeach ?>
    </aside>
<?php endif; ?>