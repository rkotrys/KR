<div class="panel-heading"><?=lang("Pages")?> <div style="font-size:150%;" class="float-right"><a href="/users/page_edit" title=""><span class="fa fa-plus-square"></span></a></div></div>
<div class="panel-body" style="padding:0;">
<table style="width:100%;" class="table-condensed table-striped table-hover">
<tr><th><?=lang("Title")?></th><th></th></tr>
    <?php if( is_array($pages) and count($pages)>0 ) { 
       foreach($pages as $p){ ?>
    <tr><td pid="<?=$p->pid?>" <?php if($p->status==STATUS_PRIVATE) echo "class='private' "?> ><?=$p->title?></td>
    <td class="page-tools text-right" style="font-size:130%;">
        <a href="/users/page_edit/<?=$p->pid?>" title="<?=lang("Edit_page")?>"><span class="fa fa-edit"></a> 
        <a class="page_remove" pid="<?=$p->pid?>" href="#" title="<?=lang("Delete_page")?>"><span class="fa fa-trash"></a>
    </td></tr>
    <?php } }else{ ?>
        <tr><td><?=lang("No_data");?></td></tr>
    <?php } ?>
</table>    
</div>

<!-- MODAL //-->
<div class="modal fade" id="delpageModal" tabindex="-1" role="dialog" aria-labelledby="delpageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delpageModalLabel"><span class="fa fa-trash"></span> <?=lang("delete page")?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h2 class="text-center"><?=lang("Delete_page")?>: <span id="pagetitle"></span>?</h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?=lang("Close")?></button>
        <button id="delpage" pid="<?=$p->pid?>" type="button" class="btn btn-sm btn-primary"><?=lang("Delete")?></button>

      </div>
    </div>
  </div>
</div>

<script src="<?=conf("base_url_path")?>js/pages.js"></script>