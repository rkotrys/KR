<div class="panel panel-default col-12">
                <div class="panel-heading" data-toggle="collapse" data-target="#user<?=$user["userid"]?>" style="padding-left: 20px;" >
                <div class="btn-group float-right invisible mbtn">    
                    <a userid="<?=$user["userid"]?>" href="#" onclick="" class="btn btn-sm btn-outline-primary useredit"><span class="fa fa-edit"></span></a> 
                    <a userid="<?=$user["userid"]?>" href="#" onclick="" class="btn btn-sm btn-outline-primary userdelete"><span class="fa fa-trash"></span></a>
                </div>
                <?=$user['name']." ".$user['surname']?>, <?=$user["title"]?><br />
                <small><?=$user["subtitle"].", ".$user["uname"].", ".conf("ac_levels")[$user['level']]." ";?></small>
                </div>
                <div class="panel-body panel-collapse collapse continer" id="user<?=$user["userid"]?>">
                    <div class="row">
                    <div class="col-2 text-center">
                    <img src="<?=($user["photo"]!="")?"/".$user["photo"]:"/images/avatar.png";?>" style="margin-top: 20px;"/>
                    </div>
                    <div class="col-10">
                    <div class="table-responsive">
                    <table class="table table-condensed">
                    <tr><td class="tab-label"><?=lang("user_tel")?>:</td><td><?=$user["tel"]?></td></tr>
                    <tr><td class="tab-label"><?=lang("user_email")?>:</td><td><?=$user["email"]?></td></tr>
                    <tr><td class="tab-label"><?=lang("user_duty")?>:</td><td><?=$user["duty"]?></td></tr>
                    <tr><td class="tab-label"><?=lang("user_room")?>:</td><td><?=$user["room"]?></td></tr>
                    <tr><td class="tab-label"><?=lang("user_resume")?>:</td><td><?=$user["resume"]?></td></tr>
                    <?php if($user["interest"]!=""): ?>
                    <tr><td class="tab-label"><?=lang("user_interest")?>:</td><td><?=$user["interest"]?></td></tr>
                    <?php endif ?>
                    <?php if($user["papers"]!=""): ?>
                    <tr><td class="tab-label"><?=lang("user_papers")?>:</td><td><?=$user["papers"]?></td></tr>
                    <?php endif ?>

                    </table>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="panel-footer"></div>
</div>
