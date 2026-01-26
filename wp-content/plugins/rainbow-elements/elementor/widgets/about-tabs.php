<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

namespace rainbow\Rainbow_Elements;
use Elementor\Widget_Base;
use Elementor\Repeater;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Rb_about_tabs extends Widget_Base
{

    public function get_name()
    {
        return 'rb-about-tab';
    }

    public function get_title()
    {
        return __('About Tabs', 'rainbow-elements');
    }

    public function get_icon()
    {
        return 'eicon-accordion';
    }

    public function get_categories()
    {
        return [RAINBOW_ELEMENTS_THEME_PREFIX . '-widgets'];
    }

    public function get_post_template()
    {
        $posts = get_posts(
            array(
                'post_type' => 'elementor_library',
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => '-1',
            )
        );
        $templates = array();
        foreach ($posts as $post) {
            $templates[] = array(
                'id' => $post->ID,
                'name' => $post->post_title,
            );
        }
        return $templates;
    }

    public function get_saved_data()
    {
        $saved_widgets = $this->get_post_template();
        $options[-1] = __('Select', 'rainbow-elements');
        if (count($saved_widgets)) {
            foreach ($saved_widgets as $saved_row) {
                $options[$saved_row['id']] = $saved_row['name'];
            }
        } else {
            $options['no_template'] = __('It seems that, you have not saved any template yet.', 'rainbow-elements');
        }
        return $options;
    }

    public function get_content_type()
    {
        $content_type = array(
            'content' => esc_html__('Content', 'rainbow-elements'),
            'saved_rows' => esc_html__('Saved Section', 'rainbow-elements'),
            'saved_page_templates' => esc_html__('Saved Page', 'rainbow-elements'),
        );
        return $content_type;
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'library_tab_content',
            [
                'label' => esc_html__('Library Tabs Items', 'rainbow-elements'),
            ]
        );


        $repeater = new Repeater();

        $repeater->add_control(
            'tab_nav',
            [
                'label' => esc_html__('Nav Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Static', 'rainbow-elements'),
            ]
        );
        
        $repeater->add_control(
            'library_tab_library',
            [
                'label' => __('Elementor Library', 'uiart-elements'),
                'type' => Controls_Manager::SELECT2,
                'default' => '-1',
                'options' => $this->get_saved_data(),
            ]
        );
        $repeater->add_control(
            'recommended_on',
            [
                'label' => esc_html__('Active', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'rainbow-elements'),
                'label_off' => esc_html__('Off', 'rainbow-elements'),
                'default' => 'no',

            ]
        );
        $this->add_control(
            'library_tab_items',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'default' => [
                    [
                        'tab_nav' => esc_html__('About', 'rainbow-elements'),
                        'recommended_on' => 'yes',

                    ],
                    [
                        'tab_nav' => esc_html__('Resume', 'rainbow-elements'),
                        'recommended_on' => 'no',

                    ],

                ],

                'title_field' => '{{{ tab_nav }}}',
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings();
        ?>

        <div class="row mt--40 tab-content-wrapper">
            <div class="col-lg-2">
                <div class="d-flex flex-wrap align-content-start h-100 w-100">
                    <div class="position-sticky content-wrapper sticky-top rbt-sticky-top-adjust-three w-100">
                        <ul class="nav tab-navigation-button tab-smlg flex-column nav-pills me-3" id="v-pills-about-tab"
                            role="tablist">

                            <?php
                            $i = "";
                            $j = "";
                            $i == 1;
                            foreach ($settings['library_tab_items'] as $library_tab_item):
                                $tab_nav = $library_tab_item['tab_nav'];
                                $i++;
                                 
                                $has_active = $library_tab_item['recommended_on'] == 'yes' ? 'active' : 'no-active';
                                 
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link rn-nav <?php echo esc_attr($has_active); ?>"
                                       id="v-pills-about-<?php echo esc_attr($i); ?>-tab" data-toggle="tab"
                                       href="#v-pills-about-<?php echo esc_attr($i); ?>" role="tab">
                                        <?php echo wp_kses_post($tab_nav); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>


                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="tab-area">
                    <div class="d-flex align-items-start">
                        <div class="tab-content" id="v-pills-about-tabContent">

                            <?php
                            $j == 1;
                            foreach ($settings['library_tab_items'] as $elementor_library):
                                $j++;
                                $library_elementor_library = $elementor_library['library_tab_library'];
                                $tabpanel = $j == 1 ? 'active show' : null; 
                                $tabpanel = $elementor_library['recommended_on'] == 'yes' ? 'active show' : 'no-active';
                                ?>

                                <div class="tab-pane fade <?php echo esc_attr($tabpanel); ?>"
                                     id="v-pills-about-<?php echo esc_attr($j); ?>">
                                    <?php echo $content_1 = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display($library_elementor_library); ?>
                                </div>

                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}