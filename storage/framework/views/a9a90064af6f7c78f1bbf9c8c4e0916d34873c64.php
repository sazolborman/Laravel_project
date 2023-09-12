<form method="POST" action="<?php echo e(route('fundraiser.model_store')); ?>">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="fundraiser_id" value="<?php echo e($fundraiser->id); ?>">

    <div class="row">
        <div class="col-md-12 d-flex flex-column align-items-center">
            <div class="mb-3">
                <span>
                    <h2 class="ad-total-charged-amount fw-bold d-inline-block p-0 m-0">
                        <div>
                            <label for="validationServer01">Donate Amount</label>
                            <input type="text" class="form-control" id="validationServer01" name="donate"
                                placeholder="$5000" required>
                        </div>
                    </h2>

                </span>
            </div>

            <div class="subscription-details">

                <div class="d-flex align-items-center gap-3 subscriber">
                    <span class="package-info">Campaign Title</span>
                    <span>: &nbsp <?php echo e($fundraiser->title); ?></span>
                </div>

                <div class="d-flex align-items-center gap-3 page">
                    <span class="package-info">Created By</span>
                    <span>: &nbsp <?php echo e($fundraiser->name); ?></span>
                </div>

                <div class="d-flex align-items-center gap-3 package">
                    <span class="package-info">Goald Amount</span>
                    <span>: &nbsp $<?php echo e($fundraiser->goal_amount); ?></span>
                </div>

                <div class="d-flex align-items-center gap-3 start-date">
                    <span class="package-info">Raised Amount</span>
                    <span>: &nbsp $<?php echo e($fundraiser->raised_amount); ?></span>
                </div>

                <div class="d-flex align-items-center gap-3 start-date">
                    <span class="package-info">Created Date</span>
                    <span>: &nbsp <?php echo e(date('d-F-Y', strtotime($fundraiser->created_at))); ?></span>
                </div>

                <div class="d-flex align-items-center gap-3 expire-date">
                    <span class="package-info">Expire Date</span>
                    <span>: &nbsp <?php echo e(date('d-F-Y', strtotime($fundraiser->timestamp_end))); ?> </span>
                </div>

            </div>

            
            <div class="mb-3 mt-4 flex-grow-1">
                <button type="submit" class="btn btn-primary text-white w-100 btn-payment-redirect"><i
                        class="bi bi-credit-card"></i> <?php echo e(get_phrase('Donate')); ?></button>
            </div>
        </div>
    </div>
</form>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\demo_sociopro1.6\resources\views/frontend/fundraiser/donate_modal.blade.php ENDPATH**/ ?>