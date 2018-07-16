<div id="files_list" uname="<?=$user["uname"]?>" class="container" >
    <div class="row">
    <div class="col-sm-12 text-right" style="padding-bottom: 5px;">
    <button type="button" style="font-size:120%;" class="btn btn-outline-primary btn-sm" id="addfileModal" data-target="#editfileModal"><span class="fa fa-plus-square"></span> <?=lang("New_file")?></button>
    </div>
    </div>
    <div class="row">
    <table class="table table-striped table-bordered table-sm">
        <tr>
            <th>ID</th>
            <th style="width:30%;"><?=lang("Filename")?></th>
            <th style="width:30%;"><?=lang("Alias")?></th>
            <th><?=lang("Status")?></th>
            <th><?=lang("Access_Key")?></th>
            <th><?=lang("ACR")?></th>
            <th><?=lang("EDR")?></th>
            <th style="width:3em;"></th>
        </tr>
        
        <?php if( !is_array($files) or count($files)==0 ): ?>
        <tr><td colspan="7"><?=lang("No_data")?></td></tr>
        <?php else: ?>
            <?php 
            $names_status=conf("item_status");
            $names_levels=conf("ac_levels");
            foreach( $files as $f ): ?>
            <tr>
            <td><?=$f->fid?></td>
            <td><?=$f->name?></td>
            <td><?=$f->alias?></td>
            <td><?=lang($names_status[$f->status])?></td>
            <td><?=$f->ackey?></td>
            <td><?=lang($names_levels[$f->acr])?></td>
            <td><?=lang($names_levels[$f->edr])?></td>
            <td style="fornt-size:150%;text-align:center;"><a class="fileedit" href="#" fid="<?=$f->fid?>"><span class="fa fa-edit"></span></a> <a class="filedelete" href="#" fid="<?=$f->fid?>" f-data="<?=$f->name?>"><span class="fa fa-trash"></span></a></td>
            </tr>    
            <?php endforeach ?>
        <?php endif ?>
    </table>
    </div>
    <div class="row">
    </div>
</div>   

<!-- Modal deletefileModal //-->
<div id="deletefileModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span class="fa fa-trash"></span> <?=lang("Delete_file")?></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="deletedfilename"></div>
        <span class="fa fa-exclamation"></span> <?=lang("Delete_file_statement")?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary deletefilebutton" ><?=lang("Delete")?></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?=lang("Close")?></button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL editfileModal //-->
<div style="z-index: 65546;" class="modal fade" id="editfileModal" tabindex="-1" role="dialog" aria-labelledby="editfileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
    <form class="form" id="fileuploadform" enctype="multipart/form-data" action="" method="POST" >
      <div class="modal-header">
        <h5 class="modal-title"><span class="fa fa-upload"></span> <span id="editfileModalLabel0"><?=lang("Edit_file")?></span><span id="editfileModalLabel1"><?=lang("New_file")?></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group"> 
        <label class="form-control-label" for="userfile"><?=lang("Select_file")?>: </label>   
        <input id="userfile" name="userfile" type="file" class="form-control"/> 
        </div>
        <div class="form-group"> 
            <label><?=lang("Alias")?>:</label>
            <input type="text" name="alias" placeholder="<?=lang("Alias")?>" class="form-control"/>
        </div>
        <table class="table">
        <tr><td style="width:40%;">
        <div class="custom-control custom-radio custom-control-inline"> 
           <input class="custom-control-input" id="r1" type="radio" name="status" value="<?=STATUS_PRIVATE?>" checked > <label class="custom-control-label" for="r1"> <?=lang("Private")?>&nbsp;</label>
        </div>   
        <div class="custom-control custom-radio custom-control-inline"> 
           <input class="custom-control-input" id="r2" type="radio" name="status" value="<?=STATUS_PUBLIC?>"> <label class="custom-control-label" for="r2"> <?=lang("Public")?>&nbsp;</label>
        </div>
        </td><td style="width:30%;">
        <div class="form-group"> 
        <label><?=lang("ACR")?>:</label>
        <select class="custom-select-sm" id="acr" name="acr" >
            <option value="<?=LEVEL_GUEST?>"><?=lang("Guest")?></option>
            <option value="<?=LEVEL_STUDENT?>"><?=lang("Student")?></option>
            <option value="<?=LEVEL_STAFF?>"><?=lang("Staff")?></option>
            <option value="<?=LEVEL_OWNER?>"><?=lang("Owner")?></option>
            <option value="<?=LEVEL_ADMIN?>"><?=lang("Admin")?></option>
        </select>
        </div>
        </td><td style="width:30%;">
        <div class="form-group"> 
        <label><?=lang("EDR")?>:</label>
        <select class="custom-select-sm" id="edr" name="edr" >
            <option value="<?=LEVEL_GUEST?>"><?=lang("Guest")?></option>
            <option value="<?=LEVEL_STUDENT?>"><?=lang("Student")?></option>
            <option value="<?=LEVEL_STAFF?>"><?=lang("Staff")?></option>
            <option value="<?=LEVEL_OWNER?>"><?=lang("Owner")?></option>
            <option value="<?=LEVEL_ADMIN?>"><?=lang("Admin")?></option>
        </select>
        </div>
        </td></tr></table>
        <div>
        <div class="form-group"> 
            <label><?=lang("Access_Key")?>:</label>
            <input class="form-control" type="text" name="ackey" id="ackey" placeholder="<?=lang("Access_Key")?>"/>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="fid" value="" />
        <button class="btn btn-primary" type="submit" value="Send File" /><?=lang("Save")?></button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?=lang("Close")?></button>
      </div>
      </form> 
    </div>
  </div>
</div>


<script src="<?=conf("base_url_path")?>js/files.js"></script>
