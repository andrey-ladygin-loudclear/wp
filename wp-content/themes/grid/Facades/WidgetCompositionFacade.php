<?php

namespace GL\Facades;

use GL\Classes\Composition;
use GL\Classes\Structure;

class WidgetCompositionFacade {

    /**
     * @return Composition
     */
    public static function buildStructure($page_id, $parent_type = 'page') {
        $widgets = self::getTemplateOrCommonWidgets($page_id, $parent_type);
        
        $composition = new Composition();
        
        foreach($widgets as $widget) {
            $composition->insert($widget);
        }

        return $composition;
    }

    private static function getTemplateOrCommonWidgets($page_id, $parent_type) {
        if(Structure::check($page_id, $parent_type)) {
            return Structure::getWidgets($page_id, $parent_type);
        }
        
        return Structure::getWidgets(NULL, $parent_type);
    }
}
