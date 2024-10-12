<?php get_header(); 
    if( have_posts() ) : while( have_posts() ) : the_post();
        $banner_bg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'page_banner' );
        if( ! $banner_bg[0] ) {
            $banner_bg[0] = get_template_directory_uri(). '/assets/images/bgr-banner.png';
        }
?>
    <div class="container banner-container"><!--start container-->  
        <div class="center-content">
            <div class="banner-content" style="background: url(<?php echo esc_url( $banner_bg[0]); ?>) no-repeat right 0;">
                <h1><?php echo get_the_content(); ?></h1>
            </div>
        </div>
    </div><!-- //end .header-container --> 

    <div class="container philosopy-container"><!--start container--> 
        <div class="center-content">            
            <?php get_template_part( 'template/flexible', 'block' ); ?>
        </div> 
    </div><!-- //end .header-container -->     
<?php 
    endwhile; endif;
    get_template_part( 'template/project', 'enquiry' );
get_footer(); ?>