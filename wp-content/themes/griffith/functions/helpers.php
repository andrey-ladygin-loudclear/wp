<?php

class GriffithHelper {
    static function getUrl($url) {
        if (strpos($url, '/anchor-link/')) {
            return '#' . rtrim(substr($url, strpos($url, '/anchor-link/') + 13), '/');
        } else {
            return $url;
        }
    }

    static function isModuleFound($moduleCode, $objectId = null) {
        $result = false;

        if (!$objectId) {
            $objectId = get_the_ID();
        }

        $modules = get_field('module', $objectId);

        if ($modules) {
            foreach ($modules as $module) {
                if ($module['acf_fc_layout'] === $moduleCode) {
                    return true;
                }
            }
        }

        return $result;
    }

    static function isMobileTablet() {
        return self::isMobile() && self::isTablet();
    }

    static function isMobile() {
        $browserAgent = GriffithSettings::getBrowserAgent();

        return $browserAgent->isMobile();
    }

    static function isTablet() {
        $browserAgent = GriffithSettings::getBrowserAgent();

        return $browserAgent->isMobile();
    }
}