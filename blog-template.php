<?php
/**
* Template Name: Blog-template
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

<div class="blog-section">
    <div class="container">
    <div class="blog-header">
    <h5><?php the_field('blog_little_title');?></h5>
    <h1 data-aos="zoom-in" data-aos-easing="ease-out-back" data-aos-duration="1000"><?php the_field('blog_title');?></h1>
    <p data-aos="zoom-in" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="20"><?php the_field('blog_description'); ?></p>
    </div>
    <div class="blog-data">
    <?php
        //$categories = get_terms( array( 'taxonomy' => 'category' ) );
        $categories = get_categories();
        //var_dump($categories);
        foreach( $categories as $cat ) :
        //var_dump(categories);
        $posts = new WP_Query( array(
        'post_type'     => 'post',
        'posts_per_page'     => 5,
        'tax_query'     => array(
        array(
        'taxonomy' => 'category',
        'terms'    => array( $cat->term_id ),
        'field'   => 'term_id'
        )
        )
        ) );
        //var_dump($posts);
        ?>
        <?php while( $posts->have_posts() ) : $posts->the_post(); ?>
        <div class="blog-inside">
            <a href="<?php the_permalink(); ?>">
                <?php
                $image_url = wp_get_attachment_url( get_post_thumbnail_id($posts->ID) );
                // print_r($image_url);
                // the_post_thumbnail(); 
                ?>
                <img data-aos="zoom-in" data-aos-easing="ease-out-back" data-aos-duration="1000" src="<?php echo $image_url; ?>">
            </a>
            <div class="project-text">
                <h4><?php echo get_the_date(); ?></h4>
                <a href="<?php the_permalink(); ?>">
                    <h2><?php the_title(); ?></h2></a>
                <h3><?php echo $cat->name; ?></h3>
            </div>
        </div>
        <?php
        endwhile; wp_reset_postdata();
        endforeach; ?>
    </div>
</div>
</div>

<?php
get_footer();
?>