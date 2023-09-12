<div class="row">
    <div class="col-12 text-center">
        <span class="live-icon">
            <i class="fa fa-dot-circle"></i>
            <?php echo e(get_phrase('LIVE')); ?>

        </span>
        <img class="live-image my-4" src="<?php echo e(asset('storage/images/live.png')); ?>">
    </div>
    <div class="col-12 text-center pt-5">

        <?php if(is_array($live_description) && $live_description['live_video_ended'] == 'yes'): ?>
            <a class="live-watch-now mt-3 btn-disabled" href="#"> <?php echo e(get_phrase('Live video is ended')); ?></a>
        <?php else: ?>
            <a class="live-watch-now mt-3" href="<?php echo e(route('live', ['post_id' => $post->post_id])); ?>"><i class="fa fa-video"></i> <?php echo e(get_phrase('Join now')); ?></a>
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\xampp\htdocs\demo\sociopro\1.6\resources\views/frontend/main_content/live_streaming_type_post_view.blade.php ENDPATH**/ ?>