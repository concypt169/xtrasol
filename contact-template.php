<?php
/**
* Template Name: Contact-template
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
<!-------------- Contact-section ----------------->
<div class="contact-section">
    <div class="container">
        <div class="contact-header-section">
            <h5><?php the_field('contact_little_title');?></h5>
            <h1><?php the_field('contact_title');?></h1>
            <p><?php the_field('contact_description'); ?></p>
        </div>

<div class="contact-two-set">
    <div class="call-us">
    <h5><?php the_field('call_us_title');?></h5>

    <?php

if( have_rows('call_number') ):

    while( have_rows('call_number') ) : the_row();
?>
        <h2><?php the_sub_field('number-phone')?></h2>
<?php
    endwhile;

else :

endif;
?>

    </div>
    <div class="say-media">
    <div class="say-hello">
    <h5><?php the_field('say_hello_title');?></h5>
    <a href="<?php the_field('say_hello_link'); ?>">imran@extrasol.co.uk</a>
    </div>
    <div class="media">
    <?php if( get_field('media_icon_img') ): ?>
         <?php while( the_repeater_field('media_icon_img') ): ?>
            <a href="http://www.facebook.com/sharer.php?u=http://www.example.com" target="_blank"><img src="<?php the_sub_field('media-img'); ?>" alt="<?php the_sub_field('alt'); ?>" /></a>
         <?php endwhile; ?>
         <?php endif;
            ?>
    </div>
</div>
</div>
</div>
<div class="contact-form-section">
    <div class="container">
    <div class="contact-txt">
    <h1><?php the_field('form_title');?></h1>
    </div>

    <?php echo do_shortcode( '[contact-form-7 id="349" title="contact form"]' ) ?>
    </div>
</div>
</div>
<?php
get_footer();
?>