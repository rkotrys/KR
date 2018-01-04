<div class="container" style="margin-top:50px;">
    <div class="row">
        <div class="col-sm-12">
        <i class="fa fa-camera-retro"></i> camera retro
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <?=isset($msg)?"<p>".$msg."</p>":'';?>
        </div>
        <div class="col-sm-7">
            <p>
                <?=lang("english")?>
            </p>
            <p><?=conf('base_url').conf("base_url_path").$this->input->cookie('uri')?></p>
        </div>
    </div>
</div>

