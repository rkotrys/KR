<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">

  <div class="navbar-header">
    <a class="navbar-brand" href="<?=conf('base_url');?>"><?=img("images/logo_KR_blue.png","logo-menu","Logo KR");?></a>
  </div>

  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link bg-dark rounded"  href="/front/<?=$this->user["uname"]?>"><?=lang("Front")?></a></li>
      <li class="nav-item"><a class="nav-link bg-dark rounded" href="/pages/<?=$this->user["uname"]?>"><?=lang("Pages")?></a></li>
      <li class="nav-item"><a class="nav-link bg-dark rounded" href="/files/<?=$this->user["uname"]?>"><?=lang("Files")?></a></li>
      <!--
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bg-dark rounded" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      //-->
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
