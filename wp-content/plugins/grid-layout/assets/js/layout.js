var gridster;

jQuery(function($){ //DOM Ready

    $(function () {
        var options = {
            float: true,
            widget_margins: [5, 5],
            widget_base_dimensions: [100, 50],
            extra_cols: 0,
            max_size_x: 12,
            min_cols: 12
        };

        var $gridStack = jQuery('.grid-stack');
        gridster = $gridStack.gridstack(options).data('gridstack');

        new function () {
            if(typeof structure != 'undefined' && structure) {
                $.each(structure, function(a) {
                    if(Widgets.get(this.widget_name)) {
                        gridster.addWidget(Widgets.get(this.widget_name).html(this.widget_id, this), this.col, this.row, ~~this.size_x, ~~this.size_y);
                    }
                });
            }

            $gridStack.on('change', function(event, items) {
                Widgets.save();
            });
        };
    });
});

Layout = new function() {
    this.add = function(name) {
        Widgets.create(name, function(createdWidget) {
            gridster.addWidget(Widgets.get(name).html(createdWidget.id), null, null, 1, 1, true);
        });
    };

    this.delete = function(widgetNode, name, id) {
        if(confirm('Are you sure?')) {
            gridster.remove_widget(widgetNode);
            jQuery.post(ajaxurl, {action: 'gl_ajax_delete_widget',name: name,id: id});
            Widgets.save();
        }
    };

    this.save = function() {
        var _this = this;
        var page_id = jQuery('#post_ID').val();
        var parent_type = jQuery('#parent_type').val();
        var widgets = this.getAll();

        if(page_id) {
            if(_this.ajaxRef) {
                _this.ajaxRef.abort();
            }

            _this.ajaxRef = jQuery.post(ajaxurl, {
                action: 'gl_ajax_save_widget',
                page_id: page_id,
                parent_type: parent_type || 'page',
                gl_json: widgets,
                success: function() { _this.ajaxRef = null; }
            });
        } else {
            if(!jQuery('#gl_json').length) {
                jQuery('#grid-meta-box-id').append('<input type="hidden" name="gl_json" id="gl_json" value="" />');
            }

            jQuery('#gl_json').val(JSON.stringify(widgets));
        }
    };
};

//each widget should contain own html code

Widgets = new function() {
    this.get = function(widget) {
        return this[widget];
    };

    // this.delete = function(widgetNode, name, id) {
    //     if(confirm('Are you sure?')) {
    //         gridster.remove_widget(widgetNode);
    //         jQuery.post(ajaxurl, {action: 'gl_ajax_delete_widget',name: name,id: id});
    //         Widgets.save();
    //     }
    // };

    // this.add = function(name) {
    //     Widgets.create(name, function(createdWidget) {
    //         gridster.addWidget(Widgets.get(name).html(createdWidget.id), null, null, 1, 1, true);
    //     });
    // };

    this.create = function(name, callback) {
        jQuery.post(ajaxurl, {action: 'gl_ajax_add_widget', name:name}, callback, 'json');
    };

    this.getAll = function() {
        var data = [];

        jQuery('.grid-stack-item.ui-draggable').each(function () {
            var node = jQuery(this).data('_gridstack_node');
            data.push({
                widget_id: node.id,
                widget_name: jQuery(this).attr('data-gs-name'),
                col: node.x,
                row: node.y,
                size_x: node.width,
                size_y: node.height
            });
        });

        return data;
    };

    // this.save = function() {
    //     var _this = this;
    //     var page_id = jQuery('#post_ID').val();
    //     var parent_type = jQuery('#parent_type').val();
    //     var widgets = this.getAll();
    //
    //     if(page_id) {
    //         if(_this.ajaxRef) {
    //             _this.ajaxRef.abort();
    //         }
    //
    //         _this.ajaxRef = jQuery.post(ajaxurl, {
    //             action: 'gl_ajax_save_widget',
    //             page_id: page_id,
    //             parent_type: parent_type || 'page',
    //             gl_json: widgets,
    //             success: function() { _this.ajaxRef = null; }
    //         });
    //     } else {
    //         if(!jQuery('#gl_json').length) {
    //             jQuery('#grid-meta-box-id').append('<input type="hidden" name="gl_json" id="gl_json" value="" />');
    //         }
    //
    //         jQuery('#gl_json').val(JSON.stringify(widgets));
    //     }
    // };

    this.getEditUrl = function(name, id, showBackButton) {
        return '/wp-admin/admin.php?action=gl_edit_widget_action&widget-name='+name+'&widget-id='+id+(showBackButton ? '&showBackButton=1' : '');
    };

    this.baseHtml = function(type, id, content) {
        var additionalHtml = '';
        additionalHtml += '<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>';

        if(type == 'glyph' && parent.frames.length) {
            additionalHtml = '<a href="'+Widgets.getEditUrl(type, id, true)+'"><span class="glyphicon glyphicon-cog disable-popup"></span></a>';
            additionalHtml += '<a href="'+Widgets.getEditUrl(type, id, true)+'" target="_blank"><span class="glyphicon glyphicon-link"></span></a>';
        }

        additionalHtml += '<span class="glyphicon glyphicon-trash"></span>';
        return '<div data-gs-name="'+type+'" data-gs-id="' + id + '" ><div class="grid-stack-item-content well">'+content+additionalHtml+'</div></div>';
    };

    this.text = new function() {
        this.name = 'text';

        this.html = function(id, data) {
            var content = 'Text Widget';

            if(data && data.text) {
                content += '<div>'+data.text+'</div>';
            }

            return Widgets.baseHtml(this.name, id, content);
        };

        this.edit = function(id) {
            jQuery('.modal .modal-title').html('Edit Text');
            jQuery('.modal .modal-body').html('<iframe src="'+Widgets.getEditUrl(this.name, id)+'" width="100%" height="100%"></iframe>');
            jQuery('.modal').modal('show')
        };
    };

    this.image = new function() {
        this.name = 'image';

        this.html = function(id, data) {
            var content = 'Image Widget';

            if(data && data.text) {
                content += '<div><img src="'+data.src+'" width="100%" /></div>';
            }

            return Widgets.baseHtml(this.name, id, content);
        };

        this.edit = function(id) {
            jQuery('.modal .modal-title').html('Edit Image');
            jQuery('.modal .modal-body').html('<iframe src="'+Widgets.getEditUrl(this.name, id)+'" width="100%" height="100%"></iframe>');
            jQuery('.modal').modal('show')
        };
    };

    this.glyph = new function() {
        this.name = 'glyph';

        this.html = function(id, data) {
            var content = 'Block Widget';

            if(data && data.text) {
                content += '<div style="border: 1px solid"></div>';
            }

            return Widgets.baseHtml(this.name, id, content);
        };

        this.edit = function(id) {
            jQuery('.modal .modal-title').html('Edit Block');
            jQuery('.modal .modal-body').html('<iframe src="'+Widgets.getEditUrl(this.name, id)+'" width="100%" height="100%"></iframe>');
            jQuery('.modal').modal('show')
        };
    };
};

jQuery(document).on('click', '.glyphicon', function($) {
    var widgetNode = jQuery(this).closest('.grid-stack-item');
    var name = widgetNode.attr('data-gs-name');
    var id 	 = widgetNode.attr('data-gs-id');

    if(jQuery(this).hasClass('glyphicon-cog') && !jQuery(this).hasClass('disable-popup')) {
        return Widgets.get(name).edit(id);
    }

    if(jQuery(this).hasClass('glyphicon-trash')) {
        return Widgets.delete(widgetNode, name, id);
    }
});