@php
    $fundraiser = DB::table('fundraisers')
        ->where('user_id', auth()->user()->id)
        ->exists();
    
    $donate = DB::table('fundraiser_donations')
        ->where('doner_id', auth()->user()->id)
        ->exists();
@endphp
<main class="main my-4">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header d-lg-none mb-3 py-4">
                        <div class="logo">
                            <a class="display-6" href="index.html">SocioPro</a>
                        </div>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body offcanvas-body-2">
                        <div class="timeline-search">
                            <h3 class="text_22">Fundraisers</h3>
                            <div class="gr-search">
                                <form action="{{ route('fundraiser.search') }} " mathod="get">
                                    <input type="text" id="search" name="search" class="bg-secondary rounded"
                                        placeholder="Search" value="{{ request('search') }}">
                                    <span class="i fa fa-search"></span>
                                </form>
                            </div>
                        </div>
                        <div class="timeline-navigation">
                            <!-- Sidebar Tab Button Area -->
                            <div class="blog-nav-tab">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">


                                    <a href="{{ route('fundraiser.index') }}" class="d-block w-100">
                                        <button
                                            class="nav-link custom_btn_1 w-100 @if (Route::currentRouteName() == 'fundraiser.index') active @endif"
                                            type="button">
                                            <img src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/explore.svg') }}"
                                                alt="explore">
                                            Explore Fundraisers
                                        </button>
                                    </a>


                                    @if ($fundraiser || $donate)
                                        <a href="@if ($fundraiser) {{ route('fundraiser.myactivity') }}
                                        @else
                                        {{ route('fundraiser.donor') }} @endif"
                                            class="d-block w-100">
                                            <button
                                                class="nav-link custom_btn_1 w-100 @if (Route::currentRouteName() == 'fundraiser.myacrivity') active @endif"
                                                type="button">
                                                <img src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/activity.svg') }}"
                                                    alt="explore">
                                                Your Activity
                                            </button>
                                        </a>
                                    @endif


                                    <a href="{{ route('fundraiser.category', ['type' => 'explore']) }}"
                                        class="d-block w-100">
                                        <button
                                            class="nav-link custom_btn_1 w-100 @if (Route::currentRouteName() == 'fundraiser.category') active @endif"
                                            type="button">
                                            <img src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/categories.svg') }}"
                                                alt="explore">
                                            Categories
                                        </button>
                                    </a>


                                    {{-- <button href="{{ route('fundraiser.index') }}" class="nav-link custom_btn_1"
                                        id="v-pills-activity-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-activity" type="button" role="tab"
                                        aria-controls="v-pills-activity" aria-selected="false"><img
                                            src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/activity.svg') }}"
                                            alt="explore">Your Activity</button>
                                    <a href="{{ route('fundraiser.category') }}"><button
                                            class="{{ request()->is('/fundraiser/catagory') ? 'active' : '' }}nav-link custom_btn_1"
                                            id="v-pills-categories-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-categories" type="button" role="tab"
                                            aria-controls="v-pills-categories" aria-selected="false"><img
                                                src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/categories.svg') }}"
                                                alt="explore">Categories</button></a> --}}
                                </div>
                            </div>
                            <!-- Sidebar Footer Area -->
                            <div class="footer-nav">
                                <div class="footer-menu py-2">
                                    <ul>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">Developers</a></li>
                                        <li><a href="#">More</a></li>
                                    </ul>
                                </div>
                                <div class="copy-rights text-muted">
                                    <p>© 2022 Sociopro</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
