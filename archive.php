<?php

get_header('portfolio');

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
<div id="portfolio-hero">
    <div class="overlay">
        <div class="container realtive">
    <h3>PORTFOLIO</h3>
        </div>
    </div>

</div>




<div id="portfolio" class="container">

    <h1>2024</h1>

    <div class="portfolio-container">
        <?php
        foreach ($query->posts as $portfolio) {
        ?>
            <a class="portfolio-entry" href="<?= get_the_permalink($portfolio->ID); ?>" style="background-image:url(<?= get_the_post_thumbnail_url($portfolio->ID) ?>)">
            <div class="overlay">   
           
                <h2><?= get_the_title($portfolio->ID); ?></h2>
                <p><?= strip_tags(substr($portfolio->post_content,0,600)) ?>... <span>read more</span></p>

                <div class="skills flex">
                    <?php

                    $skills = explode(',', get_post_meta($portfolio->ID, 'skills', true));

                    foreach ($skills as $skill) {
                        if($skill == ''|| $skill == ' ')continue;
                    ?>
                        <span><?= $skill; ?></span>
                    <?php
                    }
                    ?>
                </div>
            </div>
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
                <div class="overlay">
                <h2><?= get_the_title($portfolio->ID); ?></h2>
            
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
                </div>
            </a>
        <?php
        }
        ?>
    </div>
</div>