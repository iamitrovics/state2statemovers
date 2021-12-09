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
					$values = get_field( 'main_title_header_regular' );
					if ( $values ) { ?>
						<h1><?php the_field('main_title_header_regular'); ?></h1>
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
    <div class="inner-page" id="services-page">
        <div class="inner-page-in">

                <div class="row">
                    <div class="col-lg-9 city-content-wrap">

                        <?php if( have_rows('content_layout_regular') ): ?>
                            <?php while( have_rows('content_layout_regular') ): the_row(); ?>

                                <?php if( get_row_layout() == 'full_width_content' ): ?>
                                
                                    <?php the_sub_field('content_block'); ?>

                                <?php elseif( get_row_layout() == 'full_width_image' ): ?>
                                    <div class="image-holder">
                                        <?php
                                        $imageID = get_sub_field('featured_image');
                                        $image = wp_get_attachment_image_src( $imageID, 'big-image' );
                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                        ?> 

                                        <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" />                         
                                    </div>
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

                                    <?php elseif( get_row_layout() == 'video' ): ?>

                                        <div class="blog-video">
                                            <?php the_sub_field('embedded_code'); ?>
                                        </div>
                                        <!-- // video  -->

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

                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>

                        <div id="masheader-content">
                            <div id="bottom-form">
                                <?php include (TEMPLATEPATH . '/inc/inc_quote_form.php' ); ?>
                            </div>
                        </div>
                        <!-- // contentn  -->
                    </div>
                    <!-- /.col-lg-9 -->
                    <div class="col-lg-3">
                        <div class="city-form">
                            <h2 class="services-page-heading"><?php the_field('main_title_sidebar_form', 'options'); ?></h2>
                            <?php the_field('form_code_sidebar', 'options'); ?>
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
