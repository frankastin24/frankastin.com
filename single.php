<?php
get_header('portfolio');

global $post;

?>
<div class="single-<?= strtolower(str_replace(' ', '-' ,get_the_title()));?>" style="background-image:url(<?= get_the_post_thumbnail_url() ?>)" id="single-portfolio-hero" >
    <div class="overlay">
        <div class="container">
           <h3><?= the_title();?></h3>
           <div class="links flex">
       
       <?php if(get_post_meta( $post->ID, 'project_link',true )) { ?>
       <a href="<?= get_post_meta( $post->ID, 'project_link',true );?>" class="project_link"><?= get_post_meta( $post->ID, 'project_link',true );?></a>
       <?php }?>
   </div>
        </div>
    </div>

</div>

<div class="container single-project-content">
  
    <?= the_content();?>

    <div class="navigation flex space-between">
        <a href="/work"><< Back to portfolio</a>
        <?= previous_post_link('%link','>> %title');?>
    </div>
</div>

<?php
get_footer();
?>