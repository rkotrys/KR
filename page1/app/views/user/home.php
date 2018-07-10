<div class="container" >
    <div class="row">
    <div class="panel panel-default col-sm-4 ">
        <?php $this->load->view('user/menu', $menu); ?>
    </div>
    <div class="panel panel-primary col-sm-8 ">
        <?php $this->load->view('user/pages', array("pages"=>$pages) ); ?>
    </div>
    </div>    
</div>