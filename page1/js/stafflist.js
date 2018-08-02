$(document).ready(function(){
    $(".staff-card .panel").hover(
        function(){ 
            //$(this).find(".panel-heading").css("background-color", "rgba(240,240,240,0.9)"); 
            $(this).find(".panel-heading").css("border-color", "#D9241C"); 
            $(this).find(".panel-body").css("background-color", "rgba(220,250,240,0.8)"); 
            $(this).find(".panel-footer").css("background-color", "rgba(220,250,240,0.8)"); 
        
        }, 
        function(){ 
            //$(this).find(".panel-heading").css("background-color", "rgba(220,250,240,0.9)"  ); 
            $(this).find(".panel-heading").css("border-color", "#aaa"); 
            $(this).find(".panel-body").css("background-color", "rgba(220,250,240,0.9)"  ); 
            $(this).find(".panel-footer").css("background-color", "rgba(220,250,240,0.9)"  ); 
        
        });



});