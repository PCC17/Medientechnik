$(document).ready( function () {
    $(".trashicon").click(function() {
        $("#delete-dialog").modal("show");   
    });
    $("#delete-project-button").click(function() {
        
            //Kommunikation mit Server aufnehmen um ihm mitzuteilen dass der Datensatz gelöscht werden soll
            var myAjaxConfig = {
                method: "POST",
                url: "http://localhost/Medt/UE10/trackstarJS/backSites/delete.php",
                data: "deletePID="+ $(this).parent().parent().attr("id"),
                //data: {deletePID: $(this).attr("data-pid")},
                success: function(response){
                    if(response != "-1")
                    {
                        var str = "#"+ response;
                        $(str).remove();
                        $("#successMsg").fadeIn(1500, function(){$("#successMsg").fadeOut(1500)});
                    }
                    else
                    {
                        console.log("Something went wrong");
                    }
                },
                error: function(response){
                    console.log(response);
                }
            };
            $.ajax(myAjaxConfig);
$("#delete-dialog").modal("hide"); 
    });
    $(".editicon").click(function() {
        if(confirm("Wollen sie wirklich editieren?"))
            console.log("editiert" + $(this).attr("data-pid"));
        else
            console.log("abgebrochen" +$(this).attr("data-pid"));

    });
});