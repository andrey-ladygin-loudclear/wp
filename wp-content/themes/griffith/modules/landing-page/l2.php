<main class="landing main-content">
    <ul class="variant-<?php echo ($module['variation'] === 'horizontal')? 'horizontal' : 'vertical' ?>">
        <?php foreach ($module['items'] as $item): ?><li>
                <figure style="background-image: url(<?php echo $item['image']['sizes']['program-thumbnail'] ?>)">
                    <img src="<?php echo $item['image']['sizes']['program-thumbnail'] ?>"<?php if ($item['image']['alt']): ?> alt="<?php echo $item['image']['alt'] ?>"<?php endif ?> />
                </figure>
                <div class="content">
                    <div class="header">
                        <h2><?php echo $item['title'] ?></h2>
                    </div>
                    <?php echo $item['content'] ?>
                    <?php if ($item['programs'] && $module['variation'] === 'horizontal'): ?>
                        <div class="generic-content">
                            <strong>Our Programs:</strong>
                            <ul>
                                <?php foreach($item['programs'] as $program): ?>
                                    <li><?php echo $program['program']->post_title ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if ($item['notice']): ?>
                        <p class="note"><?php echo esc_html($item['notice']) ?></p>
                    <?php endif; ?>
                    <a class="cta" href="#enquiry-form" <?php echo ($item['cta_program'])? 'data-program="' . get_field('program_code', $item['cta_program']->ID) . '"' : '' ?>>learn more</a>
                </div>
            </li><?php endforeach; ?><?php if ($module['key_date'] && $module['variation'] === 'vertical'): ?><li class="key-date">
                <div class="key-date-content">
                    <h2><?php echo $module['key_date_title'] ?></h2>

                    <div class="content">
                        <?php echo $module['key_date_content'] ?>
                    </div>
                </div>
            </li>
        <?php endif; ?>
    </ul>
</main>