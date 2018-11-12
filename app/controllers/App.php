<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    function latest_posts() {
        $args = array(
            'post_status' => 'publish',
            'post_type' => 'post',
            'orderby' => 'post_date',
            'order' => 'DESC',
            'paged' => get_query_var('paged'),
        );

        return new WP_Query( $args );
    }

    function popular_posts() {
        $args = array(
            'post_status' => 'publish',
            'meta_key' => 'post_views_count',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'paged' => get_query_var('paged'),
        );
        return new WP_Query( $args );
    }

    static function related_posts($post) {
        $tags = wp_get_post_tags($post->ID);

        if ($tags) {
            $tag_ids = array();

            foreach ($tags as $individual_tag)
                $tag_ids[] = $individual_tag->term_id;
            $args = array(
                'tag__in' => $tag_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page' => 5, // 表示する関連記事の数
                'orderby' => 'rand', // 過去記事に内部リンクできるので割と重要
            );
            return new wp_query($args);
        }
    }

    public function current_template() {
        if (is_front_page()) return 'frontpage';
        if (is_category()) return 'category';
        if (is_tag() || is_page( 'new') || is_page( 'popular')) return 'tags';
        if (is_single()) return 'posts';
        if (is_404()) return '404';

        return 'else';
    }

    static function is_mobile() {
        $userAgents = array(
            'iPhone',          // iPhone
            'iPod',            // iPod touch
            'Android.*mobile', // 1.5+ Android** Only mobile
            'Windows.*Phone',  // *** Windows Phone
            'dream',           // Pre 1.5 Android
            'CUPCAKE',         // 1.5+ Android
            'blackberry9500',  // Storm
            'blackberry9530',  // Storm
            'blackberry9520',  // Storm v2
            'blackberry9550',  // Storm v2
            'blackberry9800',  // Torch
            'webOS',           // Palm Pre Experimental
            'incognito',       // Other iPhone browser
            'webmate',         // Other iPhone browser
            'ipad',
        );
        $pattern = '/'.implode('|', $userAgents).'/i';
        return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
    }

    static function getTitle() {
        if ( is_single() ) {
            return wp_title('') . '｜Canarie [カナリエ]';
        } else {
            return 'Canarie [カナリエ]｜カナダのおもしろい、リアルな記事を。';
        }
    }
//get_post_meta(get_the_ID(), 'short_description', true)
    static function getDescription() {
        if ( is_single() ) {
            return get_post_meta(get_the_ID(), 'short_description', true);
        } else {
            return 'カナダのリアルを伝えるメディアサイト';
        }
    }

    static function getImage() {
        if ( is_single() ) {
            return get_the_post_thumbnail_url(get_the_ID(), 'normal_thumb');
        } else {
            return null;
        }
    }

    static function getType() {
        if ( is_single() ) {
            return 'article';
        } else {
            return 'website';
        }
    }

    static function getUrl() {
        if ( is_single() ) {
            return get_permalink();
        } else {
            return 'https://canarie.jp';
        }
    }
}
