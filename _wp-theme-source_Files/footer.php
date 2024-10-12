    <?php if( ! is_page('contact') ) : ?> 
        <footer class="container footer-container"><!--start container-->
            <div class="center-content">
                <div class="footer-content">
                    <div class="footer-logo">
                        <?php 
                            $logo = get_field( 'footer_logo' , 'option' );
                            $theme_logo = wp_get_attachment_image_src( $logo , 'footer_logo' );
                            if( ! $theme_logo[0] ) {
                                $theme_logo[0] = get_template_directory_uri(). '/assets/images/footer-logo.png';
                            }
                        ?>
                        <img src="<?php echo esc_url( $theme_logo[0] ); ?>" alt="" width="137" height="32" />
                    </div>
                    <div class="footer-col-area">
                        <?php dynamic_sidebar( 'footer_widget_sidebar' ); ?>
                    </div>
                </div>
				<div class="footer-bottom-content">
					<p>© <?php echo date('Y'); ?> Arketype.  All rights reserved.</p>
					<ul>
						 <li><a href="<?php echo home_url(); ?>/privacy-policy">Privacy</a></li>
						 <li><a href="<?php echo home_url(); ?>/terms-of-use">Terms of Use</a></li>
						 <li>Crafted by <a href="<?php echo get_field( 'hv_site_url', 'option'); ?>">HV</a></li>
					</ul>
				</div>
			</div>
        </footer><!--//end .container--> 
    <?php endif; ?>
    </div><!-- //end .wrapper -->     
    
    <?php wp_footer(); ?>
    <script>
        jQuery(document).ready(function(){
            // ajax filtering by project service & sector
            jQuery( "ul.service_cat li" ).on( "click", function() {
                var service = jQuery(this).attr('data-val');              
                data = {
                    'action' : 'filter_project_by_service_sector',
                    'service_slug': service,
                };
                jQuery.ajax({
                    type: 'POST',
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    data: data,
                    success: function(data) {
                        jQuery('.products-container .products-col-area').html(data);
                    }
                });
            });
        });
    </script>
</body>
</html>