<?php

/* Creating a function to create our announcements custom post type 
---------------------------------------------------- */
function register_announcements_type() {


	$labels = array(
		'name'                => __('Події', 'lnu'),
		'singular_name'       => __('Події', 'lnu'),
		'menu_name'           => __('Події', 'lnu'),
		'name_admin_bar'      => __('Події', 'lnu'),
		'parent_item_colon'   => __('Батьківські події', 'lnu'),
		'all_items'           => __('Усі Події', 'lnu'),
		'add_new_item'        => __('Додати нову Подію', 'lnu'),
		'add_new'             => __('Додати', 'lnu'),
		'new_item'            => __('Нова подія', 'lnu'),
		'edit_item'           => __('Редагувати подію', 'lnu'),
		'update_item'         => __('Оновити подію', 'lnu'),
		'view_item'           => __('Переглянути подію', 'lnu'),
		'search_items'        => __('Знайти подію', 'lnu'),
		'not_found'           => __('Подію не знайдено', 'lnu'),
		'not_found_in_trash'  => __('Подію не знайдено в кошику', 'lnu'),
		);

	$args = array(
		'label'               => 'Announcements',
		'description'         => 'lnu announcements custom post type',
		'labels'              => $labels,
		'supports'            => array( 'title','thumbnail','editor'),  
		'rewrite'             => array( 'slug' => 'announcements' ),
		'query_var' 		  => true,
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 10,
		'menu_icon'           => 'dashicons-align-left',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true
		);
	register_post_type( 'announcements', $args );
}
add_action( 'init', 'register_announcements_type', 0 );


?>