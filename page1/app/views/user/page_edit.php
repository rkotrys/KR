<form id="page_edit" uname="<?=$user["uname"]?>" class="container" method="post" enctype="application/x-www-form-urlencoded">
    <div class="row">
        <div class="col-sm-8 col-lg-10 ">
            <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" value="<?=$p->title?>" placeholder="<?=lang('Page_title')?>" />
            </div>    
            <div class="form-group">
                <textarea type="text" class="form-control" id="content" name="content" rows="20" placeholder="<?=lang('Page_content')?>" ><?=$p->content?></textarea>
            </div>
        </div>
        <div class="col-sm-4 col-lg-2">
            <?php if( $user["userid"]!=$p->userid ){ 
                $owner = $this->users->get_user($p->userid);    
            ?> 
            <div class="owner-label"><?=$owner["name"]." ".$owner["surname"]?></div>
            <?php } ?>
            <div class="form-group">
                <?=lang('Status');?>: <br />
                <label class="radio-inline"><input type="radio" name="status" value="<?=STATUS_PRIVATE?>" <?=($p->status==STATUS_PRIVATE)?"checked":""?> > <?=lang('Private');?></label>
                <label class="radio-inline"><input type="radio" name="status" value="<?=STATUS_PUBLIC?>"  <?=($p->status==STATUS_PUBLIC)?"checked":""?> > <?=lang('Public');?></label>
            </div>
            <div class="form-group">
                <label for="acr"><?=lang('ACR');?>:</label>
                <select class="form-control" name="acr" id="acr">
                    <option value="<?=LEVEL_GUEST?>"   <?=(isset($p->acr))?(($p->acr==LEVEL_GUEST)?"selected":""):"selected";?> ><?=lang('Guest');?></option>
                    <option value="<?=LEVEL_STUDENT?>" <?=(isset($p->acr))?(($p->acr==LEVEL_STUDENT)?"selected":""):"";?> ><?=lang('Student');?></option>
                    <option value="<?=LEVEL_STAFF?>"   <?=( isset($p->acr) )?(($p->acr==LEVEL_STAFF  )?"selected":""):""; ?>  ><?=lang('Staff');?></label></option>
                    <?php if($user["level"]==LEVEL_ADMIN): ?>
                    <option value="<?=LEVEL_ADMIN?>"   <?=(isset($p->acr))?(($p->acr==LEVEL_ADMIN)?"selected":""):"";?> ><?=lang('Admin');?></option>
                    <?php endif ?>
                </select>
            </div>    
            <div class="form-group">
                <label for="edr"><?=lang('EDR');?>:</label>
                <select class="form-control" name="edr" id="edr">
                    <option value="<?=LEVEL_GUEST?>"   <?=( isset($p->edr) )?(($p->edr==LEVEL_GUEST  )?"selected":""):""; ?> ><?=lang('Guest');?></option>
                    <option value="<?=LEVEL_STUDENT?>" <?=( isset($p->edr) )?(($p->edr==LEVEL_STUDENT)?"selected":""):""; ?> ><?=lang('Student');?></option>
                    <option value="<?=LEVEL_STAFF?>"   <?=( isset($p->edr) )?(($p->edr==LEVEL_STAFF  )?"selected":""):""; ?> > <?=lang('Staff');?></label></option>
                    <option value="<?=LEVEL_OWNER?>"   <?=( isset($p->edr) )?(($p->edr==LEVEL_OWNER  )?"selected":""):"selected"; ?> ><?=lang('Owner');?></option>
                    <?php if($user["level"]==LEVEL_ADMIN): ?>
                    <option value="<?=LEVEL_ADMIN?>"   <?=(isset($p->edr))?(($p->edr==LEVEL_ADMIN)?"selected":""):"";?> ><?=lang('Admin');?></option>
                    <?php endif ?>
                </select>
            </div>    
            <div class="form-group">
                <label for="ackey"><?=lang('Access_Key');?>:</label>
                <input type="text" class="form-control" id="ackey" name="ackey"  value="<?=$p->ackey?>" placeholder="<?=lang('Access_Key');?>" />
            </div>    
            <div class="form-group">
                <label for="startdate"><?=lang('Start_date');?>:</label>
                <input type="date" class="form-control" id="startdate" name="startdate" value="<?=$p->startdate?>" />
            </div>    
            <div class="form-group">
                <label for="stopdate"><?=lang('Stop_date');?>:</label>
                <input type="date" class="form-control" id="stopdate" name="stopdate" value="<?=$p->stopdate?>" />
            </div>    
            <div class="btn-group" style="width:100%;">
                <button style="width:50%;" type="button" class="btn btn-primary" id="save" ><?=lang('Save');?></button>
                <button style="width:50%;" type="button" class="btn btn-default" id="close" ><?=lang('Close');?></button>
            </div>




        </div> 
    </div>
    <input type="hidden" name="pid" value="<?=$p->pid?$p->pid:"new";?>" />
</form>

<!-- MODAL //-->
<div style="z-index: 65546;" class="modal fade" id="selectModal" tabindex="-1" role="dialog" aria-labelledby="selectModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="selectModalLabel"><span class="fa fa-file"></span> <?=lang("Select file")?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <div id="filelist" userid="<?=$user["userid"]?>"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?=lang("Close")?></button>
        <button id="selectfile" pid="<?=$p->pid?>" type="button" class="btn btn-sm btn-primary"><?=lang("Select")?></button>

      </div>
    </div>
  </div>
</div>

<script src="<?=conf("base_url_path")?>js/page_edit.js"></script>