<?php
   get_header();
?>
<div class="single-page">
   <div class="container">
      <h1><?php //echo get_the_title();?></h1>
      <h2>
         <?php
            echo get_field('author_name');
         ?>
      </h2>
      <h5><?php the_field('author_designation');?></h5>
      <?php the_time('F jS, Y'); ?>
      <?php the_category(', ') ?>
      <div class="post-image">
         <?php echo get_the_post_thumbnail(); ?>
      </div>
      <div class="post-content">
         <?php 
            echo get_the_content();
         ?>
      </div>
   </div>
</div>
<?php
   get_footer();
?>