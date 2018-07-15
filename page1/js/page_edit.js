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
        file_browser_callback_types: 'file image',
        images_reuse_filename: true,
        convert_urls: false,
        file_picker_callback: function(callback, value, meta) {
            var fname;
            // Provide file and text for the link dialog
            if (meta.filetype == 'file') {

              fname = smodal(meta.filetype, callback);  
            }
        
            // Provide image and alt text for the image dialog
            if (meta.filetype == 'image') {
                smodal(meta.filetype, callback);  
            }
        
            // Provide alternative source and posted for the media dialog
            if (meta.filetype == 'media') {
              callback('movie.mp4', {source2: 'alt.ogg', poster: 'image.jpg'});
            }
          }
    });
    
});
function smodal(filetype, callback ){
    var userid=$("#filelist").attr("userid");
    if( filetype=="file"){
        $("#filelist").load("/cmd/get_filelist/file", 
                            function(){
                                $(".fileitem").click(function(){
                                    $("#selectModal").modal("hide");
                                    callback("/doc/"+userid+"/files/"+$(this).html(),{text:"document",title:$(this).html()});
                                })
                            });
        //$("#filelist").html("xxx");
    }
    if( filetype=="image"){
        $("#filelist").load("/cmd/get_filelist/image", 
                            function(){
                                $(".filelistimg").click(function(){
                                    $("#selectModal").modal("hide");
                                    callback( $(this).attr("src"),{alt: $(this).attr("title"), title: $(this).attr("title") } );
                                })
                            });
        //$("#filelist").html("xxx");
    }
    $("#selectModal").modal("show");
}
