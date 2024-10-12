<?php get_header(); ?>
    <section class="container slider-container"><!-- start banner-container -->
        <div class="slider-area"><!-- start slider -->
            <div class="master-slider ms-skin-default" id="masterslider">
                <?php 
                    $i=0; 
                    $query = new Wp_Query( array(
                        'post_type' => 'slider',
                    ));
                    if( $query->have_posts() ) : while($query->have_posts() ) : $query->the_post();
                    $feature        = wp_get_attachment_image_src( get_post_thumbnail_id() , 'slider' );
                    $i++;
                ?>
                <div class="ms-slide slide-<?php echo $i; ?>" data-delay="14">
                    <img class="lazy" src="<?php echo get_template_directory_uri() ?>/assets/masterslider/style/blank.gif" data-src="<?php echo esc_url( $feature[0] ); ?>" alt="Slide1 background">
                    <div class="slider-content ms-layer light-title"  
                        style="left:0; bottom: 0px"
                        data-duration="500"
                        data-delay="100"
                        data-effect="rotate3dtop(10,0,0,20)"
                        data-ease="fadeIn">
                        <div class="slider-content-area">
                            <div class="slider-content-info">
                                <div class="slider-content-text">
                                    <h1><?php the_title(); ?></h1>
                                </div>
                            </div>                               
                        </div>                      
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); endif; wp_reset_query(); ?>
            </div><!-- end slider -->
        </div>
    </section><!-- //end .banner-container -->  

    <div class="container creative-solvers-container"><!--start container--> 
        <div class="center-content">
            <div class="creative-content entry-content">
                <?php the_content(); ?>
            </div>

            <div>
                <?php 
                    if( have_rows('projects_block') ) : while( have_rows('projects_block') ) : the_row();
                        $p_feature_id = get_sub_field('project_feature');
                        $p_feature    = wp_get_attachment_image_src( $p_feature_id, 'hp_project' );
                        $p_url        = get_sub_field('project_url');
                        if( ! $p_url ) {
                            $p_url = home_url().'/projects';
                        }
                ?>
                <div class="bowden-information">
                    <div class="bwn-info-left">
                        <a href="<?php echo $p_url; ?>"><?php echo get_sub_field('project_title'); ?><span></span></a>
                    </div>
                    <div class="bwn-info-right wow fadeInUp" data-wow-duration="1s" data-wow-dalay=".3s">
                        <a href="<?php echo $p_url; ?>">
                            <img src="<?php echo esc_url( $p_feature[0] ); ?>" alt="" width="971" height="730" />
                        </a>
                    </div>
                </div>
                <?php endwhile; endif; wp_reset_query(); ?>
            </div>
            
            <div class="why-work-content">
                <?php 
                    $why_work = get_field('why_work_with_us_block');
                    $ww_learn = $why_work['learn_more_url'];
                ?>
                <div class="why-work-left">
                    <h2><?php echo $why_work['why_work_title_left']; ?></h2>
                </div>
                <div class="why-work-right">
                    <h5><?php echo $why_work['why_work_content_right']; ?></h5>
                    <?php if( $ww_learn ) : ?>
                        <a href="<?php echo esc_url($ww_learn); ?>">Learn more<span></span></a>
                    <?php endif; ?>
                </div>
            </div>  
        </div>          
    </div><!-- //end .container -->
    <?php get_template_part( 'template/project', 'enquiry' ); ?>
<?php get_footer(); ?>