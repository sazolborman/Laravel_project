<?php
    $selected_package = DB::table('paid_content_packages')
        ->where('id', $id)
        ->first();
    
    $page = DB::table('paid_content_creators')
        ->where('user_id', $selected_package->user_id)
        ->first();
    
?>



<form method="POST" action="<?php echo e(route('subscription.payment_configuration', $id)); ?>">
    <?php echo csrf_field(); ?>

    <input type="hidden" name="subscriber_id" value="<?php echo e(auth()->user()->id); ?>">
    <input type="hidden" name="package_id" value="<?php echo e($id); ?>">
    <input type="hidden" name="creator_id" value="<?php echo e($page->user_id); ?>">
    <input type="hidden" name="price" value="<?php echo e($selected_package->price); ?>">
    <input type="hidden" name="issue_date" value="<?php echo e(time()); ?>">
    <input type="hidden" name="expire_date" value="<?php echo e(strtotime('+1 next month')); ?>">


    <div class="row">
        <div class="col-md-12 d-flex flex-column align-items-center">
            <div class="mb-3">
                <span>
                    <h2 class="ad-total-charged-amount fw-bold d-inline-block p-0 m-0">
                        $<?php echo e($selected_package->price); ?>

                    </h2>

                </span>
            </div>

            <div class="subscription-details">

                <div class="d-flex align-items-center gap-3 subscriber">
                    <span class="package-info">Subscriber Name</span>
                    <span>: &nbsp <?php echo e(auth()->user()->name); ?></span>
                </div>

                <div class="d-flex align-items-center gap-3 page">
                    <span class="package-info">Subscribe Page</span>
                    <span>: &nbsp <?php echo e($page->title); ?></span>
                </div>

                <div class="d-flex align-items-center gap-3 package">
                    <span class="package-info">Selected Package</span>
                    <span>: &nbsp <?php echo e($selected_package->title); ?></span>
                </div>


                <div class="d-flex align-items-center gap-3 start-date">
                    <span class="package-info">Issue Date</span>
                    <span>: &nbsp <?php echo e(date('d-M-Y', time())); ?></span>
                </div>

                <div class="d-flex align-items-center gap-3 expire-date">
                    <span class="package-info">Expire Date</span>
                    <span>: &nbsp <?php echo e(date('d-M-Y', strtotime('next month'))); ?></span>
                </div>

            </div>

            
            <div class="mb-3 mt-4 flex-grow-1">
                <button type="submit" class="btn btn-primary text-white w-100 btn-payment-redirect"><i
                        class="bi bi-credit-card"></i> <?php echo e(get_phrase('Purchase package')); ?></button>
            </div>
        </div>
    </div>
</form>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\resources\views/frontend/paid_content/subscription_payment.blade.php ENDPATH**/ ?>