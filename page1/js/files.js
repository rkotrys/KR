$(document).ready(function(){
    $("#addfileModal").click(function(){

        $($("#addfileModal").attr("data-target")).modal("toggle");
    });
    $(".fileedit").click(function(){
        $("input[name='fid']").val($(this).attr("fid"));
        $.get("/cmd/get_file/"+$(this).attr("fid"),
            function(data,result){
                $("input[name='alias']").val(data.alias);
                $("input[name='status']").eq(data.status).attr("checked",true);
                $("select[name='acr'] option").eq(data.acr).attr("selected",true);
                $("select[name='edr'] option").eq(data.edr).attr("selected",true);
                $("input[name='ackey']").val(data.ackey);
                $($("#addfileModal").attr("data-target")).modal("show");
            });
    });
    $(".filedelete").click(function(){
        if(confirm("Are you sure to permeant delete this item?")){
        $.get("/cmd/delete_file/"+$(this).attr("fid"),
            function(data,result){
                alert(data+" : "+result);
                location.reload();
            });
        }    
    })
});