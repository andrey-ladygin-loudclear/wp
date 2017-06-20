<?php
use GL\Classes\Config;
use GL\Classes\View;
?>
<div class="modal select-widget-modal fade" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Select Widget</h4>
            </div>
            <div class="modal-body">




                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#widgets1" aria-controls="widgets1" role="tab" data-toggle="tab">Widgets</a></li>
                    <li role="presentation"><a href="#widgets2" aria-controls="widgets2" role="tab" data-toggle="tab">WP Widgets</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content select-widget-tab-content">
                    <div role="tabpanel" class="tab-pane active" id="widgets1">
                        <?php View::load('Templates/Backend/components/parts/widgets-tab-pane', array('widgets' => Config::$widgets)); ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="widgets2">
                        <?php View::load('Templates/Backend/components/parts/widgets-tab-pane', array('widgets' => Config::getWPWidgets())); ?>
                    </div>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--button type="button" class="btn btn-primary">Save changes</button-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->