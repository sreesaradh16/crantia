<!doctype html>
<html lang="en" dir="ltr">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Admin">
    <meta name="author" content="ALT-D">
    <meta name="keywords" content="ALT-D">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/Background.png')}}" />

    <!-- TITLE -->
    <title>Machine Test</title>

    <!-- STYLE CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />

    <!-- SIDE-MENU CSS -->
    <link href="{{asset('assets/plugins/sidemenu/closed-sidemenu.css')}}" rel="stylesheet">

    <!-- CUSTOM SCROLL BAR CSS-->
    <link href="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

    <!-- NOTIFICATION CSS -->
    <link href="{{asset('assets/plugins/notify/css/jquery.growl.css')}}" rel="stylesheet" />

    <!--SWEET ALERT CSS-->
    <link href="{{asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" />

    @yield('css')
</head>

<body class="app sidebar-mini">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div id="app" class="page">
        <div class="page-main">

            <!-- side menu starts -->
            @include('layout.side-menu')
            <!-- side menu ends -->

            <!--app-content open-->
            <div class="app-content">
                <img src="{{asset('assets/images/login-bg.jpg')}}" class="zero-op">
                <div class="side-app">

                    <!-- PAGE-HEADER -->
                    @include('layout.header')
                    <!-- PAGE-HEADER END -->

                    <!-- content starts -->
                    @yield('content')
                    <!-- content ends -->
                </div>
            </div>
            <!-- CONTAINER END -->
        </div>

        <!-- FOOTER -->
        @include('layout.footer')
        <!-- FOOTER END -->
    </div>

    @livewireScripts
    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>

    <!-- RATING STARJS -->
    <script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

    <!-- SIDE-MENU JS-->
    <script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>

    <!-- CUSTOM SCROLLBAR JS-->
    <script src="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <!-- NOTIFICATIONS JS -->
    <script src="{{asset('assets/plugins/notify/js/rainbow.js')}}"></script>
    <script src="{{asset('assets/plugins/notify/js/sample.js')}}"></script>
    <script src="{{asset('assets/plugins/notify/js/jquery.growl.js')}}"></script>

    <!-- SWEET-ALERT JS -->
    <script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/sweet-alert.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
    @include('common.message')

    <script>
        $(document).on("click", 'a.frmsubmit', function(e) {
            var message = '';
            if (e.currentTarget.attributes.message != undefined) {
                message = e.currentTarget.attributes.message.value;
            } else {
                message = 'Are you sure you want to delete?';
            }
            if (message != 'false') {
                swal({
                        title: "Alert",
                        text: message,
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonText: 'Ok',
                        cancelButtonText: 'Cancel',
                    },
                    function() {
                        e.preventDefault();
                        var myForm = '<form id="hidfrm" action="' + e.currentTarget.attributes.href.value + '" method="post">{{@csrf_field()}}<input type="hidden" name="_method" value="' + e.currentTarget.attributes.method.value + '"></form>';
                        $('body').append(myForm);
                        myForm = $('#hidfrm');
                        myForm.submit();
                    });

            } else {
                e.preventDefault();
                var myForm = '<form id="hidfrm" action="' + e.currentTarget.attributes.href.value + '" method="post">{{@csrf_field()}}<input type="hidden" name="_method" value="' + e.currentTarget.attributes.method.value + '"></form>';
                $('body').append(myForm);
                myForm = $('#hidfrm');
                myForm.submit();
            }
            return false;
        });
    </script>
    @yield('js')
</body>

</html>