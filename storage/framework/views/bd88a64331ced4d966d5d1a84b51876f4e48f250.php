<?php
    $paid_content = App\Models\PaidContentCreator::where('user_id', auth()->user()->id)->first();
?>


<?php echo $__env->make('frontend.paid_content.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="main-content-wraper">
    <div class="row">
        <div class="col-lg-7 col-sm-12">
            <div class="myPage-tabs-wraper">
                <div class="seetings-tabs-wrapper">

                    
                    <div class="tabs-top">
                        <?php echo $__env->make('frontend.paid_content.tab_options', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    
                    <?php if(isset($timeline_post) || isset($public_post) || isset($subscriber_post)): ?>
                        <?php echo $__env->make('frontend.paid_content.my_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                    
                    <?php if(isset($packages)): ?>
                        <?php echo $__env->make('frontend.paid_content.package', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                    
                    <?php if(isset($subscribers)): ?>
                        <?php echo $__env->make('frontend.paid_content.subscribers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        
        <div class="col-lg-5 col-sm-12">
            <div class="page-sidebar">

                <?php
                    $creator = DB::table('paid_content_creators')
                        ->where('user_id', auth()->user()->id)
                        ->first();
                    $social_media = json_decode($creator->social_accounts);
                ?>

                <h4 class="fz-24-sb-22-black">Intro</h4>
                <p class="fz-14-r-22-white-1">
                    Lorem Ipsum available, but the majority have suffered
                    alteration in some form by injected humour
                </p>

                <div class="mt-4 mb-3 creator-boi">
                    <h4 class="fz-24-sb-22-black">Creator Bio</h4>
                    <p><?php echo e($creator->bio); ?></p>
                </div>

                
                <a href="<?php echo e(route('settings')); ?>" class="page-s-btn">Edit bio</a>

                <h4 class="fz-24-sb-22-black pt-30 pb-20">Membership</h4>
                <img src="<?php echo e(asset('assets/frontend/paid-content/images/new/Notification-icon.png')); ?>"
                    alt="" />
                <h4 class="fz-24-sb-22-black pt-20">
                    Choose what to offer
                </h4>
                <p class="fz-14-r-22-white-1">
                    Lorem Ipsum available, but the majority have suffered
                    alteration in some form by injected humour
                </p>
                <a href="javascript: void(0);" class="page-s-btn">Set up benefits</a>
                <h4 class="fz-24-sb-22-black pt-30 pb-20">
                    Social profiles
                </h4>
                <ul class="social-links">

                    <li>
                        <a href="<?php if($social_media->facebook == ''): ?> javascript: void(0);
                            <?php else: ?> <?php echo e($social_media->facebook); ?> <?php endif; ?>"
                            target="_blank">
                            <i class="fa-brands fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="<?php if($social_media->twitter == ''): ?> javascript: void(0);
                            <?php else: ?> <?php echo e($social_media->twitter); ?> <?php endif; ?>"
                            target="_blank">
                            <i class="fa-brands fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="<?php if($social_media->instagram == ''): ?> javascript: void(0);
                            <?php else: ?> <?php echo e($social_media->instagram); ?> <?php endif; ?>"
                            target="_blank">
                            <i class="fa-brands fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="<?php if($social_media->linkedin == ''): ?> javascript: void(0);
                            <?php else: ?> <?php echo e($social_media->linkedin); ?> <?php endif; ?>"
                            target="_blank">
                            <i class="fa-brands fa-linkedin-in"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('frontend.main_content.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.common_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\resources\views/frontend/paid_content/creator_timeline.blade.php ENDPATH**/ ?>