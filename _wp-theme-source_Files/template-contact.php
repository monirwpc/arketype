<?php 
/**
** Template Name: Contact
**/
get_header();
	if( have_posts() ) : while( have_posts() ) : the_post();
?>
    <div class="container contact-container"><!--start container-->  
        <div class="center-content">
            <div class="get-cont entry-content">
                <?php the_content(); ?>
            </div>
        </div>      
    </div><!-- //end .header-container -->      

    <footer class="container footer-container contact-footer"><!--start container-->
        <div class="center-content">
            <div class="footer-content">
                <div class="footer-col-area">
                    <?php dynamic_sidebar( 'footer_widget_sidebar' ); ?>
                </div>
            </div>
        </div>            

    </footer><!--//end .container--> 

    <div class="container instagram-container"><!--start .container-->
        <div class="center-content">
            <h2><?php echo get_field('instagram_feed_title'); ?></h2>
            <div class="instagram-cont">
                <?php echo do_shortcode('[instagram-feed]'); ?>
            </div>
        </div>
    </div><!--//end .container--> 

    <div class="container contact-footer"><!--start .container--> 
        <div class="center-content">
            <div class="footer-bottom-content">
                <p>© <?php echo date('Y'); ?> Arketype.  All rights reserved.</p>
                <ul>
                     <li><a href="<?php echo home_url(); ?>/privacy-policy">Privacy</a></li>
                     <li><a href="<?php echo home_url(); ?>/terms-of-use">Terms of Use</a></li>
                     <li>Crafted by <a href="<?php echo get_field( 'hv_site_url', 'option'); ?>">HV</a></li>
                </ul>
            </div>
        </div>
    </div><!--//end .container-->

<?php 
	endwhile; endif;
get_footer(); ?>