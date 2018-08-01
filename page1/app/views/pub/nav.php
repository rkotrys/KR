<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">

  <div class="navbar-header">
    <a class="navbar-brand" href="<?=conf('base_url');?>"><?=img("images/logo_KR_blue.png","logo-menu","Logo KR");?></a>
  </div>
  
  <div class="collapse navbar-collapse" id="myNavbar">
  <?php if(isset($u) and $u['userid']>0 ): ?> 
    <ul class="navbar-nav">
    <li class="nav-item dropdown">  
      <a class="nav-link dropdown-toggle bg-dark rounded" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?=$u["name"]." ".$u["surname"]?>
      </a>
      <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
        <a class="nav-link bg-dark rounded" href="/u/<?=$u["surname"]?>"><?=lang("Biography")?></a>
        <div class="dropdown-divider"></div>
        <?php if(is_array($menu) and count($menu)>0) foreach( $menu as $k=>$m ): ?>
          <?php 
            if( $m->status==STATUS_PRIVATE) continue;
            if($m->type==TYPE_PAGE){
              $p = $this->service->get_page($m->pid);
              if( !$p ) continue;
              if( $p->status==STATUS_PRIVATE) continue;
              if( $p->acr > LEVEL_GUEST and $this->user["level"]<$p->acr) continue;
            }
            $flag=false; 
            foreach($menu as $k1=>$m1){
              if($k==$k1) continue; 
              if($m->text==$m1->text){ 
                  $flag=true; 
                  break;
                } 
            } 
            $rchar = array(" ", "?", "'", "`", "\n", "\t", "^", "-");
            $mitem = strtolower(str_replace($rchar,"_",$m->text));
          ?>
          <a class="nav-link bg-dark rounded" href="/u/<?=$u["surname"]?>/<?=($flag)?$mitem."-".$m->pid:$mitem?>"><?=$m->text?></a>
        <?php endforeach ?>
      </div>
    </ul>
    <?php endif ?> 
  </div>
  <div class="float-right d-inline-flex flex-row-reverse">
      <a class="nav-link bg-dark rounded" href="/logout"><span class="fa fa-sign-out" title="<?=lang("Logout")?>"></span></a>
      <?php $this->load->view('login/language'); ?>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    
  </div>
</nav>

