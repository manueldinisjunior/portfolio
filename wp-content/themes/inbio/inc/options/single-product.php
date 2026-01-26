<?php
if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_5e8e345b79985',
        'title' => 'Product Layout Options',
        'fields' => array(

            array(
                'key' => 'field_product_wc_single_layout',
                'label' => 'Select Product Template',
                'name' => 'product_wc_single_layout',
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
                    1 => 'Layout 1',
                    2 => 'Layout 2',
                    3 => 'Layout 3',
                    4 => 'Layout 4',
                    5 => 'Layout 5',

                ),

                'default_value' => array(),

                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',

            ),

        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'product',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;
