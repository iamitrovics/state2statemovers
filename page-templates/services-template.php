<?php
/**
 * Template Name: Services Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

    <div id="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
					<?php 
					$values = get_field( 'custom_title_serv_header' );
					if ( $values ) { ?>
						<h1><?php the_field('custom_title_serv_header'); ?></h1>
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

        <section id="services">
            <div class="container">
                <div class="row">
                    <?php
                    $loop = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => 115) ); ?>  
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            
                        <div class="col-md-4">
                            <div class="about-photo">
                                <a href="<?php the_permalink(); ?>">
                                    <span><i class="fal fa-long-arrow-right"></i></span>
                                    <?php
                                    $imageID = get_field('featured_image_service_cont');
                                    $image = wp_get_attachment_image_src( $imageID, 'galthumb-image' );
                                    $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                    ?> 

                                    <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                </a>
                            </div>
                            <!-- /.about-photo -->
                            <div class="about-content">
                                <h2><?php the_title(); ?></h2>
                                <a href="<?php the_permalink(); ?>" class="learn-btn">Learn more</a>
                                <!-- /.learn-btn -->
                            </div>
                            <!-- /.about-content -->
                        </div>
                        <!-- /.col-md-4 -->
                                

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>   
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /#services -->

<?php get_footer(); ?>

