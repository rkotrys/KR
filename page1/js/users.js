$(document).ready(function(){
    /* newusersave */
    $("#newusersave").click(function(){
        var u = {
            userid: $("#userid").val(),
            title: $("#title").val(),
            name: $("#name").val(),
            surname: $("#surname").val(), 
            email: $("#email").val(), 
            tel: $("#tel").val(), 
            room: $("#room").val(), 
            duty: $("#duty").val(),
            subtitle: $("#subtitle").val(),
            resume: $("#resume").val(), 
            level: $("#level").val()
        };
        $.post("/cmd",
        {
            cmd: "newusersave",
            data: JSON.stringify(u)
        },
        function(data, status){
            if( status=='success'){
                var r = JSON.parse( data ); 
                if( r['status']=='OK' ){
                    location.reload(); 
                }
            }
            alert(data);
        });
        $("#adduserModal").modal("hide");
    });
    /* userdelete */
    $(".userdelete").click(function(){
        var userid = $(this).attr("userid");
        $.post("/cmd/getuser",
        {
            cmd: "getuser",
            data: userid
        },
        function(data, status){
            /* alert("Data: " + data + "\nStatus: " + status); */
            if( status=='success'){
               //var r = JSON.parse( data );
               var r = data;
               if( r['status']=='OK' ){
                    $("#username").html(r['data']['name']+' '+r['data']['surname']); 
               }else{
                    $("#deluserModal .modal-body h2").html(r['data']);
               }
            }else{
                alert('Error! data link failed');
            }
            $("#deluser").click(function(){
                $.post("/cmd",
                {
                    cmd: "userdelete",
                    data: userid
                },
                function(data, status){
                    if( status=='success'){
                        var r = JSON.parse( data );
                        if( r['status']=='OK' ){
                            $("#deluserModal .modal-body h2").html('OK');
                            location.reload();          
                        }else{
                            $("#deluserModal .modal-body h2").html(r['data']);
                        }
                     }else{
                         alert('Error! data link failed');
                     }
         
                    $("#deluserModal").modal("hide");
                    
                    location.reload(); 
                });
            });
            
            $("#deluserModal").modal("show"); 
        });
        

    });

    $(".useredit").click(function(){
        var userid = $(this).attr("userid");
        $.post("/cmd/getuser",
        {
            cmd: "getuser",
            data: userid
        },
        function(data, status){
            /* alert("Data: " + data + "\nStatus: " + status); */
            if( status=='success'){
               //var r = JSON.parse( data );
               var r = data;
               if( r['status']=='OK' ){
                    var u = r['data']; 
                    $("#userid").val(u['userid']);
                    $("#title").val(u['title']);
                    $("#name").val(u['name']);
                    $("#surname").val(u['surname']); 
                    $("#email").val(u['email']); 
                    $("#tel").val(u['tel']); 
                    $("#room").val(u['room']); 
                    $("#duty").val(u['duty']); 
                    $("#subtitle").val(u['subtitle']); 
                    $("#resume").html(u['resume']); 
                    $("#level [value='"+u['level']+"']").attr("selected", ""); 
               }else{
                alert('Error! user data not found');
               }
            }else{
                alert('Error! data link failed');
            }
            
            $("#adduserModal").modal("show"); 
        });
        

    });

});