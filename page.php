<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

    <div class="inner-page" id="regular-page">
        <div class="inner-page-in">

            <?php 
            $values = get_field( 'main_title_header_regular' );
            if ( $values ) { ?>
                <h1><?php the_field('main_title_header_regular'); ?></h1>
            <?php 
            } else { ?>
                <h1><?php the_title(); ?></h1>
            <?php } ?>

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
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

        </div>
        <!-- /.inner-page-in -->
    </div>
    <!-- /#blog-page -->

<?php
get_footer();
