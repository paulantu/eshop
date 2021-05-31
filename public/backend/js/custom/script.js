    //add product subcategory dependency dropdown start


    $(document).ready(function(){
        $('select[name="cat_id"]').on('change', function(){
            var cat_id = $(this).val();
            if(cat_id) {
                jQuery.ajax({
                    url:'/subCatdependency/' + cat_id,
                    type: "GET",
                    dataType: "json",

                    success:function(data){
                        $('select[name="subcat_id"]').empty('select sub category');
                        jQuery.each(data, function(key, value){
                            $('select[name="subcat_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }
            else{
                // $('select[name="subcat_id"]').empty();
                alert('danger');
            }
        });
    });

    //add product subcategory dependency dropdown end

