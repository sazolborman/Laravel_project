<!-- Explore Tab Content -->
<!-- Popular Area -->
<div class="blog-area">
    <div class="row">
        <!-- Single Blog Card -->
        @foreach ($explore as $row)
            @php
                $days = round((strtotime($row->timestamp_end) - strtotime($row->created_at)) / (3600 * 24));
                $days_left = (int) $days;
                $raised_amount = $row->raised_amount;
                $goal_amount = $row->goal_amount;
                $value = ($raised_amount * 100) / $goal_amount;
                $id = $row->id;
            @endphp
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="blog-card">
                    <div class="card custom_card">
                        <div class="card-img">
                            <img src="{{ asset('assets/frontend/images/campaign/' . $row->cover_photo) }}"
                                class="card-img-top" alt="blog">
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
                                    <p class="card-progress-value">{{ $value }}%</p>
                                </div>
                            @else
                                <div class="card-progress d-flex justify-content-between align-items-center">
                                    <progress id="progress_1" value="{{ $value }}" max="100"></progress>
                                    <p class="card-progress-value">{{ $value }}%</p>
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
                                    onclick="showCustomModal('{{ route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $id]) }}', '{{ get_phrase('Share Campaign') }}');"><img
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

    </div>
</div>
