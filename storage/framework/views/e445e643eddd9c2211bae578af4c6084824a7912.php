<?php if(isset($timeline_post)): ?>
    <?php echo $__env->make('frontend.main_content.create_post', ['paid_content_id' => $paid_content->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $posts = $timeline_post ?>
<?php endif; ?>

<?php if(isset($public_post)): ?>
    <?php $posts = $public_post ?>
<?php endif; ?>

<?php if(isset($subscriber_post)): ?>
    <?php $posts = $subscriber_post ?>
<?php endif; ?>

<div id="pc-timeline-posts">
    <?php echo $__env->make('frontend.main_content.posts', ['type' => 'paid_content'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\demo_sociopro1.6\resources\views/frontend/paid_content/my_page.blade.php ENDPATH**/ ?>