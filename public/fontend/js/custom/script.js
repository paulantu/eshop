$(document).ready(function(){
    $('.addwishlist').on('click', function(){
        var id = $(this).data('id');

        if(id){
            $.ajax({
                type : "GET",
                dataType : "json",
                url : "/add-to-wishlist/"+id,

                success:function(data){
                    //    showing some message
                    if ($.isEmptyObject(data.error)){
                        swal({
                            title: "Good job!",
                            type: "success",
                            text: data.success,
                            icon: "success",
                            button: "Ok",
                            timer:3000,
                        });
                    }else {
                        swal({
                            title: "Process failed!",
                            type: "error",
                            text: data.error,
                            icon: "error",
                            button: "Ok",
                            timer:3000,
                        });
                    }
                }
            });
        }
    });
});


function test(){
    swal("Good job!", "You clicked the button!", "success");
}



//remove data from wishlist start

function removeWishlist(wish_pro_id) {
    $.ajax({
        type:"GET",
        url:"/my-wishlist/remove/"+wish_pro_id,
        dataType:'json',
        success:function () {
            wishlist();
            //    showing some message
            if ($.isEmptyObject(data.error)){
                swal({
                    title: "Good job!",
                    type: "success",
                    text: data.success,
                    icon: "success",
                    button: "Ok",
                    timer:3000,
                });
            }else {
                swal({
                    title: "Process failed!",
                    type: "error",
                    text: data.error,
                    icon: "error",
                    button: "Ok",
                    timer:3000,
                });
            }

        }
    })
}
wishlist();

//remove data from wishlist start
