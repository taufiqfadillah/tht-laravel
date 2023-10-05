<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/images/dashboard/handbag.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/dashboard/handbag.png') }}" type="image/x-icon">
    <title>@yield('title')</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/scrollbar.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/table.css') }}">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <style>
        .action-icons {
            display: flex;
            align-items: center;
        }

        .action-icons i {
            margin-right: 10px;
        }

        .logo-wrapper {
            display: flex;
            align-items: center;
        }

        .logo-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            font-weight: bold;
        }

        .logo-link img {
            max-width: 30px;
            margin-right: 10px;
        }

        .logo-text {
            margin: 0;
            font-size: 18px;
        }

        .user-image {
            position: relative;
            display: inline-block;
        }

        .image-wrapper {
            position: relative;
            width: 100px;
            height: 100px;
            overflow: hidden;
            border-radius: 50%;
            border: 2px solid black;
        }

        .pencil-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            background-color: white;
            color: black;
            padding: 5px;
            cursor: pointer;
            border-radius: 50%;
            border: 2px solid black;
        }

        .pencil-icon i {
            font-size: 15px;
        }

        #file-input {
            position: absolute;
            opacity: 0;
            width: 100%;
            cursor: pointer;
        }

        /* upload produk */
        .upload-container {
            border-radius: 6px;
        }

        .border-container {
            border: 5px dashed rgba(198, 198, 198, 0.65);
            padding: 20px;
        }

        .border-container p {
            color: #130f40;
            font-weight: 600;
            font-size: 1.1em;
            letter-spacing: -1px;
            margin-top: 30px;
            margin-bottom: 0;
            opacity: 0.65;
        }

        #file-browser {
            text-decoration: none;
            color: rgb(22, 42, 255);
            border-bottom: 3px dotted rgba(22, 22, 255, 0.85);
        }

        #file-browser:hover {
            color: rgb(0, 0, 255);
            border-bottom: 3px dotted rgba(0, 0, 255, 0.85);
        }
    </style>
</head>

<body>
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader-index"> <span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
            </filter>
        </svg>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        @include('layouts.header')
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            @include('layouts.sidebar')
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js' )}}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js' )}}"></script>
    <!-- scrollbar js-->
    <script src="{{ asset('assets/js/scrollbar/simplebar.js' )}}"></script>
    <script src="{{ asset('assets/js/scrollbar/custom.js' )}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/config.js' )}}"></script>
    <!-- Plugins JS start-->
    <script id="menu" src="{{ asset('assets/js/sidebar-menu.js' )}}"></script>
    <script src="{{ asset('assets/js/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('assets/js/header-slick.js') }}"></script>
    <!-- Plugins JS Ends-->

    <!-- Theme js-->
    <script src="{{asset('assets/js/script.js')}}"></script>

    <script>
        const logoutLinks = document.querySelectorAll(".logout-link");

        logoutLinks.forEach(function(logoutLink) {
            logoutLink.addEventListener("click", function(event) {
                event.preventDefault();

                window.location.href = '/logout';
            });
        });

        function previewImage() {
            var input = document.getElementById('image');
            var preview = document.getElementById('preview-image');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        function handleFileSelect(input) {
            const fileBrowser = document.getElementById('file-browser');
            const previewImage = document.getElementById('preview-image');

            if (input.files.length > 0) {
                const file = input.files[0];
                const fileName = file.name;

                fileBrowser.textContent = fileName;

                const reader = new FileReader();
                reader.onload = function(event) {
                    previewImage.src = event.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                previewImage.src = "{{ asset('assets/images/upload.png') }}";
                fileBrowser.textContent = "disini";
            }
        }
        document.getElementById('file-browser').addEventListener('click', function() {
            document.getElementById('file-input').click();
        });

        function resetForm() {
            document.getElementById('namabarang').value = '';
            document.getElementById('hargabeli').value = '';
            document.getElementById('hargajual').value = '';
            document.getElementById('stokbarang').value = '';
            document.getElementById('kategori').value = '';

            document.getElementById('preview-image').src = "{{ asset('assets/images/upload.png') }}";

            document.getElementById('file-browser').textContent = "disini";
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#sort").on("change", function() {
                var selectedValue = $(this).val();
                var url = "{{ route('index') }}?sort=" + selectedValue;
                window.location.href = url;
            });
        });
        $(document).ready(function() {
            $("#search-button").click(function() {
                var searchText = $("#search").val().trim().toLowerCase();

                $("tbody tr").each(function() {
                    var rowText = $(this).text().toLowerCase();
                    if (rowText.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>

</body>

</html>