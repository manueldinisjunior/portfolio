<?php
/**
 * @param $options
 * dialog
 */
function inbio_confirmation_dialog_options($options)
{
    return array_merge($options, array(
        'width' => 500,
        'dialogClass' => 'wp-dialog',
        'resizable' => false,
        'height' => 'auto',
        'modal' => true,
    ));
}

add_filter('pt-ocdi/confirmation_dialog_options', 'inbio_confirmation_dialog_options', 10, 1);

/**
 * inbio_import_files
 * @return array
 */
function inbio_import_files()
{
    $demo_location = 'https://rainbowit.net/themes/inbio/demo/';
    $demo_content = 'https://rainbowit.net/themes/inbio/demo/demo-content/';
    $preview_url = 'https://rainbowit.net/themes/inbio/';
    $import_notice = esc_html__('Importing may take 5-10 minutes.', 'inbio');

    return array(
        array(
            'import_file_name' => 'Home',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo1.png',
            'preview_url' => $preview_url . 'home',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Home Light',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo1_light.png',
            'preview_url' => $preview_url .  'home-light',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Technician',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array( 
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo2.png',
            'preview_url' => $preview_url . 'technician',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Technician Light',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo2_light.png',
            'preview_url' => $preview_url . 'technician-light',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Senior UI/UX Designer',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/sr-designer-dark.png',
            'preview_url' => $preview_url . 'senior-ux-designer',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Senior UI/UX Designer Light',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/sr-designer-light.png',
            'preview_url' => $preview_url . 'senior-ux-designer-light',
            'import_notice' => $import_notice,
        ),
        
        array(
            'import_file_name' => 'Doctor',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/doctor-dark.png',
            'preview_url' => $preview_url . 'doctor',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Doctor Light',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/doctor-light.png',
            'preview_url' => $preview_url . 'doctor-light',
            'import_notice' => $import_notice,
        ),


        array(
            'import_file_name' => 'Lawyer',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/lawyer-dark.png',
            'preview_url' => $preview_url . 'lawyer',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Lawyer Light',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/lawyer-light.png',
            'preview_url' => $preview_url . 'lawyer-light',
            'import_notice' => $import_notice,
        ),


        array(
            'import_file_name' => 'Designer Two',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/designer_two_light.png',
            'preview_url' => $preview_url . 'designer-two-light',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Model',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo3.png',
            'preview_url' => $preview_url . 'model',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Model Light',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo3_light.png',
            'preview_url' => $preview_url . 'model-light',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Consulting',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo4.png',
            'preview_url' => $preview_url . 'consulting',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Consulting Light',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo4_light.png',
            'preview_url' => $preview_url . 'consulting-light',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Fashion Designer',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo5.png',
            'preview_url' => $preview_url . 'fashion-designer',
            'import_notice' => $import_notice,
        ),

        array(
            'import_file_name' => 'Fashion Designer Light',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo5_light.png',
            'preview_url' => $preview_url . 'fashion-designer-light',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Developer',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo6.png',
            'preview_url' => $preview_url . 'developer',
            'import_notice' => $import_notice,
        ),

        array(
            'import_file_name' => 'Developer Light',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo6_light.png',
            'preview_url' => $preview_url . 'developer-light',
            'import_notice' => $import_notice,
        ),

        array(
            'import_file_name' => 'Instructor Fitness',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo7.png',
            'preview_url' => $preview_url . 'instructor-fitness',
            'import_notice' => $import_notice,
        ),

        array(
            'import_file_name' => 'Instructor Fitness Light',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo7_light.png',
            'preview_url' => $preview_url . 'instructor-fitness-light',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Web Developer',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo8.png',
            'preview_url' => $preview_url . 'web-developer',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Web Developer Light',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo8_light.png',
            'preview_url' => $preview_url . 'web-developer-light',
            'import_notice' => $import_notice,
        ),

        array(
            'import_file_name' => 'Designer',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo9.png',
            'preview_url' => $preview_url . 'designer',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Designer Light',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo9_light.png',
            'preview_url' => $preview_url . 'designer-light',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Content Writer',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo10.png',
            'preview_url' => $preview_url . 'content-writer',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Content Writer Light',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo10_light.png',
            'preview_url' => $preview_url . 'content-writer-light',
            'import_notice' => $import_notice,
        ),

        array(
            'import_file_name' => 'Instructor',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo11.png',
            'preview_url' => $preview_url . 'instructor',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Instructor Light',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo11_light.png',
            'preview_url' => $preview_url . 'instructor-light',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Freelancer',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo12.png',
            'preview_url' => $preview_url . 'freelancer',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Freelancer light',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo12_light.png',
            'preview_url' => $preview_url . 'freelancer-light',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Photographer',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo13.png',
            'preview_url' => $preview_url . 'photographer',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Photographer Light',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo13_light.png',
            'preview_url' => $preview_url . 'photographer-light',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Politician',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo14.png',
            'preview_url' => $preview_url . 'politician',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Politician Light',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/demo14_light.png',
            'preview_url' => $preview_url . 'politician-light',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'marketer',
            'import_file_url' => $demo_content . 'content.xml',
            'import_widget_file_url' => $demo_content . 'widgets.wie',
            'import_customizer_file_url' => $demo_content . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_content . 'options.json',
                    'option_name' => 'rainbow_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/marketer.png',
            'preview_url' => $preview_url . 'marketer',
            'import_notice' => $import_notice,
        ),

    );
}

add_filter('pt-ocdi/import_files', 'inbio_import_files');

/**
 * inbio_before_widgets_import
 * @param $selected_import
 */
function inbio_before_widgets_import($selected_import)
{

    // Remove 'Hello World!' post
    wp_delete_post(1, true);
    // Remove 'Sample page' page
    wp_delete_post(2, true);

    $sidebars_widgets = get_option('sidebars_widgets');
    $sidebars_widgets['sidebar'] = array();
    update_option('sidebars_widgets', $sidebars_widgets);

}

add_action('pt-ocdi/before_widgets_import', 'inbio_before_widgets_import');

/*
 * Automatically assign
 * "Front page",
 * "Posts page" and menu
 * locations after the importer is done
 */
function inbio_after_import_setup($selected_import)
{

    $demo_imported = get_option('inbio_demo_imported');

    $cpt_support = get_option('elementor_cpt_support');
    $elementor_disable_color_schemes = get_option('elementor_disable_color_schemes');
    $elementor_disable_typography_schemes = get_option('elementor_disable_typography_schemes');
    $elementor_container_width = get_option('elementor_container_width');


    //check if option DOESN'T exist in db
    if (!$cpt_support) {
        $cpt_support = ['page', 'post', 'portfolio', 'elementor_disable_color_schemes']; //create array of our default supported post types
        update_option('elementor_cpt_support', $cpt_support); //write it to the database
    }
    if (empty($elementor_disable_color_schemes)) {
        update_option('elementor_disable_color_schemes', 'yes'); //update database
    }
    if (empty($elementor_disable_typography_schemes)) {
        update_option('elementor_disable_typography_schemes', 'yes'); //update database
    }
    if (empty($elementor_container_width)) {
        update_option('elementor_container_width', '1320'); //update database
    }

    $elementor_general_settings = array(
        'container_width' => (!empty($elementor_container_width)) ? $elementor_container_width : '1320',
    );
    update_option('_elementor_general_settings', $elementor_general_settings); //update database

    // Update Global Css Options For Elementor
    $currentTime = strtotime("now");
    $elementor_global_css = array(
        'time' => $currentTime,
        'fonts' => array()
    );
    update_option('_elementor_global_css', $elementor_global_css); //update database

    update_option('inbio_elementor_custom_setting_imported', 'elementor_custom_setting_imported');


    //  Update URL 
    $rbt_options_old_url = get_option('rainbow_options');
    $site_url = get_site_url();
    foreach($rbt_options_old_url as $key => $val) {
        if(isset($rbt_options_old_url[$key]['url'])) {
            if (str_contains($rbt_options_old_url[$key]['url'], 'https://rainbowit.net/themes/inbio')) {
                $rbt_options_old_url[$key]['url'] = str_replace('https://rainbowit.net/themes/inbio', $site_url, $rbt_options_old_url[$key]['url']);
            }
        }
    }
    update_option('rainbow_options', $rbt_options_old_url); //update database

    if (empty($demo_imported)) {

        // Home page selected
        if ('Home' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Home Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Technician' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Technician');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Technician Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Technician Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Senior UX Designer' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Senior UX Designer');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Senior UX Designer Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Senior UX Designer Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Doctor' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Doctor');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Doctor Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Doctor Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Lawyer' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Lawyer');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Lawyer Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Lawyer Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Designer Two' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Designer Two');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Designer Two Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Designer Two Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Designer Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Designer Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Model' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Model');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Model Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Model Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } 
        elseif ('Consulting' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Consulting');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } 
        elseif ('Consulting Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Consulting Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } 
        elseif ('Fashion Designer' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Fashion Designer');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } 
        elseif ('Fashion Designer Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Fashion Designer Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } 
        elseif ('Developer' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Developer');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } 
        elseif ('Developer Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Developer Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } 
        elseif ('Instructor Fitness' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Instructor Fitness');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } 
        elseif ('Instructor Fitness Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Instructor Fitness Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } 
        elseif ('Web Developer' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Web Developer');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } 

        elseif ('Web Developer Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Web Developer Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } 
        elseif ('Designer' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Designer');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } 

        elseif ('Designer Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Designer Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        } 
        elseif ('Content Writer' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Content Writer');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        }
        elseif ('Content Writer Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Content Writer Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        }
        elseif ('Instructor' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Instructor');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        }
        elseif ('Instructor Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Instructor Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        }
        elseif ('Freelancer' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Freelancer');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        }
        elseif ('Freelancer light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Freelancer light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        }
        elseif ('Photographer' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Photographer');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        }
        elseif ('Photographer Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Photographer Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        }
        elseif ('Politician' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Politician');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        }
        elseif ('Politician Light' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Politician Light');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        }

        elseif ('Marketer' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Marketer');
            update_option('inbio_theme_active_demo', $selected_import['import_file_name']);
        }

        $blog_page_id = get_page_by_title('Blog');
        update_option('show_on_front', 'page');
        update_option('page_on_front', $front_page_id->ID);

        update_option('page_for_posts', $blog_page_id->ID);

        update_option('inbio_demo_imported', 'imported');
    }

    // Set Menu As Primary && Off Canvus Menu
    $main_menu = get_term_by('name', 'Primary', 'nav_menu');
    set_theme_mod('nav_menu_locations', array(
        'primary' => $main_menu->term_id
    ));

}


add_action('pt-ocdi/after_import', 'inbio_after_import_setup');


/**
 * time_for_one_ajax_call
 * @return int
 */
function inbio_change_time_of_single_ajax_call()
{
    return 20;
}

add_action('pt-ocdi/time_for_one_ajax_call', 'inbio_change_time_of_single_ajax_call');


// To make demo imported items selected
add_action('admin_footer', 'inbio_pt_ocdi_add_scripts');
function inbio_pt_ocdi_add_scripts()
{
    $demo_imported = get_option('inbio_theme_active_demo');
    if (!empty($demo_imported)) {
        ?>
        <script>
            jQuery(document).ready(function ($) {
                $('.ocdi__gl-item.js-ocdi-gl-item').each(function () {
                    var ocdi_theme_title = $(this).data('name');
                    var current_ocdi_theme_title = '<?php echo strtolower($demo_imported); ?>';
                    if (ocdi_theme_title == current_ocdi_theme_title) {
                        $(this).addClass('active_demo');
                        return false;
                    }
                });
            });
        </script>
        <?php
    }
}
/**
 * Remove ads
 */
add_filter('pt-ocdi/disable_pt_branding', '__return_true');