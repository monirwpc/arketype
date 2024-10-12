<?php 



/*---------------------------------------------------------------*/

//  include needed files

/*---------------------------------------------------------------*/

	include_once( get_template_directory(). '/inc/custom-posttype.php' );

	include_once( get_template_directory(). '/inc/custom-widget.php' );

	include_once( get_template_directory(). '/inc/custom-taxonomy.php' );



/*---------------------------------------------------------------*/

// arketype theme setup

/*---------------------------------------------------------------*/

	add_action( 'after_setup_theme' , 'setup_arketype' );

	function setup_arketype() {

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'title-tag' );

		add_image_size( 'logo' , 165 , 38 , true );

		add_image_size( 'footer_logo' , 137 , 32 , true );

		add_image_size( 'slider' , 1650 , 1032 , true );

		add_image_size( 'hp_project' , 971 , 730 , true );

		add_image_size( 'page_banner' , 1306 , 856 , true );

		add_image_size( 'page_flexible_full_img' , 1306 , 808 , true );

		add_image_size( 'product' , 397 , 298 , true );

		add_image_size( 'product_slide' , 861 , 595 , true );

		add_image_size( 'product_single_ban' , 861 , 595 , true );

		add_image_size( 'product_ban' , 1306 , 470 , true );

		add_image_size( 'project_1_col' , 1306 , 943 , true );

		add_image_size( 'project_2_col' , 625 , 752 , true );



		register_nav_menus(

			array(

				'main-menu'             => __( 'Main Menu' , 'arketype' ),

			)

		);

	}





/*-----------------------------------------------------------------------------------*/

// enqueue css & js file

/*-----------------------------------------------------------------------------------*/

	add_action( 'wp_enqueue_scripts' , 'include_css_js' );

	function include_css_js() {

		//enqueue css		

		wp_enqueue_style( 'typekit-font' , 'https://use.typekit.net/oer3mjr.css' , array() , '1.1.0' , 'all' );

		wp_enqueue_style( 'adobe-font' , 'https://fonts.adobe.com/fonts/navigo' , array() , '1.1.0' , 'all' );

		wp_enqueue_style( 'font-awesome' , get_template_directory_uri(). '/assets/fontawesome/css/fontawesome-all.min.css' );

		wp_enqueue_style( 'masterslider' , get_template_directory_uri(). '/assets/masterslider/style/masterslider.css' );

		wp_enqueue_style( 'ms-default' , get_template_directory_uri(). '/assets/masterslider/skins/default/style.css' );

		wp_enqueue_style( 'owl-carousel' , get_template_directory_uri(). '/assets/css/owl.carousel.min.css' );

		wp_enqueue_style('main-styles', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'), false);

		wp_enqueue_style('responsive-styles', get_template_directory_uri() . '/assets/css/responsive.css', array(), filemtime(get_template_directory() . '/assets/css/responsive.css'), false);



		// enqueue js

		wp_enqueue_script( 'jquery' );

		wp_enqueue_script( 'masterslider' , get_template_directory_uri(). '/assets/masterslider/masterslider.min.js' , array() , '1.1.0' , true );

		wp_enqueue_script( 'owl-carousel' , get_template_directory_uri(). '/assets/js/owl.carousel.min.js' , array() , '1.1.0' , true );

		wp_enqueue_script( 'custom-js', get_template_directory_uri().'/assets/js/custom.js' , array() , filemtime(get_template_directory() . '/assets/js/custom.js') , true );

		// 05-11-19
		wp_enqueue_style( 'animate-css' , get_template_directory_uri(). '/assets/css/animate.css' ); 
		wp_enqueue_script( 'wow-js' , get_template_directory_uri(). '/assets/js/wow.min.js' , array() , '1.1.0' , true );

	}



/*-------------------------------------------------------------------*/

// Custom Excerpt Length

/*-------------------------------------------------------------------*/

	function arketype_excerpt_length( $length ) {

	   return 37;

	}

	add_filter( 'excerpt_length' , 'arketype_excerpt_length', 999 );



	if ( ! function_exists( 'arketype_excerpt_more' ) && ! is_admin() ) :

	function arketype_excerpt_more( $more ) {

		$link = sprintf( '<a href="%1$s">%2$s</a>',

			esc_url( get_permalink( get_the_ID() ) ),

			sprintf( __( '...', 'arketype' ))

			);

		return $link;

	}

	add_filter( 'excerpt_more', 'arketype_excerpt_more' );

	endif;



/*--------------------------------------------------------------------*/

// acf option page

/*--------------------------------------------------------------------*/

	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page( array(

			'page_title'   => __( 'Theme Options Page' , 'arketype' ),

			'menu_title'   => __( 'Theme Option' , 'arketype' ),

			'menu_slug'    => 'theme_options_page',

			'capability'   => 'edit_posts',

			'redirect'     => true

		) );



		acf_add_options_sub_page( array(

			'page_title'   => __( 'Header Options' , 'arketype' ),

			'menu_title'   => __( 'Header' , 'arketype' ),

			'parent_slug'  => 'theme_options_page',			

		) );



		acf_add_options_sub_page( array(

			'page_title'   => __( 'Footer Options' , 'lmbc_business' ),

			'menu_title'   => __( 'Footer' , 'lmbc_business' ),

			'parent_slug'  => 'theme_options_page'

		) );

	}



/*--------------------------------------------------------------------*/

// filter project post by service & sector

/*--------------------------------------------------------------------*/

add_action( 'wp_ajax_filter_project_by_service_sector', 'filter_project_by_service_sector' );

add_action( 'wp_ajax_nopriv_filter_project_by_service_sector', 'filter_project_by_service_sector' );

function filter_project_by_service_sector() {

	$service = $_POST['service_slug'];

	$query = new Wp_Query( array(

        'post_type'       => 'project',

        'posts_per_page'  => -1,

        'service_type'    => $service

    ));


    if( $query->have_posts() ) : while($query->have_posts() ) : $query->the_post();

        $feature  = wp_get_attachment_image_src( get_post_thumbnail_id() , 'product' ); ?>

	<div class="products-col ajax-loaded-cont wow fadeInUp" data-wow-duration="1s" data-wow-dalay=".3s">

	    <div class="products-img">

	        <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $feature[0] ); ?>" alt="" width="397" height="298" /></a>

	    </div>

	    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span></span></a></h5>

	</div>

	<?php endwhile; wp_reset_postdata(); endif; wp_reset_query();

	die();

}

