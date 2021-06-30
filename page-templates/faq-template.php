<?php
/**
 * Template Name: FAQ Template
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
					$values = get_field( 'custom_title_faq_header' );
					if ( $values ) { ?>
						<h1><?php the_field('custom_title_faq_header'); ?></h1>
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
    <div class="inner-page" id="faq-page">
        <div class="inner-page-in">
            <div class="row">
                <div class="col-md-9 faq-content-wrap">
                    <div id="faq-content">
                        <h2><?php the_field('main_title_faq_intro'); ?></h2>
                        <?php the_field('intro_text_faq_page'); ?>

                        <img src="<?php the_field('featured_image_faq_page'); ?>" alt="<?php the_field('main_title_faq_intro'); ?>">

                            <?php if( have_rows('faq_list_repe') ): ?>
                                <?php $i=1; ?>
                                <?php while( have_rows('faq_list_repe') ): the_row(); ?>

                                    <div class="faq-item" id="q<?php echo $i; ?>">
                                        <h3><?php the_sub_field('question'); ?></h3>
                                        <?php the_sub_field('answer'); ?>
                                    </div>
                                    <!-- /.faq-item -->

                                <?php $i++; endwhile; ?>
                            <?php endif; ?>
            
                    </div>
                    <!-- /#faq-content -->
                </div>
                <!-- /.col-md-9 faq-content-wrap -->
                <div class="col-md-3">
                    <div id="faq-questions">
                        <h2>Questions</h2>
                        <ul>

                            <?php if( have_rows('faq_list_repe') ): ?>
                                <?php $i=1; ?>
                                <?php while( have_rows('faq_list_repe') ): the_row(); ?>
                                    <li><a href="#q<?php echo $i; ?>"><?php the_sub_field('question'); ?></a></li>
                                <?php $i++; endwhile; ?>
                            <?php endif; ?>                        
                            
                        </ul>
                    </div>
                    <!-- /#faq-questions -->
                </div>
                <!-- /.col-md-3 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.inner-page-in -->
    </div>
    <!-- /.inner-page -->

<?php get_footer(); ?>

