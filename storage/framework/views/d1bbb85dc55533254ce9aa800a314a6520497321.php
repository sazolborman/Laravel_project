<div class="social-share">
    <ul class="site-share text-center my-3">
        <?php $__currentLoopData = Share::currentPage()->facebook()->twitter()->linkedin()->telegram()->getRawLinks();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e($value); ?>" target="_blank" class="only_for_share_page"><i class="fa-brands fa-<?php echo e($key); ?>"></i></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<div class="footer-modal-share">
    <h4 class="h6 fw-6 mb-3"> <?php echo e(get_phrase('Share the post on')); ?></h4>
    <div class="inner-share d-flex" id="myTab" role="tablist">
        <button class="btn btn-secondary btn-sm px-3" id="timelinePostBtn"><img
                src="<?php echo e(asset('storage/images/timeline.png')); ?>" alt="photo"> <?php echo e(get_phrase('My Timeline')); ?></button>

        <button class="btn btn-secondary btn-sm px-3 mx-2" id="messageSendButton"><img
                src="<?php echo e(asset('storage/images/Message.png')); ?>" alt="photo"> <?php echo e(get_phrase('Send in Message')); ?></button>
        <button class="btn btn-secondary btn-sm px-3" id="groupPostButton"><img
                src="<?php echo e(asset('storage/images/story.png')); ?>" alt="photo"> <?php echo e(get_phrase('Share to a Group')); ?>

        </button>
    </div>
        <div class="time-line-area d-none" id="timeline-content-area">
            <input type="hidden" name="istimeline" value="1">
        </div>
        <div class="message-area mt-3 d-none" id="message-content-area">
            <h5 class="my-3"><?php echo e(get_phrase('Friends')); ?></h5>
            <?php echo $__env->make('frontend.main_content.my_friend_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="group-area mt-3 d-none" id="group-content-area">
            <h5 class="my-3"><?php echo e(get_phrase('Groups')); ?></h5>
            <?php echo $__env->make('frontend.main_content.my_group_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <form class="ajaxForm" action="<?php echo e(route('share.my.timeline')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(isset($post_id)&&!empty($post_id)): ?>
                <input type="hidden" name="postUrl" value="<?php echo e(route('single.post',$post_id)); ?>">
                <input type="hidden" name="shared_post_id" value="<?php echo e($post_id); ?>">
            <?php endif; ?>
            <?php if(isset($product_id)&&!empty($product_id)): ?>
                <input type="hidden" name="productUrl" value="<?php echo e(route('single.product.iframe',$product_id)); ?>">
                <input type="hidden" name="shared_product_id" value="<?php echo e($product_id); ?>">
            <?php endif; ?>
        <button type="submit" class="btn btn-primary mt-3 rounded w-100 btn-lg" id="ShareButton"><?php echo e(get_phrase('Share')); ?></button>
    </form>
</div>

<?php echo $__env->make('frontend.main_content.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.common_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH C:\xampp\htdocs\demo\sociopro\1.6\resources\views/frontend/main_content/share_post_modal.blade.php ENDPATH**/ ?>