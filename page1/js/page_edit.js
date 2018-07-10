$(document).ready(function(){
    $("#save").click(function(){
        //alert("save");
        $("#page_edit").submit();
    });
    $("#close").click(function(){
        //alert("close");
        window.location.assign("/pages/"+$("#page_edit").attr("uname"));
    });
    
    var editlang = $("body#top").attr("editlang"); 
    tinymce.init({
        selector: 'textarea#content',
        plugins: 'advlist, image, charmap, preview, anchor, imagetools, code, media, link, lists, colorpicker, paste, table, textcolor, save, colorpicker',
        toolbar: 'save undo redo formats styleselect bold italic fontsizeselect forecolor backcolor alignleft aligncenter alignright alignjustify bullist numlist outdent indent code codesample link image',
        skin: 'lightgray',
        height: 500,
        auto_focus: 'main',
        branding: false,
        paste_data_images: true,
        language: editlang,
        browser_spellcheck: true,
        images_upload_url: '/users/imgupload',
        file_picker_callback: function(callback, value, meta) {
            // Provide file and text for the link dialog
            if (meta.filetype == 'file') {
              smodal();  
              callback('mypage.html', {text: 'My text'});
            }
        
            // Provide image and alt text for the image dialog
            if (meta.filetype == 'image') {
              callback('myimage.jpg', {alt: 'My alt text'});
            }
        
            // Provide alternative source and posted for the media dialog
            if (meta.filetype == 'media') {
              callback('movie.mp4', {source2: 'alt.ogg', poster: 'image.jpg'});
            }
          }
    });
    
});
function smodal(){

    $("#selectModal").modal("show");
}
