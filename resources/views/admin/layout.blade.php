<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>

    <!-- {{asset('Admin/')}} -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Favicon icon -->
    <link rel="icon" href=" {{asset('Admin/assets/images/favicon.ico')}}" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href=" {{asset('Admin/assets/css/style.css')}}">



</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    @include('admin.body.sidebar');
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    @include('admin.body.header');
    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            @include('admin.body.breadcrumb');
            <!-- [ breadcrumb ] end -->

            <!-- Begin page content -->
            @yield('page');
            <!-- End page content -->

        </div>
    </div>
    <!-- Main content end -->
    <!--start footer -->
    @include('admin.body.footer');
    <!-- end footer -->


    <!-- Required Js -->
    <script src=" {{asset('Admin/assets/js/vendor-all.min.js')}}"></script>
    <script src=" {{asset('Admin/assets/js/plugins/bootstrap.min.js')}}"></script>
    <script src=" {{asset('Admin/assets/js/pcoded.min.js')}}"></script>
    <!-- Cke editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <!-- Apex Chart -->
    <script src=" {{asset('Admin/assets/js/plugins/apexcharts.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- custom-chart js -->
    <script src=" {{asset('Admin/assets/js/pages/dashboard-main.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#category').change(function(e) {
            var cate_id = $(this).val();

            // var url_patamete = "{{ route('ajax.get.subcategory',": id ") }}";
            var url_patamete = "{{ route('ajax.get.subcategory', ':id') }}";
            url_patamete = url_patamete.replace(':id', cate_id);
            // alert(cate_id)
            $('#subcategory').html('<option selected>Loading ... </option>')
            $.ajax({
                url: url_patamete,
                type: 'GET',
                // dataType: 'html',
                success: function(data) {
                    $('#subcategory').html(data);
                    console.log(data);
                }
            });
        })
        //upload image to img tag
        $('#image').change(function(e) {
            // alert('Hi')
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#show_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);



        })
    </script>



    @yield('Scripts')
</body>

</html>