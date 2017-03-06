<h1>Layout</h1>

<?php if(!empty($_GET['showBackButton'])) { ?>
	<div class="btn-group btn-group-widgets">
		<a class="btn btn-default" href="javascript:window.history.back();">Back</a>
	</div>
<?php } ?>


<div class="btn-group btn-group-widgets">
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Add Widget <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li><a href="javascript:void(0);" onclick="Widgets.add('glyph');">Glyph</a></li>
        <li><a href="javascript:void(0);" onclick="Widgets.add('image');">Image</a></li>
        <li><a href="javascript:void(0);" onclick="Widgets.add('text');">Text</a></li>
    </ul>
</div>
<p><?php echo json_encode($widgets); ?></p>
<div class="gridster ready">
    <input type="hidden" name="page_id" id="page_id" value="">
    <div class="gridster-widgets grid-stack"></div>
</div>

<div class="modal fade" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--button type="button" class="btn btn-primary">Save changes</button-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Scripts -->
<script>
    var structure = <?php echo json_encode($widgets); ?>;
</script>
