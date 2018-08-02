<div class="panel panel-default col-12">
                <div class="panel-heading" data-toggle="collapse" data-target="#user<?=$user["userid"]?>" >
                <div class="btn-group float-right invisible mbtn">    
                    <a userid="<?=$user["userid"]?>" href="#" onclick="" class="btn btn-sm btn-outline-primary useredit"><span class="fa fa-edit"></span></a> 
                    <a userid="<?=$user["userid"]?>" href="#" onclick="" class="btn btn-sm btn-outline-primary userdelete"><span class="fa fa-trash"></span></a>
                </div>
                <?=$user['name']." ".$user['surname']?><br />
                <small><?=$user["subtitle"].", ".$user["title"].", ".$user["uname"].", tel.:".$user["tel"].", ".$user["email"].", ".conf("ac_levels")[$user['level']]." ";?></small>
                </div>
                <div class="panel-body panel-collapse collapse continer" id="user<?=$user["userid"]?>">
                    <div class="row">
                    <div class="col-2 text-center">
                    <img src="<?=($user["photo"]!="")?"/".$user["photo"]:"/images/avatar.png";?>" style="margin-top: 20px;"/>
                    </div>
                    <div class="col-10">
                    <div><?=lang("user_room");?>: <?=$user["room"];?></div>
                    <div><?=lang("user_duty");?>: <?=$user["duty"];?></div>
                    <hr />
                    <div><strong><?=lang("Biography");?></strong><br /><?=$user["resume"];?></div>
                    </div>
                    </div>
                </div>
                <div class="panel-footer"></div>
</div>
