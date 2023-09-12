<div class="tab-pane fade show active" id="payment_settings" role="tabpanel" aria-labelledby="payment_settings-tab">


    <div class="payment-settings">
        <div class="container p-0">
            <div class="row">
                <div class="col-xl-9 order-xl-1 order-2">
                    <form action="{{ route('save.payment.settings') }}" method="post" class="mt-3">
                        @csrf

                        <div class="payment-type bg-white rounded-3 p-3">

                            <div
                                class="border-bottom border-dark pb-3 text-dark opacity-75 d-flex justify-content-between">
                                <h5 class="m-0">Razorpay</h5>
                            </div>

                            <div class="input-wrap pb-4 pb-sm-3 mt-sm-3">
                                <div class="row">
                                    <div class="col-12 col-md-3 mb-2 mb-md-0 d-flex align-items-center">
                                        <label class="form-label d-block m-0">Key
                                            id</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control eForm-control"
                                            aria-label="razorpay key id" name="raz_key_id"
                                            value="{{ $payment_settings->raz_key_id }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="input-wrap pb-4 pb-sm-3">
                                <div class="row">
                                    <div class="col-12 col-md-3 mb-2 mb-md-0 d-flex align-items-center">
                                        <label class="form-label d-block m-0">Secret
                                            key</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control eForm-control"
                                            aria-label="razorpay secret key" name="raz_secret_key"
                                            value="{{ $payment_settings->raz_secret_key }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="input-wrap">
                                <div class="row">
                                    <div class="col-12 col-md-3 mb-2 mb-md-0 d-flex align-items-center">
                                        <label class="form-label d-block m-0">Theme
                                            color</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control eForm-control"
                                            aria-label="theme color" name="theme_color"
                                            value="{{ $payment_settings->theme_color }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-3 d-flex align-items-center">
                                </div>
                                <div class="col-12 col-md-9">
                                    <span class="text-danger color-note">*Please enter HEX color
                                        code.</span>
                                </div>
                            </div>
                        </div>



                        <div class="payment-type bg-white rounded-3 p-3 mt-5">

                            <div
                                class="border-bottom border-dark pb-3 text-dark opacity-75 d-flex justify-content-between">
                                <h5 class="m-0">Stripe</h5>
                                <div
                                    class="form-check form-switch d-flex align-items-center align-items-center gap-3 p-0 m-0">
                                    <p class="m-0">Live mode</p>
                                    <input class="form-check-input d-block p-0 m-0 live" type="checkbox"
                                        name="stripe_live" @if ($payment_settings->stripe_live) checked @endif>
                                </div>
                            </div>

                            <div class="input-wrap pb-4 pb-sm-3 mt-sm-3">
                                <div class="row">
                                    <div class="col-12 col-md-3 mb-2 mb-md-0 d-flex align-items-center">
                                        <label class="form-label d-block m-0">Public
                                            key</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control eForm-control"
                                            aria-label="stripe public key" name="stripe_public_key"
                                            value="{{ $payment_settings->stripe_public_key }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="input-wrap pb-4 pb-sm-3">
                                <div class="row">
                                    <div class="col-12 col-md-3 mb-2 mb-md-0 d-flex align-items-center">
                                        <label class="form-label d-block m-0">Secret
                                            key</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control eForm-control"
                                            aria-label="stripe secret key" name="stripe_secret_key"
                                            value="{{ $payment_settings->stripe_secret_key }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="input-wrap pb-4 pb-sm-3">
                                <div class="row">
                                    <div class="col-12 col-md-3 mb-2 mb-md-0 d-flex align-items-center">
                                        <label class="form-label d-block m-0">Public
                                            live
                                            key</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control eForm-control"
                                            aria-label="stripe public live key" name="stripe_public_live_key"
                                            value="{{ $payment_settings->stripe_public_live_key }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="input-wrap">
                                <div class="row">
                                    <div class="col-12 col-md-3 mb-2 mb-md-0 d-flex align-items-center">
                                        <label class="form-label d-block m-0">Secret
                                            live
                                            key</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control eForm-control"
                                            aria-label="stripe secret live key" name="stripe_secret_live_key"
                                            value="{{ $payment_settings->stripe_secret_live_key }}" />
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="payment-type bg-white rounded-3 p-3 mt-5">

                            <div
                                class="border-bottom border-dark pb-3 text-dark opacity-75 d-flex justify-content-between">
                                <h5 class="m-0">Paypal</h5>

                                <div
                                    class="form-check form-switch d-flex align-items-center align-items-center gap-3 p-0 m-0">
                                    <p class="m-0">Live mode</p>
                                    <input class="form-check-input d-block p-0 m-0 live" type="checkbox"
                                        id="paypal_live" name="paypal_live"
                                        @if ($payment_settings->paypal_live) checked @endif>
                                </div>
                            </div>

                            <div class="input-wrap pb-4 pb-sm-3 mt-sm-3">
                                <div class="row">
                                    <div class="col-12 col-md-3 mb-2 mb-md-0 d-flex align-items-center">
                                        <label class="form-label d-block m-0">Sandbox
                                            client id</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control eForm-control"
                                            aria-label="paypal client id" name="paypal_client_id"
                                            value="{{ $payment_settings->paypal_client_id }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="input-wrap pb-4 pb-sm-3">
                                <div class="row">
                                    <div class="col-12 col-md-3 mb-2 mb-md-0 d-flex align-items-center">
                                        <label class="form-label d-block m-0">Sandbox secret key</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control eForm-control"
                                            aria-label="paypal sandbox secret key" name="paypal_secret_key"
                                            value="{{ $payment_settings->paypal_secret_key }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="input-wrap pb-4 pb-sm-3">
                                <div class="row">
                                    <div class="col-12 col-md-3 mb-2 mb-md-0 d-flex align-items-center">
                                        <label class="form-label d-block m-0">Production client id</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control eForm-control"
                                            aria-label="production client id" name="paypal_production_client_id"
                                            value="{{ $payment_settings->paypal_production_client_id }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="input-wrap">
                                <div class="row">
                                    <div class="col-12 col-md-3 mb-2 mb-md-0 d-flex align-items-center">
                                        <label class="form-label d-block m-0">Production secret key</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control eForm-control"
                                            aria-label="production secret key" name="paypal_production_secret_key"
                                            value="{{ $payment_settings->paypal_production_secret_key }}" />
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="payment-type bg-white rounded-3 p-3 mt-5">

                            <div
                                class="border-bottom border-dark pb-3 text-dark opacity-75 d-flex justify-content-between">
                                <h5 class="m-0">Flutterwave</h5>

                                <div
                                    class="form-check form-switch d-flex align-items-center align-items-center gap-3 p-0 m-0">
                                    <p class="m-0">Live mode</p>
                                    <input class="form-check-input d-block p-0 m-0 live" type="checkbox"
                                        id="flutterwave_live" name="flutterwave_live"
                                        @if ($payment_settings->flutterwave_live) checked @endif>
                                </div>
                            </div>

                            <div class="input-wrap pb-4 pb-sm-3 mt-sm-3">
                                <div class="row">
                                    <div class="col-12 col-md-3 mb-2 mb-md-0 d-flex align-items-center">
                                        <label class="form-label d-block m-0">Public key</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control eForm-control"
                                            aria-label="flutterwave public key" name="flutterwave_public_key"
                                            value="{{ $payment_settings->flutterwave_public_key }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="input-wrap pb-4 pb-sm-3">
                                <div class="row">
                                    <div class="col-12 col-md-3 mb-2 mb-md-0 d-flex align-items-center">
                                        <label class="form-label d-block m-0">Secret key</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control eForm-control"
                                            aria-label="flutterwave  secret key" name="flutterwave_secret_key"
                                            value="{{ $payment_settings->flutterwave_secret_key }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="input-wrap">
                                <div class="row">
                                    <div class="col-12 col-md-3 mb-2 mb-md-0 d-flex align-items-center">
                                        <label class="form-label d-block m-0">Encryption key</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control eForm-control"
                                            aria-label="flutterwave encryption key" name="flutterwave_encryption_key"
                                            value="{{ $payment_settings->flutterwave_encryption_key }}" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary py-2 mt-3 px-3">Save settings</button>
                        </div>
                    </form>
                </div>


                <div class="col-xl-3 order-xl-2 order-1 mt-3">
                    <div class="alert alert-warning rounded-3" role="alert">
                        <h5 class="alert-heading">Be careful!</h5>
                        <p>Just configure the payment gateway you want to use,
                            leave
                            the rest
                            blank.</p>
                        <hr>
                        <p>Also, make sure that you have configured your payment
                            settings
                            correctly</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
