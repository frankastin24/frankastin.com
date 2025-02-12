<?php

get_header('portfolio');

?>

<div id="portfolio-hero">
    
    
    <div class="slides">

    <?php
     $args = array(
        'post_type' => 'portfolio',
        
    );
    $query = new WP_Query($args);

    foreach($query->posts as $portfolio) {
        ?>
        <div style="background-image:url(<?= get_the_post_thumbnail_url($portfolio->ID);?>)" class="slide">

        </div>
        <?php
    }
    ?>

    </div>

    <div class="overlay">
        <div class="container realtive">
    <h3>PORTFOLIO</h3>
        </div>
    </div>
</div>




<div id="portfolio" class="container">


<?php 
global $project_images;
$project_images = [];
function render_entries($year) {
    global $project_images;
    $args = array(
        'post_type' => 'portfolio',
        'tax_query' => array(
            array(
                'taxonomy' => 'year',
                'field' => 'slug',
                'terms' => $year,
            ),
        ),
    );
    ?>
    <div class="portfolio-container year-<?= $year;?>">
    
    <h1><?= $year;?></h1>
        <?php
        
        
        $query = new WP_Query($args);
        foreach ($query->posts as $portfolio) {
            $project_images[] = get_the_post_thumbnail_url($portfolio->ID);
        ?>
            <a class="portfolio-entry  <?= strtolower(str_replace(' ', '-' ,get_the_title($portfolio->ID)));?>" href="<?= get_the_permalink($portfolio->ID); ?>" style="background-image:url(<?= get_the_post_thumbnail_url($portfolio->ID) ?>)">
            <div class="overlay">   
           
                <h2><?= get_the_title($portfolio->ID); ?></h2>
                <p><?= strip_tags(substr($portfolio->post_content,0,500)) ?><?= strlen($portfolio->post_content) > 500 ? '...' :'' ;?></p>

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
    <?php
}


render_entries('2025');
render_entries('2024');
render_entries('2023');

?>



  


</div>
<?php 
get_footer();
?>