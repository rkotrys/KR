<div class="container" >
    <div class="row">
        <div class="col-sm-12 p-1">
            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#adduserModal"><span class="fa fa-plus-square"></span> <?=lang("item_add")?></a>
        </div>
        <div class="col-sm-12 ml-0 pl-0">
        <table class="table table-striped table-condesed">
        <thead>
        <tr>
            <th><?=lang("user_title")." ".lang("user_name")." ".lang("user_surname");?></th>
            <th><?=lang("user_subtitle");?></th>
            <th><?=lang("user_email");?></th>
            <th><?=lang("user_tel");?></th>
            <th><?=lang("user_duty");?></th>
            <th><?=lang("user_room");?></th>
            <th><?=lang("user_photo");?></th>
            <th><?=lang("user_level");?></th>
            <th></th>
        </tr>   
        </thead>
        <?php foreach( $users as $user ){ ?>
            <tr>
                <td><?=$user['title']." ".$user["name"]." ".$user["surname"];?></td>
                <td><?=$user["subtitle"];?></td>
                <td><?=$user["email"];?></td>
                <td><?=$user["tel"];?></td>
                <td><?=$user["duty"];?></td>
                <td><?=$user["room"];?></td>
                <td><?=$user["photo"];?></td>
                <td><?=$user["level"];?></td>
                <td class="text-right"><a userid="<?=$user["userid"]?>" href="#" onclick="" class="btn btn-sm btn-outline-primary useredit"><span class="fa fa-edit"></span></a> 
                    <a userid="<?=$user["userid"]?>" href="#" onclick="" class="btn btn-sm btn-outline-primary userdelete"><span class="fa fa-trash"></span></a>
                </td>
            </tr>
        <?php } ?>
        </table>
        </div>
        <div class="col-sm-7">
            <p>
                <?=$this->session->language;?>
            </p>
            <p>
            <span class="fa fa-users"></span> 
            </p>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="adduserModal" tabindex="-1" role="dialog" aria-labelledby="useraddModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adduserModalLabel"><span class="fa fa-user"></span> <?=lang("new user")?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="newuser_form" >
        <div class="row">
        <div class="form-group col-2">
            <input type="text" class="form-control" id="title" name="title" placeholder="<?=lang('user_title')?>" />
        </div>
        <div class="form-group col-4">
            <input type="text" class="form-control" id="name" name="name" placeholder="<?=lang('user_name')?>" />
        </div>
        <div class="form-group col-6">
            <input type="text" class="form-control" id="surname" name="surname" placeholder="<?=lang('user_surname')?>" />
        </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="email" name="email" placeholder="<?=lang('user_email')?>" />
        </div>
        <div class="row">
        <div class="form-group col-4">
            <input type="text" class="form-control" id="tel" name="tel" placeholder="<?=lang('user_tel')?>" />
        </div>
        <div class="form-group col-4">
            <input type="text" class="form-control" id="room" name="room" placeholder="<?=lang('user_room')?>" />
        </div>
        <div class="form-group col-4">
            <input type="text" class="form-control" id="duty" name="duty" placeholder="<?=lang('user_duty')?>" />
        </div>
        </div>
        <div class="row">    
        <div class="form-group col-8">
            <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="<?=lang('user_subtitle')?>" />
        </div>
        <div class="form-group col-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><?=lang('user_level')?></span> 
            </div>
            <select class="form-control" id="level" name="level">
                <option value="blocked"><?=lang('blocked')?></option>
                <option value="guest"><?=lang('guest')?></option>
                <option value="student"><?=lang('student')?></option>
                <option value="staff"><?=lang('staff')?></option>
                <option value="editor"><?=lang('editor')?></option>
            </select>
        </div>
        </div>
        </div>
        <div class="form-group">
            <textarea type="text" class="form-control" id="resume" rows="10" placeholder="<?=lang('user_resume')?>" ></textarea>
        </div>




        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?=lang("Close")?></button>
        <button id="newusersave" type="button" class="btn btn-sm btn-primary"><?=lang("Save")?></button>
        <input type="hidden" id="userid" name="userid" value="0" />
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="deluserModal" tabindex="-1" role="dialog" aria-labelledby="useraddModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adduserModalLabel"><span class="fa fa-user"></span> <?=lang("delete user")?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h2 class="text-center">Delete: <span id="username"></span>?</h2>
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
