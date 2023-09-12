<!-- Explore Tab Content -->
<!-- Popular Area -->
<div class="blog-area">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between blog-type">
            @if ($popular->count() > 0)
                <h3 class="text_22">Popular</h3>
            @else
                <h3></h3>
            @endif
            <a href="{{ route('fundraiser.create') }}" class="btn_1">Create Fundraise</a>
        </div>
        @if ($popular->count() > 0)
            <!-- Single Blog Card -->
            @foreach ($popular as $row)
                @php
                    $days = round((strtotime($row->timestamp_end) - strtotime($row->created_at)) / (3600 * 24));
                    $days_left = (int) $days;
                    $raised_amount = $row->raised_amount;
                    $goal_amount = $row->goal_amount;
                    $value = ($raised_amount * 100) / $goal_amount;
                    $id = $row->id;
                    
                    $postOfThisEvent = \App\Models\Posts::where('publisher', 'fundraiser')
                        ->where('publisher_id', $id)
                        ->first();
                    if (!empty($postOfThisEvent->post_id)) {
                        $postId = $postOfThisEvent->post_id;
                    } else {
                        $postId = 0;
                    }
                @endphp
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="blog-card">
                        <div class="card custom_card">
                            <div class="card-img">
                                @if ($row->cover_photo != '')
                                    <img src="{{ asset('assets/frontend/images/campaign/' . $row->cover_photo) }}"
                                        class="card-img-top" alt="blog">
                                @else
                                    <img src="{{ asset('storage/blog/coverphoto/default/default.jpg') }}"
                                        class="card-img-top" alt="blog">
                                @endif
                                <div class="card-donate">
                                    <img src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/donate.svg') }}"
                                        alt="donate">
                                    <p class="donate-count">520</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('fundraiser.profile', $id) }}">
                                    <h5 class="card-title text_16 campaign-title">{{ $row->title }}</h5>
                                </a>
                                <p class="card-text pera_text card_preview_text">{{ $row->description }}</p>

                                @if ($raised_amount == $goal_amount)
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="{{ $value }}" max="100"></progress>
                                        <p class="card-progress-value">{{ number_format($value, 2) }}%</p>
                                    </div>
                                @else
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="{{ $value }}" max="100"></progress>
                                        <p class="card-progress-value">{{ number_format($value, 2) }}%</p>
                                    </div>
                                @endif


                                <div class="card-raised-area d-flex justify-content-between">
                                    <p class="pera_text">Raised : <span
                                            class="@if ($raised_amount == $goal_amount) text_green @else text_purple @endif ">${{ $raised_amount }}</span>
                                    </p>
                                    <p class="pera_text">Goal : <span class="text_green">${{ $goal_amount }}</span>
                                    </p>
                                </div>
                                @if ($days_left <= 0)
                                    <a href="javascript:void(0)" class=" custom-btn-1 btn"><img
                                            src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg') }}"
                                            alt="">
                                        {{ get_phrase('Share') }}
                                    </a>
                                @else
                                    <a href="javascript:void(0)" class=" custom-btn-2 btn"
                                        onclick="showCustomModal('{{ route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId]) }}', '{{ get_phrase('Share Campaign') }}');"><img
                                            src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg') }}"
                                            alt="">
                                        {{ get_phrase('Share') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @if ($popular->count() > 2)
                <!-- See More Button -->
                @if (Route::currentRouteName() != 'campaign.category')
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="{{ route('campaign.category', ['type' => 'popular']) }}" id="see_more"
                            class="text_16 text_purple">
                            See all
                        </a>
                    </div>
                @endif
            @endif
        @endif

        {{-- animals tab --}}
        @if ($animal->count() > 0)
            <div class="col-lg-12 d-flex justify-content-between blog-type">
                <h3 class="text_22">Animals</h3>

            </div>
            <!-- Single Blog Card -->
            @foreach ($animal as $row)
                @php
                    $days = round((strtotime($row->timestamp_end) - strtotime($row->created_at)) / (3600 * 24));
                    $days_left = (int) $days;
                    $raised_amount = $row->raised_amount;
                    $goal_amount = $row->goal_amount;
                    $value = ($raised_amount * 100) / $goal_amount;
                    $id = $row->id;
                    
                    $postOfThisEvent = \App\Models\Posts::where('publisher', 'fundraiser')
                        ->where('publisher_id', $id)
                        ->first();
                    if (!empty($postOfThisEvent->post_id)) {
                        $postId = $postOfThisEvent->post_id;
                    } else {
                        $postId = 0;
                    }
                @endphp
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="blog-card">
                        <div class="card custom_card">
                            <div class="card-img">
                                @if ($row->cover_photo != '')
                                    <img src="{{ asset('assets/frontend/images/campaign/' . $row->cover_photo) }}"
                                        class="card-img-top" alt="blog">
                                @else
                                    <img src="{{ asset('storage/blog/coverphoto/default/default.jpg') }}"
                                        class="card-img-top" alt="blog">
                                @endif
                                <div class="card-donate">
                                    <img src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/donate.svg') }}"
                                        alt="donate">
                                    <p class="donate-count">520</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('fundraiser.profile', $id) }}">
                                    <h5 class="card-title text_16 campaign-title">{{ $row->title }}</h5>
                                </a>
                                <p class="card-text pera_text card_preview_text">{{ $row->description }}</p>

                                @if ($raised_amount == $goal_amount)
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="{{ $value }}"
                                            max="100"></progress>
                                        <p class="card-progress-value">{{ number_format($value, 2) }}%</p>
                                    </div>
                                @else
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="{{ $value }}"
                                            max="100"></progress>
                                        <p class="card-progress-value">{{ number_format($value, 2) }}%</p>
                                    </div>
                                @endif


                                <div class="card-raised-area d-flex justify-content-between">
                                    <p class="pera_text">Raised : <span
                                            class="@if ($raised_amount == $goal_amount) text_green @else text_purple @endif ">${{ $raised_amount }}</span>
                                    </p>
                                    <p class="pera_text">Goal : <span class="text_green">${{ $goal_amount }}</span>
                                    </p>
                                </div>
                                @if ($days_left <= 0)
                                    <a href="javascript:void(0)" class=" custom-btn-1 btn"><img
                                            src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg') }}"
                                            alt="">
                                        {{ get_phrase('Share') }}
                                    </a>
                                @else
                                    <a href="javascript:void(0)" class=" custom-btn-2 btn"
                                        onclick="showCustomModal('{{ route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId]) }}', '{{ get_phrase('Share Campaign') }}');"><img
                                            src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg') }}"
                                            alt="">
                                        {{ get_phrase('Share') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if ($animal->count() > 2)
                <!-- See More Button -->
                @if (Route::currentRouteName() != 'campaign.category')
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="{{ route('campaign.category', ['type' => 'animal']) }}" id="see_more"
                            class="text_16 text_purple">
                            See all
                        </a>
                    </div>
                @endif
            @endif
        @endif

        {{-- Arts And Culture tab --}}
        @if ($culture->count() > 0)
            <div class="col-lg-12 d-flex justify-content-between blog-type">
                <h3 class="text_22">Arts And Culture</h3>
            </div>
            <!-- Single Blog Card -->
            @foreach ($culture as $row)
                @php
                    $days = round((strtotime($row->timestamp_end) - strtotime($row->created_at)) / (3600 * 24));
                    $days_left = (int) $days;
                    $raised_amount = $row->raised_amount;
                    $goal_amount = $row->goal_amount;
                    $value = ($raised_amount * 100) / $goal_amount;
                    $id = $row->id;
                    
                    $postOfThisEvent = \App\Models\Posts::where('publisher', 'fundraiser')
                        ->where('publisher_id', $id)
                        ->first();
                    if (!empty($postOfThisEvent->post_id)) {
                        $postId = $postOfThisEvent->post_id;
                    } else {
                        $postId = 0;
                    }
                @endphp
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="blog-card">
                        <div class="card custom_card">
                            <div class="card-img">
                                @if ($row->cover_photo != '')
                                    <img src="{{ asset('assets/frontend/images/campaign/' . $row->cover_photo) }}"
                                        class="card-img-top" alt="blog">
                                @else
                                    <img src="{{ asset('storage/blog/coverphoto/default/default.jpg') }}"
                                        class="card-img-top" alt="blog">
                                @endif
                                <div class="card-donate">
                                    <img src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/donate.svg') }}"
                                        alt="donate">
                                    <p class="donate-count">520</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('fundraiser.profile', $id) }}">
                                    <h5 class="card-title text_16 campaign-title">{{ $row->title }}</h5>
                                </a>
                                <p class="card-text pera_text card_preview_text">{{ $row->description }}</p>

                                @if ($raised_amount == $goal_amount)
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="{{ $value }}"
                                            max="100"></progress>
                                        <p class="card-progress-value">{{ number_format($value, 2) }}%</p>
                                    </div>
                                @else
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="{{ $value }}"
                                            max="100"></progress>
                                        <p class="card-progress-value">{{ number_format($value, 2) }}%</p>
                                    </div>
                                @endif


                                <div class="card-raised-area d-flex justify-content-between">
                                    <p class="pera_text">Raised : <span
                                            class="@if ($raised_amount == $goal_amount) text_green @else text_purple @endif ">${{ $raised_amount }}</span>
                                    </p>
                                    <p class="pera_text">Goal : <span class="text_green">${{ $goal_amount }}</span>
                                    </p>
                                </div>
                                @if ($days_left <= 0)
                                    <a href="javascript:void(0)" class=" custom-btn-1 btn"><img
                                            src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg') }}"
                                            alt="">
                                        {{ get_phrase('Share') }}
                                    </a>
                                @else
                                    <a href="javascript:void(0)" class=" custom-btn-2 btn"
                                        onclick="showCustomModal('{{ route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId]) }}', '{{ get_phrase('Share Campaign') }}');"><img
                                            src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg') }}"
                                            alt="">
                                        {{ get_phrase('Share') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- See More Button -->
            @if ($culture->count() > 2)
                <!-- See More Button -->
                @if (Route::currentRouteName() != 'campaign.category')
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="{{ route('campaign.category', ['type' => 'culture']) }}" id="see_more"
                            class="text_16 text_purple">
                            See all
                        </a>
                    </div>
                @endif
            @endif
        @endif

        {{-- Business tab --}}
        @if ($business->count() > 0)
            <div class="col-lg-12 d-flex justify-content-between blog-type">
                <h3 class="text_22">Business</h3>
            </div>
            <!-- Single Blog Card -->
            @foreach ($business as $row)
                @php
                    $days = round((strtotime($row->timestamp_end) - strtotime($row->created_at)) / (3600 * 24));
                    $days_left = (int) $days;
                    $raised_amount = $row->raised_amount;
                    $goal_amount = $row->goal_amount;
                    $value = ($raised_amount * 100) / $goal_amount;
                    $id = $row->id;
                    
                    $postOfThisEvent = \App\Models\Posts::where('publisher', 'fundraiser')
                        ->where('publisher_id', $id)
                        ->first();
                    if (!empty($postOfThisEvent->post_id)) {
                        $postId = $postOfThisEvent->post_id;
                    } else {
                        $postId = 0;
                    }
                @endphp
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="blog-card">
                        <div class="card custom_card">
                            <div class="card-img">
                                @if ($row->cover_photo != '')
                                    <img src="{{ asset('assets/frontend/images/campaign/' . $row->cover_photo) }}"
                                        class="card-img-top" alt="blog">
                                @else
                                    <img src="{{ asset('storage/blog/coverphoto/default/default.jpg') }}"
                                        class="card-img-top" alt="blog">
                                @endif
                                <div class="card-donate">
                                    <img src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/donate.svg') }}"
                                        alt="donate">
                                    <p class="donate-count">520</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('fundraiser.profile', $id) }}">
                                    <h5 class="card-title text_16 campaign-title">{{ $row->title }}</h5>
                                </a>
                                <p class="card-text pera_text card_preview_text">{{ $row->description }}</p>

                                @if ($raised_amount == $goal_amount)
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="{{ $value }}"
                                            max="100"></progress>
                                        <p class="card-progress-value">{{ number_format($value, 2) }}%</p>
                                    </div>
                                @else
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="{{ $value }}"
                                            max="100"></progress>
                                        <p class="card-progress-value">{{ number_format($value, 2) }}%p>
                                    </div>
                                @endif


                                <div class="card-raised-area d-flex justify-content-between">
                                    <p class="pera_text">Raised : <span
                                            class="@if ($raised_amount == $goal_amount) text_green @else text_purple @endif ">${{ $raised_amount }}</span>
                                    </p>
                                    <p class="pera_text">Goal : <span class="text_green">${{ $goal_amount }}</span>
                                    </p>
                                </div>
                                @if ($days_left <= 0)
                                    <a href="javascript:void(0)" class=" custom-btn-1 btn"><img
                                            src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg') }}"
                                            alt="">
                                        {{ get_phrase('Share') }}
                                    </a>
                                @else
                                    <a href="javascript:void(0)" class=" custom-btn-2 btn"
                                        onclick="showCustomModal('{{ route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId]) }}', '{{ get_phrase('Share Campaign') }}');"><img
                                            src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg') }}"
                                            alt="">
                                        {{ get_phrase('Share') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if ($business->count() > 2)
                <!-- See More Button -->
                @if (Route::currentRouteName() != 'campaign.category')
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="{{ route('campaign.category', ['type' => 'business']) }}" id="see_more"
                            class="text_16 text_purple">
                            See all
                        </a>
                    </div>
                @endif
            @endif
        @endif


        {{-- Community & Social Action tab --}}
        @if ($community->count() > 0)
            <div class="col-lg-12 d-flex justify-content-between blog-type">
                <h3 class="text_22">Community & Social Action</h3>
            </div>
            <!-- Single Blog Card -->
            @foreach ($community as $row)
                @php
                    $days = round((strtotime($row->timestamp_end) - strtotime($row->created_at)) / (3600 * 24));
                    $days_left = (int) $days;
                    $raised_amount = $row->raised_amount;
                    $goal_amount = $row->goal_amount;
                    $value = ($raised_amount * 100) / $goal_amount;
                    $id = $row->id;
                    
                    $postOfThisEvent = \App\Models\Posts::where('publisher', 'fundraiser')
                        ->where('publisher_id', $id)
                        ->first();
                    if (!empty($postOfThisEvent->post_id)) {
                        $postId = $postOfThisEvent->post_id;
                    } else {
                        $postId = 0;
                    }
                @endphp
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="blog-card">
                        <div class="card custom_card">
                            <div class="card-img">
                                @if ($row->cover_photo != '')
                                    <img src="{{ asset('assets/frontend/images/campaign/' . $row->cover_photo) }}"
                                        class="card-img-top" alt="blog">
                                @else
                                    <img src="{{ asset('storage/blog/coverphoto/default/default.jpg') }}"
                                        class="card-img-top" alt="blog">
                                @endif
                                <div class="card-donate">
                                    <img src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/donate.svg') }}"
                                        alt="donate">
                                    <p class="donate-count">520</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('fundraiser.profile', $id) }}">
                                    <h5 class="card-title text_16 campaign-title">{{ $row->title }}</h5>
                                </a>
                                <p class="card-text pera_text card_preview_text">{{ $row->description }}</p>

                                @if ($raised_amount == $goal_amount)
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="{{ $value }}"
                                            max="100"></progress>
                                        <p class="card-progress-value">{{ number_format($value, 2) }}%</p>
                                    </div>
                                @else
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="{{ $value }}"
                                            max="100"></progress>
                                        <p class="card-progress-value">{{ number_format($value, 2) }}%</p>
                                    </div>
                                @endif


                                <div class="card-raised-area d-flex justify-content-between">
                                    <p class="pera_text">Raised : <span
                                            class="@if ($raised_amount == $goal_amount) text_green @else text_purple @endif ">${{ $raised_amount }}</span>
                                    </p>
                                    <p class="pera_text">Goal : <span class="text_green">${{ $goal_amount }}</span>
                                    </p>
                                </div>
                                @if ($days_left <= 0)
                                    <a href="javascript:void(0)" class=" custom-btn-1 btn"><img
                                            src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg') }}"
                                            alt="">
                                        {{ get_phrase('Share') }}
                                    </a>
                                @else
                                    <a href="javascript:void(0)" class=" custom-btn-2 btn"
                                        onclick="showCustomModal('{{ route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId]) }}', '{{ get_phrase('Share Campaign') }}');"><img
                                            src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg') }}"
                                            alt="">
                                        {{ get_phrase('Share') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if ($community->count() > 2)
                <!-- See More Button -->
                @if (Route::currentRouteName() != 'campaign.category')
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="{{ route('campaign.category', ['type' => 'community']) }}" id="see_more"
                            class="text_16 text_purple">
                            See all
                        </a>
                    </div>
                @endif
            @endif
        @endif

        {{-- Crisis Relief tab --}}
        @if ($crisis->count() > 0)
            <div class="col-lg-12 d-flex justify-content-between blog-type">
                <h3 class="text_22">Crisis Relief</h3>
            </div>
            <!-- Single Blog Card -->
            @foreach ($crisis as $row)
                @php
                    $days = round((strtotime($row->timestamp_end) - strtotime($row->created_at)) / (3600 * 24));
                    $days_left = (int) $days;
                    $raised_amount = $row->raised_amount;
                    $goal_amount = $row->goal_amount;
                    $value = ($raised_amount * 100) / $goal_amount;
                    $id = $row->id;
                    
                    $postOfThisEvent = \App\Models\Posts::where('publisher', 'fundraiser')
                        ->where('publisher_id', $id)
                        ->first();
                    if (!empty($postOfThisEvent->post_id)) {
                        $postId = $postOfThisEvent->post_id;
                    } else {
                        $postId = 0;
                    }
                @endphp
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="blog-card">
                        <div class="card custom_card">
                            <div class="card-img">
                                @if ($row->cover_photo != '')
                                    <img src="{{ asset('assets/frontend/images/campaign/' . $row->cover_photo) }}"
                                        class="card-img-top" alt="blog">
                                @else
                                    <img src="{{ asset('storage/blog/coverphoto/default/default.jpg') }}"
                                        class="card-img-top" alt="blog">
                                @endif
                                <div class="card-donate">
                                    <img src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/donate.svg') }}"
                                        alt="donate">
                                    <p class="donate-count">520</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('fundraiser.profile', $id) }}">
                                    <h5 class="card-title text_16 campaign-title">{{ $row->title }}</h5>
                                </a>
                                <p class="card-text pera_text card_preview_text">{{ $row->description }}</p>

                                @if ($raised_amount == $goal_amount)
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="{{ $value }}"
                                            max="100"></progress>
                                        <p class="card-progress-value">{{ number_format($value, 2) }}%</p>
                                    </div>
                                @else
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="{{ $value }}"
                                            max="100"></progress>
                                        <p class="card-progress-value">{{ number_format($value, 2) }}%</p>
                                    </div>
                                @endif


                                <div class="card-raised-area d-flex justify-content-between">
                                    <p class="pera_text">Raised : <span
                                            class="@if ($raised_amount == $goal_amount) text_green @else text_purple @endif ">${{ $raised_amount }}</span>
                                    </p>
                                    <p class="pera_text">Goal : <span class="text_green">${{ $goal_amount }}</span>
                                    </p>
                                </div>
                                @if ($days_left <= 0)
                                    <a href="javascript:void(0)" class=" custom-btn-1 btn"><img
                                            src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg') }}"
                                            alt="">
                                        {{ get_phrase('Share') }}
                                    </a>
                                @else
                                    <a href="javascript:void(0)" class=" custom-btn-2 btn"
                                        onclick="showCustomModal('{{ route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId]) }}', '{{ get_phrase('Share Campaign') }}');"><img
                                            src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg') }}"
                                            alt="">
                                        {{ get_phrase('Share') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if ($crisis->count() > 2)
                <!-- See More Button -->
                @if (Route::currentRouteName() != 'campaign.category')
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="{{ route('campaign.category', ['type' => 'crisis']) }}" id="see_more"
                            class="text_16 text_purple">
                            See all
                        </a>
                    </div>
                @endif
            @endif
        @endif

        {{-- Education tab --}}
        @if ($education->count() > 0)
            <div class="col-lg-12 d-flex justify-content-between blog-type">
                <h3 class="text_22">Education</h3>
            </div>
            <!-- Single Blog Card -->
            @foreach ($education as $row)
                @php
                    $days = round((strtotime($row->timestamp_end) - strtotime($row->created_at)) / (3600 * 24));
                    $days_left = (int) $days;
                    $raised_amount = $row->raised_amount;
                    $goal_amount = $row->goal_amount;
                    $value = ($raised_amount * 100) / $goal_amount;
                    $id = $row->id;
                    
                    $postOfThisEvent = \App\Models\Posts::where('publisher', 'fundraiser')
                        ->where('publisher_id', $id)
                        ->first();
                    if (!empty($postOfThisEvent->post_id)) {
                        $postId = $postOfThisEvent->post_id;
                    } else {
                        $postId = 0;
                    }
                    
                @endphp
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="blog-card">
                        <div class="card custom_card">
                            <div class="card-img">
                                @if ($row->cover_photo != '')
                                    <img src="{{ asset('assets/frontend/images/campaign/' . $row->cover_photo) }}"
                                        class="card-img-top" alt="blog">
                                @else
                                    <img src="{{ asset('storage/blog/coverphoto/default/default.jpg') }}"
                                        class="card-img-top" alt="blog">
                                @endif
                                <div class="card-donate">
                                    <img src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/donate.svg') }}"
                                        alt="donate">
                                    <p class="donate-count">520</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('fundraiser.profile', $id) }}">
                                    <h5 class="card-title text_16 campaign-title">{{ $row->title }}</h5>
                                </a>
                                <p class="card-text pera_text card_preview_text">{{ $row->description }}</p>

                                @if ($raised_amount == $goal_amount)
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="{{ $value }}"
                                            max="100"></progress>
                                        <p class="card-progress-value">{{ number_format($value, 2) }}%</p>
                                    </div>
                                @else
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="{{ $value }}"
                                            max="100"></progress>
                                        <p class="card-progress-value">{{ number_format($value, 2) }}%</p>
                                    </div>
                                @endif


                                <div class="card-raised-area d-flex justify-content-between">
                                    <p class="pera_text">Raised : <span
                                            class="@if ($raised_amount == $goal_amount) text_green @else text_purple @endif ">${{ $raised_amount }}</span>
                                    </p>
                                    <p class="pera_text">Goal : <span class="text_green">${{ $goal_amount }}</span>
                                    </p>
                                </div>
                                @if ($days_left <= 0)
                                    <a href="javascript:void(0)" class=" custom-btn-1 btn"><img
                                            src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg') }}"
                                            alt="">
                                        {{ get_phrase('Share') }}
                                    </a>
                                @else
                                    <a href="javascript:void(0)" class=" custom-btn-2 btn"
                                        onclick="showCustomModal('{{ route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId]) }}', '{{ get_phrase('Share Campaign') }}');"><img
                                            src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg') }}"
                                            alt="">
                                        {{ get_phrase('Share') }}

                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if ($education->count() > 2)
                <!-- See More Button -->
                @if (Route::currentRouteName() != 'campaign.category')
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="{{ route('campaign.category', ['type' => 'education']) }}" id="see_more"
                            class="text_16 text_purple">
                            See all
                        </a>
                    </div>
                @endif
            @endif
        @endif
    </div>
</div>
