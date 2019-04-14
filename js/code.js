/*global $, window, jQuery, document, console, alert*/
$(window).ready(function () {
    'use strict';

    $("#submitp").on("click", function (e) {
        e.preventDefault();
       var privacy = $('.privacy:checked').val();
       var postValue=$('#post-body').val();

       if(postValue === ""){
           alert("Please Enter a valid post");
           return;
       }
        jQuery.ajax({
            url: "savePost.php",
            data: $('#myform').serialize(),
            method: "POST",
            success:function(data){
                $('#post-body').val("");
            },
            error:function (){

            }
        });
    });
    $(".edit .btn-primary").on("click", function (e){
        e.preventDefault();

        console.log("welcome  " + $(this).prototype);
    });
    $(".commentbotton").on("click", function (e){
        e.preventDefault();

        var commentValue =$(this).className ;
            //username = $("#commentform #user").val();
            //date = Date().now();
        console.log("test" +" "+ commentValue);
        if(commentValue === ""){
            alert("Please Enter a valid comment");
            return;
        }
        jQuery.ajax({
            url: "saveComment.php",
            data: $('#commentform').serialize(),
            method: "POST",
            success:function(data){
                $('#commentform #commentvaluey').val("");
            },
            error:function (){
                alert("couldn't save the comment, please try again" + commentValue);
            }
        });

    });
         
});
