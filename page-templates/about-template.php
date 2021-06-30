<?php
/**
 * Template Name: About Template
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
					$values = get_field( 'custom_title_about_header' );
					if ( $values ) { ?>
						<h1><?php the_field('custom_title_about_header'); ?></h1>
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
    <div class="inner-page">
        <div class="inner-page-in">

			<?php if( have_rows('content_layout_about_page') ): ?>
				<?php while( have_rows('content_layout_about_page') ): the_row(); ?>

					<?php if( get_row_layout() == 'full_width_content' ): ?>

						<?php the_sub_field('content_block'); ?>

					<?php elseif( get_row_layout() == 'gallery' ): ?>
						<div class="row">

							<?php 
							$images = get_sub_field('gallery_photos');
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

<?php get_footer(); ?>

