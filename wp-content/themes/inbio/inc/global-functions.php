<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package inbio
 */

/**
 * Enqueue scripts and styles.
 */
if (!function_exists('rainbow_content_estimated_reading_time')) {
    /**
     * Function that estimates reading time for a given $content.
     * @param string $content Content to calculate read time for.
     * @paramint $wpm Estimated words per minute of reader.
     * @returns int $time Esimated reading time.
     */
    function rainbow_content_estimated_reading_time($content = '', $wpm = 200)
    {
        $clean_content = strip_shortcodes($content);
        $clean_content = strip_tags($clean_content);
        $word_count = str_word_count($clean_content);
        $time = ceil($word_count / $wpm);
        $output = $time . esc_attr__(' min read', 'inbio');
        return $output;
    }
}


/**
 * Escapeing
 */
if (!function_exists('rainbow_awescapeing')) {
    function rainbow_awescapeing($html)
    {
        return $html;
    }
}

/**
 *  Convert Get Theme Option global to function
 */
if (!function_exists('rainbow_get_opt')) {
    function rainbow_get_opt()
    {
        global $rainbow_option;
        return $rainbow_option;
    }
}
/**
 * Get terms
 */
function rainbow_get_terms_gb($term_type = null, $hide_empty = false)
{
    if (!isset($term_type)) {
        return;
    }
    $rainbow_custom_terms = array();
    $terms = get_terms($term_type, array('hide_empty' => $hide_empty));
    array_push($rainbow_custom_terms, esc_html__('--- Select ---', 'inbio'));
    if (is_array($terms) && !empty($terms)) {
        foreach ($terms as $single_term) {
            if (is_object($single_term) && isset($single_term->name, $single_term->slug)) {
                $rainbow_custom_terms[$single_term->slug] = $single_term->name;
            }
        }
    }
    return $rainbow_custom_terms;
}

/**
 * Blog Pagination
 */
if (!function_exists('rainbow_blog_pagination')) {
    function rainbow_blog_pagination()
    {
        global $wp_query;
        if ($wp_query->post_count < $wp_query->found_posts) {
            ?>
            <div class="post-pagination text-center"> <?php
                the_posts_pagination(array(
                    'prev_text' => '<i class="feather-arrow-left"></i>',
                    'next_text' => '<i class="feather-arrow-right"></i>',
                    'type' => 'list',
                    'show_all' => false,
                    'end_size' => 1,
                    'mid_size' => 8,
                )); ?>
            </div>
            <?php
        }
    }
}

/**
 * Short Title
 */
if (!function_exists('rainbow_short_title')) {
    function rainbow_short_title($title, $length = 30)
    {
        if (strlen($title) > $length) {
            return substr($title, 0, $length) . ' ...';
        } else {
            return $title;
        }
    }
}


/**
 * Get ACF data conditionally
 */
if (!function_exists('rainbow_get_acf_data')) {
    function rainbow_get_acf_data($fields)
    {
        return (class_exists('ACF') && get_field_object($fields)) ? get_field($fields) : false;
    }

}


/**
 * @param $url
 * @return string
 */
if (!function_exists('rainbow_getEmbedUrl')) {
    function rainbow_getEmbedUrl($url)
    {
        // function for generating an embed link
        $finalUrl = '';

        if (strpos($url, 'facebook.com/') !== false) {
            // Facebook Video
            $finalUrl .= 'https://www.facebook.com/plugins/video.php?href=' . rawurlencode($url) . '&show_text=1&width=200';

        } else if (strpos($url, 'vimeo.com/') !== false) {
            // Vimeo video
            $videoId = isset(explode("vimeo.com/", $url)[1]) ? explode("vimeo.com/", $url)[1] : null;
            if (strpos($videoId, '&') !== false) {
                $videoId = explode("&", $videoId)[0];
            }
            $finalUrl .= 'https://player.vimeo.com/video/' . $videoId;

        } else if (strpos($url, 'youtube.com/') !== false) {
            // Youtube video
            $videoId = isset(explode("v=", $url)[1]) ? explode("v=", $url)[1] : null;
            if (strpos($videoId, '&') !== false) {
                $videoId = explode("&", $videoId)[0];
            }
            $finalUrl .= 'https://www.youtube.com/embed/' . $videoId;

        } else if (strpos($url, 'youtu.be/') !== false) {
            // Youtube  video
            $videoId = isset(explode("youtu.be/", $url)[1]) ? explode("youtu.be/", $url)[1] : null;
            if (strpos($videoId, '&') !== false) {
                $videoId = explode("&", $videoId)[0];
            }
            $finalUrl .= 'https://www.youtube.com/embed/' . $videoId;

        } else if (strpos($url, 'dailymotion.com/') !== false) {
            // Dailymotion Video
            $videoId = isset(explode("dailymotion.com/", $url)[1]) ? explode("dailymotion.com/", $url)[1] : null;
            if (strpos($videoId, '&') !== false) {
                $videoId = explode("&", $videoId)[0];
            }
            $finalUrl .= 'https://www.dailymotion.com/embed/' . $videoId;

        } else {
            $finalUrl .= $url;
        }

        return $finalUrl;
    }
}

 
/***
 * pt_like_it
 */
add_action('wp_ajax_nopriv_rainbow_pt_like_it', 'rainbow_pt_like_it');
add_action('wp_ajax_rainbow_pt_like_it', 'rainbow_pt_like_it');
if (!function_exists('rainbow_pt_like_it')) {
    function rainbow_pt_like_it()
    {

        if (!wp_verify_nonce($_REQUEST['nonce'], 'rainbow_pt_like_it_nonce') || !isset($_REQUEST['nonce'])) {
            exit("No naughty business please");
        }

        $likes = get_post_meta($_REQUEST['post_id'], '_pt_likes', true);
        $likes = (empty($likes)) ? 0 : $likes;
        $new_likes = $likes + 1;

        update_post_meta($_REQUEST['post_id'], '_pt_likes', $new_likes);

        if (defined('DOING_AJAX') && DOING_AJAX) {
            echo esc_html($new_likes);
            die();
        } else {
            wp_redirect(get_permalink($_REQUEST['post_id']));
            exit();
        }
    }
}



/**
 * @param $tags
 * @param $context
 * @return array
 */
if (!function_exists('rainbow_kses_allowed_html')) {
    function rainbow_kses_allowed_html($tags, $context)
    {
        switch ($context) {
            case 'social':
                $tags = array(
                    'a' => array('href' => array()),
                    'b' => array()
                );
                return $tags;
            case 'allow_link':
                $tags = array(
                    'a' => array(
                        'class' => array(),
                        'href' => array(),
                        'rel' => array(),
                        'title' => array(),
                        'target' => array(),
                    ),
                    'b' => array()
                );
                return $tags;
            case 'allow_title':
                $tags = array(
                    'a' => array(
                        'class' => array(),
                        'href' => array(),
                        'rel' => array(),
                        'title' => array(),
                        'target' => array(),
                    ),
                    'span' => array(
                        'class' => array(),
                        'style' => array(),
                    ),
                    'b' => array()
                );
                return $tags;

            case 'alltext_allow':
                $tags = array(
                    'a' => array(
                        'class' => array(),
                        'href' => array(),
                        'rel' => array(),
                        'title' => array(),
                        'target' => array(),
                    ),
                    'abbr' => array(
                        'title' => array(),
                    ),
                    'b' => array(),
                    'br' => array(),
                    'blockquote' => array(
                        'cite' => array(),
                    ),
                    'cite' => array(
                        'title' => array(),
                    ),
                    'code' => array(),
                    'del' => array(
                        'datetime' => array(),
                        'title' => array(),
                    ),
                    'dd' => array(),
                    'div' => array(
                        'class' => array(),
                        'title' => array(),
                        'style' => array(),
                        'id' => array(),
                    ),
                    'dl' => array(),
                    'dt' => array(),
                    'em' => array(),
                    'h1' => array(),
                    'h2' => array(),
                    'h3' => array(),
                    'h4' => array(),
                    'h5' => array(),
                    'h6' => array(),
                    'i' => array(
                        'class' => array(),
                    ),
                    'img' => array(
                        'alt' => array(),
                        'class' => array(),
                        'height' => array(),
                        'src' => array(),
                        'srcset' => array(),
                        'width' => array(),
                    ),
                    'li' => array(
                        'class' => array(),
                    ),
                    'ol' => array(
                        'class' => array(),
                    ),
                    'p' => array(
                        'class' => array(),
                    ),
                    'q' => array(
                        'cite' => array(),
                        'title' => array(),
                    ),
                    'span' => array(
                        'class' => array(),
                        'title' => array(),
                        'style' => array(),
                    ),
                    'strike' => array(),
                    'strong' => array(),
                    'ul' => array(
                        'class' => array(),
                    ),
                );
                return $tags;
            default:
                return $tags;
        }
    }

    add_filter('wp_kses_allowed_html', 'rainbow_kses_allowed_html', 10, 2);
}
   

/**
 * Slugify
 */
if (!function_exists('rainbow_slugify')) {
    function rainbow_slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        if (function_exists('iconv')) {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}


/**
 * Escapeing
 */
if (!function_exists('rainbow_escapeing')) {
    function rainbow_escapeing($html)
    {
        return $html;
    }
}

if(!function_exists('insertArrayAtPosition')){
    function insertArrayAtPosition( $array, $insert, $position ) {
        /*
        $array : The initial array i want to modify
        $insert : the new array i want to add, eg array('key' => 'value') or array('value')
        $position : the position where the new array will be inserted into. Please mind that arrays start at 0
        */
        return array_slice($array, 0, $position, TRUE) + $insert + array_slice($array, $position, NULL, TRUE);
    }
}


/**
 * Get Post Thumbnail Size
 */

if(!function_exists('rainbow_get_thumbnail_sizes')){
    function rainbow_get_thumbnail_sizes()
    {
        $sizes = get_intermediate_image_sizes();

//        $sizes = insertArrayAtPosition($sizes, array('default' => 'default'), 0);

        $image_sizes = [];

        foreach ($sizes as $size) {
            $image_sizes[$size] = $size;
        }
        /** This filter is documented in wp-admin/includes/media.php */
        return apply_filters( 'image_size_names_choose', $image_sizes );
    }
}


/**
 * Convert hexdec color string to rgb(a) string
 * @param $color
 * @param bool $opacity
 * @return string
 */
if(!function_exists('rainbow_hex2rgba')){
    function rainbow_hex2rgba($color, $opacity = false) {

        $default = 'rgba(249, 0, 77, 0.1)';

        //Return default if no color provided
        if(empty($color)) {
            return $default;
        }

        //Sanitize $color if "#" is provided
        if ($color[0] == '#' ) {
            $color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
            return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
            if(abs($opacity) > 1)
                $opacity = 1.0;
            $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
            $output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;
    }
}




if(!function_exists('rainbow_get_allowed_html_tags')){
    /**
     * Get a list of all the allowed html tags.
     *
     * @param string $level Allowed levels are basic and intermediate
     * @return array
     */
    function rainbow_get_allowed_html_tags($level = 'basic')
    {
        $allowed_html = [
            'b' => [],
            'i' => [
                'class' => [],
            ],
            'u' => [],
            'em' => [],
            'br' => [],
            'abbr' => [
                'title' => [],
            ],
            'span' => [
                'class' => [],
            ],
            'strong' => [],
        ];

        if ($level === 'intermediate') {
            $allowed_html['a'] = [
                'href' => [],
                'title' => [],
                'class' => [],
                'id' => [],
                'target' => [],
            ];
        }

        if ($level === 'advance') {
            $allowed_html['ul'] = [
                'class' => [],
                'id' => [],
            ];
            $allowed_html['ol'] = [
                'class' => [],
                'id' => [],
            ];
            $allowed_html['li'] = [
                'class' => [],
                'id' => [],
            ];
            $allowed_html['a'] = [
                'href' => [],
                'title' => [],
                'class' => [],
                'id' => [],
                'target' => [],
            ];

        }

        return $allowed_html;
    }
}

if(!function_exists('rainbow_kses_advance')){
    /**
     * Strip all the tags except allowed html tags
     *
     * The name is based on inline editing toolbar name
     *
     * @param string $string
     * @return string
     */
    function rainbow_kses_advance($string = '')
    {
        return wp_kses($string, rainbow_get_allowed_html_tags('advance'));
    }
}

if(!function_exists('')){
    /**
     * Strip all the tags except allowed html tags
     *
     * The name is based on inline editing toolbar name
     *
     * @param string $string
     * @return string
     */
    function rainbow_kses_intermediate($string = '')
    {
        return wp_kses($string, rainbow_get_allowed_html_tags('intermediate'));
    }
}

if(!function_exists('rainbow_kses_basic')){
    /**
     * Strip all the tags except allowed html tags
     *
     * The name is based on inline editing toolbar name
     *
     * @param string $string
     * @return string
     */
    function rainbow_kses_basic($string = '')
    {
        return wp_kses($string, rainbow_get_allowed_html_tags('basic'));
    }
}

if(!function_exists('rainbow_get_allowed_html_desc')){
    /**
     * Get a translatable string with allowed html tags.
     *
     * @param string $level Allowed levels are basic and intermediate
     * @return string
     */
    function rainbow_get_allowed_html_desc($level = 'basic')
    {
        if (!in_array($level, ['basic', 'intermediate', 'advance'])) {
            $level = 'basic';
        }

        $tags_str = '<' . implode('>,<', array_keys(rainbow_get_allowed_html_tags($level))) . '>';
        return sprintf(__('This input field has support for the following HTML tags: %1$s', 'inbio'), '<code>' . esc_html($tags_str) . '</code>');
    }
}


if(!function_exists('rainbow_allow_skype_protocol')){
    /**
     * @param $protocols
     * @return mixed
     */
    function rainbow_allow_skype_protocol( $protocols ){
        $protocols[] = 'skype';
        return $protocols;
    }
}
add_filter( 'kses_allowed_protocols' , 'rainbow_allow_skype_protocol' );







// Remove "Protected:" from password-protected project post titles
function rainbow_remove_protected_text_from_project($title, $id = null) {
    if (get_post_type($id) === 'rainbow_projects' && post_password_required($id)) {
    
        $title = str_replace('Protected:', '', $title);
        
    }
    return $title;
}
add_filter('the_title', 'rainbow_remove_protected_text_from_project', 10, 2);
