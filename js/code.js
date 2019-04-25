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
            data:   $('#myform').serialize(),
            method: "POST",
            success:function(data){
                $('#post-body').val("");
            },
            error:function (){

            }
        });
    });

    $(".commentbutton").on("click", function (e) {
       e.preventDefault();
       var comment = $(this).parent().serialize();
       var copy = comment;
       copy= copy.toString();

       var index = copy.indexOf("="),
       id = "",
       i = index +1;
       while(copy[i] !== "&"){
           id+=copy[i];
           i++;
       }
       var postId = parseInt(id);
        jQuery.ajax({
            url: "saveComment.php",
            data: comment,
            method: "POST",
            success:function(data){
                $('.commentvalue').val("");
                $('#'+id).append(data);
            },
            error:function (){
                alert("couldn't save the comment, please try again" + comment);
                return;
            }
        });
    });

    $(".card-body .like").on("click", function (e) {
        e.preventDefault();
        // 0 for no thing
        // 1 for like
        // 2 for dislike

        var postID = $(this).data('id'),
            postState = $(this).data('state'),
            dislikeButton = $(this).siblings().parent().find('.dislike'),
            likes= $(this).siblings().parent().find('#likes'),
            Dislikes= $(this).siblings().parent().find('#dislikes'),
            thiss = $(this);

        if(postState === 0){
            jQuery.ajax({
                url: "saveLike.php",
                data: {postid:postID,state:postState,to:'like'},
                method: "POST",
                success:function(data){
                 thiss.data('state',1);
                 thiss.html("Liked");
                 likes.html(data + " Like(s)");
                 dislikeButton.data('state',1);
                }
            });
        }
        if(postState === 1){
            jQuery.ajax({
                url: "saveLike.php",
                data: {postid:postID,state:postState,to:'unlike'},
                method: "POST",
                success:function(data){
                    thiss.data('state',0);
                    thiss.html('Like');
                    likes.html(data + " Like(s)");
                    dislikeButton.data('state',0);
                }
            });
        }
        if(postState === 2){
            jQuery.ajax({
                url: "saveLike.php",
                data: {postid:postID,state:postState,to:'likeUnDislike'},
                method: "POST",
                success:function(data){
                    var res = JSON.parse(data);
                    thiss.data('state',1);
                    thiss.html('Liked');
                    likes.html(res.likes + " Like(s)");
                    Dislikes.html(res.dislikes + " Dislike(s)");
                    dislikeButton.html("Dislike");
                    dislikeButton.data('state',1);//hereeeeeeeeeeeee
                }
            });
        }
    });

    $(".card-body .dislike").on("click", function (e) {
        e.preventDefault();
        // 0 for no thing
        // 1 for like
        // 2 for dislike

        var postID = $(this).data('id'),
            postState = $(this).data('state'),
            likes= $(this).siblings().parent().find('#likes'),
            Dislikes= $(this).siblings().parent().find('#dislikes'),
            likeButton = $(this).siblings().parent().find('.like'),
            thiss = $(this);

        if(postState === 0){
            jQuery.ajax({
                url: "saveLike.php",
                data: {postid:postID,state:postState,to:'dislike'},
                method: "POST",
                success:function(data){
                    thiss.data('state',2);
                    thiss.html("DisLiked");
                    Dislikes.html(data + " DisLike(s)");
                    likeButton.data('state',2);
                }
            });
        }
        if(postState === 1){
            jQuery.ajax({
                url: "saveLike.php",
                data: {postid:postID,state:postState,to:'dislikeUnlike'},
                method: "POST",
                success:function(data){
                    var res = JSON.parse(data);
                    thiss.data('state',2);
                    thiss.html("DisLiked");
                    Dislikes.html(res.dislikes + " DisLike(s)");
                    likes.html(res.likes + " Like(s)");
                    likeButton.html("Like");
                    likeButton.data('state',2);
                }
            });
        }
        if(postState === 2){
            jQuery.ajax({
                url: "saveLike.php",
                data: {postid:postID,state:postState,to:'undislike'},
                method: "POST",
                success:function(data){
                    thiss.data('state',0);
                    thiss.html('Dislike');
                    Dislikes.html(data + " DisLike(s)");
                    likeButton.data('state',0);
                }
            });
        }
    });

});
