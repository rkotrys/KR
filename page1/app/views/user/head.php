<html>
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Katedra Radiokomunikacji - Politechnika Poznańska</title>
    <meta name="description" content="login">
    <meta name="author" content="Katedra Radiokomunikacji">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->

    <link rel="stylesheet" href="<?=conf("base_url_path")?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=conf("base_url_path")?>css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=conf("base_url_path")?>css/back.css">

    <!-- script
    ================================================== -->
    <script src="<?=conf("base_url_path")?>js/jquery-3.2.1.min.js"></script> -->
    <script src="<?=conf("base_url_path")?>js/bootstrap.min.js" ></script>  -->
    <?php if($this->editor): ?>
    <script src="<?=conf("base_url_path")?>js/tinymce/tinymce.min.js"></script>
    <?php endif ?>

    
    
    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="<?=conf("base_url_path")?>favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?=conf("base_url_path")?>favicon.ico" type="image/x-icon">

</head>

<body id="top" editlang="<?=($this->session->language=="polish")?"pl":"en_GB";?>" >
