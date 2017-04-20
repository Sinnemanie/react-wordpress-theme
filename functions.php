<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function enqueue_scripts(){
    wp_register_script('react_theme' , 'http://localhost:8080/index.js', array(), '1.0.0', true);
    $translation_array = array(
        'errorPage' => array(
                    'title' => __( 'Oops! That page can\'t be found.', 'blackhawk' ),
                    'content'=> __('It looks like nothing was found at this location. Maybe try a search?', 'blackhawk')
        ),
        'searchForm' => array(
            'action' => esc_url( home_url( '/' ) ),
            'screen_reader_text' => _x( 'Search for:', 'label', 'blackhawk' ),
            'placeholder' => esc_attr_x( 'Search ...', 'placeholder', 'blackhawk' ),
            'value' => get_search_query(),
            'searchButton' => _x( 'Search', 'submit button', 'blackhawk' )
        ),
        'constants' => array(
            'SITE_TITLE' => get_bloginfo('name'),
            'SITE_DESCRIPTION'=> get_bloginfo('description'),
            'SITE_URL' => get_bloginfo('url'),
            'WP_VERSION' => get_bloginfo('version'),
            'API' => get_site_url() . '/wp-json/wp/v2/',
            'POSTS_PER_PAGE' => get_option('posts_per_page'),
            'MENUS_API' => 'wp-json/wp-api-menus',
            'PERMALINK_STRUCTURE' => get_option('permalink_structure')

        )
    );
    wp_localize_script('react_theme', 'phpData' , $translation_array);
    wp_enqueue_script( 'react_theme' );
    wp_enqueue_style('react_theme_css', trailingslashit(get_template_directory_uri()).'style.css', NULL);
}

add_action('wp_enqueue_scripts', enqueue_scripts);

function blackhawk_setup(){
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'blackhawk' ),
		'social'  => __( 'Social Links Menu', 'blackhawk' ),
	) );
}
add_action('after_setup_theme',  blackhawk_setup);