<?php
   get_header();
   ?>
<!---- Header-Hero ---->
<div class="header-hero">
   <div class="back-video">
      <?php the_custom_header_markup() ?>
      <div class="creative-set">
         <img class="desk-992" src="<?php bloginfo('template_url'); ?>/assets/images/desk-992.png">
         <img class="mob-991" src="<?php bloginfo('template_url'); ?>/assets/images/mob-991.png">
         <p><?php the_field('head_description'); ?></p>
         <a class="global-button" href="<?php the_field('head_btn'); ?>">View More</a>
      </div>
   </div>
</div>  
<!---- Orange-Set ---->
<div class="orange-set">
   <canvas id="animation_bg">
  </canvas>
  <p data-aos="zoom-in" data-aos-duration="10"><?php the_field('orange_description'); ?></p>
  <h1 data-aos="zoom-in" data-aos-duration="10" data-aos-delay="20"><?php the_field('oranges_title');?></h1>
      <h2 data-aos="zoom-in" data-aos-duration="10" data-aos-delay="30">
         Say Hello:<a href="tel:<?php the_field('oranges_number');?>"><?php the_field('oranges_number');?></a>
      </h2>
</div>
<!---- Best-Services ---->
<div class="best-service">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="provide-for">
               <h1 data-aos="zoom-in" data-aos-duration="10"><?php the_field('services_title'); ?></h1>
               <div class="typing-text" data-aos="zoom-in" data-aos-duration="10" data-aos-delay="20">
               <p><span><?php the_field('services_description'); ?></span></p>
                <!-- <p class="typewrite" data-period="2000" data-type='[ "Hi, Im Si.", "I am Creative.", "I Love Design.", "I Love to Develop.", "I Love to Develop12233." ]'> -->
                  <p class="typewrite" data-period="2000" data-type='[<?php
                  $rowCount = count( get_field('service_description_animated'));
                  $i = 1;
                  $comma = ',';
                   if( have_rows('service_description_animated') ):
                      while( have_rows('service_description_animated') ) : the_row();
                      if ( $i == $rowCount ):
                        $comma = '';
                      else:
                        $comma = ',';
                      endif;
                       $sub_value = '"'.get_sub_field('animated_text').'."'.$comma;
                       echo $sub_value;
                       $i++;
                         endwhile;
                     else :
                         // Do something...
                     endif;?>]'>
               <span class="wrap"></span></p>
               </div>
               <!-- <p><?php //the_field('services_description'); ?></p> -->
            </div>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="ext-img">
               <?php if( get_field('services_img') ): ?>
               <img src="<?php the_field('services_img'); ?>" />
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
</div>
<!----- Custom-post-type ------>
<div class="custom-post-type">
   <div class="container">
   <div class="custom-post">
   <?php
      // $categories = get_terms( array( 'taxonomy' => 'brands' ) );
      // //var_dump($categories);
      // foreach( $categories as $cat ) :
      //var_dump(categories);
      $posts = new WP_Query( array(
      'post_type'     => 'services',
      'posts_per_page'     => 3
      )
       ); 
      $count = 1;
       ?>
   <?php while( $posts->have_posts() ) : $posts->the_post(); ?>
   <?php
      $post_id = get_the_ID(); // or use the post id if you already have it
      $category_object = get_the_category($post_id);
      //print_r(get_the_term_list($post_id, 'brands'));
      ?>
   <div class="post-one">
      <a href="<?php the_permalink(); ?>">
         <h2><?php the_title(); ?></h2>
      </a>
      <div class="image-wrapper image-wrapper1" data-circle="js-circle-<?php echo $count ?>">
      <a href="<?php the_permalink(); ?>">
      <?php if( get_field('feature_img') ): ?>
          <img src="<?php the_field('feature_img'); ?>" />
      <?php endif; ?>
      <?php the_excerpt(); ?></a>
      <div class="circle js-circle-<?php echo $count ?>">
         <img src="<?php bloginfo('template_url'); ?>/assets/images/plus.png">
      </div>
      <div class="content-overlay"></div>
      </div>
      <h3>
         <?php 
            echo get_the_term_list($post_id, 'brands'); ?>
            <svg width="100%" height="62">
             <defs>
                 <linearGradient id="grad1">
                     <stop offset="0%" stop-color="#FF8282"/>
                     <stop offset="100%" stop-color="#E178ED" />
                 </linearGradient>
             </defs>
              <rect x="0" y="5" rx="25" fill="none" stroke="url(#grad1)" width="100%" height="50"></rect>
           </svg>
         </h3>
   </div>
   <?php 
   $count++;
   endwhile; wp_reset_postdata(); ?>
</div>
      </div>
      </div>
<!----- Our-Work ------>
<div class="our-work">
   <div class="container-fluid">
      <div class="work-for">
         <div class="container">
         <h1 data-aos="zoom-in" data-aos-duration="10"><?php the_field('work_title'); ?></h1>
         <p data-aos="zoom-in" data-aos-delay="200" data-aos-duration="20"><?php the_field('work_description'); ?></p>
         </div>
      </div>
      <div class="swiper mySwiper">
         <div class="swiper-wrapper">
            <?php
               $categories = get_terms( array( 'taxonomy' => 'work-type' ) );
               //var_dump($categories);
               foreach( $categories as $cat ) :
               //var_dump(categories);
               $posts = new WP_Query( array(
               'post_type'     => 'works',
               'posts_per_page'     => 3,
               'tax_query'     => array(
               array(
               'taxonomy' => 'work-type',
               'terms'    => array( $cat->term_id ),
               'field'   => 'term_id'
               )
               )
               ) ); ?>
            <?php while( $posts->have_posts() ) : $posts->the_post();
               ?>
            <div class="swiper-slide">
               <h1><?php the_field('title');?></h1>
               <a href="<?php the_permalink(); ?>" class="step-confirmation-content">
               <?php if( get_field('work_img') ): ?>
                  <img src="<?php the_field('work_img'); ?>" />
               <?php endif; ?>
               <span class="border-top"></span>
              <span class="border-left"></span>
              <span class="border-right"></span>
              <span class="border-bottom"></span>
               </a>
               <h2><?php the_field('sub_title');?></h2>
               <h3><?php echo $cat->name; ?></h3>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
            <?php endforeach; ?>
         </div>
      </div>
      <div class="next-her">
         <a href="<?php the_field('our_link'); ?>">
            <h6>EXPLORE ALL Projects</h6>
         </a>
      </div>
   </div>
</div>
<!----- Specialization-Work ------>
<div class="specialization-work">
   <div class="impression">
      <h1 data-aos="zoom-in" data-aos-duration="10"><?php the_field('lization_title'); ?></h1>
      <p data-aos="zoom-in" data-aos-duration="10" data-aos-delay="10"><?php the_field('lization_description');?></p>
   </div>
   <div class="container-trap">
      <div class="tabs">
         <ul id="tabs-nav">
            <?php
               $args = array(
               'taxonomy' => 'brands',
               'orderby' => 'name',
               'order'   => 'ASC'
               );
               $cats = get_categories($args);
               $count= 0;
               // var_dump($cats);
               foreach($cats as $cat) {
               $count++;
               ?>
            <li>
               <a href="#tab<?php echo $count ?>">
               <?php echo $cat->name; ?>
               </a>
            </li>
            <?php
               //var_dump($image);
               
               }
               ?>
         </ul>
         <div id="tabs-content">
            <?php
               $args = array(
               'taxonomy' => 'brands',
               'orderby' => 'name',
               'order'   => 'ASC'
               );
               $cats = get_categories($args);
               $count = 0;
               // var_dump($cats);
               foreach($cats as $cat) {
               $image = get_field('category_feature_image', $cat->taxonomy . '_' . $cat->term_id );
               $count++;
               ?>
            <div id="tab<?php echo $count ?>" class="tab-content">
               <img src="<?php  echo $image['url'] ?>">
            </div>
            <?php
               //var_dump($image);
               
               }
               ?>
         </div>
      </div>
   </div>
</div>
<!------ Testimonial ------>
<div class="testimon">
   <div class="container">
   <div class="uniling">
      <?php
         //var_dump($categories);
         //var_dump(categories);
         $posts = new WP_Query( array(
         'post_type'     => 'testimonial',
         'posts_per_page'     => 3,
         'order' => 'DESC',
         ) ); ?>
      <div class="waves">
         <h1 data-aos="zoom-in" data-aos-duration="10"><?php the_field('fluid_title');?></h1>
      </div>
      <div class="logo-repet">
         <?php if( get_field('fluid_image') ): 
            $count = 2;
            ?>
         <?php while( the_repeater_field('fluid_image') ): ?>
         <img data-aos="zoom-in-up" data-aos-easing="ease-in-back"
     data-aos-delay="<?php echo $count?>00" data-aos-duration="<?php echo $count?>0" src="<?php the_sub_field('fliude_imag'); ?>" alt="<?php the_sub_field('alt'); ?>" />
         <?php 
         $count ++;
         endwhile; ?>
         <?php endif;
            ?>
      </div>
      <div class="swiper-container">
         <div class="swiper-wrapper">
            <?php while( $posts->have_posts() ) : $posts->the_post();
               ?>
            <div class="swiper-slide wapper-type">
               <div class="unil-img">
                  <?php the_post_thumbnail(); ?>
               </div>
               <div class="unlin-txt">
                  <?php the_content(); ?>
                  <div class="double-head">
                     <h2>
                        <?php 
                           $post_id = get_the_ID();
                           echo get_field('author_name', $post_id);
                        ?>
                     </h2>
                     <div class="titl-head">
                        <h5><?php the_field('author_designation', $post_id);?></h5>
                        <a href="<?php the_permalink(); ?>">
                           <h6>Read Case Study</h6>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
         </div>
         <!-- Add Pagination -->
         <div id="prev" class="swiper-button-prev"></div>
         <div id="next" class="swiper-button-next"></div>
         <div id="numberSlides">
            01/01
         </div>
      </div>
   </div>
</div>
</div>
<!------ News & Insights ------>
<div class="insights-section">
   <div class="insight-txt">
      <div class="container">
      <h1 data-aos="zoom-in" data-aos-duration="10"><?php the_field('new&insight_title');?></h1>
      </div>
   </div>
   <div class="insight-iner">
      <?php
         //var_dump($categories);
         //var_dump(categories);
         $posts = new WP_Query( array(
         'post_type'     => 'news',
         'posts_per_page'     => 4,
         ) ); 
         $count =1;
         ?>
      <div class="swiper-container-insight">
         <div class="swiper-wrapper">
            <?php while( $posts->have_posts() ) : $posts->the_post();
               ?>
            <div class="swiper-slide">
               <div class="image-wrapper" data-circle="insight-circle-<?php echo $count ?>">
                  <a href="<?php the_permalink(); ?>">
                     <?php the_post_thumbnail(); ?>
                  </a>
                  <div class="circle insight-circle-<?php echo $count ?>">
                     <img src="<?php bloginfo('template_url'); ?>/assets/images/plus.png">
                  </div>
               </div>
               <a href="<?php the_permalink(); ?>">
                  <h2><?php the_title(); ?></h2>
               </a>
               <?php the_excerpt(); ?>
            </div>
            <?php 
            $count ++;
         endwhile; wp_reset_postdata(); ?>
         </div>
         <!-- Add Pagination -->
         <div id="prev" class="swiper-button-prev"></div>
         <div id="next" class="swiper-button-next"></div>
         <div class="go-next">
         <div class="container">
         <a href="<?php the_field('new&insight_link'); ?>">
            <h6>EXPLORE ALL Projects</h6>
         </a>
            </div>
      </div>
      </div>
   </div>
</div>
<!----- Related Articles ------>
<div class="related-articlest-section">
   <div class="container">
   <div class="related-inside">
      <h1 data-aos="zoom-in" data-aos-duration="10"><?php the_field('artical_title');?></h1>
   </div>
   <div class="articale-inside">
      <?php
         $count = 1;
         $posts = new WP_Query( array(
            'post_type'     => 'post',
            'posts_per_page'     => 3
         ) );

         while( $posts->have_posts() ) : $posts->the_post();

         $post_id = get_the_ID(); // or use the post id if you already have it
         $category_object = get_the_category($post_id);
         $category_name = $category_object[0]->name;
      ?>
      <div class="articalest-inside">
      <div class="articalest-inside-<?php echo $count ?>">
         <div class="image-wrapper" data-circle="inside-circle-<?php echo $count ?>">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            <div class="circle inside-circle-<?php echo $count ?>">
               <img src="<?php bloginfo('template_url'); ?>/assets/images/plus.png">
            </div>
         </div>
         <h3><?php echo $category_name; ?></h3>
         <a href="<?php the_permalink(); ?>">
            <h2><?php the_title(); ?></h2>
         </a>
      </div> 
      </div>
      <?php
         $count++;
         endwhile; wp_reset_postdata(); ?>
   </div>
</div>
</div>
<?php
   get_footer();
   ?>