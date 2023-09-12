<!-- In Progress Area  -->
@if ($fundraiser_explore->count() > 0)
    <div class="blog-area">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between blog-type">
                <h3 class="text_22">In Progress</h3>
                <a href="{{ route('fundraiser.create') }}" class="btn_1">Create Fundraise</a>
            </div>
            <!-- Single Blog Card -->
            @foreach ($fundraiser_explore as $row)
                @php
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
                <div class="col-xl-4 col-lg-6 col-md-6 card_design">
                    <ul>
                        <li>
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
                                        <div class="donate_card_1">
                                            <a href="javascript:void(0)" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"
                                                    style="color: #ffffff;"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                                <li>
                                                    <a href="{{ route('fundraiser.edit', ['id' => $id]) }}"
                                                        class="dropdown-item btn btn-primary btn-sm"><i
                                                            class="fa fa-edit me-1"></i>
                                                        {{ get_phrase('Edit') }}</a>
                                                </li>
                                                <li>


                                                    <a href="javascript:void(0)"
                                                        class="dropdown-item btn btn-primary btn-sm"
                                                        onclick="confirmAction('<?php echo route('explore.delete', ['id' => $row->id]); ?>')">
                                                        <i class="fa fa-trash me-1"></i>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('fundraiser.profile', $id) }}">
                                            <h5 class="card-title text_16 campaign-title">{{ $row->title }}
                                            </h5>
                                        </a>
                                        <p class="card-text pera_text card_preview_text">
                                            {{ $row->description }}</p>
                                        <div class="card-progress d-flex justify-content-between align-items-center">
                                            <progress id="progress_1" value="{{ $value }}"
                                                max="100"></progress>
                                            <p class="card-progress-value">{{ number_format($value, 2) }}%</p>
                                        </div>
                                        <div class="card-raised-area d-flex justify-content-between">
                                            <p class="pera_text">Raised : <span
                                                    class="text_purple">${{ $raised_amount }}</span>
                                            </p>
                                            <p class="pera_text">Goal : <span
                                                    class="text_green">${{ $goal_amount }}</span>
                                            </p>
                                        </div>
                                        <div class="in-process-btn d-flex justify-content-between">
                                            <a href="javascript:void(0)" class="custom-btn-2 btn"
                                                onclick="showCustomModal('{{ route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId]) }}', '{{ get_phrase('Share Canpaign') }}');"><img
                                                    src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg') }}"
                                                    alt="">
                                                {{ get_phrase('Share') }}
                                            </a>


                                            @if ($row->status == 0)
                                                <a href="{{ route('fundraiser.status', ['id' => $id]) }}"
                                                    class="btn  custom-btn-3">Active</a>
                                            @else
                                                <a href="{{ route('fundraiser.status', ['id' => $id]) }}"
                                                    class="btn btn_1 disable_btn">Disable</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            @endforeach

            @if ($fundraiser_explore->count() > 2)
                <!-- See More Button -->
                @if (Route::currentRouteName() != 'campaign.type')
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="{{ route('campaign.type', ['type' => 'ongoing']) }}" id="see_more"
                            class="text_16 text_purple">
                            See all
                        </a>
                    </div>
                @endif


            @endif

        </div>
    </div>


@endif
<!-- Complate Area -->

@if ($fundraiser_complete->count() > 0)
    <div class="blog-area">
        <div class="row">
            <div class="blog-type col-lg-12">
                <h3 class="text_22">Complete</h3>
            </div>
            <!-- Single Blog Card -->
            @foreach ($fundraiser_complete as $row)
                @php
                    $raised_amount = $row->raised_amount;
                    $goal_amount = $row->goal_amount;
                    $value = ($raised_amount * 100) / $goal_amount;
                    $id = $row->id;
                    
                @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 card_design">
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
                                <div class="donate_card_1">
                                    <a href="javascript:void(0)" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical" style="color: #ffffff;"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                        <li>
                                            <a href="{{ route('fundraiser.edit', ['id' => $id]) }}"
                                                class="dropdown-item btn btn-primary btn-sm"><i
                                                    class="fa fa-edit me-1"></i>
                                                {{ get_phrase('Edit') }}</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="dropdown-item btn btn-primary btn-sm"
                                                onclick="confirmAction('<?php echo route('explore.delete', ['id' => $row->id]); ?>')">
                                                <i class="fa fa-trash me-1"></i>
                                                Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('fundraiser.profile', $id) }}">
                                    <h5 class="card-title text_16 campaign-title">{{ $row->title }}
                                    </h5>
                                </a>
                                <p class="card-text pera_text card_preview_text">
                                    {{ $row->description }}</p>
                                <div class="card-progress d-flex justify-content-between align-items-center">
                                    <progress id="progress_1" value="{{ $value }}" max="100"></progress>
                                    <p class="card-progress-value">{{ number_format($value, 2) }}%</p>
                                </div>
                                <div class="card-raised-area d-flex justify-content-between">
                                    <p class="pera_text">Raised : <span
                                            class="text_purple">${{ $raised_amount }}</span>
                                    </p>
                                    <p class="pera_text">Goal : <span class="text_green">${{ $goal_amount }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @if ($fundraiser_complete->count() > 2)
                <!-- See More Button -->
                @if (Route::currentRouteName() != 'campaign.type')
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="{{ route('campaign.type', ['type' => 'complate']) }}" id="see_more"
                            class="text_16 text_purple">

                            See all
                        </a>
                    </div>
                @endif
            @endif

        </div>
    </div>
@endif

@include('frontend.common_scripts')
