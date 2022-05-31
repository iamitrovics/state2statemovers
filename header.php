<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="icon" type="image/png"  href="<?php echo get_template_directory_uri(); ?>/img/ico/favicon.png">
	<?php wp_head(); ?>

	<?php if( get_field('head_code_snippet', 'options') ): ?>
		<?php the_field('head_code_snippet', 'options'); ?>
	<?php endif; ?>
    
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>

	<?php if( get_field('body_code_snippet', 'options') ): ?>
		<?php the_field('body_code_snippet', 'options'); ?>
	<?php endif; ?>


	<?php if ( is_singular( 'cities' ) ) { ?>
        
        <?php include(TEMPLATEPATH . '/inc/city-schema.php'); ?>

    <?php } elseif (is_page_template('page-templates/reviews-template.php')) { ?>
        
        <?php include(TEMPLATEPATH . '/inc/reviews-schema.php'); ?>

	<?php } else { ?>

        <?php if( get_field('general_rich_snippet', 'options') ): ?>
            <?php the_field('general_rich_snippet', 'options'); ?>
        <?php endif; ?>    

	<?php } ?>

        <header id="header">

            <div class="menu-overlay"></div>
            <div class="main-menu-sidebar">
                <header class="visible-xs visible-sm visible-md">
                    <a href="javascript:;" class="close-menu-btn">Close</a>
                </header>
                <!-- // header  -->        
                <div id="mobile__brand">
                    <img src="<?php the_field('website_logo_general', 'options'); ?>" alt="<?php bloginfo('name'); ?>">
                </div>
                <!-- // brand  -->
                <div id="menu">
                    <ul class="nav-links">
                        <?php
                        wp_nav_menu( array(
                            'menu'              => 'mobile',
                            'theme_location'    => 'mobile',
                            'depth'             => 2,
                            'container'         => false,
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => false,
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'items_wrap' => '%3$s',
                            'walker'            => new wp_bootstrap_navwalkermobile())
                        );
                        ?>  
                    </ul>                    
                </div>
                <!-- // menu  -->
            </div>
            <!-- // mobile menu  -->
            <div id="menu_area" class="menu-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="navbar navbar-light navbar-expand-lg mainmenu">
                                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php the_field('website_logo_general', 'options'); ?>" alt="<?php bloginfo('name'); ?>"></a>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                     <ul class="navbar-nav ml-auto">
                                        <?php
                                        wp_nav_menu( array(
                                            'menu'              => 'primary',
                                            'theme_location'    => 'primary',
                                            'depth'             => 2,
                                            'container'         => false,
                                            'container_class'   => 'collapse navbar-collapse',
                                            'container_id'      => false,
                                            'menu_class'        => 'nav navbar-nav',
                                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                            'items_wrap' => '%3$s',
                                            'walker'            => new Understrap_WP_Bootstrap_Navwalker())
                                        );
                                        ?>  
                                    </ul>  
                                    
                                    <div class="top-search"><a href="#"><i class="fal fa-search"></i></a></div>
                                    <!-- /.top-search -->

                                    <?php 
                                    $values = get_field( 'phone_number_city_sidebar' );
                                    if ( $values ) { ?>
                                        <div class="top-phone"><a href="tel:<?php the_field('phone_number_city_sidebar'); ?>"> <i class="fas fa-phone"></i> <?php the_field('phone_number_city_sidebar'); ?></a></div>
                                    <?php 
                                    } else { ?>
                                        <div class="top-phone"><a href="tel:<?php the_field('main_phone_number_top_gen', 'options'); ?>"> <i class="fas fa-phone"></i> <?php the_field('main_phone_number_top_gen', 'options'); ?></a></div>
                                    <?php } ?>
                                    <!-- /.top-phone -->

                                </div>
                                <div id="mobile-menu--btn">
                                    <span class="menu-btn">
                                    <a href="javascript:;">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    </a>
                                    </span> 
                                </div>
                                <!-- /#mobile-menu--btn -->
                            </nav>
                        </div>
                        <!-- /.col-md-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.continer-fluid -->
            </div>
            <!-- // desktop menu  -->
            <div id="top-search-form">
                <span class="close-btn"><i class="fal fa-times"></i></span>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <form role="search" method="get" id="searchform"
                                class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <div>
                                    <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
                                    <i class="fal fa-search"></i>
                                    <input type="text" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" id="s" />
       
                                </div>
                            </form>

                        </div>
                        <!-- /.col-md-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /#top-search-form -->
        </header>
        <!-- /#header -->

        <div class="page-wrapper">