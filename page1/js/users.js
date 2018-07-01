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
        $.post("/cmd/newuser",
        {  data: JSON.stringify(u) },
        function(data, status){
            if( status=='success'){
                // var r = JSON.parse( data ); 
                if( data['status']=='OK' ){
                    location.reload(); 
                }
            }
            alert(data['data']);
        });
        $("#adduserModal").modal("hide");
    });
    /* userdelete */
    $(".userdelete").click(function(){
        var userid = $(this).attr("userid");
        $.post("/cmd/getuser",
        { data: userid },
        function(data, status){
            /* alert("Data: " + data + "\nStatus: " + status); */
            if( status=='success'){
               if( data['status']=='OK' ){
                    $("#username").html(data['data']['name']+' '+data['data']['surname']); 
               }else{
                    $("#deluserModal .modal-body h2").html(data['data']);
               }
            }else{
                alert('Error! data link failed');
            }
            $("#deluser").click(function(){
                $.post("/cmd/deleteuser",
                { data: userid },
                function(data, status){
                    if( status=='success'){
                        if( data['status']=='OK' ){
                            $("#deluserModal .modal-body h2").html('OK');
                            window.setTimeout(function(){ location.reload(); }, 1000 );
                        }else{
                            $("#deluserModal .modal-body h2").html(data['data']);
                        }
                     }else{
                        $("#deluserModal .modal-body h2").html('Error! data link failed');
                     }
                    $("#deluserModal").delay(3000).modal("hide");
                });
            });
            
            $("#deluserModal").modal("show"); 
        });
    });

    $(".useredit").click(function(){
        $.post("/cmd/getuser",
        {
            data: $(this).attr("userid")
        },
        function(data, status){
            if( status=='success'){
               if( data['status']=='OK' ){
                    var u = data['data']; 
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