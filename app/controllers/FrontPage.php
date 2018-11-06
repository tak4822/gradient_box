<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class FrontPage extends Controller
{
    /**
     * Return array of featured post
     *
     * @return array
     */
    static function get_slider_data() {

        $size = 'normal_thumb';
        $descLength = 300;
        if(App::is_mobile()) {
           $size = 'small_thumb';
           $descLength = 130;
        }

        $args = array(
            'meta_key'   => 'slider',
            'meta_value' =>  true
        );
        $the_query = new WP_Query( $args );

        if ( $the_query->have_posts() ) {
            $slider_data = array();
            $count = 0;
            while ( $the_query->have_posts() && $count < 7) {
                $the_query->the_post();
                $c = get_the_category();

               //  $titleLength = 56; TODO: do we need put '...' for shorten title for slider it shorten function should happen desktop as well
                $title = get_the_title();
//                if (strlen($title) > $titleLength) {
//                    $title = mb_strimwidth($title, 0, $titleLength, "...", "UTF-8");
//                }
                $shortDesc = get_post_meta($the_query->post->ID, 'short_description', true);
                if (strlen($shortDesc) > $descLength) {
                    $shortDesc = mb_strimwidth($shortDesc, 0, $descLength, "...", "UTF-8");
                }
                $output = array(
                    'link' => get_permalink(),
                    'title' => $title,
                    'category' => $c[0]->cat_name,
                    'short_description' => $shortDesc,
                    'image' =>  get_the_post_thumbnail_url($the_query->post->ID, $size),
                );
                array_push($slider_data, $output);
                $count ++;
            }
            wp_reset_postdata();
        }

        return $slider_data;
    }
}
