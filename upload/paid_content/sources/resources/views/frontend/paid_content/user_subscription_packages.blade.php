@if ($packages->count() > 0)
    <div class="paid-membership pb-40">
        <h4 class="fz-28-sb-38-black text-center">
            Select a membership level
        </h4>

        <div class="paid-membership-items d-flex gap-3">
            @foreach ($packages as $package)
                @php
                    $page_title = DB::table('paid_content_creators')
                        ->where('user_id', $package->user_id)
                        ->first();
                @endphp
                <div class="paid-membership-item d-flex flex-column justify-content-between">
                    <h6 class="title">{{ $package->title }}</h6>

                    <div>
                        <h4 class="title">{{ $package->name }}</h4>
                        <h6 class="titleTwo">{{ $page_title->title }}</h6>
                        <p>{{ $package->description }}</p>
                    </div>

                    <div>
                        <h4 class="price"><span>${{ $package->price }}</span>
                        </h4>
                        <a href="javascript: void(0);" class="paidBtn"
                            onclick="ajaxModal('{{ route('load_modal_content', ['frontend.paid_content.subscription_payment', 'id' => $package->id]) }}','{{ get_phrase('Purchase') }}')">Get
                            Started</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
    <div class="alert alert-light" role="alert">
        <strong class="text-danger">Creator hasn't set packages for subscription.</strong>
    </div>
@endif
