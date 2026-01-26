<?php
if (function_exists('acf_add_local_field_group')):
    acf_add_local_field_group(array(
        'key' => 'group_5bf3bc1b4e26c_test',
        'title' => 'Page Options',
        'fields' => array(
            array(
                'key' => 'field_template_color',
                'label' => 'Template Color',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'left',
                'endpoint' => 0,
            ),

            array(
                'key' => 'field_dark_mode_color_opt',
                'label' => 'Switch to Dark / Light Mode',
                'name' => 'rainbow_active_dark_mode',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(

                    'default' => 'Default',
                    'white-version' => 'White',
                    'dark-version' => 'Dark',

                ),
                'default_value' => 'default',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),

            array(
                'key' => 'field_5c52c42f6fdfbw',
                'label' => 'Active Box Wrapper',
                'name' => 'rainbow_has_box',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
                'allow_null' => 1,
                'other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,

            ),

            array(
                'key' => 'field_template_color_opt',
                'label' => 'Template Color',
                'name' => 'rainbow_select_template_color',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(

                    'template-color-1' => 'Template Color 1',
                    'template-color-2' => 'Template Color 2',

                ),
                'default_value' => array(),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),


            array(
                'key' => 'field_5bf3c134a081e',
                'label' => 'Header',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'left',
                'endpoint' => 0,
            ),

            array(
                'key' => 'field_5c387546a3e4c',
                'label' => 'Show Header',
                'name' => 'rainbow_show_header',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
                'allow_null' => 1,
                'other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_5c3875f7a3e4e',
                'label' => 'Select Header Template',
                'name' => 'rainbow_select_header_style',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    0 => 'Default',
                    1 => 'Header Layout 1',
                    2 => 'Header Layout 2',
                    3 => 'Header Layout 3',
                    4 => 'Header Layout 4',

                ),
                'default_value' => array(),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5c387546a3e4c',
                            'operator' => '==',
                            'value' => 'yes',
                        ),
                    ),
                ),
            ),

            array(
                'key' => 'field_5f3c1ed52db7e_nav_menu',
                'label' => esc_html__('Select Menu', 'inbio'),
                'name' => 'rainbow_select_nav_menu',
                'type' => 'select',
                'instructions' => esc_html__('By default works primary location menu.', 'inbio'),
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => rainbow_get_nav_menus(),
                'default_value' => false,
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'ajax' => 0,
                'return_format' => 'value',
                'placeholder' => '',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5c387546a3e4c',
                            'operator' => '==',
                            'value' => 'yes',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_menu_type',
                'label' => esc_html__('Menu Type', 'inbio'),
                'name' => 'inbio_menu_type',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'multipage' => 'Multi Page',
                    'onepage' => 'One Page',
                ),
                'allow_null' => 1,
                'other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5c387546a3e4c',
                            'operator' => '==',
                            'value' => 'yes',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_5c52c42f6fdfc',
                'label' => 'Header Sticky',
                'name' => 'rainbow_header_sticky',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
                'allow_null' => 1,
                'other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5c387546a3e4c',
                            'operator' => '==',
                            'value' => 'yes',
                        ),
                    ),
                ),
            ),

            array(
                'key' => 'field_5c52c47d6fdfd',
                'label' => esc_html__('Header Transparent', 'inbio'),
                'name' => 'rainbow_header_transparent',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
                'allow_null' => 1,
                'other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5c387546a3e4c',
                            'operator' => '==',
                            'value' => 'yes',
                        ),
                    ),
                ),
            ),

            array(
                'key' => 'field_5c52c42f6fdfbob',
                'label' => 'Menu Offset Enabled',
                'name' => 'rainbow_header_offset_on',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
                'allow_null' => 1,
                'other_choice' => 0,
                'default_value' => 'no',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5c387546a3e4c',
                            'operator' => '==',
                            'value' => 'yes',
                        ),
                    ),
                ),
            ),

            array(
                'key' => 'field_5bf3f6fc0509hsr',
                'label' => 'Header One Page Menu offset',
                'name' => 'rainbow_header_offset',
                'type' => 'range',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'min' => 0,
                'max' => 1000,
                'step' => '',
                'prepend' => '',
                'append' => '',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5c52c42f6fdfbob',
                            'operator' => '==',
                            'value' => 'yes',
                        ),
                    ),
                ),
            ),


            array(
                'key' => 'field_5c52c42f6fdfbb',
                'label' => 'Header Button',
                'name' => 'rainbow_header_button',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
                'allow_null' => 1,
                'other_choice' => 0,
                'default_value' => 'no',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5c387546a3e4c',
                            'operator' => '==',
                            'value' => 'yes',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_button_target',
                'label' => 'Button Target',
                'name' => 'rainbow_button_target',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    '_blank' => esc_html__('Blank', 'inbio'),
                    '_self' => esc_html__('Self', 'inbio'),
                    '_parent' => esc_html__('Parent', 'inbio'),
                    '_top' => esc_html__('Top', 'inbio'),
                ),
                'default_value' => array(),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5c52c42f6fdfbb',
                            'operator' => '==',
                            'value' => 'yes',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_5c3875f7a3e4bb',
                'label' => 'Button Type',
                'name' => 'rainbow_button_type',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(

                    'rn-btn' => esc_html__('Dark Shadow Button', 'inbio'),
                    'rn-btn no-shadow btn-theme' => esc_html__('Primary Color Button', 'inbio'),

                ),
                'default_value' => array(),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5c52c42f6fdfbb',
                            'operator' => '==',
                            'value' => 'yes',
                        ),
                    ),
                ),
            ),

            array(
                'key' => 'field_5bf3f6fc0509cbu',
                'label' => 'Button Url',
                'name' => 'rainbow_header_button_url',
                'type' => 'text',
                'instructions' => 'If this field is empty, then default Header button url will be showed',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5c52c42f6fdfbb',
                            'operator' => '==',
                            'value' => 'yes',
                        ),
                    ),

                ),
            ),

            array(
                'key' => 'field_5bf3f6fc0509cbt',
                'label' => 'Button Text',
                'name' => 'rainbow_header_button_txt',
                'type' => 'text',
                'instructions' => 'If this field is empty, then default Header button Text will be showed',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5c52c42f6fdfbb',
                            'operator' => '==',
                            'value' => 'yes',
                        ),
                    ),

                ),
            ),


            array(
                'key' => 'field_5bf3c14ba081f',
                'label' => 'Page Banner Area',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),

            array(
                'key' => 'field_5bf3f6b20509a',
                'label' => 'Page Banner Area',
                'name' => 'rainbow_title_wrapper_show',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
                'allow_null' => 1,
                'other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),


            array(
                'key' => 'field_5bf655966ed4b',
                'label' => 'Breadcrumbs Enable',
                'name' => 'rainbow_breadcrumbs_enable',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
                'allow_null' => 1,
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
                'return_format' => 'value',
                
            ),

            // Footer
            array(
                'key' => 'field_5bf3c169a0820',
                'label' => 'Footer',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),

            array(
                'key' => 'field_5bfe771692a07',
                'label' => 'Show Footer',
                'name' => 'rainbow_show_footer',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
                'allow_null' => 1,
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
                'return_format' => 'value',
            ),

            array(
                'key' => 'field_5c3875f7a3e4eS',
                'label' => 'Select Footer Template',
                'name' => 'rainbow_select_footer_style',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    0 => 'Default',
                    1 => 'Footer Layout 1',
                    2 => 'Footer Layout 2',
                     


                ),
                'default_value' => array(),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5bfe771692a07',
                            'operator' => '==',
                            'value' => 'yes',
                        ),
                    ),
                ),
            ),


        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));
endif;

//
//if (function_exists('acf_add_local_field_group')):
//
//    acf_add_local_field_group(array(
//        'key' => 'group_61dfe576a498b',
//        'title' => 'Button URL',
//        'fields' => array(
//            array(
//                'key' => 'modal_button_url',
//                'label' => 'Url',
//                'name' => 'popup_project_button_url',
//                'type' => 'text',
//                'instructions' => '',
//                'required' => 0,
//                'conditional_logic' => 0,
//                'wrapper' => array(
//                    'width' => '',
//                    'class' => '',
//                    'id' => '',
//                ),
//                'default_value' => '',
//                'tabs' => 'all',
//                'toolbar' => 'full',
//                'media_upload' => 1,
//                'delay' => 1,
//            ),
//        ),
//        'location' => array(
//
//            array(
//                array(
//                    'param' => 'post_type',
//                    'operator' => '==',
//                    'value' => 'rainbow_projects',
//                ),
//            ),
//        ),
//        'menu_order' => 0,
//        'position' => 'normal',
//        'style' => 'default',
//        'label_placement' => 'top',
//        'instruction_placement' => 'label',
//        'hide_on_screen' => '',
//        'active' => true,
//        'description' => '',
//        'show_in_rest' => 0,
//    ));
//endif;