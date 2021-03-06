<?php get_header(); ?>

    <div id="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?php the_field('main_title_blog_page', get_option('page_for_posts')); ?></h1>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#inner-header -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-filters">
                    <ul>
                        <li><a href="<?php bloginfo('url'); ?>/blog" class="active">All</a></li>
                        <?php wp_list_categories('title_li='); ?>
                    </ul>
                </div>
                <!-- /.blog-filters -->
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <div class="inner-page" id="blog-listing">
        <div class="inner-page-in">

        <?php
          $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1; // get current page number
          $args = array(
            'posts_per_page' => 8, // the value from Settings > Reading by default
            'paged'          => $current_page // current page
          );
          query_posts( $args );
           
          $wp_query->is_archive = true;
          $wp_query->is_home = false;
           
          while(have_posts()): the_post(); ?>
                              
            <div class="blog-item">
                <div class="row">
                    <div class="col-md-4">
                        <div class="blog-photo">
                            <a href="<?php the_permalink(); ?>">
                                <span><i class="fal fa-long-arrow-right"></i></span>
                                <?php
                                $imageID = get_field('featured_image_blog');
                                $image = wp_get_attachment_image_src( $imageID, 'blog-image' );
                                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                ?> 

                                <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                            </a>
                        </div>
                        <!-- /.blog-photo-->
                    </div>
                    <!-- /.col-md-4 -->
                    <div class="col-md-8">
                        <div class="blog-content">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php the_field('excerpt_text'); ?>
                            <span class="date"><?php echo get_the_date( 'F j, Y' ); ?></span>
                        </div>
                        <!-- /.blog-content -->
                    </div>
                    <!-- /.col-md-8 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.blog-item -->                       
          
        <?php endwhile; ?>
          
            <div class="custom-pager">
                <?php if( function_exists('wp_pagenavi') ) wp_pagenavi(); // WP-PageNavi function ?>
            </div>
            <!-- /.custom-pager -->
        </div>
        <!-- /.inner-page-in -->
    </div>
    <!-- /.inner-page -->   

<?php get_footer(); ?>
