@php
    $payment_keys = json_decode($payment_gateway->keys, true);
    
    $key = $payment_keys['secret_key'];
    if ($payment_gateway->test_mode == 1) {
        $key = $payment_keys['public_key'];
    }
    
    // user information
    $user = DB::table('users')
        ->where('id', auth()->user()->id)
        ->first();
@endphp

<form id="makePaymentForm">
    <input type="hidden" id="user_name" name="user_name" value="{{ $user->name }}">
    <input type="hidden" id="email" name="email" value="{{ $user->email }}">
    <input type="hidden" id="phone" name="phone" value="{{ $user->phone }}">
    <input type="hidden" id="amount" name="amount" value="{{ $payment_details['items'][0]['price'] }}">
    <input type="hidden" id="key" name="key" value="{{ $key }}">
    <input type="submit" class="btn btn-primary py-2" value="Pay by Flutterwave">
</form>

<script>
    $(function() {
        $('#makePaymentForm').submit(function(e) {
            e.preventDefault();
            var name = $('#user_name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var amount = $('#amount').val();
            var key = $('#key').val();

            makePayment(name, email, phone, amount, key);
        });
    });

    function makePayment(name, email, phone, amount, key) {
        FlutterwaveCheckout({
            public_key: key,
            tx_ref: "RX1_{{ substr(rand(0, time()), 0, 7) }}",
            amount: amount,
            currency: "USD",

            redirect_url: "{{ route('payment.success', ['identifier' => 'flutterwave']) }}",

            customer: {
                email: email,
                phone_number: phone,
                name: name,
            },
            customizations: {
                title: "Ads Payment",
                description: "Payment for ads preview",
            },
        });
    }
</script>
