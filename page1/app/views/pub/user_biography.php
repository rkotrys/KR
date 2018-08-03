<div class="container userpage" >
    <div class="row">
        <div class="col-xs-4 col-sm-3 col-lg-2 text-center" style="padding:10px;">
            <img style="width:100%;border-radius:5px;"  src="<?=($u["photo"]!="")?"/".$u["photo"]:'/images/avatar.png';?>" alt="<?=$u["name"]?> <?=$u["surname"]?>, <?=$u["title"]?>" title="<?=$u["name"]?> <?=$u["surname"]?>, <?=$u["title"]?>" />
        </div>    
        <div class="col-xs-8 col-sm-9 col-lg-10" style="padding:10px;">
            <h1><?=$u["name"]?> <?=$u["surname"]?>, <?=$u["title"]?><br /><small><?=$u["subtitle"]?></small></h1>
            <div class="table-responsive">
            <table class="table table-condensed">
            <tr><td class="tab-label"><?=lang("user_tel")?>:</td><td><?=$u["tel"]?></td></tr>
            <tr><td class="tab-label"><?=lang("user_email")?>:</td><td><?=$u["email"]?></td></tr>
            <tr><td class="tab-label"><?=lang("user_duty")?>:</td><td><?=$u["duty"]?></td></tr>
            <tr><td class="tab-label"><?=lang("user_room")?>:</td><td><?=$u["room"]?></td></tr>
            <tr><td class="tab-label"><?=lang("user_resume")?>:</td><td><?=$u["resume"]?></td></tr>
            <?php if($u["interest"]!=""): ?>
            <tr><td class="tab-label"><?=lang("user_interest")?>:</td><td><?=$u["interest"]?></td></tr>
            <?php endif ?>
            <?php if($u["papers"]!=""): ?>
            <tr><td class="tab-label"><?=lang("user_papers")?>:</td><td><?=$u["papers"]?></td></tr>
            <?php endif ?>

            </table>
            </div>
        </div>    

    </div>
</div>