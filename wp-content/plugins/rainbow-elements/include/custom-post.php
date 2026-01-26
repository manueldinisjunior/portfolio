<?php
add_action('init', 'register_rainbow_projects_postype');
if (! function_exists('register_rainbow_projects_postype')) {
    function register_rainbow_projects_postype()
        {
        $rainbow                     = RAINBOW_PT_PREFIX;
        $rainbow_options            = rainbow_helper::rainbow_get_options();
        $projects_slug              = ( !empty($rainbow_options['projects_slug']) )? $rainbow_options['projects_slug'] :'projects';
        $projects_cat_slug          = ( !empty($rainbow_options['projects_cat_slug']) )? $rainbow_options['projects_cat_slug'] :'projects-cat';   

        $labels = array(
            'name'                  => esc_html__('Projects',                   'rainbow-elements'),
            'singular_name'         => esc_html__('Projects',                   'rainbow-elements'),
            'add_new'               => esc_html__('Add New',                    'rainbow-elements'),
            'add_new_item'          => esc_html__('Add New Projects',           'rainbow-elements'),
            'edit_item'             => esc_html__('Edit Projects',              'rainbow-elements'),
            'new_item'              => esc_html__('New Projects',               'rainbow-elements'),
            'view_item'             => esc_html__('View Projects',              'rainbow-elements'),
            'search_items'          => esc_html__('Search Projects',            'rainbow-elements'),
            'not_found'             => esc_html__('No Projects found',          'rainbow-elements'),
            'not_found_in_trash'    => esc_html__('No Projects found in Trash', 'rainbow-elements'),
            'parent_item_colon'     => ''
        );
        register_post_type("{$rainbow}_projects", array(
            'labels'                => $labels,
            'public'                => true,
            'publicly_queryable'    => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'query_var'             => true,
            'show_in_rest'          => true, // To use Gutenberg editor. 
            'show_in_nav_menus'     => true,
            'has_archive'           => true,
            'rewrite'               => true,        
            'hierarchical'          => false, 
            'menu_position'         => 12,
            'menu_icon'             => 'dashicons-sos',
            'supports'              => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),       
            'rewrite'               => array('slug' => esc_html__($projects_slug , 'rainbow-elements')),
        ));
        $labels = array(
            'name'              => _x( 'Projects Categories', 'projects categories',        'rainbow-elements' ),
            'singular_name'     => _x( 'Projects Category', 'projects category',            'rainbow-elements' ),
            'search_items'      => esc_html__('Search Projects Categories' ,                'rainbow-elements'),
            'all_items'         => esc_html__('All Projects Categories' ,                   'rainbow-elements'),
            'parent_item'       => esc_html__('Parent Projects Category' ,                  'rainbow-elements'),
            'parent_item_colon' => esc_html__('Parent Projects Category:' ,                 'rainbow-elements'),
            'edit_item'         => esc_html__('Edit Projects Category' ,                    'rainbow-elements'),
            'update_item'       => esc_html__('Update Projects Category' ,                  'rainbow-elements'),
            'add_new_item'      => esc_html__('Add New Projects Category' ,                 'rainbow-elements'),
            'new_item_name'     => esc_html__('New Projects Category Name' ,                'rainbow-elements'),
            'menu_name'         => esc_html__('Projects Category' ,                         'rainbow-elements'),
        );
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_in_nav_menus' => true,
            'show_ui'           => null,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => $projects_cat_slug  ),
        );
        register_taxonomy( "{$rainbow}_projects_category", array( "{$rainbow}_projects" ), $args );    
    }
}
 
/**
 *  Display current year
 */

if (! function_exists('inbio_current_year')) {
    function inbio_current_year()
    {
        $year = date_i18n('Y');
        return $year;
    }
}
add_shortcode('year', 'inbio_current_year');