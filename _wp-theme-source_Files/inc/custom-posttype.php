<?php 

	// register slider post type
	add_action( 'init' , 'register_slider_post' );
	function register_slider_post() {
		$arg = array(
			'label'           => __( 'Slider' , 'arketype' ),
			'singular_label'  => 'slider',
			'public'          => true,
			'hierarchical'    => false,
			'capability_type' => 'post',
			'has_archive'     => true,
			'show_ui'         => true,
			'menu_position'   => 5,
			'menu_icon'       => 'dashicons-images-alt2',
			'supports'        => array( 'title', 'editor', 'thumbnail', 'comments', 'author' ),
			'labels'          => array(
				'add_new'               => __( 'Add Slider', 'arketype' ),
		        'add_new_item'          => __( 'Add New Slider', 'arketype' ),
		        'new_item'              => __( 'New Slider', 'arketype' ),
		        'edit_item'             => __( 'Edit Slider', 'arketype' ),
		        'view_item'             => __( 'View Slider', 'arketype' ),
		        'all_items'             => __( 'All Slider', 'arketype' ),
		        'search_items'          => __( 'Search Slider', 'arketype' ),
		        'not_found'             => __( 'No Slider found.', 'arketype' ),
		        'featured_image'        => __( 'Slider Thumbnail', 'arketype' ),
		        'set_featured_image'    => __( 'Set Slider Thumbnail', 'arketype' ),
		        'remove_featured_image' => __( 'Remove Slider Thumbnail', 'arketype' ),
			),
		);
		register_post_type( 'slider' , $arg );
	}

	// register product post type
	add_action( 'init' , 'register_product_post' );
	function register_product_post() {
		$arg = array(
			'label'           => __( 'Products' , 'arketype' ),
			'singular_label'  => 'product',
			'public'          => true,
			'hierarchical'    => false,
			'capability_type' => 'post',
			'has_archive'     => true,
			'show_ui'         => true,
			'menu_position'   => 5,
			'menu_icon'       => 'dashicons-cart',
			'supports'        => array( 'title', 'editor', 'thumbnail', 'comments', 'author' ),
			'labels'          => array(
				'add_new'               => __( 'Add Product', 'arketype' ),
		        'add_new_item'          => __( 'Add New Product', 'arketype' ),
		        'new_item'              => __( 'New Product', 'arketype' ),
		        'edit_item'             => __( 'Edit Product', 'arketype' ),
		        'view_item'             => __( 'View Product', 'arketype' ),
		        'all_items'             => __( 'All Product', 'arketype' ),
		        'search_items'          => __( 'Search Product', 'arketype' ),
		        'not_found'             => __( 'No Product found.', 'arketype' ),
		        'featured_image'        => __( 'Product Thumbnail', 'arketype' ),
		        'set_featured_image'    => __( 'Set Product Thumbnail', 'arketype' ),
		        'remove_featured_image' => __( 'Remove Product Thumbnail', 'arketype' ),
			),
		);
		register_post_type( 'product' , $arg );
	}

	// register projects post type
	add_action( 'init' , 'register_project_post' );
	function register_project_post() {
		$arg = array(
			'label'           => __( 'Projects' , 'arketype' ),
			'singular_label'  => 'project',
			'public'          => true,
			'hierarchical'    => false,
			'capability_type' => 'post',
			'has_archive'     => true,
			'show_ui'         => true,
			'menu_position'   => 5,
			'menu_icon'       => 'dashicons-screenoptions',
			'supports'        => array( 'title', 'editor', 'thumbnail', 'comments', 'author' ),
			'labels'          => array(
				'add_new'               => __( 'Add Projects', 'arketype' ),
		        'add_new_item'          => __( 'Add New Projects', 'arketype' ),
		        'new_item'              => __( 'New Projects', 'arketype' ),
		        'edit_item'             => __( 'Edit Projects', 'arketype' ),
		        'view_item'             => __( 'View Projects', 'arketype' ),
		        'all_items'             => __( 'All Projects', 'arketype' ),
		        'search_items'          => __( 'Search Projects', 'arketype' ),
		        'not_found'             => __( 'No Projects found.', 'arketype' ),
		        'featured_image'        => __( 'Projects Thumbnail', 'arketype' ),
		        'set_featured_image'    => __( 'Set Projects Thumbnail', 'arketype' ),
		        'remove_featured_image' => __( 'Remove Projects Thumbnail', 'arketype' ),
			),
		);
		register_post_type( 'project' , $arg );
	}
