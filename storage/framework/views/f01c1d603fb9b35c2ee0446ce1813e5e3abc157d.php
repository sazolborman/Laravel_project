<?php
    if (auth()->user()->user_role == 'admin') {
        $payment_configured = 1;
    } else {
        $check_payment_settings = App\Models\Users::where('id', auth()->user()->id)->value('payment_settings');
        if ($check_payment_settings != '') {
            $settings = json_decode($check_payment_settings);
            foreach ($settings as $item) {
                if ($item == 'stripe_live' || $item == 'paypal_live' || $item == 'flutterwave_live') {
                    continue;
                } elseif ($item != '') {
                    $payment_configured = 1;
                    break;
                }
            }
        }
    }
    
?>


<!-- Button trigger modal -->
<div class="d-flex justify-content-end mt-3">
    <button type="button" class="btn btn-primary py-2 px-4" data-bs-toggle="modal" data-bs-target="#payoutRequest">
        <a href="#" class="text-white">Request withdrawal</a>
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="payoutRequest" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-3">
            <div class="modal-header">
                <h5 class="modal-title text-center request-title" id="requestModalLabel">
                    Request withdrawal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <div class="modal-body">

                <?php if(isset($payment_configured)): ?>
                    <form action="<?php echo e(route('fundraiser.payout')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="input-wrap">
                            <label class="form-label">Withdrawal amount</label>
                            <input type="number" class="form-control eForm-control" placeholder="Enter amount"
                                aria-label="enter amount" name="requested_amount" required min="1"
                                max="<?php echo e(number_format($main_balance, 2)); ?>" />
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-3">
                            <span class="text-danger" style="font-size: 14px;">
                                <?php if($main_balance >= 1): ?>
                                    *Note: You can't request more than $<?php echo e(number_format($main_balance, 2)); ?>

                                <?php else: ?>
                                    *You don't have enougn balance.
                                <?php endif; ?>
                            </span>

                            <div class="d-flex align-items-center gap-2">
                                <button type="submit" class="btn px-3 btn-success" id="withdraw_btn"
                                    <?php if($main_balance < 1): ?> disabled <?php endif; ?>>Request</button>
                                <button type="button" class="btn border-0 bg-danger text-white"
                                    data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="alert alert-danger opacity-75" role="alert">
                        <h4 class="alert-heading">Opps!</h4>
                        <p>You didn't configured payment settings yet.</p>
                        <hr>
                        <p class="mb-0">
                            For a payout, first you need to configure "Payment Settings".<br>Then you can
                            request
                            for a payout.<br>
                            <span class="mt-3 d-block">Thank you.</span>
                        </p>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn border-0 bg-danger text-white"
                            data-bs-dismiss="modal">Cancel</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

    });
</script>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\1.6\resources\views/frontend/fundraiser/payout_request.blade.php ENDPATH**/ ?>