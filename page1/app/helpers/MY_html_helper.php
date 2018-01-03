<?php

function conf($item){
    $CI = & get_instance();
    return $CI->config->item($item);
}