<div class="container stafflist" >
<div class="row">
    <div class="col-12 text-info">
        <?=lang("Staff_list_order")?>
    </div>
</div>    
    <div class="row">
    <?php 
    foreach($stafflist as $staff):  
        if($staff["status"]==STATUS_PRIVATE) continue;
        $username=$staff["name"]." ".$staff["surname"].", ".$staff["title"];
    ?>
        <div class="col-lg-6 col-md-12 staff-card" >

        <a href="/u/<?=$staff["surname"]?>" title="<?=$username?>" >
        <panel class="panel panel-default">
            <div class="panel-heading"><?=$username?><br /><small><?=$staff["subtitle"]?></small>
            </div>
            <div class="panel-body">
            <img src="<?=(is_file($staff['photo']))?"/".$staff['photo']:"/images/avatar.png"?>" alt="<?=$username?>" title="<?=$username?>" />
            <div class="panel-body-text">
                <p><span></span> <?=$staff["room"]?></p>
                <p><?=$staff["email"]?></p>
                <p><span>Tel.:</span> <?=$staff["tel"]?></p>
                <p><span><?=lang("user_duty")?>:</span><br /><?=$staff["duty"]?></p>
            </div>
            <div class="clearfix"></div>
            </div>
            <div class="panel-footer">  
            
            </div>
        </panel>
        </a>
        
        </div>
    <?php endforeach; ?>
    </div>
</div>
<script src="<?=conf("base_url_path")?>js/stafflist.js"></script>