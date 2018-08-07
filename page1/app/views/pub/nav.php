<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">

  <div class="navbar-header">
    <a class="navbar-brand" href="<?=conf('base_url');?>"><?=img("images/logo_KR_blue.png","logo-menu","Logo KR");?></a>
  </div>
  
  <div class="collapse navbar-collapse" id="myNavbar">
  
  <?php if(isset($u) and $u['userid']>0 and $u["status"]==STATUS_PUBLIC ): ?> 
    <ul class="nav navbar-nav">
    <?php 
    echo make_menutoplink( $u["name"]." ".$u["surname"], "/u/".$u["surname"] );
    $menu = sanitizemenu($menu);
    
    if( $menu ){
      while( $m = array_shift($menu) ){
        if( isset($menu[0]) and $menu[0]->parent==$m->mid ){
          // sub menu
          $submenu=array( $m );
          $level = $m->level;
          while( isset($menu[0]) and $menu[0]->level > $level ){
            $submenu[]=array_shift($menu);
          }
          echo make_dropdownmenu( $u, $submenu );   
        }else{
          //top link
          echo make_menutoplink( $m->text, "/u/".$u["surname"]."/".$m->link);
        }
      }
    }
  endif;
  ?>
</ul>

</div>
  
  <div class="float-right d-inline-flex flex-row-reverse">
      <a class="nav-link bg-dark rounded" href="/logout"><span class="fa fa-sign-out" title="<?=lang("Logout")?>"></span></a>
      <?php $this->load->view('login/language'); ?>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

