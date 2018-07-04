$(document).ready( function(){
    $("#loginbt").click(function(){
        //alert($(this).attr("data-target"));
        $("#modallogin").slideToggle();
        $("#modallogin input[name='uname']").val("");
        $("#modallogin input[name='upass']").val("");
        $("#modallogin input[name='uname']").focus();
    });
    $("#modallogin input[name='upass']").change(function(){
        $.post("/cmd/ucheck",
            {"uname":$("#modallogin input[name='uname']").val(),
             "upass":$("#modallogin input[name='upass']").val()
            },
            function(data,status){
                if( data["status"]=="OK") { 
                    window.location.assign("/user/"+data["data"]);
                }
                else alert( data["data"] );
            }
        ); 
    });
    $("#modallogin input[name='uname']").change(function(){
        $("#modallogin input[name='upass']").focus();    
    });    
    

})