<?php
/**
 * Template Name: Gallery Template
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
                $values = get_field( 'custom_title_gal_page' );
                if ( $values ) { ?>
                    <h1><?php the_field('custom_title_gal_page'); ?></h1>
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

<div class="inner-page" id="gallery">
    <div class="inner-page-in">
        <?php the_field('content_block_gal_page'); ?>  
        <div id="gallery-photos">
            <div class="row">

                <?php 
                $images = get_field('photo_gallery_main');
                if( $images ): ?>
                    <?php foreach( $images as $image ): ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-box">
                                <a href="<?php echo $image['sizes']['big-image']; ?>" data-fancybox="gallery">
                                <span><i class="fal fa-search-plus"></i></span>
                                <img src="<?php echo $image['sizes']['galthumb-image']; ?>" class="img-responsive" alt="<?php echo $image['alt']; ?>" />  
                                </a>
                            </div>
                            <!-- /.gallery-box -->
                        </div>
                        <!-- /.col-xl-3 col-lg-4 col-md-6 -->
                    <?php endforeach; ?>
                <?php endif; ?>                

            </div>
            <!-- /.row -->
        </div>
        <!-- /#gallery-photos -->
    </div>
    <!-- /.inner-page-in -->
</div>
<!-- /.inner-page #gallery -->

<?php get_footer(); ?>

