<?php 
/**
 * Homepage / Front Page
**/
get_header(); ?>

<div id="masheader" style="background-image: url(<?php the_field('background_image_hero_home'); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="masheader-content">
                    <h1><?php the_field('main_title_hero_home'); ?></h1>
                    <span class="header-subtitle"><a href="<?php the_field('button_link_hero_home'); ?>"><?php the_field('button_label_hero_home'); ?></a></span>
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

<div id="about-area">
    <section id="history">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><?php the_field('main_title_history_home'); ?></h2>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="about-in">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="about-photo">
                                    <?php
                                    $imageID = get_field('featured_image_history_home');
                                    $image = wp_get_attachment_image_src( $imageID, 'thumb-image' );
                                    $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                    ?> 

                                    <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                </div>
                                <!-- /.about-photo -->
                            </div>
                            <!-- /.col-md-4 -->
                            <div class="col-md-8">
                                <div class="about-content">
                                    <?php the_field('content_block_history_home'); ?>
                                    <a href="<?php the_field('button_link_history_home'); ?>" class="learn-btn"><?php the_field('button_label_history_home'); ?></a>
                                    <!-- /.learn-btn -->
                                </div>
                                <!-- /.about-content -->
                            </div>
                            <!-- /.col-md-8 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.about-in -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /#history -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><?php the_field('main_title_services_home'); ?></h3>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <?php if( have_rows('services_list_home') ): ?>
                        <?php while( have_rows('services_list_home') ): the_row(); ?>

                            <div class="about-in">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="about-photo">
                                            <img src="<?php the_sub_field('featured_image') ;?>" alt="<?php the_sub_field('main_title'); ?>">
                                        </div>
                                        <!-- /.about-photo -->
                                    </div>
                                    <!-- /.col-md-4 -->
                                    <div class="col-md-8">
                                        <div class="about-content">
                                            <h2><?php the_sub_field('main_title'); ?></h2>
                                            <?php the_sub_field('content_block'); ?>
                                            <a href="<?php the_sub_field('link_to_service'); ?>" class="learn-btn">Learn more</a>
                                            <!-- /.learn-btn -->
                                        </div>
                                        <!-- /.about-content -->
                                    </div>
                                    <!-- /.col-md-8 -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.about-in -->

                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /#services -->
    
</div>
<!-- /#about-area -->  

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
