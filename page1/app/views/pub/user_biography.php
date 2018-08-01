<div class="container userpage" >
    <div class="row">
        <div class="col-xs-4 col-sm-3 col-lg-2 text-center" style="padding:10px;">
            <img style="width:100%;border-radius:5px;"  src="<?=($u["photo"]!="")?"/".$u["photo"]:'/images/avatar.png';?>" alt="<?=$u["name"]?> <?=$u["surname"]?>, <?=$u["title"]?>" title="<?=$u["name"]?> <?=$u["surname"]?>, <?=$u["title"]?>" />
        </div>    
        <div class="col-xs-8 col-sm-9 col-lg-10" style="padding:10px;">
            <h1><?=$u["name"]?> <?=$u["surname"]?>, <?=$u["title"]?><br /><small><?=$u["subtitle"]?></small></h1>
            <?=$page["content"]?>
        </div>    

    </div>
</div>