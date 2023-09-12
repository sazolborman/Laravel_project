<!-- Profile Nav End -->
<div class="friends-tab ct-tab bg-white p-3">
    
    
    <div class="photo-list mt-3">
        <h4 class="h6 mb-3"><?php echo e(get_phrase('Your videos')); ?></h4>
        <div class="flex-wrap" id="">
            <?php echo $__env->make('frontend.user.single_user.video_single', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

</div> <!-- Friends Tab End --><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/user/single_user/videos.blade.php ENDPATH**/ ?>