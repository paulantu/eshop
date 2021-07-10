<script>
        @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
<script>
    jQuery(document).ready(function(){

        // for magnifuc popup start
        $('.logo-table-body').magnificPopup({
            delegate: 'a',
            gallery: {
                enabled: true
            },
            type: 'image'
        });

        // for magnifuc popup end

    });



</script>

<script>
    CKEDITOR.replace("product_description");
</script>

 <script src="{{ asset('backend/js/custom/jquery.magnific-popup.min.js')}}" type="text/javascript"></script>
{{-- custom script --}}
<script src="{{ asset('backend/js/custom/script.js')}}" type="text/javascript"></script>

{{-- for ajax --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" type="text/javascript"></script>

<script src="{{ asset('backend/vendors/js/vendor.bundle.base.js')}}" type="text/javascript"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('backend/vendors/chart.js/Chart.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('backend/vendors/datatables.net/jquery.dataTables.js')}}" type="text/javascript"></script>
<script src="{{ asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}" type="text/javascript"></script>
<script src="{{ asset('backend/js/dataTables.select.min.js')}}" type="text/javascript"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('backend/js/off-canvas.js')}}" type="text/javascript"></script>
<script src="{{ asset('backend/js/hoverable-collapse.js')}}" type="text/javascript"></script>
<script src="{{ asset('backend/js/template.js')}}" type="text/javascript"></script>
<script src="{{ asset('backend/js/settings.js')}}" type="text/javascript"></script>
<script src="{{ asset('backend/js/todolist.js')}}" type="text/javascript"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('backend/js/dashboard.js')}}" type="text/javascript"></script>
<script src="{{ asset('backend/js/Chart.roundedBarCharts.js')}}" type="text/javascript"></script>

{{-- script for file upload --}}
<script src="{{ asset('backend/js/file-upload.js')}}" type="text/javascript"></script>



