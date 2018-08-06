$(document).ready(function(){

    $("a[title='Access key required!']").click(function(event){
        
        var link = $(this).attr("href");
        $(this).attr("href","#");
        event.preventDefault();
        $("#ackeybutton").click(function(){
            var element = document.createElement('a');
            element.setAttribute('href', link+"/"+$("#ackey").val() );
            element.style.display = 'none';
            document.body.appendChild(element);
            element.click();
            document.body.removeChild(element);
        

            download();
        });

        $("#ackeyModal").modal("show");
        
    });
});

  