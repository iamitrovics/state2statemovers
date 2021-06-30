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

<div class="inner-page" id="blog-single">  
    <div class="inner-page-in">
        <div class="blog-headline">
            <div class="blog-meta">
                <span><a href="<?php bloginfo('url'); ?>/blog">Blog</a></span> 
                <span><?php echo get_the_date( 'F j, Y' ); ?></span>
            </div>
            <!-- /.blog-meta -->
            <h1><?php the_title(); ?></h1>
        </div>
        <!-- /.blog-headline -->
        <div class="blog-body">

            <div class="featured-photo">
                <?php
                $imageID = get_field('featured_image_blog');
                $image = wp_get_attachment_image_src( $imageID, 'big-image' );
                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                ?> 

                <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
            </div>

            <div class="blog-content">

                <?php if( have_rows('content_layout_blog') ): ?>
                    <?php while( have_rows('content_layout_blog') ): the_row(); ?>
                        <?php if( get_row_layout() == 'intro_text' ): ?>
                        
                            <div class="blog-intro">
                                <?php the_sub_field('intro_content'); ?>
                            </div>
                            <!-- // intro  -->
                            
                        <?php elseif( get_row_layout() == 'full_width_content' ): ?>

                            <?php the_sub_field('content_block'); ?>

                        <?php elseif( get_row_layout() == 'full_width_image' ): ?>

                            <div class="blog-photo">
                                <?php
                                $imageID = get_sub_field('featured_image');
                                $image = wp_get_attachment_image_src( $imageID, 'big-image' );
                                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                ?> 

                                <img class="img-responsive" alt="<?php the_sub_field('image_alt_text'); ?>" src="<?php echo $image[0]; ?>" /> 
                                <div class="image__caption">
                                    <span><?php the_sub_field('image_caption'); ?></span>
                                </div>
                            </div>
                            <!-- /.blog-photo -->

                        <?php elseif( get_row_layout() == 'half_width_image' ): ?>

                        <?php elseif( get_row_layout() == 'quote' ): ?>

                        <?php elseif( get_row_layout() == 'video' ): ?>

                            <div class="blog-video">
                                <?php the_sub_field('embedded_code'); ?>
                            </div>
                            <!-- // video  -->

                        <?php elseif( get_row_layout() == 'accordion' ): ?>

                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>            

            </div>
            <!-- /.blog-content -->

            <div class="blog-share">
                <ul>
                    <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                </ul>
            </div>
            <!-- /.blog-share -->
            <div class="blog-navigation">
                <?php $previous = get_previous_post();
                $next = get_next_post(); ?>
                <div class="previous blog-nav-item">
                        <small>
                        <i class="fal fa-long-arrow-left"></i>
                        <div class="blog-nav-content">
                            <?php if (strlen(get_previous_post()->post_title) > 0) { ?>
                            <span class="direction">Previous</span>
                            <?php } ?>
                            <span class="title"><?php previous_post_link('%link'); ?></span>
                        </div>
                        <!-- /.blog-nav-content -->
                    </small>
                </div>
                <!-- /.previous blog-nav-item -->  
                <div class="next blog-nav-item">
                    <small>
                        <div class="blog-nav-content">
                            <?php if (strlen(get_next_post()->post_title) > 0) { ?>
                            <span class="direction">Next</span>
                            <?php } ?>
                            <span class="title"><?php next_post_link('%link'); ?></span>
                        </div>
                        <!-- /.blog-nav-content -->
                        <i class="fal fa-long-arrow-right"></i>
                    </small>
                </div>
                <!-- /.next blog-nav-item -->  
            </div>
            <!-- /.blog-navigation -->
            <div class="related-posts">
                <span class="related-posts-title">Realted posts</span>
                <!-- /.related-posts-title -->

                    <?php $orig_post = $post;
                    global $post;
                    $categories = get_the_category($post->ID);
                    if ($categories) {
                    $category_ids = array();
                    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                    $args=array(
                    'category__in' => $category_ids,
                    'post__not_in' => array($post->ID),
                    'posts_per_page'=> 2, // Number of related posts that will be shown.
                    'ignore_sticky_posts'=>1
                    );

                    $my_query = new wp_query( $args );
                    if( $my_query->have_posts() ) {
                    while( $my_query->have_posts() ) {
                    $my_query->the_post();?>

                    <div class="related-box">
                        <h4><a href="<?php get_permalink(); ?>"><?php the_title(); ?></a></h4>
                    </div>
                    <!-- /.related-box -->

                    <?
                    }
                    echo '</ul></div>';
                    }
                    }
                    $post = $orig_post;
                    wp_reset_query(); ?>

            </div>
            <!-- /.related-posts -->
        </div>
        <!-- /.blog-body -->
    </div>
    <!-- /.inner-page-in -->
</div>
<!-- /#blog-page -->    

<?php
get_footer();
