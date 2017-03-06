<?php

class GriffithWalkerNavMenu extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent               = ($depth)? str_repeat("\t", $depth) : '';
        $defaultActiveElement = false;
        if (isset($args->default_active_element)) {
            $defaultActiveElement = $args->default_active_element;
        }

        $classes   = empty($item->classes)? array() : (array)$item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        if ($defaultActiveElement == $item->object_id) {
            $classes[] = 'current-menu-item';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts           = array();
        $atts['title']  = !empty($item->attr_title)? $item->attr_title : '';
        $atts['target'] = !empty($item->target)? $item->target : '';
        $atts['rel']    = !empty($item->xfn)? $item->xfn : '';
        $atts['href']   = !empty($item->url)? $item->url : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr)? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

class GriffithNavs {
    static protected $defaultConfig = array(
        'theme_location'  => '',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 1,
        'walker'          => ''
    );
    static protected $navs = array(
        'main'   => array(
            'theme_location' => 'main',
            'depth'          => 4,
            'container'      => ''
        ),
        'footer' => array(
            'theme_location'  => 'footer',
            'container'       => 'div',
            'container_class' => 'global-footer-nav'
        ),
    );

    function __construct() {
        // Add Menu Support
        add_theme_support('menus');

        $this->register();
    }

    function register() {
        register_nav_menus(array(
            'main'   => __('Main', 'griffith'),
            'footer' => __('Footer', 'griffith'),
        ));
    }

    static function getMenuIdBySlug($slug) {
        $menus = get_terms('nav_menu');

        foreach ($menus as $menu) {
            if ($slug === $menu->slug) {
                return $menu->term_id;
            }
        }

        return false;
    }

    static function get($name) {
        if (isset(self::$navs[ $name ])) {
            $args = array_merge(self::$defaultConfig, self::$navs[ $name ]);
            $menuId = self::getMenuIdBySlug($name);

            if ($menuId) {
                // top menu
                switch ($name) {
                    case 'top':
                        //set home as default active nav
                        $args['default_active_element'] = get_option('page_on_front');
                        $args['walker']                 = new GriffithWalkerNavMenu();
                        break;
                }

                if (isset($args['default_active_element'])) {
                    $navItems   = wp_get_nav_menu_items($menuId);
                    $navItemIds = array();
                    foreach ($navItems as $navItem) {
                        $navItemIds[] = $navItem->object_id;
                    }

                    if (in_array(get_the_ID(), $navItemIds)) {
                        unset($args['default_active_element']);
                        unset($args['walker']);
                    }
                }
            }

            return wp_nav_menu($args);
        } else {
            return false;
        }
    }
}

$griffithNavs = new GriffithNavs();