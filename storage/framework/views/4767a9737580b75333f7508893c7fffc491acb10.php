<div class="main-section">
    <div class="container p-0">
        <div class="row">
            <div class="col-lg-4 col-xl-3">
                <?php echo $__env->make('frontend.addons.left_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-lg-8 col-xl-9">

                <div class="row justify-content-between">
                    <div
                        class="mb-4 <?php if($section_title == ''): ?> col-6 d-flex align-items-center <?php else: ?> col-12 <?php endif; ?>">
                        <div class="toggle-menu">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                    </div>
                    <?php if($section_title != ''): ?>
                        <div class="col-6 d-flex mb-4 align-items-center">
                            <h4 class="fz-20-b-22-black"><?php echo e($section_title); ?></h4>
                        </div>
                    <?php endif; ?>


                    <?php if(Route::currentRouteName() == 'fundraiser.myactivity' || Route::currentRouteName() == 'campaign.type'): ?>
                        <div class="d-flex justify-content-start mb-4">
                            <a href="<?php echo e($head_link); ?>" class="previousBtn"><i
                                    class="fa-solid fa-arrow-left-long"></i><?php echo e($link_name); ?>

                            </a>
                        </div>
                    <?php else: ?>
                        <div class="col-6 d-flex justify-content-end mb-4 align-items-center">
                            <a href="<?php echo e($head_link); ?>" class="previousBtn"><?php echo e($link_name); ?>

                                <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    <?php endif; ?>
                </div>

                
                <?php echo $__env->make($content_view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\demo_sociopro1.6\resources\views/frontend/addons/index.blade.php ENDPATH**/ ?>