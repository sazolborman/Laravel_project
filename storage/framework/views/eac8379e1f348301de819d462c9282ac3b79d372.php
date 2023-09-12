

<div class="profile-wrap">
    <?php echo $__env->make('frontend.pages.timeline-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="profile-content mt-3">
        <div class="row gx-3">
            <div class="col-lg-7 col-sm-12">
                <?php echo $__env->make('frontend.pages.inner-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <!-- Profile Nav End -->
                <div class="friends-tab ct-tab bg-white p-3">
                    
                    
                    <div class="photo-list mt-3">
                        <h4 class="h6 mb-3"><?php echo e(get_phrase('Your videos')); ?></h4>
                        <div class="flex-wrap text-center" id="allVideos">
                            <?php echo $__env->make('frontend.profile.video_single', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>

                </div> <!-- Friends Tab End -->
                
            </div> <!-- COL END -->
            <div class="col-lg-5 col-sm-12">
                <?php echo $__env->make('frontend.pages.bio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div> <!-- Profile content End -->
</div>


<?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/pages/video.blade.php ENDPATH**/ ?>