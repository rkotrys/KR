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
        $("#addmenuitemModal").modal("toggle");
        event.preventDefault();   
        //alert( "" );
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
   
});