<?php
   get_header();
?>
<div class="single-page">
   <div class="container">
      <h1><?php echo get_the_title();?></h1>
      <div class="post-meta">
         <h2>
         <?php
            $terms = get_the_terms( $post->ID , 'brands' );
            foreach ( $terms as $term ):
               echo $term->name;
            endforeach; ?>
         </h2>
         <?php the_time('F jS, Y'); ?>
      </div>
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