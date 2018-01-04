<?php

function conf($item){
    $CI = & get_instance();
    return $CI->config->item($item);
}
function img( $item, $class='', $alt='' ){
    $CI = & get_instance();
    return "<img src=\"".$CI->config->item('base_url_path').$item."\" alt=\"$alt\" class=\"$class\" />";
}
function lnk( $item ){
    $CI = & get_instance();
    return $CI->config->item('base_url_path').$item;
}