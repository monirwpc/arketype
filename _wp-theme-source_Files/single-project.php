<?php get_header(); 
if(have_posts()) : while( have_posts()  ) : the_post(); ?>
    <section class="container slider-container"><!-- start banner-container -->
        <div class="slider-area"><!-- start slider -->
            <div class="master-slider ms-skin-default" id="masterslider2">
                <?php 
                    $i=0;
                    if( have_rows('banner_hero_image') ) : while( have_rows('banner_hero_image') ) : the_row();
                    $hero_id  = get_sub_field('image');
                    $hero_url = wp_get_attachment_image_src( $hero_id , 'slider' );
                    $i++;
                ?>
                <div class="ms-slide slide-<?php echo $i; ?>" data-delay="14">
                    <img class="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/masterslider/style/blank.gif" data-src="<?php echo esc_url( $hero_url[0] ); ?>" alt="Slide1 background"> 
                    <div class="slider-content ms-layer light-title"  
                        style="left:0; bottom: 0px"
                        data-duration="500"
                        data-delay="100"
                        data-effect="rotate3dtop(10,0,0,20)"
                        data-ease="fadeIn">
                        <div class="slider-content-area">
                            <div class="slider-content-info">
                                <div class="slider-content-text">
                                    <h1><?php echo get_sub_field('title'); ?></h1>
                                </div>
                            </div>                               
                        </div>                      
                    </div>
                </div>
                 <?php endwhile; endif; wp_reset_query(); ?>
            </div><!-- end slider -->
        </div>
    </section><!-- //end .banner-container -->

    <div class="container product-open-container"><!--start container--> 
        <div class="center-content">
            <div class="product-location">
                <div class="location-address">
                    <?php 
                        $location   = get_field('location');
                        $service    = get_field('service_type');
                        $completion = get_field('completion_year');
                    ?>
                    <ul>
                        <?php if( $location ) : ?>
                            <li><strong>Location</strong> <?php echo $location; ?></li>
                        <?php endif; if( $service ) : ?>
                            <li><strong>Service</strong> <?php echo $service; ?></li>
                        <?php endif; if( $completion ) : ?>
                            <li><strong>Completion</strong> <?php echo $completion; ?></li>
                        <?php endif; ?>
                        <li><strong>Service</strong></li>
                        <?php 
                            $terms = get_the_terms( get_the_ID(), 'service_type' );
                            foreach( $terms as $term ) {
                                echo '<li><a href="'.get_term_link( $term->slug, 'service_type').'">'.$term->name.'</a></li>';
                            }
                        ?>
                    </ul>                        
                </div>
                <div class="location-content entry-content">
                    <?php echo get_field('content_right'); ?>
                </div>
            </div>

            <?php 
                if( have_rows('project_image_section') ) : while( have_rows('project_image_section') ) : the_row(); 
                $choose_id    = get_sub_field('choose');
                $col_full     = get_sub_field('full_width');
                $col_2_1      = get_sub_field('2_column_first');
                $col_2_2      = get_sub_field('2_column_last');
                $col_full_url = wp_get_attachment_image_src( $col_full , 'project_1_col' );
                $col_2_1_url  = wp_get_attachment_image_src( $col_2_1 , 'project_2_col' );
                $col_2_2_url  = wp_get_attachment_image_src( $col_2_2 , 'project_2_col' );
                if( $choose_id == 2 ) :
                    if( $col_2_1 || $col_2_2 ) :
            ?>
            <div class="pjt-two-col-area">
                <?php if( $col_2_1 ) : ?>
                    <div class="pjt-two-col">
                        <div class="pjt-two-img wow fadeInUp" data-wow-duration="1s" data-wow-dalay=".3s">
                            <img src="<?php echo esc_url( $col_2_1_url[0] ); ?>" alt="" width="622" height="751" />
                        </div>
                    </div>
                <?php endif; if( $col_2_2 ) : ?>
                    <div class="pjt-two-col">
                        <div class="pjt-two-img wow fadeInUp" data-wow-duration="1s" data-wow-dalay=".3s">
                            <img src="<?php echo esc_url( $col_2_2_url[0] ); ?>" alt="" width="622" height="751" />
                        </div>
                    </div>  
                <?php endif; ?>                  
            </div>

            <?php endif; else : ?>

            <div class="pjt-single-row wow fadeInUp" data-wow-duration="1s" data-wow-dalay=".3s">
                <img src="<?php echo esc_url( $col_full_url[0] ); ?>" alt="" />
            </div>
            <?php endif; endwhile; endif; wp_reset_query(); ?>

            <?php
                $current_post_id = get_the_ID();
                $exclude_id  = array( $current_post_id );
                $query = new Wp_Query( array(
                    'post_type'       => 'project',
                    'posts_per_page'  => 3,
                    'orderby'         => 'rand',
                    'post__not_in'    => $exclude_id,
                ));
                if( $query->have_posts() ) : 
            ?>
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
            <?php endif; wp_reset_query(); ?> 
        </div>
    </div><!-- //end .container -->   
<?php 
endwhile; endif;
get_template_part( 'template/project', 'enquiry' );
get_footer(); ?>