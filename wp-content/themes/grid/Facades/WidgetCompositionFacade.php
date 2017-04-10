<?php

namespace GL\Facades;

use GL\Classes\Composition;
use GL\Classes\Structure;

class WidgetCompositionFacade {

    /**
     * @return Composition
     */
    public static function buildStructure($page_id, $parent_type = 'page') {
        $widgets = Structure::getWidgets($page_id, $parent_type);
        $composition = new Composition();
        
        foreach($widgets as $widget) {
            $composition->insert($widget);
        }

        return $composition;
    }

}
