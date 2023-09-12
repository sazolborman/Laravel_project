<?php if($packages->count() > 0): ?>
    <div class="paid-membership pb-40">
        <h4 class="fz-28-sb-38-black text-center">
            Select a membership level
        </h4>

        <div class="paid-membership-items d-flex gap-3">
            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $page_title = DB::table('paid_content_creators')
                        ->where('user_id', $package->user_id)
                        ->first();
                ?>
                <div class="paid-membership-item d-flex flex-column justify-content-between">
                    <h6 class="title"><?php echo e($package->title); ?></h6>

                    <div>
                        <h4 class="title"><?php echo e($package->name); ?></h4>
                        <h6 class="titleTwo"><?php echo e($page_title->title); ?></h6>
                        <p><?php echo e($package->description); ?></p>
                    </div>

                    <div>
                        <h4 class="price"><span>$<?php echo e($package->price); ?></span>
                        </h4>
                        <a href="javascript: void(0);" class="paidBtn"
                            onclick="ajaxModal('<?php echo e(route('load_modal_content', ['frontend.paid_content.subscription_payment', 'id' => $package->id])); ?>','<?php echo e(get_phrase('Purchase')); ?>')">Get
                            Started</a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-light" role="alert">
        <strong class="text-danger">Creator hasn't set packages for subscription.</strong>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\resources\views/frontend/paid_content/user_subscription_packages.blade.php ENDPATH**/ ?>