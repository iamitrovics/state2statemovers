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

                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>
        <!-- /.inner-page-in -->
    </div>
    <!-- /.inner-page -->

<?php
get_footer();
