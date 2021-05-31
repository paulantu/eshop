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
{{-- custom script --}}
<script src="{{ asset('backend/js/custom/script.js')}}"></script>

{{-- for ajax --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>

<script src="{{ asset('backend/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('backend/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{ asset('backend/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{ asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<script src="{{ asset('backend/js/dataTables.select.min.js')}}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('backend/js/off-canvas.js')}}"></script>
<script src="{{ asset('backend/js/hoverable-collapse.js')}}"></script>
<script src="{{ asset('backend/js/template.js')}}"></script>
<script src="{{ asset('backend/js/settings.js')}}"></script>
<script src="{{ asset('backend/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('backend/js/dashboard.js')}}"></script>
<script src="{{ asset('backend/js/Chart.roundedBarCharts.js')}}"></script>

{{-- script for file upload --}}
<script src="{{ asset('backend/js/file-upload.js')}}"></script>
