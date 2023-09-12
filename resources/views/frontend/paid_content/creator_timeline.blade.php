@php
    $paid_content = App\Models\PaidContentCreator::where('user_id', auth()->user()->id)->first();
@endphp

{{-- cover pic and profile pic --}}
@include('frontend.paid_content.banner')


<div class="main-content-wraper">
    <div class="row">
        <div class="col-lg-7 col-sm-12">
            <div class="myPage-tabs-wraper">
                <div class="seetings-tabs-wrapper">

                    {{-- creator menu panel --}}
                    <div class="tabs-top">
                        @include('frontend.paid_content.tab_options')
                    </div>

                    {{-- my page --}}
                    @if (isset($timeline_post) || isset($public_post) || isset($subscriber_post))
                        @include('frontend.paid_content.my_page')
                    @endif

                    {{-- creator package --}}
                    @isset($packages)
                        @include('frontend.paid_content.package')
                    @endisset

                    {{-- creator subscriber --}}
                    @isset($subscribers)
                        @include('frontend.paid_content.subscribers')
                    @endisset
                </div>
            </div>
        </div>

        {{-- paid content bio --}}
        <div class="col-lg-5 col-sm-12">
            <div class="page-sidebar">

                @php
                    $creator = DB::table('paid_content_creators')
                        ->where('user_id', auth()->user()->id)
                        ->first();
                    $social_media = json_decode($creator->social_accounts);
                @endphp

                <h4 class="fz-24-sb-22-black">Intro</h4>
                <p class="fz-14-r-22-white-1">
                    Lorem Ipsum available, but the majority have suffered
                    alteration in some form by injected humour
                </p>

                <div class="mt-4 mb-3 creator-boi">
                    <h4 class="fz-24-sb-22-black">Creator Bio</h4>
                    <p>{{ $creator->bio }}</p>
                </div>

                {{-- edit personal settings --}}
                <a href="{{ route('settings') }}" class="page-s-btn">Edit bio</a>

                <h4 class="fz-24-sb-22-black pt-30 pb-20">Membership</h4>
                <img src="{{ asset('assets/frontend/paid-content/images/new/Notification-icon.png') }}"
                    alt="" />
                <h4 class="fz-24-sb-22-black pt-20">
                    Choose what to offer
                </h4>
                <p class="fz-14-r-22-white-1">
                    Lorem Ipsum available, but the majority have suffered
                    alteration in some form by injected humour
                </p>
                <a href="javascript: void(0);" class="page-s-btn">Set up benefits</a>
                <h4 class="fz-24-sb-22-black pt-30 pb-20">
                    Social profiles
                </h4>
                <ul class="social-links">

                    <li>
                        <a href="@if ($social_media->facebook == '') javascript: void(0);
                            @else {{ $social_media->facebook }} @endif"
                            target="_blank">
                            <i class="fa-brands fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="@if ($social_media->twitter == '') javascript: void(0);
                            @else {{ $social_media->twitter }} @endif"
                            target="_blank">
                            <i class="fa-brands fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="@if ($social_media->instagram == '') javascript: void(0);
                            @else {{ $social_media->instagram }} @endif"
                            target="_blank">
                            <i class="fa-brands fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="@if ($social_media->linkedin == '') javascript: void(0);
                            @else {{ $social_media->linkedin }} @endif"
                            target="_blank">
                            <i class="fa-brands fa-linkedin-in"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@include('frontend.main_content.scripts')
@include('frontend.common_scripts')
