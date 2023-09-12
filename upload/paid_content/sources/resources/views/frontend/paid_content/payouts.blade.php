@php
    $query = App\Models\PaidContentPayout::where('user_id', auth()->user()->id)
        ->where('status', 0)
        ->latest('id');
    
    $balance = $query->first();
    $requested_amount = 0;
    if (isset($balance->requested_amount)) {
        $requested_amount = $balance->requested_amount;
    }
    
    $old_request = $query;
    $request = $request_id = 0;
    if ($old_request->exists()) {
        $old_request = $old_request->first();
        $request_id = $old_request->id;
        $request = 1;
    }
@endphp

<div class="payout-report settings-wraper">
    <!-- Withdrawal Options -->
    <div class="withdrawalOptions pb-20">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4 col-sm-12">
                <div class="withdrawal-items">
                    <h4 class="title">Available Balance</h4>
                    <p class="withdrawal-amount">${{ number_format($main_balance, 2) }}</p>
                    <p class="info">
                        Minimum withdrawal amount <span>$50</span>
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="withdrawal-items">
                    <h4 class="title">Total Payouts</h4>
                    <p class="withdrawal-amount">${{ number_format($total_payout, 2) }}</p>
                    <p class="info">
                        It takes max <span>2 days</span> for verification
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">

                <div class="withdrawal-items">
                    <h4 class="title d-flex justify-content-between"><span>Requested withdrawal</span>
                        @if ($request == 1)
                            <span class="badge bg-warning">Pending</span>
                        @endif
                    </h4>
                    <p class="withdrawal-amount">{{ number_format($requested_amount, 2) }}</p>
                    <p class="info">
                        Minimum withdrawal amount <span>$50</span>
                    </p>
                </div>
            </div>
        </div>

        @if ($request == 1)
            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('creator.payout.cancel', ['id' => $request_id]) }}"
                    class="btn text-white py-2 cancel-btn">Cancel Request</a>
            </div>
        @else
            @include('frontend.paid_content.payout_request')
        @endif
    </div>
    <!-- Payment History -->
    <div class="payment-history">
        <div class="content-panel">
            <div class="pb-20">
                <h4 class="fz-20-b-22-black">Payouts History</h4>
            </div>

            @include('frontend.paid_content.payout_reports')
        </div>
    </div>
</div>
