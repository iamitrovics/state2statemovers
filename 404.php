<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div id="inner-header" class="search-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-header-nav">
                        <ul>
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                            <li>Error 404</li>
                        </ul>
                    </div>
                    <!-- /.inner-header-nav -->
                    <h1><?php the_field('header_title_ermac', 'options'); ?></h1>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#inner-header -->
    <div class="inner-page" id="blog-listing">
        <div class="inner-page-in">

				<?php if (!have_posts()): ?>

	            <div id="no-post">
                    <h2><?php the_field('main_title_ermac', 'options'); ?></h2>
                    <?php the_field('content_block_ermac', 'options'); ?>
	           </div>

				<?php endif; ?>	        

        <?php while ( have_posts() ) : the_post(); ?>

                <div class="blog-item">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="blog-photo">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="img/misc/blog-list.jpeg" alt="">
                                </a>
                            </div>
                            <!-- /.blog-photo-->
                        </div>
                        <!-- /.col-md-4 -->
                        <div class="col-md-8">
                            <div class="blog-content">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <span class="date"><a href="<?php the_permalink(); ?>">Read More</a></span>
                            </div>
                            <!-- /.blog-content -->
                        </div>
                        <!-- /.col-md-8 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.blog-item -->

            <?php endwhile; // end of the loop. ?> 

            <div class="custom-pager">

            </div>
            <!-- /.custom-pager -->
        </div>
        <!-- /.inner-page-in -->
    </div>
    <!-- /.inner-page -->

<?php
get_footer();
