<?php
$postPerPage = GriffithSettings::$options['widgets']['key_dates']['num_visible_items'];
if (!$postPerPage) {
    $postPerPage = -1;
}
$args  = array(
    'posts_per_page' => $postPerPage,
    'post_type'      => 'key-dates',
    'post_status'    => 'publish',
    'meta_key'       => 'date',
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC',
    'meta_query'     => array(
        array(
            'value'   => date('Ymd', strtotime("today")),
            'compare' => '>=',
            'type'    => 'DATE'
        )
    )
);
$items = get_posts($args);
if ($items):
?>
<section class="list widget">
    <h2>Key dates</h2>
    <ol class="listed">
        <?php foreach ($items as $item): ?>
            <li class="item">
                <a href="<?php echo get_permalink($item->ID) ?>">
                    <h3><?php echo $item->post_title ?></h3>
                </a>
            </li>
        <?php endforeach ?>
    </ol>
</section>
<?php endif;