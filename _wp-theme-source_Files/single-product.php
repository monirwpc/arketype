<?php get_header(); 
if(have_posts()) : while( have_posts()  ) : the_post();
    $ban_id = get_field('single_page_banner_image');
    $banner_bg = wp_get_attachment_image_src( $ban_id, 'page_banner' );
    if( ! $banner_bg[0] ) {
        $banner_bg[0] = get_template_directory_uri(). '/assets/images/bgr-banner.png';
    }
?>
    <div class="container banner-container product-banner"><!--start container-->  
        <div class="center-content">
            <div class="banner-content" style="background: url(<?php echo esc_url( $banner_bg[0]); ?>) no-repeat right 0;">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div><!-- //end .header-container --> 

    <div class="container proprietary-product-container"><!--start container-->
        <div class="center-content">
            <div class="product-bcome">
                <a href="<?php echo home_url(); ?>/products">Back to Poducts</a>
            </div>

            <div class="proprietary-product">
                <div class="pop-product-left">
                    <div class="body-content entry-content">
                        <?php the_content(); ?>
                    </div>
                    <?php if( get_field('product_specification_pdf_file') ) : ?>
                        <div class="pod-specifications">
                            <div class="pdf-area">
                                <div class="pdf-img">
                                    <a href="<?php echo get_field('product_specification_pdf_file'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/pdf-img.png" alt="" width="32" height="38" /></a>
                                </div>
                                <div class="spc-cont">
                                    <h6><a href="<?php echo get_field('product_specification_pdf_file'); ?>"><?php echo get_field('product_specification_title'); ?></a></h6>
                                    <span><?php echo get_field('product_specification_content'); ?></span>
                                </div>
                            </div>
                            <?php if( get_field('pd_enq_frm_btn_url') ) : ?>
                                <a class="product-btn" href="<?php echo get_field('pd_enq_frm_btn_url'); ?>">PRODUCT ENQUIRY FORM </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="products-slider">
                <div class="owl-carousel">
                    <?php 
                        if( have_rows('product_image_slideshow') ) : while( have_rows('product_image_slideshow') ) : the_row();
                        $p_slide_id  = get_sub_field('image');
                        $p_slide     = wp_get_attachment_image_src( $p_slide_id, 'product_slide' );
                    ?>
                    <div class="item">
                        <img src="<?php echo esc_url( $p_slide[0] ); ?>" alt="" width="861" height="595" />
                    </div> 
                    <?php endwhile; endif; ?>                    
                </div>
            </div>
            </div>
        </div>
    </div><!-- //end container --> 

    <?php
        $current_post_id = get_the_ID();
        $exclude_id  = array( $current_post_id );
        $query = new Wp_Query( array(
            'post_type'       => 'product',
            'posts_per_page'  => 3,
            'orderby'         => 'rand',
            'post__not_in'    => $exclude_id,
        ));
        if( $query->have_posts() ) : 
    ?>
    <div class="container related-product-container"><!--start container--> 
        <div class="center-content">
            <div class="related-product-info">
                <h2>Related products</h2>
                <div class="products-col-area">
                    <?php 
                        while($query->have_posts() ) : $query->the_post();
                            $feature  = wp_get_attachment_image_src( get_post_thumbnail_id() , 'product' );
                    ?>
                    <div class="products-col wow fadeInUp" data-wow-duration="1s" data-wow-dalay=".3s">
                        <div class="products-info">
                            <div class="products-img">
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $feature[0] ); ?>" alt="" width="397" height="298" /></a>
                            </div>
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span></span></a></h5>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>          
                </div>
            </div>
        </div>
    </div><!-- //end .container -->
    <?php endif; wp_reset_query(); ?>       
<?php 
endwhile; endif;
get_footer(); ?>