<?php
/*
 * Template Name: Parent Child Template
 * Template Post Type: post
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
            <div class="blog-meta">
                <span class="meta-author-cat">Posted in
                            
                    <?php
                    global $post;
                    $categories = get_the_category($post->ID);
                    $cat_link = get_category_link($categories[0]->cat_ID);
                    echo '<a href="'.$cat_link.'">'.$categories[0]->cat_name.'</a>' 
                    ?>
                </span>
                <div class="author-desc">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
                    <div class="author-content">
                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
                        <p><?php the_author_description(); ?></p>
                    </div>
                    <!-- /.author-content -->
                </div>
            </div>
            <!-- /.blog-meta -->
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

                <?php if( have_rows('list_of_posts_parent') ): ?>
                <div id="post-nav">
                    <div class="post-wrapper">                           
                        <div id="nav-slider">
                            
                                <?php while( have_rows('list_of_posts_parent') ): the_row(); ?>

                                    <div class="item">
                                        <div class="nav-col">
                                            <a href="<?php the_sub_field('link_to_post'); ?>">
                                                <span><?php the_sub_field('label'); ?></span>

                                                <div class="icon">
                                                    <img src="<?php the_sub_field('icon'); ?>" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <!-- // col  -->
                                    </div>

                                <?php endwhile; ?>
                            
                        </div>
                        <!-- // nav  -->
                    </div>
                    <!-- // wrapper  -->
                </div>
                <!-- // post nav  -->
                <?php endif; ?>                

            <div class="blog-content">

                <?php if( have_rows('content_layout_blog') ): ?>
                    <?php while( have_rows('content_layout_blog') ): the_row(); ?>
                        <?php if( get_row_layout() == 'intro_text' ): ?>
                        
                            <div class="blog-intro">
                                <?php the_sub_field('intro_content'); ?>
                            </div>
                            <!-- // intro  -->
                            
                        <?php elseif( get_row_layout() == 'full_width_content' ): ?>

                            <div class="blog-content-single">
                                <?php the_sub_field('content_block'); ?>
                            </div>
                            <!-- // content  -->

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

                        <?php elseif( get_row_layout() == 'quote_cta' ): ?>

                            <div class="quote-cta--single">
                                <span class="title"><?php the_sub_field('cta_title'); ?></span>
                                <a href="#bottom-form" class="btn-cta"><?php the_sub_field('button_label'); ?></a>
                            </div>
                            <!-- // single  -->                                          

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

            <div id="masheader-content">
                <div id="bottom-form">
                    <?php include (TEMPLATEPATH . '/inc/inc_quote_form.php' ); ?>
                </div>
            </div>
            <!-- // contentn  -->

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
            
        </div>
        <!-- /.blog-body -->
    </div>
    <!-- /.inner-page-in -->
</div>
<!-- /#blog-page -->    

<?php
get_footer();