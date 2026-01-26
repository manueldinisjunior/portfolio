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

class Rb_Resume_library_tabs extends Widget_Base
{

    public function get_name()
    {
        return 'rb-library-resume-tab';
    }

    public function get_title()
    {
        return __('Resume Library Tabs', 'rainbow-elements');
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
            'recommended_on',
            [
                'label' => esc_html__('Active', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'rainbow-elements'),
                'label_off' => esc_html__('Off', 'rainbow-elements'),
                'default' => 'no',

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

        $this->add_control(
            'library_tab_items',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'default' => [
                    [
                        'tab_nav' => esc_html__('Standard Feature', 'rainbow-elements'),

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
        <div class="rn-resume-area">
            <ul class="rn-nav-list nav nav-tabs" role="tablist">
                <?php
                $i = "";
                $j = "";
                $i == 1;
                foreach ($settings['library_tab_items'] as $library_tab_item):
                    $tab_nav = $library_tab_item['tab_nav'];
                    $i++;
                    $nav_link = $i == 1 ? 'isActive active' : null;
                    $has_recommended = $library_tab_item['recommended_on'] == 'yes' ? 'recommended' : 'no-recommended';
                    $has_active = $library_tab_item['recommended_on'] == 'yes' ? 'active' : 'no-active';
                    ?>
                    <li class="nav-item <?php echo esc_attr($has_recommended); ?>">
                        <a class="nav-link <?php echo esc_attr($has_active); ?>"
                           id="rb2basicPlan-<?php echo esc_attr($i); ?>" data-toggle="tab"
                           href="#brtab_link_<?php echo esc_attr($i); ?>" role="tab"
                           aria-selected="false"><?php echo wp_kses_post($tab_nav); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="rn-nav-content tab-content">
                <?php
                $j == 1;
                foreach ($settings['library_tab_items'] as $elementor_library):
                    $j++;
                    $library_elementor_library = $elementor_library['library_tab_library']; 
                    $tabpanel = $elementor_library['recommended_on'] == 'yes' ? 'active show' : 'no-active'; 
                     
                    ?>
                    <div class="tab-pane fade single-tab-area <?php echo esc_attr($tabpanel); ?>"
                         id="brtab_link_<?php echo esc_attr($j); ?>"
                         aria-labelledby="rb2basicPlan-<?php echo esc_attr($i); ?>">
                        <?php echo $content_1 = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display($library_elementor_library); ?>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
        <?php
    }
}