$(document).ready(function(){

    $("#adduserModal .tabs a[data-target]").removeClass("active");
    $("#adduserModal .tabs a[data-target='#resume']").addClass("active")
    $("#resume").show();
    $("#adduserModal .tabs textarea[id!='resume']").hide();

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
            interest: $("#interest").val(), 
            papers: $("#papers").val(), 
            status: $("#status").val(),
            photo: $("#userphoto_path").val(),
            level: $("#level").val(),
            uname: $("#uname").val(),
            pass: $("#pass").val()
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

    $("#userinfo").click(function(event){
        $("#adduserModal .tabs a[data-target]").removeClass("active");
        $("#adduserModal .tabs textarea[id!='resume']").hide();
        $("#resume").show();
        $.post("/cmd/getuser",
        {
            data: $(this).attr("userid")
        },
        function(data, status){
            if( status=='success'){
               if( data['status']=='OK' ){
                    var u = data['data']; 
                    var level = $("#userinfo").attr("level");
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
                    $("#interest").html(u['interest']); 
                    $("#papers").html(u['papers']); 
                    if( u.photo==""  ) $("#userphoto").attr("src","/images/avatar.png");
                    else $("#userphoto").attr("src","/"+u.photo);
                    $("#userphoto_path").val(u.photo);
                    $("#status [value='"+u['status']+"']").attr("selected", ""); 
                    if(level>3){
                        $("#level [value='"+u['level']+"']").attr("selected", ""); 
                        $("#uname").val(u['uname']);
                        $("#pass").val(u['pass']);
                    }else{
                        $("#level").attr("disabled",true);
                        $("#pass").hide();
                        $("#uname").val(u['uname']);
                        $("#uname").attr("disabled",true);
                    }

               }else{
                alert('Error! user data not found');
               }
            }else{
                alert('Error! data link failed');
            }
            $("#adduserModal").modal("show"); 
        });
    });

    $(".users .panel-heading").click(function(event){
        $(this).find(".mbtn").toggleClass("invisible");
    });

    $("a[data-target='#adduserModal']").click(function(){
        document.getElementById("newuser_form").reset();
        $("#resume").html("");
        $("#level [value]").prop("selected", false); 
        $("#status [value]").prop("selected", false); 
        $("#userphoto").attr("src","/images/avatar.png");
   
        $("#adduserModal .tabs a[data-target]").removeClass("active");
        $("#adduserModal .tabs a[data-target='#resume']").addClass("active")
        $("#adduserModal .tabs textarea[id!='resume']").hide();
        $("#resume").show();
    });

    $("#adduserModal .tabs a[data-target]").click(function(event){
        $("#adduserModal .tabs a[data-target]").removeClass("active");
        $(this).addClass("active");
        $("#adduserModal textarea").hide();
        $($(this).attr("data-target")).show();
    })

});