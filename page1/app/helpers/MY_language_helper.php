<?php

function lang($item){
    $CI = & get_instance();
    if( $CI->lang->line($item)!=NULL ){
        return $CI->lang->line($item);
    }else{
        return $item;
    }
}