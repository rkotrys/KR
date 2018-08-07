$(document).ready(function(){

    $("a[title='Access key required!']").click(function(event){
        
        var link = $(this).attr("href");
        $("#filelabel").text($(this).text());
        //$(this).attr("href","/#");
        event.preventDefault();
        $("#ackeybutton").click(function(){
            var element = document.createElement('a');
            var key=md5($("body").attr("key")+$("#ackey").val());
            element.setAttribute('href', link+"/"+key );
            element.style.display = 'none';
            document.body.appendChild(element);
            element.click();
            document.body.removeChild(element);
        });

        $("#ackeyModal").modal("show");
        
    });
});

  