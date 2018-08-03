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
        <div class="continer">
            <div class="row">
            <div class="form-group col-3" >
                <label class="tab-label"><?=lang("Status")?>:</label>
                <select class="form-control" id="status" name="status">
                    <option value="<?=STATUS_PRIVATE?>" ><?=lang("Private")?></option>
                    <option value="<?=STATUS_PUBLIC?>" ><?=lang("Public")?></option>
                </select>
            </div>    
            <div class="form-group col-3" >
                <label class="tab-label"><?=lang("user_level")?>:</label>
                <select class="form-control" id="level" name="level">
                    <?php $levels=conf("ac_levels"); foreach(conf("ac_levels") as $k=>$v): ?>
                    <?php if( $v!="Owner"): ?>
                    <option value="<?=$k?>"><?=lang($v)?></option>
                    <?php endif ?>
                    <?php endforeach ?>
                </select>
            </div>    
            <div class="form-group col-3" >
                <label class="tab-label"><?=lang("user_uname")?>:</label> 
                <input class="form-control" type="text" id="uname" name="uname" value="" placeholder="username" />    
            </div>    
            <div class="form-group col-3" >
                <label class="tab-label"><?=lang("user_pass")?>:</label> 
                <input class="form-control" type="text" id="pass" name="pass" value="" placeholder="password" />
            </div>    
            </div>
        </div>
        <div class="table-responsive">
        <table class="table table-condensed">
        <tr><td class="tab-label"><?=lang("user_title")?>:</td><td><input type="text" class="form-control" id="title" name="title" placeholder="<?=lang('user_title')?>" /></td></tr>    
        <tr><td class="tab-label"><?=lang("user_name")?>:</td><td><input type="text" class="form-control" id="name" name="name" placeholder="<?=lang('user_name')?>" /></td></tr>
        <tr><td class="tab-label"><?=lang("user_surname")?>:</td><td><input type="text" class="form-control" id="surname" name="surname" placeholder="<?=lang('user_surname')?>" /></td></tr>
        <tr><td class="tab-label"><?=lang("user_subtitle")?>:</td><td><input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="<?=lang('user_subtitle')?>" /></td></tr>
        <tr><td class="tab-label"><?=lang("user_tel")?>:</td><td><input type="text" class="form-control" id="tel" name="tel" placeholder="<?=lang('user_tel')?>" /></td></tr>
        <tr><td class="tab-label"><?=lang("user_email")?>:</td><td><input type="text" class="form-control" id="email" name="email" placeholder="<?=lang('user_email')?>" /></td></tr>
        <tr><td class="tab-label"><?=lang("user_duty")?>:</td><td><input type="text" class="form-control" id="duty" name="duty" placeholder="<?=lang('user_duty')?>" /></td></tr>
        <tr><td class="tab-label"><?=lang("user_room")?>:</td><td><input type="text" class="form-control" id="room" name="room" placeholder="<?=lang('user_room')?>" /></td></tr>

        <tr><td class="tab-label"><img id="userphoto" src="/images/avatar.png" /></td>
            <td>
                <div class="form-group" style="padding-top: 30px;">
                    <div class="input-group" style="display: none;">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><?=lang('user_photo')?></span> 
                        </div>
                        <input type="file" name="photo" id="photo" userid="" style="width:70%;" />
                    </div>
                    <button type="button" class="btn" id="phupload" ><?=lang("Upload_photo")?></button>    
                </div>
            </td>
        </tr>
        </table>
        </div>

        <div class="tabs">
            <a href="#" class="active" data-target="#resume" ><div ><?=lang("user_resume")?></div></a>
            <a href="#" data-target="#interest" ><div><?=lang("user_interest")?></div></a>
            <a href="#" data-target="#papers" ><div><?=lang("user_papers")?></div></a>
        
        <textarea type="text"  id="resume" rows="10" placeholder="<?=lang('user_resume')?>" ></textarea>
        <textarea class="hidden" type="text"  id="interest" rows="10" placeholder="<?=lang('user_interest')?>" ></textarea>
        <textarea class="hidden" type="text"  id="papers" rows="10" placeholder="<?=lang('user_papers')?>" ></textarea>
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
