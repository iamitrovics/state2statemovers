<?php
/**
 * Template Name: Reviews Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<div id="masheader" class="estimate-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="masheader-content">
                    <h1><?php the_field('main_title_reviews_page_header'); ?></h1>
                    <span class="header-subtitle"><?php the_field('main_subtitle_reviews_page'); ?></span>
                    <!-- /.header-subtitle -->
                    <div class="get-quote">
                        <div class="get-quote--body" id="review-form">
                            <?php the_field('form_code_reviews_page'); ?>
                        </div>
                        <!-- /.get-quote--body -->
                    </div>
                    <!-- /.get-quote -->
                </div>
                <!-- /#masheader-content -->
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /#masheader -->
<div class="inner-page full-width" id="reviews">
    <div class="inner-page-in">

        <?php if( have_rows('video_reviews_list_repe') ): ?>
            <?php while( have_rows('video_reviews_list_repe') ): the_row(); ?>

                <div class="review-video">
                    <?php the_sub_field('review_code'); ?>
                </div>
                <!-- /.review-video -->

            <?php endwhile; ?>
        <?php endif; ?>

        <div class="reviews-list">
            <div class="row">

                <?php
                $loop = new WP_Query( array( 'post_type' => 'reviews', 'posts_per_page' => 9999) ); ?>  
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <div class="col-md-6">
                        <div class="review-item">
                            <div class="star-area">
                                <span class="mr-star-rating"> 

                                    <?php if (get_field('rating_reviewer') == '5') { ?>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    <?php } elseif (get_field('rating_reviewer') == '4') { ?>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    <?php } elseif (get_field('rating_reviewer') == '3') { ?>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    <?php } elseif (get_field('rating_reviewer') == '2') { ?>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    <?php } elseif (get_field('rating_reviewer') == '1') { ?>
                                        <i class="fas fa-star"></i>
                                    <?php } ?>   

                                </span>
                            </div>
                            <div class="review-text">
                                <?php the_field('review_content_text'); ?>
                            </div>
                            <!-- /.review-text -->
                            <span class="review-author"><?php the_title(); ?></span>
                        </div>
                        <!-- /.review-item -->
                    </div>
                    <!-- /.col-md-6 -->

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>                  

            </div>
            <!-- /.row -->
        </div>
        <!-- /.review-list -->
    </div>
    <!-- /.inner-page-in -->
</div>
<!-- /.inner-page -->

<?php get_footer(); ?>
