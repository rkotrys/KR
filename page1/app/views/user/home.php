<div class="container" >
    <div class="row">
    <div class="panel panel-default col-sm-4 ">
        <?php $this->load->view('user/menu', $menu); ?>
    </div>
    <div class="panel panel-primary col-sm-4 ">
        <?php $this->load->view('user/pages', $pages); ?>
    </div>
    <div class="panel panel-default col-sm-4 ">
        <?php $this->load->view('user/files', $files); ?>
    </div>
    </div>    
</div>