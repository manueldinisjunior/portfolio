<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

namespace rainbow\Rainbow_Elements;
if( !class_exists('rainbow_Elements_Helper') ){
    class rainbow_Elements_Helper
    {

    public static function generate_array_iterator_postfix($array, $index, $postfix = '|')
        {
            $length = count($array);
            if ($length) {
                $last_index = $length - 1;
                return $index < $last_index ? $postfix : '';
            }
        }
    
        public static function get_projects_cat($postID)
        {

            $terms = wp_get_post_terms($postID, "rainbow_projects_category", array('fields' => 'all'));
            if (!empty($terms)) {
                foreach ($terms as $index => $term) { ?>
                    <a href="<?php echo get_category_link($term->term_id); ?>"><?php echo esc_html($term->name); ?></a>
                    <?php echo esc_html(self::generate_array_iterator_postfix($terms, $index, "|")) ?>
                    <?php
                }
            }
            return;
        }

        public static function get_projects_cat_label($postID)
        {

            $terms = wp_get_post_terms($postID, "rainbow_projects_category", array('fields' => 'all'));
            if (!empty($terms)) {
                foreach ($terms as $index => $term) { ?>
                    <span><?php echo esc_html($term->name); ?></span>
                    <?php echo esc_html(self::generate_array_iterator_postfix($terms, $index, "|")) ?>
                    <?php
                }
            }
            return;
        }

        public static function get_blogs_cat($postID)
        {

            $terms = wp_get_post_terms($postID, "category", array('fields' => 'all'));
            if (!empty($terms)) {
                foreach ($terms as $index => $term) { ?>
                    <a href="<?php echo get_category_link($term->term_id); ?>"><?php echo esc_html($term->name); ?></a>
                    <?php echo esc_html(self::generate_array_iterator_postfix($terms, $index, "|")) ?>
                    <?php
                }
            }
            return;
        }

        public static function get_blogs_cat_label($postID)
        {

            $terms = wp_get_post_terms($postID, "category", array('fields' => 'all'));
            if (!empty($terms)) {
                foreach ($terms as $index => $term) { ?>
                    <span><?php echo esc_html($term->name); ?></span>
                    <?php echo esc_html(self::generate_array_iterator_postfix($terms, $index, "|")) ?>
                    <?php
                }
            }
            return;
        } 

        public static function wp_set_temp_query($query)
        {
            global $wp_query;
            $temp = $wp_query;
            $wp_query = $query;
            return $temp;
        }

        public static function wp_reset_temp_query($temp)
        {
            global $wp_query;
            $wp_query = $temp;
            wp_reset_postdata();
        }

        /**
         * Generate Excerpt
         */

        public static function rainbow_get_asset_file($file)
        {
            return RAINBOW_CORE_ASSETS . $file;
        }

        public static function rainbow_get_css($file)
        {
            $file = RAINBOW_CORE_ASSETS . 'css/' . $file . '.css';
            return $file;
        }

        public static function rainbow_get_font_flaticon_css($file)
        {
            $file = RAINBOW_CORE_ASSETS . 'flaticon/' . $file;
            return $file;
        }

        public static function rainbow_element_template($template, $settings)
        {
            $template_name = "/rainbow-widgets/templates/{$template}.php";
            if (file_exists(STYLESHEETPATH . $template_name)) {
                $file = STYLESHEETPATH . $template_name;
            } elseif (file_exists(TEMPLATEPATH . $template_name)) {
                $file = TEMPLATEPATH . $template_name;
            } else {
                $file = __DIR__ . "/widgets/templates/{$template}.php";
            }
            ob_start();
            include $file;
            echo ob_get_clean();
        }


        public static function rainbow_get_all_pages()
        {

            $page_list = get_posts(array(
                'post_type' => 'page',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => -1,
            ));

            $pages = array();

            if (!empty($page_list) && !is_wp_error($page_list)) {
                foreach ($page_list as $page) {
                    $pages[$page->post_name] = $page->post_title;
                }
            }

            return $pages;

        }


        public static function rainbow_get_all_types_post($post_type)
        {
            $posts_args = get_posts(array(
                'post_type' => $post_type,
                'orderby' => 'date',
                'order' => 'DESC',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            ));

            $posts = array();

            if (!empty($posts_args) && !is_wp_error($posts_args)) {
                foreach ($posts_args as $post) {
                    $posts[$post->ID] = $post->post_title;
                }
            }

            return $posts;
        }


        public static function rainbow_get_categories($taxonomy)
        {
            $terms = get_terms(array(
                'taxonomy' => $taxonomy,
                'hide_empty' => true,
            ));
            $options = array();
            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    $options[$term->slug] = $term->name;
                }
            }
            return $options;

        }


        public static function rainbow_get_orderby_options()
        {
            $orderby = array(
                'ID' => esc_html__('Post ID', 'rainbow-elements'),
                'author' => esc_html__('Post Author', 'rainbow-elements'),
                'title' => esc_html__('Title', 'rainbow-elements'),
                'date' => esc_html__('Date', 'rainbow-elements'),
                'modified' => esc_html__('Last Modified Date', 'rainbow-elements'),
                'parent' => esc_html__('Parent Id', 'rainbow-elements'),
                'rand' => esc_html__('Random', 'rainbow-elements'),
                'comment_count' => esc_html__('Comment Count', 'rainbow-elements'),
                'menu_order' => esc_html__('Menu Order', 'rainbow-elements'),
            );
            return $orderby;
        }

        public static function rainbow_get_query_args($posttype, $taxonomy, $settings)
        {

            if (get_query_var('paged')) {
                $paged = get_query_var('paged');
            } else if (get_query_var('page')) {
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }

            $category_list = '';
            if (!empty($settings['category'])) {
                $category_list = implode(", ", $settings['category']);
            }
            $category_list_value = explode(" ", $category_list);


            $exclude_category_list = '';
            if (!empty($settings['exclude_category'])) {
                $exclude_category_list = implode(", ", $settings['exclude_category']);
            }
            $exclude_category_list_value = explode(" ", $exclude_category_list);


            $posts_per_page = (!empty($settings['posts_per_page'])) ? $settings['posts_per_page'] : '-1';
            $orderby = (!empty($settings['orderby'])) ? $settings['orderby'] : 'post_date';
            $order = (!empty($settings['order'])) ? $settings['order'] : 'desc';
            $offset_value = (!empty($settings['offset'])) ? $settings['offset'] : '0';


            // number
            $off = (!empty($offset_value)) ? $offset_value : 0;
            $offset = $off + (($paged - 1) * $posts_per_page);
            $p_ids = array();


            // Post in
            $post_in = $settings['post__not_in'];
            if ($post_in >= 1 && !empty($post_in)) {
                $post_in_ids = implode(', ', $post_in);
            } else {
                $post_in_ids = '';
            }
            $in_posts = explode(',', $post_in_ids);

            $args = array(
                'post_type' => $posttype,
                'post_status' => 'publish',
                'posts_per_page' => $posts_per_page,
                'orderby' => $orderby,
                'order' => $order,
                'offset' => $offset,
                'paged' => $paged,
                'category__not_in' => $exclude_category_list_value,
            );

            // ignore_sticky_posts and manually Exclude
            $sticky = get_option('sticky_posts');
            if (!empty($settings['ignore_sticky_posts']) && $settings['ignore_sticky_posts'] == 'yes') {
                $args['ignore_sticky_posts'] = 1;

                if (!empty($settings['post__not_in'])) {
                    $post__not_in = $settings['post__not_in'];
                    $posts_not_in = array_merge($post__not_in, $sticky);
                    $args['post__not_in'] = $posts_not_in;
                } else {
                    $args['post__not_in'] = $sticky;
                }

            } else {
                if (!empty($settings['post__not_in'])) {
                    $post__not_in = $settings['post__not_in'];
                    $args['post__not_in'] = $post__not_in;
                }
            }

            // show_sticky_posts and manually Exclude
            if (!empty($settings['show_only_sticky_posts']) && $settings['show_only_sticky_posts'] == 'yes') {
                $args['ignore_sticky_posts'] = 1;
                // post__in
                if ("0" != $in_posts && !empty($settings['post__in'])) {
                    $posts_in = array_merge($in_posts, $sticky);
                    $args['post__in'] = $posts_in;
                } else {
                    $args['post__in'] = $sticky;
                }
            } else {
                // post__in
                if ("0" != $in_posts && !empty($settings['post__in'])) {
                    $args['post__in'] = $in_posts;
                }
            }


            if (!empty($settings['category'])) {
                $args['tax_query'][] = [
                    'taxonomy' => $taxonomy,
                    'field' => 'slug',
                    'terms' => $category_list_value,
                ];
            }

            if (!empty($settings['post_format'])) {
                $args['tax_query'][] = [
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => $settings['post_format'],
                ];
            }

            return $args;
        }
    }
}
 