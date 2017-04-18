<?php
use GL\Classes\Config;
use GL\Classes\View;

?>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#widgets1" aria-controls="widgets1" role="tab" data-toggle="tab">Widgets</a></li>
    <li role="presentation"><a href="#widgets2" aria-controls="widgets2" role="tab" data-toggle="tab">Profile</a></li>
    <li role="presentation"><a href="#widgets3" aria-controls="widgets3" role="tab" data-toggle="tab">Messages</a></li>
    <li role="presentation"><a href="#widgets4" aria-controls="widgets4" role="tab" data-toggle="tab">Settings</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content select-widget-tab-content">
    <div role="tabpanel" class="tab-pane active" id="widgets1">
    
        <?php View::load('Templates/Components/layout/widgets-tab-pane', array('widgets' => Config::$widgets)); ?>
        
    </div>
    <div role="tabpanel" class="tab-pane" id="widgets2">...</div>
    <div role="tabpanel" class="tab-pane" id="widgets3">...</div>
    <div role="tabpanel" class="tab-pane" id="widgets4">...</div>
</div>