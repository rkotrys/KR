<div class="container stafflist" >
    <div class="row">
    <?php 
    foreach($stafflist as $staff):  
        if($staff["status"]==STATUS_PRIVATE) continue;
        $username=$staff["name"]." ".$staff["surname"].", ".$staff["title"];
    ?>
        <div class="col-lg-4 col-md-6 col-sm-12 staff-card" >

        <a href="/u/<?=$staff["surname"]?>" title="<?=$username?>" >
        <panel class="panel panel-default">
            <div class="panel-heading"><?=$username?>
            </div>
            <div class="panel-body">
            <img src="<?=(is_file($staff['photo']))?"/".$staff['photo']:"/images/avatar.png"?>" alt="<?=$username?>" title="<?=$username?>" />
            <div class="panel-body-text">
                <p class="text-center" style="padding:10px 0;"><?=$staff["subtitle"]?>&nbsp;</p>
                <p><span><?=lang("user_room")?>:</span> <?=$staff["room"]?></p>
                <p><span>Tel.:</span> <?=$staff["tel"]?></p>
            </div>
            <div class="clearfix"></div>
            </div>
            <div class="panel-footer">  
            <p><span>e-mail:</span> <?=$staff["email"]?></p>
            <p><span><?=lang("user_duty")?>:</span> <?=$staff["duty"]?></p>
            </div>
        </panel>
        </a>
        
        </div>
    <?php endforeach; ?>
    </div>
</div>
<script src="<?=conf("base_url_path")?>js/stafflist.js"></script>