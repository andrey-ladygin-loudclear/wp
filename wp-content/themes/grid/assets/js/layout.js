var gridster;
var ajaxurl = "/wp-admin/admin-ajax.php";

jQuery(function($){ //DOM Ready

    $(function () {
        var options = {
            //float: true,
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
                    var widget = Widget(this.name, this.id);
					widget.setChildOfGlyph(this.glyph);
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

jQuery(document).click(function(e) {
	if(Layout.importProcess) {
		var target = jQuery(e.target);
		var targetContent = target.closest('.grid-stack-item-content');
		var widgetNode = target.closest('.grid-stack-item');

		if(targetContent.hasClass('disable-current')) return;

		if(targetContent.length && targetContent.hasClass('glyph')) {
			var name = widgetNode.attr('data-gs-name');
			var id 	 = widgetNode.attr('data-gs-id');
			Layout.doImport(name, id);
		} else {
			Layout.disableImportProcess();
		}
	}
});

Layout = new function() {
	this.importProcess = false;
	this.widgetToImport = null;

    this.add = function(name, opt) {
        Widget(name).setOptions(opt).create(function(createdWidget, isGlyph) {
			createdWidget.setChildOfGlyph(isGlyph);
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

    this.import = function(widgetNode, name, id) {
		widgetNode.find('.grid-stack-item-content').addClass('disable-current');
		this.enableImportProcess();
		this.widgetToImport = Widget(name, id);
    };

    this.doImport = function(name, id) {
		if(confirm('Do you really want import widget to '+name+'?')) {
			var data = {
				action: 'gl_ajax_import_widget',
				destinationWidget: {
					name: name,
					id: id
				},
				widgetToImport: {
					name: Layout.widgetToImport.getName(),
					id: Layout.widgetToImport.getId()
				}
			};

			jQuery.post(ajaxurl, data, function() {
				gridster.remove_widget(Layout.widgetToImport.getNode());
			});
		}

		this.disableImportProcess();
    };

    this.enableImportProcess = function() {
		this.importProcess = true;
		jQuery('.gridster').addClass('import-process');
	};
    this.disableImportProcess = function() {
		this.importProcess = false;
		jQuery('.gridster').removeClass('import-process');
		jQuery('.grid-stack-item-content').removeClass('disable-current');
	};

    this.save = function() {
        var _this = this;
        var page_id = jQuery('#post_ID').val();
        var parent_type = jQuery('#parent_type').val();
        var widgets = this.getAllWidgets();

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
	var isChildOfGlyph = false;

	var HtmlBuilder = new function() {
		var html = '';

		this.getViewUrl = function() {
			return '/wp-admin/edit.php?post_type=grid&page=gl-view-widget&widget-name='+name+'&widget-id='+id;
		};
		this.getEditUrl = function(showBackButton) {
			return '/wp-admin/edit.php?post_type=grid&page=gl-edit-widget&widget-name='+name+'&widget-id='+id+(showBackButton ? '&showBackButton=1' : '');
			//return '/wp-admin/admin.php?action=gl_edit_widget_action&widget-name='+name+'&widget-id='+id+(showBackButton ? '&showBackButton=1' : '');
		};
		this.getEditPageUrl = function(showBackButton) {
			return '/wp-admin/edit.php?post_type=grid&page=gl-edit-widget-page&widget-name='+name+'&widget-id='+id+(showBackButton ? '&showBackButton=1' : '');
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
			html += '<a href="'+this.getEditPageUrl(true)+'" target="_blank"><span class="glyphicon glyphicon-link"></span></a>';
		};
		this.addConfigButton = function() {
			html += '<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>';
		};
		this.addImportAndExportButton = function() {
			html += '<span class="glyphicon glyphicon-import" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Move to another widget"></span>';
			//html += '<span class="glyphicon glyphicon-export" aria-hidden="true"></span>';
		};
		this.addTrashButton = function() {
			html += '<span class="glyphicon glyphicon-trash"></span>';
		};
		this.build = function() {
			var glyphClass = isChildOfGlyph ? 'glyph' : '';
			return '<div data-gs-name="'+name+'" data-gs-id="' + id + '" ><div class="grid-stack-item-content well '+glyphClass+'">'+html+'</div></div>';
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
		this.setChildOfGlyph = function(bool) {
			isChildOfGlyph = bool;
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
				callback(Widget(name, response.id), response.glyph);
			}, 'json');
		};
		this.baseHtml = function(isGlyph) {
			HtmlBuilder.addTitle();
			HtmlBuilder.addContent();
			HtmlBuilder.addImportAndExportButton();

			//if(id) {
			    //if(name == 'glyph' && parent.frames.length > 1) {
			    //if(parent.frames.length) {
			    if(inIframe()) {
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
            jQuery('.config-modal .modal-title').html('Edit ' + name);
            jQuery('.config-modal .modal-body').html('<iframe src="'+HtmlBuilder.getEditUrl()+'" width="100%" height="100%"></iframe>');
            jQuery('.config-modal').modal('show').on('hide.bs.modal', function (e) {
				jQuery.post(ajaxurl, {action: 'gl_ajax_get_widget_preview', name:name, id:id}, function(response) {
					_this.updateWidgetTitle(response.title);
					_this.updateWidgetContent(response.preview);
					jQuery('.config-modal').unbind('hide');
				}, 'json');
			})
        };
		this.getId = function() {
			return id;
		};
		this.getName = function() {
			return name;
		};
	};
};
//
// //each widget should contain own html code
//
// Widgets = new function() {
//     this.get = function(widget) {
//         return this[widget];
//     };
//
//
//     this.text = new function() {
//         this.name = 'text';
//
//         this.html = function(id, data) {
//             var content = 'Text Widget';
//
//             if(data && data.text) {
//                 content += '<div>'+data.text+'</div>';
//             }
//
//             return Widgets.baseHtml(this.name, id, content);
//         };
//
//         this.edit = function(id) {
//             jQuery('.modal .modal-title').html('Edit Text');
//             jQuery('.modal .modal-body').html('<iframe src="'+Widgets.getEditUrl(this.name, id)+'" width="100%" height="100%"></iframe>');
//             jQuery('.modal').modal('show')
//         };
//     };
//
//     this.image = new function() {
//         this.name = 'image';
//
//         this.html = function(id, data) {
//             var content = 'Image Widget';
//
//             if(data && data.text) {
//                 content += '<div><img src="'+data.src+'" width="100%" /></div>';
//             }
//
//             return Widgets.baseHtml(this.name, id, content);
//         };
//
//         this.edit = function(id) {
//             jQuery('.modal .modal-title').html('Edit Image');
//             jQuery('.modal .modal-body').html('<iframe src="'+Widgets.getEditUrl(this.name, id)+'" width="100%" height="100%"></iframe>');
//             jQuery('.modal').modal('show')
//         };
//     };
//
//     this.glyph = new function() {
//         this.name = 'glyph';
//
//         this.html = function(id, data) {
//             var content = 'Block Widget';
//
//             if(data && data.text) {
//                 content += '<div style="border: 1px solid"></div>';
//             }
//
//             return Widgets.baseHtml(this.name, id, content);
//         };
//
//         this.edit = function(id) {
//             jQuery('.modal .modal-title').html('Edit Block');
//             jQuery('.modal .modal-body').html('<iframe src="'+Widgets.getEditUrl(this.name, id)+'" width="100%" height="100%"></iframe>');
//             jQuery('.modal').modal('show')
//         };
//     };
// };

jQuery(document).on('click', '.glyphicon', function(e) {
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

    if(jQuery(this).hasClass('glyphicon-import')) {
		return Layout.import(widgetNode, name, id);
    }
});

function inIframe () {
	try {
		return window.self !== window.top;
	} catch (e) {
		return true;
	}
}

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