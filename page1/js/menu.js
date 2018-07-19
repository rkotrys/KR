$(document).ready(function(){
    $("#newmenuitem").click(function(event){
        //console.log("#newmenuitem:");
        document.getElementById("menuitemform").reset();
        $("#menuitemform select[name='menu_acr'] option").eq(0).attr("selected",true);
        $("#menuitemform select[name='menu_edr'] option").eq(3).attr("selected",true);
        $("#menu_status1").attr("checked",true);
        $("#menu_type_page").prop("checked",true);
        $("#menu_type_link").prop("checked",false);
        $("input[name='menu_link']").hide();
        $("#menu_page_tiitle").load("/cmd/pageselect/"+$("#menu_page_tiitle").attr("pid"));
        $("#menu_parentselect").load("/cmd/parentselect");
        $("#addmenuitemModal").modal("toggle");
        event.preventDefault();   
    });
    $(".menu_edit").click(function(event){
        //console.log("#newmenuitem:");
        document.getElementById("menuitemform").reset();
        $.get("/cmd/get_menuitem/"+$(this).attr("mid"), function( m, status ){
            $("#menu_mid").val(m.mid);
            $("#menu_text").val(m.text);
            $("#menuitemform select[name='menu_acr'] option").eq(m.acr).attr("selected",true);
            $("#menuitemform select[name='menu_edr'] option").eq(m.edr).attr("selected",true);
            $( "#menu_status"+parseInt(m.status) ).prop("checked",true);
            if(m.type==0) {
                $("#menu_type_page").prop("checked",true);
                $("#menu_type_link").prop("checked",false);
                $("input[name='menu_link']").hide();
                $("#menu_page_tiitle").load("/cmd/pageselect/"+parseInt(m.pid));
                $("#menu_page_tiitle").show();
            }
            if(m.type==1) {
                $("#menu_type_page").prop("checked",false);
                $("#menu_type_link").prop("checked",true);
                $("input[name='menu_link']").show();
                $("#menu_page_tiitle").hide();
            }
            $("#menu_parentselect").load("/cmd/parentselect/"+parseInt(m.mid));
            $("#addmenuitemModal").modal("show");
        });
        event.preventDefault();   
    });

    $(".menu_remove").click(function(event){
        $.get("/cmd/get_menuitem/"+$(this).attr("mid"), function( m, status ){

            $("#deletemenuModal .deleteitem").html( m.text );
            $("#deletemenuModal").modal("show");
        });
        $("button.deletemenubutton").attr("mid", $(this).attr("mid"));
        $("button.deletemenubutton").click(function(event){
            $.get("/cmd/delete_menu/"+$("button.deletemenubutton").attr("mid") , function(data,status){
                location.reload();
            });
        });
        event.preventDefault();   
    });

    $(".submenuarrow").click(function(event){
        console.log("/cmd/menu_submenu/"+$(this).attr("mid")+"/"+$(this).attr("parent"));
        $.get("/cmd/menu_submenu/"+$(this).attr("mid")+"/"+$(this).attr("parent"),
          function(data,status){
             alert($date);
             if($date=="OK") location.reload();
        });
    });

    $("#menu_type_link").change(function(){
        if( $("#menu_type_link").prop("checked")==true ){
            $("input[name='menu_link']").val("").show();
            $("#menu_page_tiitle").hide();
            $("#menu_type_page").prop("checked",false);
        }else{
            $("input[name='menu_link']").hide();
            $("#menu_page_tiitle").show();
            $("#menu_type_page").prop("checked",true);
        }
    });    
    $("#menu_type_page").change(function(){
        if( $("#menu_type_page").prop("checked")==true ){
            $("input[name='menu_link']").val("").hide();
            $("#menu_page_tiitle").show();
            $("#menu_type_link").prop("checked",false);
        }else{
            $("input[name='menu_link']").val("").show();
            $("#menu_page_tiitle").hide();
            $("#menu_type_link").prop("checked",true);
        }
    });    
    $("#menuitemform .savebutton").click(function(){
        $("#menuitemform").submit();
    });
   
});