<div class="tags">
    <a class="<?php if(Route::currentRouteName() == 'search'): ?> active <?php endif; ?>" href="<?php echo e(url('search?search='.$_GET['search'])); ?>"><?php echo e(get_phrase('All')); ?></a>
    <a class="<?php if(Route::currentRouteName() == 'search.post'): ?> active <?php endif; ?>" href="<?php echo e(url('search/post?search='.$_GET['search'])); ?>"><i class="fa fa-address-card me-2"></i><?php echo e(get_phrase('Posts')); ?></a>
    <a class="<?php if(Route::currentRouteName() == 'search.people'): ?> active <?php endif; ?>" href="<?php echo e(url('search/people?search='.$_GET['search'])); ?>"><i class="fa fa-user-group me-2"></i><?php echo e(get_phrase('Peoples')); ?></a>
    <a class="<?php if(Route::currentRouteName() == 'search.event'): ?> active <?php endif; ?>" href="<?php echo e(url('search/event?search='.$_GET['search'])); ?>"><i class="fa fa-image me-2"></i><?php echo e(get_phrase('Events')); ?></a>
    <a class="<?php if(Route::currentRouteName() == 'search.video'): ?> active <?php endif; ?>" href="<?php echo e(url('search/video?search='.$_GET['search'])); ?>"><i class="fa fa-video me-2"></i><?php echo e(get_phrase('Videos')); ?></a>
    <a class="<?php if(Route::currentRouteName() == 'search.product'): ?> active <?php endif; ?>" href="<?php echo e(url('search/product?search='.$_GET['search'])); ?>"><i class="fa fa-store me-2"></i><?php echo e(get_phrase('Marketplace')); ?></a>
    <a class="<?php if(Route::currentRouteName() == 'search.page'): ?> active <?php endif; ?>" href="<?php echo e(url('search/page?search='.$_GET['search'])); ?>"><i class="fa fa-flag me-2"></i><?php echo e(get_phrase('Pages')); ?></a>
    <a class="<?php if(Route::currentRouteName() == 'search.group.specific'): ?> active <?php endif; ?>" href="<?php echo e(url('search/group?search='.$_GET['search'])); ?>"><i class="fa fa-address-card me-2"></i><?php echo e(get_phrase('Groups')); ?></a>
</div><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/search/header.blade.php ENDPATH**/ ?>