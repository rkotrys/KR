<div class="panel-heading">Menu <div style="font-size:150%;" class="float-right"><a id="newmenuitem" href="#" title=""><span class="fa fa-plus-square"></span></a></div></div>
<div class="panel-body">
<?php if( is_array($menu) and count($menu)>0 ): ?>
<?php foreach($menu as $m): ?>
<div class="menuitem-l<?=$m->parent?>"><a href="" ><?=$m->name?></a></div>
<?php endforeach ?>
<?php else: ?>
<p><?=lang("No_data")?></p>
<?php endif ?>
</div>

<!-- Modal deletemenuitemModal //-->
<div id="deletefileModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span class="fa fa-trash"></span> <?=lang("Delete_menuitem")?></h5>
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

<!-- Modal addmenuitemModal //-->
<div id="addmenuitemModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span class="fa fa-trash"></span> <?=lang("Add_menuitem")?></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form class="form" id="menuitemform" enctype="multipart/form-data" action="/users/menu_insert" method="POST" >
      <div class="modal-body">

        <div class="form-group"> 
            <label><?=lang("Menu_name")?>:</label>
            <input type="text" name="name" id="menu_name" placeholder="<?=lang("Menu_name")?>" class="form-control"/>
        </div>
<!--
        <table class="table">
        <tr><td style="width:40%;">
        <div class="custom-control custom-radio custom-control-inline"> 
           <input class="custom-control-input" id="menu_status1" type="radio" name="menu_status" value="<?=STATUS_PRIVATE?>" checked > <label class="custom-control-label" for="menu_status1"> <?=lang("Private")?>&nbsp;</label>
        </div>   
        <div class="custom-control custom-radio custom-control-inline"> 
           <input class="custom-control-input" id="menu_status1" type="radio" name="menu_status" value="<?=STATUS_PUBLIC?>"> <label class="custom-control-label" for="menu_status2"> <?=lang("Public")?>&nbsp;</label>
        </div>
        </td><td style="width:30%;">
        <div class="form-group"> 
        <label><?=lang("ACR")?>:</label>
        <select class="custom-select-sm" id="menu_acr" name="menu_acr" >
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
        <select class="custom-select-sm" id="menu_edr" name="menu_edr" >
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

-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary savebutton" ><?=lang("Save")?></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?=lang("Close")?></button>
      </div>
      </form>
    </div>
  </div>
</div>


<script src="<?=conf("base_url_path")?>js/menu.js"></script>