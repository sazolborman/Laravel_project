<ul class="creator-menu">
    <li class="creator-menu-item <?php if(Route::currentRouteName() == 'creator.timeline'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('creator.timeline', ['type' => 'timeline'])); ?>" class="creator-menu-link">My page</a>
    </li>
    <li class="creator-menu-item <?php if(Route::currentRouteName() == 'creator.package'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('creator.package')); ?>" class="creator-menu-link">Package</a>
    </li>
    <li class="creator-menu-item <?php if(Route::currentRouteName() == 'creator.subscribers'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('creator.subscribers')); ?>" class="creator-menu-link">Subscriber</a>
    </li>

    <li class="creator-menu-item <?php if(Route::currentRouteName() == 'post.type'): ?> active <?php endif; ?>"">
        <button type="button" class="post-type">More<i class="fa-solid fa-sort-down ms-2"></i></button>

        <ul class="creator-dropdown-menu">
            <li>
                <a class="dropdown-item" href="<?php echo e(route('post.type', ['type' => 'public_post'])); ?>">
                    <img src="<?php echo e(asset('assets/frontend/paid-content/images/new/world.svg')); ?>" alt="" />
                    Public Post</a>
            </li>
            <li>
                <a class="dropdown-item" href="<?php echo e(route('post.type', ['type' => 'subscriber_post'])); ?>">
                    <img src="<?php echo e(asset('assets/frontend/paid-content/images/new/subscribe.svg')); ?>" alt="" />
                    Subscriber Post</a>
            </li>
        </ul>
    </li>
</ul>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\resources\views/frontend/paid_content/tab_options.blade.php ENDPATH**/ ?>