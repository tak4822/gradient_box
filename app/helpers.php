<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    if (remove_action('wp_head', 'wp_enqueue_scripts', 1)) {
        wp_enqueue_scripts();
    }

    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                        "{$template}.blade.php",
                        "{$template}.php",
                    ];
                });
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', true);
    return $display;
}

/**
 * Get all tags depends on the current category
 * @return array
 */
function my_category_tag_cloud($args) {
    $defaults = array(
        'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
        'format' => 'flat', 'separator' => "\n", 'orderby' => 'name', 'order' => 'ASC',
        'exclude' => '', 'include' => '', 'link' => 'view', 'taxonomy' => 'post_tag', 'echo' => true
    );
    $args = wp_parse_args( $args, $defaults );

    global $wpdb;
    $query = "
    SELECT DISTINCT terms2.term_id as term_id, terms2.name as name, t2.count as count
    FROM
      $wpdb->posts as p1
        LEFT JOIN $wpdb->term_relationships as r1 ON p1.ID = r1.object_ID
        LEFT JOIN $wpdb->term_taxonomy as t1 ON r1.term_taxonomy_id = t1.term_taxonomy_id
        LEFT JOIN $wpdb->terms as terms1 ON t1.term_id = terms1.term_id,
      $wpdb->posts as p2
        LEFT JOIN $wpdb->term_relationships as r2 ON p2.ID = r2.object_ID
        LEFT JOIN $wpdb->term_taxonomy as t2 ON r2.term_taxonomy_id = t2.term_taxonomy_id
        LEFT JOIN $wpdb->terms as terms2 ON t2.term_id = terms2.term_id
      WHERE
        t1.taxonomy = 'category' AND p1.post_status = 'publish' AND terms1.term_id = " . $args['cat'] . " AND
        t2.taxonomy = 'post_tag' AND p2.post_status = 'publish'
        AND p1.ID = p2.ID
  ";
    $tags = $wpdb->get_results($query);
//
//    var_dump($tags);
//    die();
//    foreach ( $tags as $key => $tag ) {
//        if ( 'edit' == $args['link'] )
//            $link = get_edit_tag_link( $tag->term_id, $args['taxonomy'] );
//        else
//            $link = get_term_link( intval($tag->term_id), $args['taxonomy'] );
//        if ( is_wp_error( $link ) )
//            return false;
//
//        $tags[ $key ]->link = $link;
//        $tags[ $key ]->id = $tag->term_id;
//    }
//
//    $return = wp_generate_tag_cloud( $tags, $args );
//    $return = apply_filters( 'wp_tag_cloud', $return, $args );
//
//    if ( 'array' == $args['format'] || empty($args['echo']) )
//        return $return;

    return $tags;
}

function pagination($post_length, $pages = '', $range = 4){
   //  $showItems = ($range * 2)+1; // リンクの数

    global $paged; //現在のページの値
    if( empty($paged) ){  //デフォルトのページ
        $paged = 1;
    }

    $posts_per_page = get_option('posts_per_page');
    $page_number_max = ceil($post_length / $posts_per_page);

    if( $pages == '' ){
        $pages = $page_number_max;  //全ページ数を取得
        if( !$pages ){ //全ページ数が空の場合は、1にする
            $pages = 1;
        }
    }



    if( 1 != $pages ){  //全ページ数が1以外の場合は以下を出力する
//        echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
//        if( $paged > 2 && $paged > $range+1 && $showItems < $pages ){
//            echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
//        }
//        if( $paged > 1 && $showItems < $pages ){
//            echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
//        }
        for ($i=1; $i <= $pages; $i++){
//            if ( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showItems ){
//                echo ($paged == $i)? "<span class=\"pagination-item current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"pagination-item inactive\">" . $i . "</a>";
//            }
            echo ($paged == $i) ? "<span class=\"pagination-item current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"pagination-item inactive\">" . $i . "</a>";
        }

//        if ( $paged < $pages && $showItems < $pages ){
//            echo "<a class='pagination-item' href=\"".get_pagenum_link($paged + 1)."\">&rsaquo;</a>";
//        }
//        if ( $paged < $pages-1 &&  $paged+$range-1 < $pages && $showItems < $pages ){
//            echo "<a class='pagination-item' href='".get_pagenum_link($pages)."'>&raquo;</a>";
//        }
//        echo "</div>\n";
    }
}

//記事のビュー数を更新させる
function setPostViews($post_id) {
    $custom_key = 'post_views_count';
    $count = get_post_meta($post_id, $custom_key, true);
    //初めてのビューどうか
    if($count == ''){
        delete_post_meta($post_id, $custom_key);
        add_post_meta($post_id, $custom_key, '0');
    }else{
        $count++;
        update_post_meta($post_id, $custom_key, $count);
    }
}
//記事のビュー数を取得
function getPostViews($post_id){
    $custom_key = 'post_views_count';
    $count = get_post_meta($post_id, $custom_key, true);
    if($count==''){
        //まだ0ビューなら
        delete_post_meta($post_id, $custom_key);
        add_post_meta($post_id, $custom_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
