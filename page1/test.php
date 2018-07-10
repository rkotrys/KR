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

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src='js/tinymce/tinymce.min.js'></script>

</head>
<body>
<h1>Test</h1>
<form style="text-align:center;width:100%;">
<p>Edit</p>
<textarea id="content" name="content" style="width:90%;height: 500px;">test str</textarea>
</form>
<script>

    tinymce.init({
        selector: 'textarea#content',
        plugins: 'advlist, image, charmap, preview, anchor, imagetools, code, media, link, lists, colorpicker, paste, table, textcolor, save, colorpicker contextmenu',
        toolbar: 'save undo redo formats styleselect bold italic fontsizeselect forecolor backcolor alignleft aligncenter alignright alignjustify bullist numlist outdent indent code codesample link image',
        skin: 'lightgray',
        height: 500,
        auto_focus: 'main',
        branding: false,
        paste_data_images: true,
        images_upload_url: 'upload.php'
    });

</script>
</body>
</html>