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

function make_menutoplink( $text, $link="#" ){
    return "<li ><a class=\"nav-link bg-dark rounded\" href=\"".$link."\" >$text</a></li>";
}
function make_dropdowntoplink($u, $text, $link=NULL ){
    return "<a class=\"nav-link dropdown-toggle bg-dark rounded\" href=\"$link\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">$text</a>";
}
function make_dropdownlink($u, $text, $link=NULL ){
    return "<a class=\"nav-link bg-dark rounded\" href=\"/u/".$u["surname"]."/$link\">$text</a>";
}
function make_dropdownmenu( $u, $menu ){
    $m = array_shift($menu);
    $buf = "<div class=\"nav-item dropdown\">\n";
    $buf .= make_dropdowntoplink($u, $m->text, "#" );
    $buf .= "<div class=\"dropdown-menu bg-dark\" aria-labelledby=\"navbarDropdown\">\n";
    while( $m=array_shift($menu) ){
        $level=$m->level;
        $submenu=array($m);
        if( isset($menu[0]) and $menu[0]->level>$level ){
            while( isset($menu[0]) and $menu[0]->level > $level )
                $submenu[]=array_shift($menu);
            //$buf .= make_my_dropdownmenu( $u, $submenu );    
            $buf .= make_dropdownlink($u, $submenu[0]->text, $submenu[0]->link)."\n";
        }else{
            // menu link
            $buf .= make_dropdownlink($u, $m->text, $m->link)."\n";
        }
    }
    $buf .= "</div>";
    $buf .= "</div>\n";
    return $buf;
}
function sanitizemenu($menu){
    $CI = & get_instance();
    $rchar = array(" ", "?", "'", "`", "\n", "\t", "^", "-");
    $new_menu = array();
    $links = array();
    if($menu and is_array($menu) and count($menu)>0 ){
            
        foreach($menu as $k=>$m){
            if( $m->status==STATUS_PRIVATE) continue;
            if($m->type==TYPE_PAGE){
              $p = $CI->service->get_page($m->pid);
              if( !$p ) continue;
              if( $p->status==STATUS_PRIVATE) continue;
              if( $p->acr > LEVEL_GUEST and $CI->user["level"]<$p->acr) continue;
            }
            $flag=false; 
            foreach($menu as $k1=>$m1){
              if($k==$k1) continue; 
              if($m->text==$m1->text){ 
                  $flag=true; 
                  break;
                } 
            }
            if( $m->type==TYPE_PAGE)
                $m->link = ($flag)?(strtolower(str_replace($rchar,"_",$m->text)))."-".$m->pid:(strtolower(str_replace($rchar,"_",$m->text)));
            $new_menu[] = $m;
        }
    }else{
        return null;
    }
    if( count($new_menu)>0 ) return $new_menu;
    else return null;
}

