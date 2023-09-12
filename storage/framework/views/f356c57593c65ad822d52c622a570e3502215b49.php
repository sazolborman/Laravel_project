    <div class="settings-wraper">
        <div class="box-shadow-5 bd-1 bd-r-5 p-30 bg-white">

            
            <?php echo $__env->make('frontend.paid_content.create_package_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            
            <?php if($packages->count() > 0): ?>
                <div class="package-list d-flex flex-column gap-3 mt-5">
                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $page_title = DB::table('paid_content_creators')
                                ->where('user_id', $package->user_id)
                                ->first();
                        ?>
                        <div class="paid-membership-item d-flex flex-column justify-content-between border border-secondary"
                            id="package<?php echo e($package->id); ?>">
                            <div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="title package-title"><?php echo e($package->title); ?></h6>
                                    <div class="actions d-flex gap-3">
                                        <a href="javascript:void(0)"
                                            onclick="showCustomModal('<?php echo route('edit.package', $package->id); ?>', '<?php echo e(get_phrase('Edit Package')); ?>', '')">
                                            <?php echo e(get_phrase('Edit')); ?></a>

                                        <a href="javascript:void(0)"
                                            onclick="confirmAction('<?php echo route('delete.package', ['id' => $package->id]); ?>')">Delete</a>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h4 class="price"><span>$<?php echo e($package->price); ?></span>
                                </h4>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="no-package d-flex justify-content-center align-items-center py-4 mt-3">
                    <p class="text-16px fw-bolder">No packages</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\resources\views/frontend/paid_content/package.blade.php ENDPATH**/ ?>