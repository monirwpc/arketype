<?php  



	//project post service custom taxonomy

	add_action( 'init' , 'project_service_taxonomy' );

	function project_service_taxonomy() {

		$labels = array(

			'name'              => __( 'Services', 'arketype' ),

			'singular_name'     => __( 'Service', 'arketype' ),

			'search_items'      => __( 'Search Services', 'arketype' ),

			'all_items'         => __( 'All Services', 'arketype' ),

			'parent_item'       => __( 'Parent Service', 'arketype' ),

			'parent_item_colon' => __( 'Parent Service:', 'arketype' ),

			'edit_item'         => __( 'Edit Service', 'arketype' ),

			'update_item'       => __( 'Update Service', 'arketype' ),

			'add_new_item'      => __( 'Add New Service', 'arketype' ),

			'new_item_name'     => __( 'New Service Name', 'arketype' ),

			'menu_name'         => __( 'Services', 'arketype' ),

		);

		$args = array(

			'labels'            => $labels,

			'public'             => true,

			'hierarchical'       => true,

			'show_ui'            => true,

			'show_admin_column'  => true,

			'query_var'          => true,

		);

		register_taxonomy( 'service_type' , 'project' , $args );

	}