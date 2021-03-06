<?php
/**
* Template Name: What-we-do-template
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
<!------------ What-We-Do-Section ------------>
<div class="what-we-section">
    <div class="container">
        <div class="what-header-section">
            <h5><?php the_field('header_little_title');?></h5>
            <h1 data-aos="zoom-in" data-aos-easing="ease-out-back" data-aos-duration="2000"><?php the_field('header_title');?></h1>
            <p data-aos="zoom-in" data-aos-easing="ease-out-back" data-aos-duration="2000" data-aos-delay="20"><?php the_field('header_description'); ?></p>
        </div>
        <div class="what-middle-section">
            <?php
            $categories = get_terms( array( 'taxonomy' => 'brands' ) );
            //var_dump($categories);
            foreach( $categories as $cat ) :
            //var_dump(categories);
            $posts = new WP_Query( array(
            'post_type'     => 'services',
            'posts_per_page'     => 2,
            'tax_query'     => array(
            array(
            'taxonomy' => 'brands',
            'terms'    => array( $cat->term_id ),
            'field'   => 'term_id'
            )
            )
            ) );
            ?>
            <?php while( $posts->have_posts() ) : $posts->the_post(); ?>
            <div class="what-inside">
                <div class="what-img">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                    $image_url = wp_get_attachment_url( get_post_thumbnail_id($posts->ID) );
                    // print_r($image_url);
                    // the_post_thumbnail(); 
                    ?>
                    <img data-aos="zoom-in" data-aos-easing="ease-out-back" data-aos-duration="1000" src="<?php echo $image_url; ?>">    
                </a>
                </div>
                <div class="what-rape">
                    <h2 data-aos="zoom-in" data-aos-easing="ease-out-back" data-aos-duration="1000"><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                    <a href="<?php the_permalink(); ?>">
                        <h6>EXPLORE MORE</h6>
                    </a>
                </div>
            </div>
            <?php
            endwhile; wp_reset_postdata();
            endforeach; ?>
        </div>
        </div>
        <!-------------- Holistic-Approach --------------->
        <div class="Holistic-Approach">
            <div class="container">
            <div class="inside-title">
                <h1 data-aos="zoom-in" data-aos-easing="ease-out-back" data-aos-duration="3000"><?php the_field('holistic_approach_title'); ?></h1>
            </div>
            <div class="repeter-wrape">
            <?php
                $count = 1;
                if( have_rows('holistic_approach_reapter') ):

                    while( have_rows('holistic_approach_reapter') ) : the_row();
?>
                    <div class="repeter-data">
                        <h5>0<?php echo $count?></h5>
                        <h1 ><?php the_sub_field('holistic_title') ?></h1>
                        <p><?php the_sub_field('holistic_description') ?></p>
                        </div>

                        <?php
                    $count++;
                    endwhile;

                else :

                endif;
                ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>