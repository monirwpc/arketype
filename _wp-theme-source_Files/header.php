<!DOCTYPE HTML>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <style>
        <?php if( is_admin_bar_showing()) { ?>
            .is-sticky.header-container {
                top:32px;
            }
        <?php } ?>
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> > 
    <div id="wrapper"><!-- start .wrapper -->
        <header class="container header-container"><!--start header-container-->
            <div class="center-content">
                <div class="header-area">
                    <div class="logo">
                        <?php 
                            $logo = get_field( 'logo' , 'option' );
                            $theme_logo = wp_get_attachment_image_src( $logo , 'logo' );
                            if( ! $theme_logo[0] ) {
                                $theme_logo[0] = get_template_directory_uri(). '/assets/images/logo.png';
                            }
                        ?>
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php echo esc_url( $theme_logo[0] ); ?>" alt="" width="165" height="38" />
                        </a>
                    </div>
                    <div class="header-right">
                        <div class="nav-area">
                            <span class="btn-menu"><span></span></span>
                            <div class="overlay"></div>
                            <nav>
                                <div class="content">
                                    <div class="menu-main-menu-container">
                                        <?php 
                                            wp_nav_menu(array(
                                                'theme_location'  => 'main-menu',
                                                'depth'           => '1',
                                                'menu_class'      => 'main-menu',
                                                'menu_id'         => 'menu-main-menu'
                                            ));
                                        ?>
                                    </div>
                                    <?php 
                                        $facebook  = get_field( 'facebook_url', 'option' );
                                        $instagram = get_field( 'instagram_url', 'option' );
                                        $pinterest = get_field( 'pinterest_url', 'option' );
                                        $email     = get_field( 'email_address', 'option' );
                                        $telephone = get_field( 'telephone_no', 'option' );
                                    ?>
                                    <ul class="social">
                                        <?php if( $facebook ) : ?>
                                            <li><a href="<?php echo esc_url( $facebook ); ?>" target="_blank">Facebook</a></li>
                                        <?php endif; if( $instagram ) : ?>
                                            <li><a href="<?php echo esc_url( $instagram ); ?>" target="_blank">Instagram</a></li>
                                        <?php endif; if( $pinterest ) : ?>
                                            <li><a href="<?php echo esc_url( $pinterest ); ?>" target="_blank">Pinterest</a></li>
                                        <?php endif; ?>
                                    </ul>
                                    <ul class="social">
                                        <?php if( $email ) : ?>
                                            <li><a href="mailto:<?php echo esc_url( $email ); ?>">Email Us</a></li>
                                        <?php endif; if( $telephone ) : ?>
                                            <li><a href="tel:<?php echo esc_url( $telephone ); ?>"><?php echo $telephone; ?></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </header><!-- //end .header-container -->