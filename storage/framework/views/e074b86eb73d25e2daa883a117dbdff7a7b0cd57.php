<nav class="profile-nav border bg-white mb-3">
    <ul class="nav align-items-center">
        <li class="nav-item <?php if(str_contains(url()->current(), 'page/view/')): ?> active <?php endif; ?>"><a href="<?php echo e(route('single.page',$page->id)); ?>" class="nav-link"><?php echo e(get_phrase('Timeline')); ?></a></li>
        <li class="nav-item <?php if(str_contains(url()->current(), 'page/photo/view/')): ?> active <?php endif; ?>"><a href="<?php echo e(route('single.page.photos',$page->id)); ?>" class="nav-link"><?php echo e(get_phrase('Photo')); ?></a></li>
        <li class="nav-item <?php if(str_contains(url()->current(), '/page/videos/')): ?> active <?php endif; ?>"><a href="<?php echo e(route('page.videos',$page->id)); ?>" class="nav-link"><?php echo e(get_phrase('Video')); ?></a></li>
    </ul>
</nav><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/pages/inner-nav.blade.php ENDPATH**/ ?>