<div class="container stafflist" >
    <div class="row">
    <?php foreach($stafflist as $staff):  $username=$staff["name"]." ".$staff["surname"].", ".$staff["title"];?>
        <div class="col-lg-4 col-md-6 col-sm-12 staff-card" >
        <panel class="panel panel-default">
            <div class="panel-heading"><?=$username?>
            </div>
            <div class="panel-body">
            <img src="/images/staff/<?=(is_file("/images/staff/".$staff['photo']))?$staff['photo']:"profile-default-male.png"?>" alt="<?=$username?>" title="<?=$username?>" />
            <div class="panel-body-text">
                <p><span><?=lang("user_room")?></span>: <?=$staff["room"]?></p>
                <p><span>Tel.</span>: <?=$staff["tel"]?></p>
            </div>
            <div class="clearfix"></div>
            </div>
            <div class="panel-footer">
            <span>e-mail</span>: <?=$staff["email"]?><br />
            <span><?=lang("user_duty")?></span>: <?=$staff["duty"]?>
            </div>
        </panel>
        </div>
    <?php endforeach; ?>
    </div>
</div>