<?php


namespace GL\Widgets\Specified;

use GL\Classes\View;
use GL\Widgets\Paralax;
use GL\Widgets\System\BasicTemplate;
use GL\Widgets\System\Glyph;
use GL\Widgets\System\Widget;
use GL\Widgets\Wp_query;

class Paralax_posts extends Glyph {
    public $schema = array(
        'title' => array(
            'label' => "Title",
            'size' => 'form-group',
            'type' => 'text',
            'default' => "LATEST NEWS",
        ),
        'description' => array(
            'label' => "Description",
            'size' => 'form-group',
            'type' => 'text',
            'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
        ),
    );

    public function draw() {
        $args = array(
            'post_type' => 'post'
        );

        $paralax = new Paralax();
        $the_query = new \WP_Query($args);

        if($the_query->have_posts()) {
            while($the_query->have_posts()) {
                $the_query->the_post();
                $paralax->insert(new BasicTemplate('Templates/Frontend/Widgets/Basic/Post'));
            }
            wp_reset_postdata();
        }

        $paralax->draw();
    }
}