$(document).ready(function(){

    $("#photo").change(function(){
        if( $("#userid").val()>0 ){
            var url="/cmd/phupload/"+$("#userid").val();
        }else{
            var url="/cmd/phupload";
        }
		$(this).simpleUpload(url, {
            name: "photo",
            expect: "json",
            allowedExts: ["jpg", "jpeg", "png", "gif"],
			start: function(file){
				//upload started
				console.log("upload started: "+file.name);
			},
			success: function(data){
                //upload successful
                $("#userphoto").attr("src","/"+data.name);
                $("#userphoto_path").val(data.name);
				console.log("upload successful! name:"+data.name);
				console.log(data);
			},
			error: function(error){
				//upload failed
				console.log("upload error: " + error.name + ": " + error.message);
			}
		});
	});
    $("#phupload").click(function(){
        console.log("Upload start");
        $("#photo").click();
    })

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
            status: $("#status").val(),
            photo: $("#userphoto_path").val(),
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
                    $("#userphoto").attr("src","/"+u.photo);
                    $("#userphoto_path").val(u.photo);
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