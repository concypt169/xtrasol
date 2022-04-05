<?php
/**
* Template Name: Work-template
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
<div class="work-section">
    <div class="container">
<div class="work-head-section">
    <h6><?php the_field('work_little_title');?></h6>
    <h1><?php the_field('work_title');?></h1>
    <p><?php the_field('work_description'); ?></p>
</div>
            <!---------------- Project-Work-Section ------------------->
<div class="project-work">
    <?php
                $categories = get_terms( array( 'taxonomy' => 'work-type' ) );
                //var_dump($categories);
                $count = 1;
                foreach( $categories as $cat ) :
                //var_dump(categories);
                $posts = new WP_Query( array(
                'post_type'     => 'works',
                'posts_per_page'     => 1,
                'tax_query'     => array(
                array(
                'taxonomy' => 'work-type',
                'terms'    => array( $cat->term_id ),
                'field'   => 'term_id'
                )
                )
                ) );
               
                ?>
                <?php while( $posts->have_posts() ) : $posts->the_post();
                ?>
                <div class="project-inside">
                <div class="project-rape">
                <h5>0<?php echo $count ?></h5>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                </div>
                <div class="project-text">
                    <h2><?php the_title(); ?></h2>
                    <h3><?php echo $cat->name; ?></h3>
                    <a href="<?php the_permalink(); ?>"><h6>EXPLORE ALL Projects</h6></a>
                </div>
                </div>
                <?php
            $count++;
            endwhile; wp_reset_postdata(); ?>
                
                <?php endforeach; ?>
            </div>
        </div>
        <div class="project-min">
        <a href="<?php the_permalink(); ?>"><h6>EXPLORE ALL Projects</h6></a>
        </div>
</div>
</div>







</div>
<?php
get_footer();
?>