<?php

function lang($item){
    $CI = & get_instance();
    if( $CI->lang->line($item)!=NULL ){
        return $CI->lang->line($item);
    }else{
        return $item;
    }
}
function lang_sufix($active=TRUE){
    $CI = & get_instance();
    $r = array();
    if( $active ){
        if( $CI->session->language=='english' )
            return "_en";
        if( $CI->session->language=='polish' )
            return "_pl";
        return "";  
    }else{
        if( $CI->session->language!='english' )
            $r[]="_en";
        if( $CI->session->language!='polish' )
            $r[]="_pl";
        return $r;    
    }
}
function lang_select($row){
    $sufix_ok = lang_sufix();
    $sufix = lang_sufix(FALSE);
    foreach( $row as $k=>$v ){
        if( substr($k,-3,3)==$sufix_ok ){
            $key = substr($k,0,strlen($k)-3);
            $row[$key]=$v;
            unset($row[$k]);
            continue;
        }
        foreach( $sufix as $s ){
            if( substr($k,-3,3)==$s ){
                unset($row[$k]);
            }
        }
    }
    return $row;
}


