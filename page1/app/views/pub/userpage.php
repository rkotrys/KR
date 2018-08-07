<div class="container userpage"  >
    <div class="row">
        <div class="col-12"  >
            <article>
                <h1><?=$page["title"]?></h1>
                <?=$page["content"]?>
            </article>
        </div>    
    </div>
</div>

<!-- Modal ackeyModal //-->
<div id="ackeyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span class="fa fa-key"></span> <?=lang("access_key_required")?></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body text-center">
      <p id="filelabel"></p>
      <form class="form">
      <div class="form-group">
         <input style="padding:10px; border-radius: 5px;" type="password" name="ackey" id="ackey" value="" placeholder="<?=lang("access_key")?>"/>
      </div>   
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="ackeybutton" ><?=lang("download")?></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?=lang("Close")?></button>
      </div>
    </div>
  </div>
</div>

<script src="/js/userpage.js"></script>