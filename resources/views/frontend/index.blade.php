<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @php
        $system_name = \App\Models\Setting::where('type', 'system_name')->value('description');
        $system_favicon = \App\Models\Setting::where('type', 'system_fav_icon')->value('description');
    @endphp
    <title>{{ $system_name }}</title>

    <!-- CSRF Token for ajax for submission -->
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ get_system_logo_favicon($system_favicon, 'favicon') }}" />

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fontawesome/all.min.css') }}">
    <!-- CSS Library -->

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">

    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/plyr/plyr.css') }}">
    <link href="{{ asset('assets/frontend/leafletjs/leaflet.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/css/plyr_cdn_dw.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/tagify.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/uploader/file-uploader.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/jquery-rbox.css') }}" rel="stylesheet">

    <!-- paid content start -->
    <link rel="apple-touch-icon" href="images/favicon.png" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/paid-content/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/addon_layout.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/paid-content/css/new_scss/new_style.css') }}" />
    <!-- paid content end -->




    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/gallery/justifiedGallery.min.css') }}">
    <link href="{{ asset('assets/frontend/toaster/toaster.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/frontend/summernote-0.8.18-dist/summernote-lite.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/own.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/pc.style.css') }}" />

    {{-- fundraiser --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/style_make.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/custom_style.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/style.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/new-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/new-responsive.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/profile-table.css') }}" /> --}}

    <!-- New -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/new_scss/new_style.css') }}" />

    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/css/fundraiser/images/favicon.png') }}" />

    {{-- end fundraiser --}}

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/daterangepicker.css') }}">



    <script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>



</head>

<body>
    @php $user_info = Auth()->user() @endphp

    @include('frontend.header')

    <!-- Main Start -->
    <main class="main my-4">
        <div class="container">
            <div class="row">

                @if (isset($layout))
                    @include($view_path)
                @else
                    <div class="col-lg-2">
                        @include('frontend.left_navigation')
                    </div>
                    <!-- Timeline Navigation End -->

                    <!-- Content Section Start -->
                    <div class="col-lg-7 col-sm-12 order-3 order-lg-2">
                        @include($view_path)
                    </div>
                    <div class="col-lg-3 order-2 order-lg-3">
                        @include('frontend.right_sidebar')
                    </div>
                @endif

            </div> <!-- row end -->

        </div> <!-- container end -->
    </main>
    <!-- Main End -->

    <!-- Common modals -->
    @include('frontend.modal')



    <!--Javascript
    ========================================================-->
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.datepicker.min.js') }}"></script>


    <script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/plyr/plyr.js') }}"></script>
    <script src="{{ asset('assets/frontend/jquery-form/jquery.form.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/leafletjs/leaflet.js') }}"></script>
    <script src="{{ asset('assets/frontend/leafletjs/leaflet-search.js') }}"></script>
    <script src="{{ asset('assets/frontend/toaster/toaster.js') }}"></script>

    <script src="{{ asset('assets/frontend/gallery/jquery.justifiedGallery.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/js/jQuery.tagify.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-rbox.js') }}"></script>


    <script src="{{ asset('assets/frontend/js/plyr_cdn_dw.js') }}"></script>

    <script src="{{ asset('js/share.js') }}"></script>

    <script src="{{ asset('assets/frontend/uploader/file-uploader.js') }}"></script>

    <script src="{{ asset('assets/frontend/summernote-0.8.18-dist/summernote-lite.min.js') }}"></script>


    {{-- fundraiser start----- --}}
    <script src="{{ asset('assets/frontend/css/fundraiser/js/custom.js') }}"></script>
    <script src="{{ asset('assets/frontend/css/fundraiser/js/custom_btn.js') }}"></script>
    <script src="{{ asset('assets/frontend/css/fundraiser/js/new-script.js') }}"></script>
    {{-- <script src="{{ asset('assets/frontend/css/fundraiser/js/profile-table.js') }}"></script> --}}
    {{-- fundraiser end---- --}}


    {{-- paid content start --}}
    <script src="{{ asset('assets/frontend/paid-content/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/paid-content/js/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/frontend/paid-content/js/jquery-tjgallery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/paid-content/js/custom.js') }}"></script>
    <script src="{{ asset('assets/frontend/paid-content/js/script.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/addon_layout.js') }}"></script>
    {{-- paid content end --}}

    <script src="{{ asset('assets/frontend/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/daterangepicker.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/js/custom.js') }}"></script>

    <script src="{{ asset('assets/frontend/js/initialize.js') }}"></script>




    @include('frontend.common_scripts')

    @include('frontend.toaster')

    @include('frontend.initialize')

    <script>
        "use strict";

        $(document).ready(function() {
            $('[name=tag]').tagify({
                duplicates: false
            });
        });
    </script>





</body>

</html>
