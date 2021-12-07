<?php
/**
 * The template for displaying all single posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

    <div id="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
					<?php 
					$values = get_field( 'custom_main_title_city_header' );
					if ( $values ) { ?>
						<h1><?php the_field('custom_main_title_city_header'); ?></h1>
					<?php 
					} else { ?>
						<h1><?php the_title(); ?></h1>
					<?php } ?>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#inner-header -->
    <div class="inner-page" id="city-page">
        <div class="inner-page-in">
            <div class="row">
                <div class="col-lg-9 city-content-wrap">
                    <div class="city-content">

                    <?php if( have_rows('content_layout_city_page') ): ?>
                        <?php while( have_rows('content_layout_city_page') ): the_row(); ?>

                            <?php if( get_row_layout() == 'full_width_content' ): ?>

                                <?php the_sub_field('content_block'); ?>

                            <?php elseif( get_row_layout() == 'image_left_text_right' ): ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="image-holder">
                                            <?php
                                            $imageID = get_sub_field('featured_image');
                                            $image = wp_get_attachment_image_src( $imageID, 'big-image' );
                                            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                            ?> 

                                            <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" />                         
                                        </div>
                                    </div> <!-- col-md-6 -->
                                    <div class="col-md-6">
                                        <?php the_sub_field('content_block'); ?>
                                    </div> <!-- col-md-6 -->
                                </div>
                                <!-- /.row -->   

                            <?php elseif( get_row_layout() == 'image_right_text_left' ): ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <?php the_sub_field('content_block'); ?>
                                    </div> <!-- col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="image-holder">
                                            <?php
                                            $imageID = get_sub_field('featured_image');
                                            $image = wp_get_attachment_image_src( $imageID, 'big-image' );
                                            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                            ?> 

                                            <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" />                         
                                        </div>
                                    </div> <!-- col-md-6 -->
                                </div>
                                <!-- /.row -->   

                            <?php elseif( get_row_layout() == 'full_width_image' ):  ?>

                                <div class="image-holder">
                                    <?php
                                    $imageID = get_sub_field('featured_image');
                                    $image = wp_get_attachment_image_src( $imageID, 'big-image' );
                                    $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                    ?> 

                                    <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" />                         
                                </div>

                            <?php elseif( get_row_layout() == 'accordion' ): ?>

                                <div class="default-accordion blog__acc">
                                    <h3><?php the_sub_field('accordion_title'); ?></h3>
                                    <?php if( have_rows('accordion_list') ): ?>
                                        <?php while( have_rows('accordion_list') ): the_row(); ?>

                                            <div class="faq-box">
                                                <h4><?php the_sub_field('heading'); ?></h4>

                                                <div>
                                                    <?php the_sub_field('content'); ?>
                                                    <!-- /.faq-box -->
                                                </div>
                                                <!-- /.faq-box -->
                                            </div>

                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                                <!-- /.default-accordion -->  

                            <?php elseif( get_row_layout() == 'gallery' ): ?>
                                    
                                <div class="row">

                                    <?php 
                                    $images = get_sub_field('photo_gallery');
                                    if( $images ): ?>
                                        <?php foreach( $images as $image ): ?>
                                            <div class="col-md-3">
                                                <img src="<?php echo $image['sizes']['thumb-image']; ?>" class="img-responsive" alt="<?php echo $image['alt']; ?>" />
                                            </div>
                                            <!-- /.col-md-3 -->
                                        <?php endforeach; ?>
                                    <?php endif; ?>                

                                </div>
                                <!-- /.row -->                                

                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    </div>
                    <!-- /.city-content -->
                </div>
                <!-- /.col-lg-9 -->
                <div class="col-lg-3">
                    <div class="city-form">
                        <h2><?php the_field('main_title_sidebar_form', 'options'); ?></h2>
                        <?php the_field('form_code_sidebar', 'options'); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="call-us-area">
                                        <p><?php the_field('phone_label_sidebar', 'options'); ?></p>
                                        <a href="tel:<?php the_field('phone_number_city_sidebar'); ?>"><strong><?php the_field('phone_number_city_sidebar'); ?></strong></a>
                                        <div class="city-socials">

                                            <?php if( have_rows('socials_list_sidebar') ): ?>
                                                <?php while( have_rows('socials_list_sidebar') ): the_row(); ?>

                                                <?php if (get_sub_field('social_network') == 'Google+') { ?>
                                                    <a href="<?php the_sub_field('link_to_network'); ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                                                <?php } elseif (get_sub_field('social_network') == 'Yelp') { ?>
                                                    <a href="<?php the_sub_field('link_to_network'); ?>" target="_blank"><i class="fab fa-yelp"></i></a>
                                                <?php } ?>   

                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                        </div>
                                        <!-- /.city-socials -->
                                    </div>
                                    <!-- /.call-us-area -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                    </div>
                    <!-- /.city-form -->
                </div>
                <!-- /.col-lg-3 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.inner-page-in -->
    </div>
    <!-- /.inner-page -->  

<?php
get_footer();
?>

