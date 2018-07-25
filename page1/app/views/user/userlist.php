<script src="/js/simpleUpload.min.js" ></script>
<div class="container users" >
    <div class="row">
        <div class="panel col-sm-12 p-1">
            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#adduserModal"><span class="fa fa-plus-square"></span> <?=lang("item_add")?></a>
        </div>
    </div>
    <div class="row">    
        <?php foreach( $users as $user ){ ?>
            <div class="panel panel-default col-sm-12 col-xs-12">
                <div class="panel-heading" data-toggle="collapse" data-target="#user<?=$user["userid"]?>" >
                <div class="btn-group float-right">    
                    <a userid="<?=$user["userid"]?>" href="#" onclick="" class="btn btn-sm btn-outline-primary useredit"><span class="fa fa-edit"></span></a> 
                    <a userid="<?=$user["userid"]?>" href="#" onclick="" class="btn btn-sm btn-outline-primary userdelete"><span class="fa fa-trash"></span></a>
                </div>
                <?=$user['name']." ".$user['surname']?><br />
                <small><?=$user['level'].", ".$user["subtitle"].", ".$user["title"];?></small>
                </div>
                <div class="panel-body panel-collapse collapse continer" id="user<?=$user["userid"]?>">
                    <div class="row">
                    <div class="col-2 text-center">
                    <img src="<?=($user["photo"]!="")?"/".$user["photo"]:"/images/staff/profile-default-male.png";?>" style="margin-top: 20px;"/>
                    </div>
                    <div class="col-10">
                    <div><?=lang("user_email");?>: <?=$user["email"];?></div>
                    <div><?=lang("user_tel");?>: <?=$user["tel"];?></div>
                    <div><?=lang("user_duty");?>: <?=$user["duty"];?></div>
                    <div><?=lang("user_room");?>: <?=$user["room"];?></div>
                    <div><?=lang("user_level");?>: <?=$user["level"];?></div>
                    <div><?=lang("resume");?>:<br /><?=$user["resume"];?></div>
                    </div>
                    </div>
                </div>
                <div class="panel-footer"></div>
            </div>
        <?php } ?>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="adduserModal" tabindex="-1" role="dialog" aria-labelledby="useraddModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <form id="newuser_form" >  
      <div class="modal-header">
        <h5 class="modal-title" id="adduserModalLabel"><span class="fa fa-user"></span> <?=lang("User")?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
                <?php $levels=conf("ac_levels"); foreach(conf("ac_levels") as $k=>$v): ?>
                <?php if( $v!="Owner"): ?>
                <option value="<?=$k?>"><?=lang($v)?></option>
                <?php endif ?>
                <?php endforeach ?>
            </select>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="form-group col-2">
            <img id="userphoto" style="height:100px;" src="/images/staff/profile-default-male.png" />
        </div>
        <div class="form-group col-6" style="padding-top: 30px;">
        <div class="input-group" style="display: none;">
            <div class="input-group-prepend">
                <span class="input-group-text"><?=lang('user_photo')?></span> 
            </div>
            <input type="file" name="photo" id="photo" userid="" style="width:70%;" />
            
        </div>
        <button type="button" class="btn" id="phupload" ><?=lang("Upload_photo")?></button>    
        </div>
        <div class="form-group col-4" >
            <select class="form-control" id="status" name="status">
                <option value="<?=STATUS_PRIVATE?>" ><?=lang("Private")?></option>
                <option value="<?=STATUS_PUBLIC?>" ><?=lang("Public")?></option>
            </select>
        </div>
        </div>
        <div class="form-group">
            <textarea type="text" class="form-control" id="resume" rows="10" placeholder="<?=lang('user_resume')?>" ></textarea>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?=lang("Close")?></button>
        <button id="newusersave" type="button" class="btn btn-sm btn-primary"><?=lang("Save")?></button>
        <input type="hidden" id="userid" name="userid" value="0" />
        <input type="hidden" id="userphoto_path" name="userphoto_path" value="" />
      </div>
      </form>
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

