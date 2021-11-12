<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

	<footer id="page-footer">
		<!-- /.footer-quote-btn -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="footer-content">
						<div class="footer-quote-btn">
							<a href="<?php the_field('button_link_footer_cta', 'options'); ?>"><?php the_field('button_label_footer_cta', 'options'); ?></a>
						</div>
						<div class="footer-logo">
							<img src="<?php the_field('footer_logo_general', 'options'); ?>" alt="">
						</div>
						<!-- /.footer-logo -->
						<div class="footer-nav">
							<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
						</div>
						<!-- /.footer-nav -->
						<div class="footer-socials">
							<ul>
								<?php if( have_rows('social_networks_general', 'options') ): ?>
									<?php while( have_rows('social_networks_general', 'options') ): the_row(); ?>
										<li><a href="<?php the_sub_field('link_to_network'); ?>" target="_blank"><?php the_sub_field('icon_code'); ?></a></li>
									<?php endwhile; ?>
								<?php endif; ?>
	                        </ul>
						</div>
						<!-- /.footer-socials -->
					</div>
					<!-- /.footer-content -->
					<div class="copybar">
						<small><?php the_field('copyright_text_footer', 'options'); ?></small>
					</div>
						<!-- /.copybar -->	
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</footer>
	<!-- /#page-footer -->
	<div class="footer-widgets">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="trustedpilot-widget">
						<?php the_field('trustpilot_code', 'options'); ?>
					</div>
					<!-- /.trustedpilot-widget -->
					<?php the_field('bbb_code', 'options'); ?>
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /.footer-widgets -->
 </div>
<!-- /.page-wrapper -->  

	<?php if ( get_field( 'display_settings_cookies', 'options' ) ): ?>
	<div id="cookie-notice">
		<div id="cookie-notice-in">
			<div class="notice-text">
				<?php the_field('notice_text_cookies', 'options'); ?>
			</div>
			<!-- /.notice-text -->
			<div class="notice-btns">
				<a href="#" id="accept-cookie"><?php the_field('button_1_label_cookies', 'options'); ?></a>
				<a href="<?php the_field('button_link_cooke_2', 'options'); ?>" target="_blank" id="more-info-cookie"><?php the_field('button_2_label_cooki', 'options'); ?></a>
			</div>
			<!-- /.notice-btns -->
			<a href="javascript:void(0);" id="close-notice"></a>
		</div>
		<!-- /#cookie-notice-in -->
	</div>
	<!-- /#cookie-notice -->
	<?php else: ?>
	<?php endif; ?>

	<div class="modal-overlay disclaimer-modal" data-my-element="tooltip-modal" id="tooltip-modal">
		<div class="modal" data-my-element="tooltip-modal">
			<a class="close-modal">
				<img src="<?php bloginfo('template_directory'); ?>/img/ico/close.svg" alt="">
			</a>
			<!-- close modal -->
			<div class="disclaimer-modal-wrap">
				<?php the_field('tooltip_content_modal', 'options'); ?>        
			</div>
			<!-- /.disclaimer-modal-wrap -->
		</div>
		<!-- modal -->
	</div>

	<div id="fixed-cta">
		<span class="label">Get a Free Estimate</span>
		<a href="tel:<?php the_field('main_phone_number_top_gen', 'options'); ?>"><small><img src="<?php bloginfo('template_directory'); ?>/img/ico/phone-solid.svg" alt=""></small><span>Call: </span> <strong><?php the_field('main_phone_number_top_gen', 'options'); ?></strong></a>
	</div>
	<!-- // fixed cta  -->

    <?php wp_footer(); ?>

	<?php if( get_field('footer_code_snippet', 'options') ): ?>
		<?php the_field('footer_code_snippet', 'options'); ?>
	<?php endif; ?>

</body>
</html>

