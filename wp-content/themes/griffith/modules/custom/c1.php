<section class="module faculties">
    <ul class="accordion" data-expandable="multiple">
        <?php foreach ($module['faculties'] as $faculty):
            $facultyObj = $faculty['faculty'];
            ?>
            <li id="faculty-<?php echo $facultyObj->term_id ?>" class="<?php echo ($faculty['expanded_on_page_load'])? 'active' : '' ?>">
                <a class="toggle" href="#faculty-<?php echo $facultyObj->term_id ?>">
                    <h2><?php echo $facultyObj->name ?></h2></a>

                <div class="generic-content">
                    <?php echo $faculty['description'] ?>
                    <ul class="programs">
                        <?php foreach ($faculty['programs'] as $program):
                            $programObj = $program['program'];
                            ?>
                            <li>
                                <a href="<?php echo get_permalink($programObj->ID) ?>"><?php echo $programObj->post_title ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
