<?php
register_nav_menus(array(
'primary' => __('Primary Menu'),
));
    
add_theme_support( 'post-thumbnails' );
// -----------links
function extrasol_register_styles(){
wp_enqueue_style('stylesheet', get_stylesheet_uri(), [], filemtime( get_template_directory().'/style.css')) ;
wp_enqueue_style('contact-style', get_template_directory_uri() . "/assets/css/contact-template.css" , array(), '1.0', 'all');
wp_enqueue_style('what-we-do-style', get_template_directory_uri() . "/assets/css/what-we-do-template.css" , array(), '1.0', 'all');
wp_enqueue_style('careers-style', get_template_directory_uri() . "/assets/css/careers-template.css" , array(), '1.0', 'all');
wp_enqueue_style('blog-style', get_template_directory_uri() . "/assets/css/blog-template.css" , array(), '1.0', 'all');
wp_enqueue_style('work-style', get_template_directory_uri() . "/assets/css/work-template.css" , array(), '1.0', 'all');
wp_enqueue_style('about-style', get_template_directory_uri() . "/assets/css/about-template.css" , array(), '1.0', 'all');
wp_enqueue_style('main-style', get_template_directory_uri() . "/assets/css/main.css" , array(), '1.0', 'all');
wp_enqueue_style('fonts', get_template_directory_uri() . "/assets/fonts" , array(), '1.0', 'all');
wp_enqueue_style('bootstrap', get_template_directory_uri() . "/assets/bootstrap/css/bootstrap.min.css" , array(), '1.0', 'all');
wp_enqueue_style('animation-css', get_template_directory_uri() . "/assets/css/animation.css" , array(), '1.0', 'all');
wp_enqueue_script('jquery', get_template_directory_uri() . "/assets/js/jquery.js" , array(), );
wp_enqueue_style('icons',  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css");
wp_enqueue_style('swiper-css',  "https://unpkg.com/swiper@8/swiper-bundle.min.css");
wp_enqueue_script('swiper-js',  "https://unpkg.com/swiper@8/swiper-bundle.min.js");
wp_enqueue_script('BGStock-js',  "https://rawgit.com/BGStock/jquery-background-video/master/jquery.background-video.js");
wp_enqueue_script('tweenmax-js', get_template_directory_uri() . "/assets/library/TweenMax.min.js" , array(), );
wp_enqueue_style('aos-animation-css', get_template_directory_uri() . "/assets/library/aos.css" , array(), );
wp_enqueue_script('aos-animation-js', get_template_directory_uri() . "/assets/library/aos.js" , array(), );
wp_enqueue_script('custom-js', get_template_directory_uri() . "/assets/js/main.js" , array(), );
wp_enqueue_script('animation-js', get_template_directory_uri() . "/assets/js/animation.js" , array(), );
wp_enqueue_style('globalbtn', get_template_directory_uri() . "/assets/css/globalbtn.css" , array(), '1.0', 'all');
wp_enqueue_script('globalbtn', get_template_directory_uri() . "/assets/js/globalbtn.js" , array(), );
}
add_action('wp_enqueue_scripts', 'extrasol_register_styles');
// ---------- Add Our Widget Locations
function ourWidgetsInit(){
     register_sidebar( array(
          'name' => 'back-video',
          'id' => 'back-video'
     ));
}
add_action('widgets_init', 'ourWidgetsInit');

/* Enable video header support */
add_theme_support( 'custom-header', array(
     'video' => true
));

// ---------------Custom-post-type
function my_first_post_type()
{
     $args = array(
          'labels' => array(

               'name' => 'Services',
               'singular_name' => 'Service'
          ),
          'hierarchical' => true,
          'public' => true,
          'has_archive' => true,
          'menu_icon' => 'dashicons-images-alt2',
          'supports' => array('title', 'editor', 'thumbnail','excerpt', 'comments'),
          'supports' => ['title', 'editor', 'thumbnail'],
     );
     register_post_type('cars', $args);
}
add_action('init', 'my_first_post_type');

// ---------------Custom-post-type-end
function my_first_taxonomy()
{
     $args = array (
          'labels' => array(
          'name' => 'Brands',
          'singular_name' => 'Brand',
     ),
     'public' => true,
     'hierarchical' => true,
     );
     register_taxonomy('brands', array('cars'), $args);
}
add_action('init', 'my_first_taxonomy');

// ---------------Second-Custom-post-type
function my_second_post_type()
{
     $args = array(
          'labels' => array(

          'name' => 'Our Works',
          'singular_name' => 'Our Work'
     ),
     'hierarchical' => true,
     'public' => true,
     'has_archive' => true,
     'menu_icon' => 'dashicons-admin-generic',
     'supports' => array('title', 'editor', 'thumbnail','excerpt', 'comments'),
     );
     register_post_type('works', $args);
}
add_action('init', 'my_second_post_type');

function my_second_taxonomy()
{
     $args = array (
          'labels' => array(
          'name' => 'Work Type',
          'singular_name' => 'Work Type',
     ),
     'public' => true,
     'hierarchical' => true,
     );
     register_taxonomy('work-type', array('works'), $args);
}
add_action('init', 'my_second_taxonomy');

// ---------------Third-Custom-post-type
function Testimonial_post_type()
{
     $args = array(
          'labels' => array(

          'name' => 'Testimonials',
          'singular_name' => 'Testimonial'
     ),
     'hierarchical' => true,
     'public' => true,
     'has_archive' => true,
     'menu_icon' => 'dashicons-testimonial',
     'supports' => array('title', 'editor', 'thumbnail','excerpt', 'comments'),
     );
     register_post_type('testimonial', $args);
}
add_action('init', 'Testimonial_post_type');

function Testimonial_taxonomy()
{
     $args = array (
          'labels' => array(
          'name' => 'Client Type',
          'singular_name' => 'Client Type',
     ),
     'public' => true,
     'hierarchical' => true,
     );
     register_taxonomy('client-type', array('testimonial'), $args);
}
add_action('init', 'Testimonial_taxonomy');

// ---------------Forth-Custom-post-type
function Insights_post_type()
{
     $args = array(
          'labels' => array(

          'name' => 'News & Insights',
          'singular_name' => 'New & Insight'
     ),
     'hierarchical' => true,
     'public' => true,
     'has_archive' => true,
     'menu_icon' => 'dashicons-format-aside',
     'supports' => array('title', 'editor', 'thumbnail','excerpt', 'comments'),
     );
     register_post_type('new-insight', $args);
}
add_action('init', 'Insights_post_type');

function Insights_taxonomy()
{
     $args = array (
          'labels' => array(
          'name' => 'New Type',
          'singular_name' => 'New Type',
     ),
     'public' => true,
     'hierarchical' => true,
     );
     register_taxonomy('new-type', array('new-insight'), $args);
}
add_action('init', 'Insights_taxonomy');

// ---------------Custom-post-type
function related_articles_post_type()
{
     $args = array(
     'labels' => array(
          'name' => 'Related Articles',
          'singular_name' => 'Related Article'
     ),
     'hierarchical' => true,
     'public' => true,
     'has_archive' => true,
     'menu_icon' => 'dashicons-welcome-write-blog',
     'supports' => array('title', 'editor', 'thumbnail','excerpt', 'comments'),
     'supports' => ['title', 'editor', 'thumbnail'],
     );
     register_post_type('related-article', $args);
}
add_action('init', 'related_articles_post_type');

// ---------------Custom-post-type-end
function related_articles_taxonomy()
{
$args = array (
     'labels' => array(
          'name' => 'Article Type',
          'singular_name' => 'Article Type',
     ),
     'public' => true,
     'hierarchical' => true,
     );
     register_taxonomy('article-type', array('related-article'), $args);
}
add_action('init', 'related_articles_taxonomy');

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'cars', 'excerpt' ); //change page with your post type slug.
}

// ---------------Careers-Custom-post-type
function career_post_type()
{
$args = array(
     'labels' => array(
          'name' => 'Career',
          'singular_name' => 'Career'
     ),
     'hierarchical' => true,
     'public' => true,
     'has_archive' => true,
     'menu_icon' => 'dashicons-welcome-learn-more',
     'supports' => array('title', 'editor', 'thumbnail','excerpt', 'comments'),
     'supports' => ['title', 'editor', 'thumbnail'],
     );
     register_post_type('uncareer', $args);
}
add_action('init', 'career_post_type');

// ---------------Custom-post-type-end
function career_taxonomy()
{
     $args = array (
          'labels' => array(
          'name' => 'Career Type',
          'singular_name' => 'Career Type',
     ),
     'public' => true,
     'hierarchical' => true,
     );
     register_taxonomy('career-type', array('uncareer'), $args);
}
add_action('init', 'career_taxonomy');
?>
