<!-- flexible content block for default page template -->

<div class="entry-content">

    <?php if( have_rows('flexible_content') ) : while( have_rows('flexible_content') ) : the_row(); 

        if( get_row_layout() == 'text_block_intro' ) :                    

    ?>

        <div class="why-work-content">

            <div class="why-work-left">

                <h2><?php echo get_sub_field( 'text_block_title_left' ); ?></h2>

            </div>

            <div class="why-work-right">                         

                <?php echo get_sub_field( 'text_block_content_right' ); ?>

            </div>

        </div>

    <?php elseif( get_row_layout() == 'full_width_image_block' ) :  ?>

        <div class="about-img wow fadeInUp" data-wow-duration="1s" data-wow-dalay=".3s">

            <?php 

                $img_id = get_sub_field('image');

                $img_url = wp_get_attachment_image_src( $img_id, 'page_flexible_full_img' );

            ?>

            <img src="<?php echo esc_url( $img_url[0] ); ?>" alt="" width="1300" height="808" />

        </div>

    <?php elseif( get_row_layout() == 'text_block_2_column' ) :  ?>

        <div class="about-col-area">

            <div class="about-col">

                <div class="about-cont">

                    <?php echo get_sub_field( 'column_left_content' ); ?>

                </div>

            </div>

            <div class="about-col">

                <div class="about-cont">

                    <?php echo get_sub_field( 'column_right_content' ); ?>

                </div>

            </div>

        </div>

    <?php endif; endwhile; endif; ?>

</div>