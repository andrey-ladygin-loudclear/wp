<?php
$modules = get_field('modules', get_the_ID());

if ($modules) {
    foreach ($modules as $module) {
        $wrapperClass = 'module ' . $module['acf_fc_layout'];
        switch ($module['acf_fc_layout'][0]) {
            case 'h':
                include('homepage/' . $module['acf_fc_layout'] . '.php');
                break;
            case 'p':
                include('program/' . $module['acf_fc_layout'] . '.php');
                break;
            case 'm':
                include('media/' . $module['acf_fc_layout'] . '.php');
                break;
            case 'l':
                include('landing-page/' . $module['acf_fc_layout'] . '.php');
                break;
            case 'c':
                include('custom/' . $module['acf_fc_layout'] . '.php');
                break;
            default:
                include('global/' . $module['acf_fc_layout'] . '.php');
                break;
        }
    }
}