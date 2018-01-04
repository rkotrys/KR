<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>                        
    </button>
    <a class="navbar-brand" href="#myPage"><?=img("images/logo_KR_blue.png","logo-menu","Logo KR");?></a>
  </div>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><?=lang("Users")?></a></li>
      <li><a href="#">HOME 2</a></li>
      <li><a href="#">HOME 3</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">menu 1</a></li>
          <li><a href="#">menu 2</a></li>
          <li><a href="#">menu 3</a></li> 
        </ul>
      </li>
      <li><a href="#"><?=lang("Logout")?></a></li>
      <li><?php $this->load->view('login/language'); ?></li>
    </ul>
  </div>
</div>
</nav>
