$(document).ready(function(){
    $(".page_remove").click(function(){
        var pid=$(this).attr("pid");
        $("#pagetitle").html($("td[pid='"+pid+"']").html());
        $("#delpage").attr("pid",pid);
        $("#delpage").click(function(){
            $.get("/cmd/deletepage/"+pid,
                   function(data,status){
                      if( data=='OK' ){
                        $("#pagetitle").html("OK");
                        $("#delpageModal").fadeOut(1000,"swing", function(){ location.reload(); });
                      }else{
                        $("#delpageModal").modal("hide");
                      }
                   });
        });
        $("#delpageModal").modal("toggle");
    });

});