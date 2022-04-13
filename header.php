<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <title><?php bloginfo('name'); ?></title>
        <?php wp_head(); ?>
    </head>
    <body class="<?php body_class(); ?>">
        <!----Nav-Bar---->
        <div class="hd-nav">
            <div class="extra-log">
            <a href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/new-logo.png"></a>
            </div>
            <nav class="sit-nav">
                <?php
                $args = array(
                    'theme_location' => 'primary'
                );
                ?>
                <?php wp_nav_menu( $args ); ?>

            </nav>
            <div class="contact-bts">
            <a href="http://localhost/Extrasol/contact/">Contact</a>
            </div>
        </div>

        
         <!----Nav-Bar-responsive---->
         <div class="hd-nav-responsive">
            <div class="extra-log-respon">
            <a href="<?php the_field(''); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/res-logo.png"></a>
            </div>
            <nav class="sit-nav-respon">
            <div class="extra-log-bar">
            <a href="<?php the_field(''); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/Mask-Group.png"></a>
            </div>
            <span class="closebtn" onclick="closeNav()">&times;</span>
            <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
                <?php
                $args = array(
                    'theme_location' => 'primary'
                );
                ?>
                <!-- <div class="contact-bts-respon">
                <a href="#">Contact</a>
                </div> -->
                <span style="font-size:30px;cursor:pointer" onclick="openNav()" id="btnopen"><img src="<?php bloginfo('template_url'); ?>/assets/images/Group-37.png"></span>
                <?php wp_nav_menu( $args ); ?>
            </nav>
            
        </div>



                