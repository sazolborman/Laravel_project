    <div class="bg-white box-shadow-5 bd-1 bd-r-5 py-40 px-20">
        <!-- Search -->

        <div class="d-flex flex-wrap g-15 mb-20">
            <?php echo $__env->make('frontend.paid_content.search', ['type' => 'subscribers'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        
        <?php if($subscribers->count() > 0): ?>
            <div class="creator-items-wrap">

                <?php $__currentLoopData = $subscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscriber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="subscriber-item">
                        <a href="<?php echo e(route('user.profile.view', ['id' => $subscriber->subscriber_id])); ?>"
                            class="c-search-item align-items-center" target="_blank">
                            <div class="logo position-relative me-2 load-item">
                                <img src="<?php echo e(get_user_image($subscriber->subscriber_id, 'optimized')); ?>" height="100%" />
                            </div>
                            <div class="info">
                                <h4><?php echo e($subscriber->name); ?></h4>
                                <p><?php echo e($subscriber->email); ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="no-package d-flex justify-content-center align-items-center py-4 mt-3">
                <p class="text-16px fw-bolder">No subscribers yet.</p>
            </div>
        <?php endif; ?>
    </div>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\resources\views/frontend/paid_content/subscribers.blade.php ENDPATH**/ ?>