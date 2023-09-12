<form action="{{ route('razorpay.order', $payment_gateway->identifier) }}" method="post">
    @csrf

    <input type="hidden" name="price" value="{{ $payment_details['items'][0]['price'] }}">
    <button type="submit" class="btn btn-primary">Pay by Razorpay</button>
</form>
