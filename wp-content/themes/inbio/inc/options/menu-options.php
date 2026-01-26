<?php
if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_5c3de7e54eb56',
        'title' => 'Menu Option',
        'fields' => array(
            
            array(
                'key' => 'field_5c3de8217d5ec',
                'label' => 'Select Menu Icon',
                'name' => 'rainbow_select_icon',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,

                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'megamenu',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'id',
                'ui' => 1,
            ),
            array(
                'key' => 'field_5c52c42f6fdfab',
                'label' => 'External link',
                'name' => 'rainbow_external_link',
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

        ),
        'location' => array(
            array(
                array(
                    'param' => 'nav_menu_item',
                    'operator' => '==',
                    'value' => 'all',
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