$(document).ready(function(){
    $(".staff-card .panel").hover(
        function(){ 
            $(this).find(".panel-heading").css("background-color", "rgba(240,250,240,90%)"); 
            $(this).find(".panel-body").css("background-color", "rgba(240,250,240,90%)"); 
            $(this).find(".panel-footer").css("background-color", "rgba(240,250,240,90%)"); 
        
        }, 
        function(){ 
            $(this).find(".panel-heading").css("background-color", "rgba(240,250,240,80%)"  ); 
            $(this).find(".panel-body").css("background-color", "rgba(240,250,240,80%)"  ); 
            $(this).find(".panel-footer").css("background-color", "rgba(240,250,240,80%)"  ); 
        
        });



});