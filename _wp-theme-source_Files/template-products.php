<?php 
/**
** Template Name: Products
**/
get_header();
    if( have_posts() ) : while( have_posts() ) : the_post();
?>
    <div class="container products-container"><!--start container-->  
        <div class="center-content">
            <div class="products-content">
                <div class="products-title-area">
                    <div class="products-title">
                        <h1><?php if( get_field('page_title') ) { echo get_field('page_title'); } else { the_title(); } ?></h1>
                    </div>
                </div>
                <div class="products-col-area">
                    <?php 
                        $query = new Wp_Query( array(
                            'post_type'       => 'product',
                            'posts_per_page'  => -1
                        ));
                        if( $query->have_posts() ) : while($query->have_posts() ) : $query->the_post();
                            $feature  = wp_get_attachment_image_src( get_post_thumbnail_id() , 'product' );
                    ?>
                    <div class="products-col wow fadeInUp" data-wow-duration="1s" data-wow-dalay=".3s">
                        <div class="products-info">
                            <div class="products-img">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo esc_url( $feature[0] ); ?>" alt="" width="397" height="298" />
                                </a>
                            </div>
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span></span></a></h5>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); endif; wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </div><!-- //end .header-container -->  
<?php 
    endwhile; endif;
    get_template_part( 'template/project', 'enquiry' );
get_footer(); ?>