<?php
/**
* Template Name: Careers-template
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
<div class="careers-section">
    <div class="container">
        <div class="careers-header-section">
            <h5><?php the_field('header_little_title');?></h5>
            <h1><?php the_field('header_title');?></h1>
            <p><?php the_field('header_description'); ?></p>
        </div>
    </div>
    <div class="collaborative-section">
        <div class="container">
            <div class="collaborative-set">
                <?php
                if( have_rows('all_collaborative') ):
                while( have_rows('all_collaborative') ) : the_row();
                ?>
                <div class="collaborative-inside">
                    <h2><?php the_sub_field('collaborative_title')?></h2>
                    <p><?php the_sub_field('collaborative_description')?></p>
                </div>
                <?php
                endwhile;
                else :
                endif;
                ?>
            </div>
        </div>
    </div>
    <div class="together-image">
        <div class="container wraper-gaid">
            <?php if( get_field('collaborative_img') ):
            $count = 1;
            ?>
            <?php while( the_repeater_field('collaborative_img') ): ?>
            <div class="together-inside<?php echo $count?>">
                <img src="<?php the_sub_field('collaborat_img'); ?>" alt="<?php the_sub_field('alt'); ?>" />
            </div>
            <?php
            $count++;
            endwhile; ?>
            <?php endif;
            ?>
        </div>
    </div>
    <div class="position-txt">
        <div class="container-fluid">
            <h1>POSITIONS</h1>
            <h2>We are need you</h2>
        </div>
    </div>
    <div class="senior-section">
        <div class="container">
            <?php
            $posts = new WP_Query( array(
            'post_type'     => 'uncareer',
            'posts_per_page'     => 5,
            ) ); ?>
            <div class="senior-wrapper">
                <?php while( $posts->have_posts() ) : $posts->the_post();
                ?>
                <div class="senior-slide">
                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>