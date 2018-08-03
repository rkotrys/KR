<script src="/js/simpleUpload.min.js" ></script>
<div class="container users" >
    <div class="row">
        <div class="panel col-sm-12 p-1">
            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#adduserModal"><span class="fa fa-plus-square"></span> <?=lang("item_add")?></a>
        </div>
    </div>
    <div class="row">    
    <?php 
        foreach( $users as $user ){ 
            if($user["status"]==STATUS_PRIVATE) continue;
            $this->load->view("user/user_panel", array( "user"=>$user ) );
        } 
    ?>
    <p><strong><?=lang("Private_users")?></strong></p>
    <?php 
        foreach( $users as $user ){ 
            if($user["status"]==STATUS_PUBLIC) continue;
            $this->load->view("user/user_panel", array( "user"=>$user ) );
        } 
    ?>
    </div>
</div>

<?php $this->load->view("user/add_user_modal", array( "user"=>$user ) ); ?>

<div class="modal fade" id="deluserModal" tabindex="-1" role="dialog" aria-labelledby="useraddModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adduserModalLabel"><span class="fa fa-trash"></span> <?=lang("Delete")?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h2 class="text-center"><?=lang("Delete")?>: <span id="username"></span>?</h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?=lang("Close")?></button>
        <button id="deluser" type="button" class="btn btn-sm btn-primary"><?=lang("Delete")?></button>
        <input type="hidden" id="userid" name="userid" value="0" />
      </div>
    </div>
  </div>
</div>


<script src="<?=conf("base_url_path")?>js/users.js"></script>

