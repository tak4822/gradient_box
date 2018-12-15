<?php

namespace App;

function headingFunc( $atts,  $content = null ) {
    $html = "<div class='custom-heading'><div class='custom-heading-deco'></div><h2 class='custom-heading-text'>" . $content . "</h2></div>";
    return $html;
}
add_shortcode('heading', __NAMESPACE__ . '\\headingFunc');

function redFunc( $atts,  $content = null ) {
    $html = "<div class='custom-red'><div class='custom-red-deco'></div><h3 class='custom-red-text'>" . $content . "</h3></div>";
    return $html;
}
add_shortcode('red', __NAMESPACE__ . '\\redFunc');

function noteFunc( $atts,  $content = null ) {
    $html = "<div class='custom-note'><p class='custom-note-text'>" . $content . "</p></div>";
    return $html;
}
add_shortcode('note', __NAMESPACE__ . '\\noteFunc');

//内部リンクをはてなカード風にするショートコード
function nlinkFunc($atts) {
    extract(shortcode_atts(array( 'url'=>"", 'title'=>""), $atts));
    $id = url_to_postid($url); //URLから投稿IDを取得
//    $post = get_post($id); //IDから投稿情報の取得
//     $date = mysql2date('Y-m-d H:i', $post->post_date);//投稿日の取得
    $descLength = 200;

    if(empty($title)){
        $title = esc_html(get_the_title($id));
    } //アイキャッチ画像を取得
    $img_url = get_the_post_thumbnail_url($id, 'small_thumb');
    $shortDesc = get_post_meta($id, 'short_description', true);
    $shortDesc = mb_strimwidth($shortDesc, 0, $descLength, "...", "UTF-8");

    $nlink = '<a href="' . $url . '" class="nlink">
                <div class="nlink-img">
                    <img src="'. $img_url .'">
                </div>  
                <div>
                    <p class="title">' . $title . '</p>
                    <p class="description">' . $shortDesc . '</p>
                </div>
            </a>';
    return $nlink;

}
add_shortcode("nlink", __NAMESPACE__ . '\\nlinkFunc');

function article_thumb( $atts,  $content = null ) {
    extract(shortcode_atts(array( 'url'=>"", 'name' =>'', 'dir' => "left"), $atts));

    $img_url = asset_path("images/{$url}");

    $html = "<div class='article-thumb-container " . $dir . "'>
                <div class='thumb-container " . $dir . "'>
                    <div class='thumb-wrapper'>
                        <img src='" . $img_url . "'>
                    </div>
                </div>
                <div class='thumb-contents " . $dir . "'>
                    <p class='thumb-text'>" . $content . "</p>
                </div>
                
            </div>";
    return $html;
}
add_shortcode('thumb', __NAMESPACE__ . '\\article_thumb');

function colorFlexFunc( $atts,  $content = null ) {
    extract(shortcode_atts(array( 'color'=>""), $atts));
    $html = "<span style='color: " . $color . ";'>" . $content . "</span>";
    return $html;
}
add_shortcode('colorFlex', __NAMESPACE__ . '\\colorFlexFunc');

function interviewerFunc( $atts,  $content = null ) {
    extract(shortcode_atts(array( 'name'=>"Tak"), $atts));
    $html = "<p class='interview-para'><span class='article-interviewer'>" . $name . ":</span> " .  $content . "</p>";
    return $html;
}
add_shortcode('interviewer', __NAMESPACE__ . '\\interviewerFunc');

function intervieweeFunc( $atts,  $content = null ) {
    extract(shortcode_atts(array( 'name'=>""), $atts));
    $html = "<p class='interview-para'><span class='article-interviewee'>" . $name . ":</span> " .  $content . "</p>";
    return $html;
}
add_shortcode('interviewee', __NAMESPACE__ . '\\intervieweeFunc');

function markerFunc( $atts,  $content = null ) {
    extract(shortcode_atts(array( 'color'=>"yellow"), $atts));
    if($color === "yellow" || $color === "pink") {
        $html = "<span class='article-marker " . $color . "'>" . $content . "</span>";
    } else {
        $html = "<span style='background: linear-gradient(transparent 60%, " . $color . " 0%);'>" . $content . "</span>";
    }
    return $html;
}
add_shortcode('marker', __NAMESPACE__ . '\\markerFunc');


function interviewHtmlGenerator($dir, $img_url, $content) {
   $html = "<div class='article-thumb-container " . $dir . "'>
        <div class='thumb-container " . $dir . "'>
            <div class='thumb-wrapper'>
                <img src='" . $img_url . "'>
            </div>
        </div>
        <div class='thumb-contents " . $dir . "'>
            <p class='thumb-text'>" . $content . "</p>
        </div>
    </div>";

    return $html;
}

function interviewerBalloonFunc( $atts,  $content = null ) {
    $interviewer_id = get_post_meta(get_the_ID(), 'interviewer', true);
    $interviewer_url = get_avatar_url($interviewer_id);

    return interviewHtmlGenerator('right', $interviewer_url, $content);
}
add_shortcode('interviewer', __NAMESPACE__ . '\\interviewerBalloonFunc');

function intervieweeBalloonFunc( $atts,  $content = null ) {

    $interviewee_image_id = get_post_meta(get_the_ID(), 'interviewee_image', true);
    $interviewee_url = wp_get_attachment_image_src($interviewee_image_id, 'Small_thumb')[0];

    return interviewHtmlGenerator('left',  $interviewee_url, $content);
}
add_shortcode('interviewee', __NAMESPACE__ . '\\intervieweeBalloonFunc');