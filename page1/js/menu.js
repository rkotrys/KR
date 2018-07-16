$(document).ready(function(){
    $("#newmenuitem").click(function(event){
        console.log("#newmenuitem:");
        document.getElementById("menuitemform").reset();
        $("#menuitemform select[name='acr'] option").eq(0).attr("selected",true);
        $("#menuitemform select[name='edr'] option").eq(3).attr("selected",true);
        $("#addmenuitemModal").modal("toggle");
        event.preventDefault();   
    });

});