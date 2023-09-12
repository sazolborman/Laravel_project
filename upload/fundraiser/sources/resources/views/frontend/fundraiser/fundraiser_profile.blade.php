@php
    $raised_amount = $campaign->raised_amount;
    $goal_amount = $campaign->goal_amount;
    $value = ($raised_amount * 100) / $goal_amount;
    
    $postOfThisEvent = \App\Models\Posts::where('publisher', 'fundraiser')
        ->where('publisher_id', $campaign->id)
        ->first();
    if (!empty($postOfThisEvent->post_id)) {
        $postId = $postOfThisEvent->post_id;
    } else {
        $postId = 0;
    }
@endphp

<main class="main my-4">
    <div class="container">
        <div class="row">


            <div class="col-xl-8 col-lg-7 col-md-12 mb-4">
                <div class="fund-profile-area mb-4">
                    <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                    <!-- Profile Cover Photo -->
                    <div class="fund-profile-cover">
                        @if ($campaign->cover_photo != '')
                            <img src="{{ asset('assets/frontend/images/campaign/' . $campaign->cover_photo) }}"
                                class="card-img-top" alt="blog">
                        @else
                            <img src="{{ asset('storage/blog/coverphoto/default/default.jpg') }}" class="card-img-top"
                                alt="blog">
                        @endif
                    </div>

                    <div class="fund-profile-info">
                        <div class="fund-profile-img">
                            <a href="#"><img src="{{ get_user_image($campaign->user_id, 'optimized') }}"
                                    alt="profile"></a>
                        </div>
                        <div class="found-profile-option d-flex justify-content-end">
                            <div class="post-controls dropdown dotted">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="profile-name-title">
                            <h1 class="text_22">{{ $campaign->title }}</h1>
                            <div class="profile-title-privacy  align-items-baseline">
                                <p class="text_16"><span>Fundraiser for</span> RSPCA Million Paws Walk <span>by</span>
                                    {{ $campaign->name }} <a href="#"><img
                                            src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/privacy.svg') }}"
                                            alt="privacy"></a></p>

                            </div>
                        </div>
                        <div class="donate-share d-flex">
                            {{-- donate button --}}
                            @if ($days_left > 0 && $campaign->user_id != auth()->user()->id)
                                <a href="javascript: void(0);" class="btn_2"
                                    onclick="ajaxModal('{{ route('fundraiser.model', [$modal, 'id' => $campaign->id]) }}','{{ get_phrase('Donate') }}')"><img
                                        src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/donate2.svg') }}"
                                        alt="">
                                    Donate</a>
                            @elseif($days_left > 0 && $campaign->user_id == auth()->user()->id)
                            @else
                            @endif


                            {{-- share button --}}
                            @if ($days_left > 0)
                                <span data-bs-toggle="modal" data-bs-target="">
                                    <a href="javascript:void(0)" class="btn_2 end_btn"
                                        onclick="showCustomModal('{{ route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId]) }}', '{{ get_phrase('Share Canpaign') }}');"><img
                                            src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg') }}"
                                            alt="">
                                        {{ get_phrase('Share') }}
                                    </a>
                                </span>
                            @elseif($days_left <= 0)
                                <br>
                            @else
                                <br>
                            @endif

                        </div>
                    </div>

                </div>


                <div class="fund-profile-goal-area m-0 mb-4">
                    <h3 class="text_22">Goal</h3>
                    <div class="goal-date">
                        @if ($days_left > 0)
                            <p class="text_16">{{ $days_left }} <span>days left</span></p>
                        @else
                            <p class="text_16"> Campaign expired</p>
                        @endif
                    </div>
                    <div class="card-progress goal-progress d-flex justify-content-between align-items-center">
                        <progress id="progress_1" value="{{ $value }}" max="100"></progress>
                        <p class="card-progress-value">{{ number_format($value, 2) }}%</p>
                    </div>
                    <div class="goal-raised">
                        <p class="pera_text">Raised : <span
                                class="@if ($raised_amount == $goal_amount) text_green @else text_purple @endif">${{ $raised_amount }}</span>
                            . Goal :
                            <span class="text_green">${{ $goal_amount }}
                        </p>
                    </div>
                    @if ($days_left > 0)
                        <div class="goal-share-btn">
                            <a href="javascript:void(0)"
                                onclick="showCustomModal('{{ route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId]) }}', '{{ get_phrase('Share Campaign') }}');"><img
                                    src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg') }}"
                                    alt="">
                                {{ get_phrase('Share') }}
                            </a>
                        </div>
                    @endif

                </div>


                <div class="fund-profile-about-area">
                    <h3 class="text_22">About</h3>
                    <div class="calender-date d-flex align-items-center" id="see-more-lines">
                        <img src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/calender.svg') }}"
                            alt="calender">
                        <p class="pera_text">{{ date('d-F-Y', strtotime($campaign->created_at)) }}</p>
                    </div>
                    <p class="pera_text pb-3 preview_tex">{{ $campaign->description }}</p>
                    <div class="about-see-more-btn">
                        <a href="#" class="text_16 text_purple" id="see-btn">See More</a>
                    </div>
                </div>
            </div>


            <div class="col-xl-4 col-lg-5 col-md-12">
                <div class="fundraiser-progress-area mb-4">
                    <div class="fund-progress-title">
                        <h3 class="text_22">Fundraiser Progress</h3>
                    </div>
                    <div class="fund-progress-wrap d-flex flex-wrap align-items-center">
                        <div class="fund-single-progress">
                            <h3 class="text_22">{{ $donate }}</h3>
                            <p class="pera_text">Donated</p>
                        </div>
                        <div class="fund-single-progress">
                            @php
                                $invite = json_decode($fundraiser->invited);
                            @endphp
                            @if ($invite != '')
                                <h3 class="text_22">{{ count($invite) }}</h3>
                            @else
                                <h3 class="text_22">0</h3>
                            @endif

                            <p class="pera_text">Invited</p>
                        </div>
                        <div class="fund-single-progress">
                            <h3 class="text_22">{{ $sharecount }}</h3>
                            <p class="pera_text">Shared</p>
                        </div>
                    </div>
                </div>

                <!-- Invite Friend -->
                @if ($friendships->count() > 0)
                    <div class="friend-invite-area mb-4">
                        <ul class="friend-invite-wrap custom_invited_card">

                            {{-- ..........start......................................................................... --}}

                            @foreach ($friendships as $friendship)
                                @if ($friendship->requester == $user_info->id)
                                    @php
                                        $friends_user_data = DB::table('users')
                                            ->where('id', $friendship->accepter)
                                            ->first();
                                    @endphp
                                @else
                                    @php
                                        $friends_user_data = DB::table('users')
                                            ->where('id', $friendship->requester)
                                            ->first();
                                    @endphp
                                @endif



                                {{--  chekcing invite is already done or not   --}}
                                @php
                                    $invite_details = DB::table('invites')
                                        ->where('invite_reciver_id', $friends_user_data->id)
                                        ->where('fundraiser_id', $fundraiser->id)
                                        ->first();
                                @endphp

                                @php
                                    $number_of_friend_friends = json_decode($friends_user_data->friends);
                                    $number_of_my_friends = json_decode($user_info->friends);
                                    
                                    if (!is_array($number_of_friend_friends)) {
                                        $number_of_friend_friends = [];
                                    }
                                    if (!is_array($number_of_my_friends)) {
                                        $number_of_my_friends = [];
                                    }
                                    
                                    if ($friends_user_data->id == auth()->user()->id) {
                                        continue;
                                    }
                                    
                                $number_of_mutual_friends = count(array_intersect($number_of_friend_friends, $number_of_my_friends)); @endphp
                                <div
                                    class="single-item-countable d-flex friend-item align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center w-100">
                                        <!-- Avatar -->
                                        <div class="avatar">
                                            <a href="{{ route('user.profile.view', $friends_user_data->id) }}"><img
                                                    class="avatar-img rounded-circle user_image_show_on_modal"
                                                    src="{{ get_user_image($friends_user_data->photo, 'optimized') }}"
                                                    alt="" height="40" width="40"></a>
                                        </div>
                                        <div class="avatar-info ms-2">
                                            <h6 class="mb-1"><a
                                                    href="{{ route('user.profile.view', $friends_user_data->id) }}">{{ $friends_user_data->name }}</a>
                                            </h6>
                                            <div class="activity-time small-text text-muted">
                                                {{ $number_of_mutual_friends }}
                                                {{ get_phrase('Mutual Friends') }}</div>
                                        </div>
                                    </div>
                                    <div class="invite_button_css">
                                        @if (
                                            !empty($invite_details) &&
                                                $invite_details->invite_reciver_id == $friends_user_data->id &&
                                                $invite_details->is_accepted != '1')
                                            <button class=" btn_invited">Invited</button>
                                        @elseif (
                                            !empty($invite_details) &&
                                                $invite_details->invite_reciver_id == $friends_user_data->id &&
                                                $invite_details->is_accepted == '1')
                                            <button class=" btn_invited">Invited </button>
                                        @else
                                            <a class="btn_2"
                                                href="{{ route('fundraiser.invited', ['invited_friend_id' => $friends_user_data->id, 'requester_id' => auth()->user()->id, 'fundraiser_id' => $fundraiser->id]) }}">Invite</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                            {{-- ------------------END--------------------------------------------------------------------- --}}

                        </ul>
                        <div class="see-all-btn">
                            @if ($friendships->count() > 2)
                                @if (Route::currentRouteName() != 'fundraiser.friend')
                                    <a
                                        href="{{ route('fundraiser.friend', ['type' => 'seeAll', 'id' => $campaign->id]) }}">
                                        See all friends</a>
                                @endif
                            @else
                                <a href="javascript: void(0);" class="visibility-hidden">See all</a>
                            @endif
                        </div>
                    </div>
                @endif

                <div class="created-owner-area">
                    <h3 class="text_22">Created by</h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="friend-name-img d-flex align-items-center">
                            <div class="friend-img">
                                <a href="#"><img src="{{ get_user_image($campaign->user_id, 'optimized') }}"
                                        alt="friend-img"></a>
                            </div>
                            <div class="friend-name">
                                <a href="#" class="text_15">{{ $campaign->name }}</a>
                            </div>
                        </div>
                        @if ($user_data->id != auth()->user()->id)
                            <a href="{{ route('chat', $user_data->id) }}" class="btn_2">Contact</a>
                        @else
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- container end -->
    @include('frontend.common_scripts')
    @include('backend.modal')
    @include('frontend.initialize')
</main>

<script>
    $(document).ready(function() {
        var content = $('.preview_tex').height();
        $('.preview_tex').css('height', '130px');
        if (content > 110) {
            $('#see-btn').click(function(e) {
                e.preventDefault();
                $('.pera_text').removeClass('preview_tex');
                $('.pera_text').css('height', 'auto');
                $(this).remove();
            });
        } else {
            $('#see-btn').remove();
        }
    });
</script>
