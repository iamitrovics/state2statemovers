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


                    <div id="city-reviews">
                        <h4>Reviews</h4>
                        <div class="row reviews-list">

                        <?php
                            $post_objects = get_field('reviews_list_service_single');

                            if( $post_objects ): ?>
                                <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                    <?php setup_postdata($post); ?>


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

                                <?php endforeach; ?>
                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                        <?php endif; ?>             

                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- // city reviews  -->

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
    $imageID = get_field('featured_image_service_cont');
    $image = wp_get_attachment_image_src( $imageID, 'galthumb-image' );
    $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
    ?> 


    <script type="application/ld+json">
{
    "@context": "https://schema.org/", 
    "@type": "Product", 
    "name": "<?php the_title(); ?>",
    "image": "<?php echo $image[0]; ?>",
    "description": "<?php the_field('short_description_serv', false, false); ?>",
    "brand": {
        "@type": "Brand",
        "name": "State to State Moving"
    },


    <?php $post_objects = get_field('reviews_list_service_single'); ?>
        <?php $count = count(get_field('reviews_list_service_single')); ?>
        <?php $rowCount = $count; //GET THE COUNT ?>    

 

       "review": [
        
            <?php $i = 1; ?>


                <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                    <?php setup_postdata($post); ?>


                {
                    "@type": "Review",
                    "name": "<?php the_field('city_test'); ?>",
                    "reviewBody": "<?php the_field('review_content_text', false, false); ?>",
                    "reviewRating": {
                    "@type": "Rating",

                    <?php if (get_field('rating_reviewer') == '5') { ?>
                        "ratingValue": "5",
                    <?php } elseif (get_field('rating_reviewer') == '4') { ?>
                        "ratingValue": "4",
                    <?php } elseif (get_field('rating_reviewer') == '3') { ?>
                        "ratingValue": "3",
                    <?php } elseif (get_field('rating_reviewer') == '2') { ?>
                        "ratingValue": "2",
                    <?php } elseif (get_field('rating_reviewer') == '1') { ?>
                        "ratingValue": "1",
                    <?php } ?>  

                    "bestRating": "5",
                    "worstRating": "1"
                    },
                    "datePublished": "<?php echo get_the_date( 'F j, Y' ); ?>",
                    "author": {"@type": "Person", "name": "<?php the_title(''); ?>"},
                    "publisher": {"@type": "Organization", "name": "State2State Movers"}
                }


                <?php if($i < $rowCount): ?>
                    ,
                <?php endif; ?>


                
                

                <?php
                $rating = get_field('rating_reviewer');
                $ratingsArray[$i++] += get_field('rating_reviewer');
                ?>                

                <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
        
        ] ,

        "aggregateRating": {
            "@type": "AggregateRating",
            <?php
                $totalRatings =  array_sum($ratingsArray);      
                $totalCountReview = $totalRatings  / $rowCount ;
            ?>
            "ratingValue": "<?php echo round($totalCountReview , 1); ?>",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "<?php echo $rowCount; ?>",
            "reviewCount": "<?php echo $rowCount; ?>"
        }


    }
    </script>

<?php
get_footer();
