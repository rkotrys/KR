$(document).ready(function(){
    $("#newusersave").click(function(){
        alert("save?");
        $("#adduserModal").modal("hide");
    });
    $(".userdelete").click(function(){
        var userid = $(this).attr("userid");
        $.post("/cmd",
        {
            cmd: "getuser",
            data: userid
        },
        function(data, status){
            /* alert("Data: " + data + "\nStatus: " + status); */
            if( status=='success'){
               r = JSON.parse( data );
               if( r['status']=='OK' ){
                    $("#username").html(r['data']['name']+' '+r['data']['surname']); 
               }else{
                    $("#deluserModal .modal-body h2").html(r['data']);
               }
            }else{
                alert('Error! data link failed');
            }
            /*
            $("#deluser").click(function(){
                $.post("/cmd",
                {
                    cmd: "userdelete",
                    data: userid
                },
                function(data, status){
                    $("#deluserModal").modal("hide");
                    alert("Data: " + data + "\nStatus: " + status);
                    location.reload(); 
                });
            });
            */
            $("#deluserModal").modal("show"); 
        });
        

    });
});