$(document).ready(function(){
    $("#addfileModal").click(function(event){
        document.getElementById("fileuploadform").reset();
        $("#editfileModalLabel1").show();
        $("#editfileModalLabel0").hide();
        $("select[name='acr'] option").eq(0).attr("selected",true);
        $("select[name='edr'] option").eq(3).attr("selected",true);
        $($("#addfileModal").attr("data-target")).modal("toggle");
        event.preventDefault();   
    });
    $(".fileedit").click(function(event){
        document.getElementById("fileuploadform").reset();
        $("input[name='fid']").val($(this).attr("fid"));
        $("#editfileModalLabel1").hide();
        $("#editfileModalLabel0").show();
        console.log( "/cmd/get_file/"+$(this).attr("fid") );
        $.get("/cmd/get_file/"+$(this).attr("fid"),
            function(data,result){
                $("input[name='alias']").val(data.alias);
                $("input[name='status']").eq(data.status).attr("checked",true);
                $("select[name='acr'] option").eq(data.acr).attr("selected",true);
                $("select[name='edr'] option").eq(data.edr).attr("selected",true);
                $("input[name='ackey']").val(data.ackey);
                $($("#addfileModal").attr("data-target")).modal("show");
            });
            event.preventDefault();   
    });
    $(".filedelete").click(function(event){

        $("#deletefileModal .deletedfilename").html( $(this).attr("f-data") );
        $("#deletefileModal .deletefilebutton").attr("fid",$(this).attr("fid"));
        $("#deletefileModal .deletefilebutton").click(function(event){
            $.get("/cmd/delete_file/"+$(this).attr("fid"),
                function(data,result){
                    location.reload();
                });
            event.preventDefault();
        });
        $("#deletefileModal").modal("show");
        event.preventDefault();
    });
});