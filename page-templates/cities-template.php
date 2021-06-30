<?php
/**
 * Template Name: Cities We Serve Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

    <div class="inner-page" id="regular-page">
        <div class="inner-page-in">

            <?php 
            $values = get_field( 'custom_title_cities_header' );
            if ( $values ) { ?>
                <h1><?php the_field('custom_title_cities_header'); ?></h1>
            <?php 
            } else { ?>
                <h1><?php the_title(); ?></h1>
            <?php } ?>

            <div class="cities-listing">
                <ul>
                <?php
                $loop = new WP_Query( array( 'post_type' => 'cities', 'posts_per_page' => 1115, 'orderby' => 'post_title',
                'order' => 'ASC') ); ?>  
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>      
                </ul>
            </div>
            <!-- // cities listing  -->

        </div>
        <!-- /.inner-page-in -->
    </div>
    <!-- /#blog-page -->
 

<?php get_footer(); ?>

