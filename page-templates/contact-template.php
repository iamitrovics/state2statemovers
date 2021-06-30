<?php
/**
 * Template Name: Contact Template
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
                $values = get_field( 'main_title_contact_header' );
                if ( $values ) { ?>
                    <h1><?php the_field('main_title_contact_header'); ?></h1>
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
<div class="inner-page" id="contact-page">
    <div class="inner-page-in">
        <div class="row">
            <div class="col-lg-7">
                <div class="contact-content">
                    <div class="intro">
                        <?php the_field('intro_text_contact_page'); ?>
                    </div>
                    <!-- /.intro -->
                    <div class="call-us">
                        <p><?php the_field('button_label_contact_cta'); ?> <a href="tel:<?php the_field('phone_number_button_cta_contact'); ?>"><?php the_field('phone_number_button_cta_contact'); ?></a></p>
                    </div>
                    <!-- /.call-us -->
                    <div class="contact-more">
                        <?php the_field('company_address_contact_page'); ?>
                    </div>
                    <!-- /.contact-more -->
                </div>
                <!-- /.contact-content -->
            </div>
            <!-- /.col-lg-7 -->
            <div class="col-lg-5">
                <div class="contact-form">
                    <?php the_field('form_code_contact_page'); ?>
            </div>
                <!-- /.contact-form -->
            </div>
            <!-- /.col-lg-5 -->
        </div>
        <!-- /.row -->
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