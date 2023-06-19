<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Register Custom Post Types
 */
function capital_theme_register_post_types() {

    $product_labels = array(
                            'name'               => _x( 'Products', 'capital_theme_product', 'capital_theme' ),
                            'singular_name'      => _x( 'Product', 'capital_theme_product', 'capital_theme' ),
                            'menu_name'          => _x( 'Products', 'capital_theme_product', 'capital_theme' ),
                            'name_admin_bar'     => _x( 'Products', 'capital_theme_product', 'capital_theme' ),
                            'add_new'            => _x( 'Add New', 'capital_theme_product', 'capital_theme' ),
                            'add_new_item'       => __( 'Add New Product', 'capital_theme' ),
                            'new_item'           => __( 'New Product', 'capital_theme' ),
                            'edit_item'          => __( 'Edit Product', 'capital_theme' ),
                            'view_item'          => __( 'View Product', 'capital_theme' ),
                            'all_items'          => __( 'All Products', 'capital_theme' ),
                            'search_items'       => __( 'Search Product', 'capital_theme' ),
                            'parent_item_colon'  => __( 'Parent Product:', 'capital_theme' ),
                            'not_found'          => __( 'No products found.', 'capital_theme' ),
                            'not_found_in_trash' => __( 'No products found in Trash.', 'capital_theme' ),
                        );

    $product_args = array(
                            'labels'             => $product_labels,
                            'public'             => true,
                            'publicly_queryable' => true,
                            'show_ui'            => true,
                            'show_in_menu'       => true,
                            'query_var'          => true,
                            'rewrite'            => array( 'slug'=> 'products', 'with_front' => false ),
                            'capability_type'    => 'post',
                            'has_archive'        => false,
                            'hierarchical'       => false,
                            'menu_position'      => null,
                            'menu_icon'          => 'dashicons-pressthis',
                            'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' )
                        );

    //register_post_type( capital_theme_PRODUCT_POST_TYPE, $product_args );
    
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
                    'name'              => _x( 'Categories', 'taxonomy general name', 'capital_theme'),
                    'singular_name'     => _x( 'Category', 'taxonomy singular name','capital_theme' ),
                    'search_items'      => __( 'Search Categories','capital_theme' ),
                    'all_items'         => __( 'All Categories','capital_theme' ),
                    'parent_item'       => __( 'Parent Category','capital_theme' ),
                    'parent_item_colon' => __( 'Parent Category:','capital_theme' ),
                    'edit_item'         => __( 'Edit Category' ,'capital_theme'), 
                    'update_item'       => __( 'Update Category' ,'capital_theme'),
                    'add_new_item'      => __( 'Add New Category' ,'capital_theme'),
                    'new_item_name'     => __( 'New Category Name' ,'capital_theme'),
                    'menu_name'         => __( 'Categories' ,'capital_theme')
                );

    $args = array(
                    'hierarchical'      => true,
                    'labels'            => $labels,
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    'query_var'         => true,
                    'rewrite'           => array( 'slug'=> 'product' )
                );
	
    //register_taxonomy( capital_theme_PRODUCT_POST_TAX, capital_theme_PRODUCT_POST_TYPE, $args );
    
    //flush rewrite rules
    flush_rewrite_rules();
}

//add action to create custom post type
add_action( 'init', 'capital_theme_register_post_types' );
?>