<div class="panel-heading">Menu <div style="font-size:150%;" class="float-right"><a id="newmenuitem" href="#" title=""><span class="fa fa-plus-square"></span></a></div></div>
<div class="panel-body" style="padding:0;">
<?php if( is_array($menu) and count($menu)>0 ): ?>
<!--<table style="width:100%;" class="table-condensed table-striped table-hover">-->
<table class="menu_table" style="width:100%;">
<tr><th><?=lang("Menu_label")?></th><th style="width:50px;"></th></tr>  
<?php $mu=NULL; foreach($menu as $k=>$m): ?>
<tr>
  <td class="menuitem-<?=$m->level?>"><div class="tabmenuitem<?php if($m->status==STATUS_PRIVATE) echo " private"; ?>"><?=$m->text?></div>
  <?php if( $mu!=NULL and $m->level<4 and $m->level==$mu->level): ?>
  <div class="submenuarrow" parent="<?=$mu->mid?>" mid="<?=$m->mid?>"><span class="fa fa-arrow-right" aria-hidden="true"></span></div>
<?php endif; $mu=$m; ?>
  </td>
  <td class="page-tools text-right" style="font-size:130%;">
    <a class="menu_edit" mid="<?=$m->mid?>" href="#" title="<?=lang("Edit_menu")?>"><span class="fa fa-edit"></a> 
    <a class="menu_remove" mid="<?=$m->mid?>" href="#" title="<?=lang("Delete_menu")?>"><span class="fa fa-trash"></a>
  </td>
</div>
<?php endforeach ?>
</table>
<?php else: ?>
<p><?=lang("No_data")?></p>
<?php endif ?>
</div>

<!-- Modal deletemenuitemModal //-->
<div id="deletemenuModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span class="fa fa-trash"></span> <?=lang("Delete_menuitem")?></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="deleteitem" ></div>
        <span class="fa fa-exclamation"></span> <?=lang("Delete_menu_statement")?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary deletemenubutton" ><?=lang("Delete")?></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?=lang("Close")?></button>
      </div>
    </div>
  </div>
</div>

<!-- Modal addmenuitemModal //-->
<div id="addmenuitemModal" class="modal fade " role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span class="fa fa-trash"></span> <?=lang("Add_menuitem")?></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form class="form" id="menuitemform" enctype="multipart/form-data" action="/users/menu_insert" method="POST" >
      <input type="hidden" id="menu_mid" name="menu_mid" value="" />
      <div class="modal-body">

        <div class="form-group"> 
            <label><?=lang("Menu_name")?>:</label>
            <input type="text" name="menu_text" id="menu_text" placeholder="<?=lang("Menu_name")?>" class="form-control"/>
        </div>
        <table class="table">
        <tr><td style="width:100px;">
        <div class="checkbox"> 
           <label><input id="menu_type_page" type="checkbox" name="menu_type_page" value="<?=TYPE_PAGE?>"> <?=lang("Page")?>&nbsp;</label>
        </div>   
        <div class="checkbox"> 
           <labal><input id="menu_type_link" type="checkbox" name="menu_type_link" value="<?=TYPE_LINK?>"> <?=lang("Link")?>&nbsp;</label>
        </div>
        </td><td>
        <div class="form-group"> 
            <input class="form-control" type="text" name="menu_link" id="menu_link" placeholder="<?=lang("Link")?>"/>
            <div id="menu_page_tiitle" pid="" placeholder="<?=lang("Page")?>"></div>
        </div>
        </td></tr>
        </table>
        <table class="table"><tr><td style="width: 100px;text-align:right;"><?=lang("Menu_position")?>: </td><td>
        <div id="menu_parentselect"></div>
        </td></tr></table>
        <table class="table">
        <tr><td style="width:40%;">
        <div class="custom-control custom-radio custom-control-inline"  style="width: 100px;"> 
           <input class="custom-control-input" id="menu_status0" type="radio" name="menu_status" value="<?=STATUS_PRIVATE?>"> <label class="custom-control-label" for="menu_status0"> <?=lang("Private")?>&nbsp;</label>
        </div>   
        <div class="custom-control custom-radio custom-control-inline"  style="width: 100px;"> 
           <input class="custom-control-input" id="menu_status1" type="radio" name="menu_status" value="<?=STATUS_PUBLIC?>"> <label class="custom-control-label" for="menu_status1"> <?=lang("Public")?>&nbsp;</label>
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
<!--
//-->

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