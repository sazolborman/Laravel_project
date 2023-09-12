    <div class="bg-white box-shadow-5 bd-1 bd-r-5 py-40 px-20">
        <!-- Search -->

        <div class="d-flex flex-wrap g-15 mb-20">
            @include('frontend.paid_content.search', ['type' => 'subscribers'])
        </div>

        {{-- subscribers list --}}
        @if ($subscribers->count() > 0)
            <div class="creator-items-wrap">

                @foreach ($subscribers as $subscriber)
                    <div class="subscriber-item">
                        <a href="{{ route('user.profile.view', ['id' => $subscriber->subscriber_id]) }}"
                            class="c-search-item align-items-center" target="_blank">
                            <div class="logo position-relative me-2 load-item">
                                <img src="{{ get_user_image($subscriber->subscriber_id, 'optimized') }}" height="100%" />
                            </div>
                            <div class="info">
                                <h4>{{ $subscriber->name }}</h4>
                                <p>{{ $subscriber->email }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-package d-flex justify-content-center align-items-center py-4 mt-3">
                <p class="text-16px fw-bolder">No subscribers yet.</p>
            </div>
        @endif
    </div>
