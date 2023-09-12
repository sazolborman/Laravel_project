<div class="main-section">
    <div class="container p-0">
        <div class="row">
            <div class="col-lg-4 col-xl-3">
                @include('frontend.addons.left_sidebar')
            </div>

            <div class="col-lg-8 col-xl-9">

                <div class="row justify-content-between">
                    <div
                        class="mb-4 @if ($section_title == '') col-6 d-flex align-items-center @else col-12 @endif">
                        <div class="toggle-menu">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                    </div>
                    @if ($section_title != '')
                        <div class="col-6 d-flex mb-4 align-items-center">
                            <h4 class="fz-20-b-22-black">{{ $section_title }}</h4>
                        </div>
                    @endif
                    <div class="col-6 d-flex justify-content-end mb-4 align-items-center">
                        <a href="{{ $head_link }}" class="previousBtn">{{ $link_name }}
                            <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>

                {{-- all addon view --}}
                @include($content_view)
            </div>
        </div>
    </div>
</div>
