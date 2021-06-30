<?php
/**
 * Template Name: Free Estimate Template
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
                        <?php 
                        $values = get_field( 'custom_title_estimate_header' );
                        if ( $values ) { ?>
                            <h1><?php the_field('custom_title_estimate_header'); ?></h1>
                        <?php 
                        } else { ?>
                            <h1><?php the_title(); ?></h1>
                        <?php } ?>
                        <span class="header-subtitle"><a href="<?php the_field('button_link_estimate_header'); ?>"><?php the_field('button_label_header_estimate') ;?></a></span>
                        <!-- /.header-subtitle -->
                        <?php include (TEMPLATEPATH . '/inc/inc_quote_form.php' ); ?>
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

    <div class="inner-page full-width">
        <div class="inner-page-in">

            <?php if( have_rows('content_layout_estimate') ): ?>
                <?php while( have_rows('content_layout_estimate') ): the_row(); ?>
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
    <!-- /.inner-page -->

<?php get_footer(); ?>

<!-- Modal -->
<div class="modal fade" id="tooltip-modal" tabindex="-1" role="dialog" aria-labelledby="tooltip-modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
    
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fal fa-times"></i></span>
        </button>

        <?php the_field('tooltip_content_modal', 'options'); ?>

      </div>
      <!-- // body  -->
    </div>
  </div>
</div>