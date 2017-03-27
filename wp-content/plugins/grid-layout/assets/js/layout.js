var gridster;
var ajaxurl = "/wp-admin/admin-ajax.php";

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

		if(!$gridStack.length) return;

        gridster = $gridStack.gridstack(options).data('gridstack');

        new function () {
            if(typeof structure != 'undefined' && structure) {
                $.each(structure, function(a) {
                    var widget = Widget(this.widget_name, this.widget_id);
					widget.setTitle(this.title);
					widget.setContent(this.preview);
					gridster.addWidget(widget.baseHtml(), this.col, this.row, ~~this.size_x, ~~this.size_y);
                });
            }

            $gridStack.on('change', function(event, items) {
				Layout.save();
            });
        };
    });
});

Layout = new function() {
    this.add = function(name, opt) {
        Widget(name).setOptions(opt).create(function(createdWidget) {
            gridster.addWidget(createdWidget.baseHtml(), null, null, 1, 1, true);
        });
    };

    this.delete = function(widgetNode, name, id) {
        if(confirm('Are you sure?')) {
            jQuery.post(ajaxurl, {action: 'gl_ajax_delete_widget',name: name,id: id}, function() {
                gridster.remove_widget(widgetNode);
            });
        }
    };

    this.save = function() {
        var _this = this;
        var page_id = jQuery('#post_ID').val();
        var parent_type = jQuery('#parent_type').val();
        var widgets = this.getAllWidgets();

        if(page_id) {
            if(_this.ajaxRef) {
                _this.ajaxRef.abort();
            }

            _this.ajaxRef = jQuery.post(ajaxurl, {
                action: 'gl_ajax_save_layout',
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

	this.getAllWidgets = function() {
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
};

var Widget = function(name, id) {
	var title = name.ucFirst();
	var content = '';
	var options = [];

	var HtmlBuilder = new function() {
		var html = '';

		this.getViewUrl = function() {
			return '/wp-admin/edit.php?post_type=grid&page=gl-view-widget&widget-name='+name+'&widget-id='+id;
		};
		this.getEditUrl = function(showBackButton) {
			return '/wp-admin/edit.php?post_type=grid&page=gl-edit-widget&widget-name='+name+'&widget-id='+id+(showBackButton ? '&showBackButton=1' : '');
			//return '/wp-admin/admin.php?action=gl_edit_widget_action&widget-name='+name+'&widget-id='+id+(showBackButton ? '&showBackButton=1' : '');
		};
		this.addTitle = function() {
			html += '<span class="title">'+title+'</span>';
		};
		this.addContent = function() {
			html += '<div class="content">'+content+'</div>';
		};
		this.addViewButton = function() {
			html += '<a href="'+this.getViewUrl()+'" target="_blank"><span class="glyphicon glyphicon-eye-open"></span></a>';
		};
		this.addGlyphButtons = function() {
			html += '<a href="'+this.getEditUrl(true)+'"><span class="glyphicon glyphicon-cog disable-popup"></span></a>';
			html += '<a href="'+this.getEditUrl(true)+'" target="_blank"><span class="glyphicon glyphicon-link"></span></a>';
		};
		this.addConfigButton = function() {
			html += '<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>';
		};
		this.addTrashButton = function() {
			html += '<span class="glyphicon glyphicon-trash"></span>';
		};
		this.build = function() {
			return '<div data-gs-name="'+name+'" data-gs-id="' + id + '" ><div class="grid-stack-item-content well">'+html+'</div></div>';
		};
	};

	return new function() {
		var _this = this;

	    this.getNode = function() {
            return jQuery('div[data-gs-name="'+name+'"][data-gs-id="'+id+'"]');
        };
        this.setContent = function(text) {
        	if(text) {
        		content = text;
			}
		};
        this.setTitle = function(text) {
        	if(text) {
				title = text;
			}
		};
        this.setOptions = function(opt) {
			options = opt;
        	return this;
		};
	    this.check = function() {
	        return this.getNode().length;
        };
		this.create = function(callback) {
			jQuery.post(ajaxurl, {action: 'gl_ajax_add_widget', name:name, options:options}, function(response) {
				callback(Widget(name, response.id));
			}, 'json');
		};
		this.baseHtml = function() {
			HtmlBuilder.addTitle();
			HtmlBuilder.addContent();
			//HtmlBuilder.addViewButton();

			//if(id) {
			    if(name == 'glyph' && parent.frames.length > 1) {
					HtmlBuilder.addGlyphButtons();
                } else {
					HtmlBuilder.addConfigButton();
                }
            //}

			HtmlBuilder.addTrashButton();
			return HtmlBuilder.build();
		};
		this.updateWidgetTitle = function(title) {
            this.getNode().find('.title').html(title);
        };
		this.updateWidgetContent = function(content) {
            this.getNode().find('.content').html(content);
        };
		this.edit = function() {
            jQuery('.modal .modal-title').html('Edit ' + name);
            jQuery('.modal .modal-body').html('<iframe src="'+HtmlBuilder.getEditUrl()+'" width="100%" height="100%"></iframe>');
            jQuery('.modal').modal('show').on('hide.bs.modal', function (e) {
				jQuery.post(ajaxurl, {action: 'gl_ajax_get_widget_preview', name:name, id:id}, function(response) {
					_this.updateWidgetTitle(response.title);
					_this.updateWidgetContent(response.preview);
					jQuery('.modal').unbind('hide');
				}, 'json');
			})
        };
	};
};

//each widget should contain own html code

Widgets = new function() {
    this.get = function(widget) {
        return this[widget];
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
        // return Widgets.get(name).edit(id);
        return Widget(name, id).edit();
    }

    if(jQuery(this).hasClass('glyphicon-trash')) {
        return Layout.delete(widgetNode, name, id);
    }
});

String.prototype.ucFirst = function() {
	var str = this;
	if(str.length) {
		str = str.charAt(0).toUpperCase() + str.slice(1);
	}
	return str;
};

function f(a,b) {
    a = a + b;
    b = a - b;
    a = a - b;
    return [a,b]
}

function r(c) {
    return 50 * Math.round(c / 50);
}

function cow(n) {

}