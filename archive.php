<?php

get_header();

$args = array(
    'post_type' => 'portfolio',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'year',
            'field' => 'slug',
            'terms' => '2024',
        ),
    ),
);
$query = new WP_Query($args);

?>
<h3>Recent Projects</h3>
<div class="recent-projects">
    <h1>2024</h1>

    <div class="portfolio-container">
        <?php
        foreach ($query->posts as $portfolio) {
        ?>
            <a class="portfolio-entry" href="<?= get_the_permalink($portfolio->ID); ?>" style="background-image:url(<?= get_the_post_thumbnail_url($portfolio->ID) ?>)">
                <div class="skills">
                    <?php

                    $skills = explode(',', get_post_meta($portfolio->ID, 'skills', true));

                    foreach ($skills as $skill) {
                    ?>
                        <span><?= $skill; ?></span>
                    <?php
                    }
                    ?>
                </div>
                <h2><?= get_the_title($portfolio->ID); ?></h2>
            </a>
        <?php
        }
        ?>
    </div>


    <h1>2023</h1>


    <?php
    $args = array(
        'post_type' => 'portfolio',
        'orderby' => 'menu_order',
    'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'year',
                'field' => 'slug',
                'terms' => '2023',
            ),
        ),
    );
    $query = new WP_Query($args);

    ?>

    <div class="portfolio-container">
        <?php
        foreach ($query->posts as $portfolio) {
        ?>
            <a class="portfolio-entry" href="<?= get_the_permalink($portfolio->ID); ?>" style="background-image:url(<?= get_the_post_thumbnail_url($portfolio->ID) ?>)">
<div class="skills">
<?php


                $skills = explode(',', get_post_meta($portfolio->ID, 'skills', true));

                foreach ($skills as $skill) {
                ?>
                    <span><?= $skill; ?></span>
                <?php
                }
                ?>
                </div>
                <h2><?= get_the_title($portfolio->ID); ?></h2>
            </a>
        <?php
        }
        ?>
    </div>
</div>