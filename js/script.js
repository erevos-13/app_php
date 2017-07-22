/**
 * Created by erevos13 on 4/7/2017.
 */
function addComment() {

    if( $('#author').val().length == 0 ) {
        alert('Please Enter a Author');
        return false;
    }

    requestData = $("#photo_id_comment,#author,#body").serialize();
    $.ajax({
        url: "http://localhost/udemy/app_php/includes/comment.php",
        type: "post",
        data: requestData,
        dataType: "html",
        cache: false,
        success: function (data) {
            $('#comment').html(data);
            $("#author").val('');
            $('#body').val('');

        }
    });
return false;
}



function updateComment(){
    requestData = $("#photo_id_comment").serialize();
    $.ajax({
        url: "http://localhost/udemy/app_php/includes/comment.php",
        type: "post",
        data: requestData,
        dataType: "html",
        cache: false,
        success: function (data) {
            $('#comment').html(data);

        },
        error : function( http , status , error ) {
            alert( 'Some Error malakia : ' + error );
        }



    });





}
 setInterval( updateComment , 2000 );





