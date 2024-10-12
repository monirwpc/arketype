<?php 

	add_action( 'widgets_init' , 'footer_custom_widget' );
	function footer_custom_widget() {
		register_sidebar( array(
			'name'           => __( 'Footer Widget Sidebar' , 'arketype' ),
			'id'             => 'footer_widget_sidebar',
			'description'    => __( 'Footer Widget Sidebar' , 'arketype' ),
			'before_widget'  => '<div class="footer-col">',
			'after_widget'   => '</div>',
			'before_title'   => '',
			'after_title'    => '',
		) );
		register_widget( 'Arketype_Address_Widget' );
		register_widget( 'Arketype_Phone_Gmail' );
		register_widget( 'Arketype_Social_Media' );
		register_widget( 'Arketype_Subscribe' );
	}

	// footer address widget
	class Arketype_Address_Widget extends WP_Widget {
		function __construct() {
			parent::__construct( 'footer_address_widget' , __( 'Footer Address' , 'arketype' ) , array (
				'description'   => __( 'footer address widget' , 'arketype' ),
			) );
		}
		public function widget( $arg , $instance ) {
			echo $arg['before_widget'];
				$adrs_1     = $instance['acf']['field_5d677900e04ed'];
				$adrs_2     = $instance['acf']['field_5d678db7e04ee'];
				$adrs_2_url = $instance['acf']['field_5d678e1345d1d'];
				$adrs_3     = $instance['acf']['field_5d678dbce04ef'];
				$adrs_3_url = $instance['acf']['field_5d678e2045d1e'];
			?>
            <ul>
            	<?php if( $adrs_1 ) : ?>
                    <li><?php echo $adrs_1; ?></li>
                <?php endif; if( $adrs_2 ) : ?>
                	<li><a href="<?php echo esc_url( $adrs_2_url ); ?>"><?php echo $adrs_2; ?><span></span></a></li>
                <?php endif; if( $adrs_3 ) : ?>
                	<li><a href="<?php echo esc_url( $adrs_3_url ); ?>"><?php echo $adrs_3; ?><span></span></a></li>
                <?php endif; ?>
            </ul>
		<?php echo $arg['after_widget']; }

		public function form( $instance ) {

		}
	}

	// footer phone and gmail widget widget
	class Arketype_Phone_Gmail extends WP_Widget {
		function __construct() {
			parent::__construct( 'footer_phone_gmail_widget' , __( 'Footer Phone & Gmail' , 'arketype' ) , array (
				'description'   => __( 'footer phone and gmail widget' , 'arketype' ),
			) );
		}

		public function widget( $arg , $instance ) {
			echo $arg['before_widget'];
				$phone = $instance['acf']['field_5d6790af63bf6'];
				$mail  = $instance['acf']['field_5d6790bb63bf7'];
			?>
            <ul>
            	<?php if( $phone ) : ?>
                	<li><?php echo $phone; ?></li>
                <?php endif; if( $mail ) : ?>
                	<li><a href="mailto:<?php echo esc_url( $mail ); ?>"><?php echo $mail; ?><span></span></a></li>
                <?php endif; ?>
            </ul>
		<?php echo $arg['after_widget']; }

		public function form( $instance ) {

		}
	}

	// footer social media widget
	class Arketype_Social_Media extends WP_Widget {
		function __construct() {
			parent::__construct( 'footer_social_media' , __( 'Footer Social Media' , 'arketype' ) , array (
				'description'   => __( 'footer social media widget' , 'arketype' ),
			) );
		}

		public function widget( $arg , $instance ) {
			echo $arg['before_widget'];
				$instagram = $instance['acf']['field_5d6792886025c'];
				$linkedin  = $instance['acf']['field_5d6792a26025d'];
			?>
            <ul class="social">
            	<?php if( $instagram ) : ?>
                	<li><a href="<?php echo esc_url( $instagram ); ?>"><i class="fab fa-instagram"></i></a></li>
                <?php endif; if( $linkedin ) : ?>
                	<li><a href="<?php echo esc_url( $linkedin ); ?>"><i class="fab fa-linkedin-in"></i></a></li>
                <?php endif; ?>
            </ul>
		<?php echo $arg['after_widget']; }

		public function form( $instance ) {

		}
	}

	// footer subscribe widget
	class Arketype_Subscribe extends WP_Widget {
		function __construct() {
			parent::__construct( 'footer_subscribe_widget' , __( 'Footer Subscribe Widget' , 'arketype' ) , array (
				'description'   => __( 'footer subscribe widget' , 'arketype' ),
			) );
		}

		public function widget( $arg , $instance ) {
			echo $arg['before_widget'];
				$subs_cont = $instance['acf']['field_5d6795a037528'];
				$subs_url  = $instance['acf']['field_5d6795b537529'];
			?>
            <ul>
            	<?php if( $subs_cont ) : ?>
                	<li><?php echo $subs_cont; ?></li>
                <?php endif; ?>
            </ul>
            <a class="sbs-btn" href="<?php echo esc_url( $subs_url ); ?>">SUBSCRIBE</a>
		<?php echo $arg['after_widget']; }

		public function form( $instance ) {

		}
	}