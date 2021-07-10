$(document).ready(function(){
    $('.addwishlist').on('click', function(){
        var id = $(this).data('id');

        if(id){
            $.ajax({
                type : "GET",
                dataType : "json",
                url : "/add-to-wishlist/"+id,

                success:function(data){
                    wishData()
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



//remove data from wishlist start

function removeWishlist(id) {
    $.ajax({
        type:"GET",
        url:"/wishlist/remove/"+id,
        dataType:'json',
        success:function () {
            wishlist();
            //    showing some message
            if ($.isEmptyObject(data.error)){
                swal({
                    title: "Good job!",
                    text: data.success,
                    icon: "success",
                    button: "Ok",
                    timer:3000,
                });
            }else {
                swal({
                    title: "Process failed!",
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


function loadMoreProduct(products) {
    $.ajax({
        url:'?products=' + products,
        type:'get',
        beforeSend:function () {
            $("ajax-load").show();
        }
    })
        .done(function (shop) {
            if(shop.html === " "){
                $('ajax-load').html("No more records found");
                return;
            }
            $('.ajax-load').hide();
            $("#product-data").append(shop.html);
        })
        .fail(function (jqXHR,ajaxOptions,thrownError) {
            swal({
                title: "Process failed!",
                type: "error",
                text: data.error,
                icon: "error",
                button: "Ok",
                timer:3000,
            });
        })
}

var products = 1;
$(window).scroll(function () {
    if($(window).scrollTop() + $(window).height() >= $(document).height()){
        products++;
        loadMoreProduct(products);
    }
});














