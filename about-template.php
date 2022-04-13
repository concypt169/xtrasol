<?php
/**
* Template Name: about-template
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages and that
* other "pages" on your WordPress site will use a different template.
*
* @package WordPress
* @subpackage  Extrasol
* @since  Extrasol
*/
get_header();
?>
<div class="about-page">
<!---------------- About-header --------------->
<div class="about-header">
    <div class="container-fliud">
        <div class="about-set">
            <div class="about-head-txt">
                <h5><?php the_field('header_lite_title');?></h5>
                <h1 data-aos="zoom-in" data-aos-easing="ease-out-back" data-aos-duration="2000"><?php the_field('header_title');?></h1>
                <p data-aos="zoom-in" data-aos-easing="ease-out-back" data-aos-duration="2000" data-aos-delay="20"><?php the_field('header_description'); ?></p>
            </div>
            <div class="about-head-image">
                <?php if( get_field('header_img') ):
                $count = 1;
                ?>
                <?php while( the_repeater_field('header_img') ): ?>
                <div class="image-wrapper-<?php echo $count ?>">
                    <img data-aos="zoom-in" data-aos-easing="ease-out-back" data-aos-duration="2000" data-aos-delay="<?php echo $count ?>0" src="<?php the_sub_field('head_warp_img'); ?>" alt="<?php the_sub_field('alt'); ?>" />
                </div>
                <?php
                $count++;
                endwhile; ?>
                <?php endif;
                ?>
            </div>
        </div>
    </div>
</div>
<!---------------- Banner-image --------------->
<div class="banner-img">
    <?php if( get_field('banner_image') ): ?>
    <img src="<?php the_field('banner_image'); ?>" />
    <?php endif; ?>
</div>
<!---------------- Digital-Agency --------------->
<div class="digital-agency">
    <div class="build-txt">
        <h5><?php the_field('digital_litel_title');?></h5>
        <h1 data-aos="zoom-in" data-aos-easing="ease-out-back" data-aos-duration="2000"><?php the_field('digital_title');?></h1>
        <a href="<?php the_field('digital_link'); ?>"><h6>EXPLORE ALL Projects</h6></a>
    </div>
</div>
<!---------------- Our-Services --------------->
<div class="our-services">
    <?php
    // $categories = get_terms( array( 'taxonomy' => 'brands' ) );
    // //var_dump($categories);
    // foreach( $categories as $cat ) :
    //var_dump(categories);
    $posts = new WP_Query( array(
    'post_type'     => 'cars',
    'posts_per_page'     => 5
    )
    ); 
        $count = 2;
    ?>
    <a href="<?php the_permalink(); ?>">
        <div class="our-wrap-txt" data-aos="zoom-in" data-aos-easing="ease-out-back" data-aos-duration="2000">
            <h2>Our Services</h2>
        </div></a>
        <?php while( $posts->have_posts() ) : $posts->the_post();
        $post_id = get_the_ID(); // or use the post id if you already have it
        $category_object = get_the_category($post_id);
        //print_r(get_the_term_list($post_id, 'brands'));
        $productcategories = wp_get_object_terms($post_id, 'brands');
        //print_r($productcategories);
        ?>
        <a href="<?php the_permalink(); ?>" class="box-link">
            <div class="our-wrap" data-aos="zoom-in" data-aos-easing="ease-out-back" data-aos-duration="2000" data-aos-delay="<?php echo $count ?>0">
                <h3><?php echo $productcategories[0]-> name ?></h3>
                <p><?php echo $productcategories[0]-> description ?></p>
            </div>
        </a>
        <?php
            $count++;
            $count = $count * 2; 
            endwhile; 
            wp_reset_postdata(); 
        ?>
        
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
                ) ); ?>
                <div class="waves">
                    <h1 data-aos="zoom-in" data-aos-easing="ease-out-back" data-aos-duration="2000"><?php the_field('fluid_title');?></h1>
                </div>
                <div class="logo-repet">
                    <?php if( get_field('fluid_image') ): ?>
                    <?php while( the_repeater_field('fluid_image') ): ?>
                    <img src="<?php the_sub_field('fliude_imag'); ?>" alt="<?php the_sub_field('alt'); ?>" />
                    <?php endwhile; ?>
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
                                    <h2><?php the_field('testi_title');?></h2>
                                    <div class="titl-head">
                                        <h5><?php the_field('founder_title');?></h5>
                                        <a href="<?php the_permalink(); ?>"><h6>Read Case Study</h6></a>
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
    <!----- Related Articles ------>
<div class="related-articlest-section">
   <div class="container">
   <div class="related-inside">
      <h1><?php the_field('artical_title');?></h1>
   </div>
   <div class="articale-inside">
      <?php
         $categories = get_terms( array( 'taxonomy' => 'article-type' ) );
         //var_dump($categories);
         $count = 1;
         foreach( $categories as $cat ) :
         //var_dump(categories);
         $posts = new WP_Query( array(
         'post_type'     => 'related-article',
         'posts_per_page'     => 3,
         'tax_query'     => array(
         array(
         'taxonomy' => 'article-type',
         'terms'    => array( $cat->term_id ),
         'field'   => 'term_id'
         )
         )
         ) );
         
         ?>
      <?php while( $posts->have_posts() ) : $posts->the_post(); ?>
      <div class="articalest-inside">
      <div class="articalest-inside-<?php echo $count ?>">
         <div class="image-wrapper" data-circle="inside-circle-<?php echo $count ?>">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            <div class="circle inside-circle-<?php echo $count ?>">
               <img src="<?php bloginfo('template_url'); ?>/assets/images/plus.png">
            </div>
         </div> 
         <h3><?php echo $cat->name; ?></h3>
         <a href="<?php the_permalink(); ?>">
            <h2><?php the_title(); ?></h2>
         </a>
      </div>
      </div>
      <?php
         $count++;
         endwhile; wp_reset_postdata();
         endforeach; ?>
   </div>
</div>
</div>
</div>
    <?php
    get_footer();
    ?>