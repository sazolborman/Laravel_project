
<div class="profile-wrap">
    <div class="profile-cover rounded">
        <div class="profile-header" style="background-image: url('<?php echo e(get_cover_photo($user_data->cover_photo)); ?>');">
            <div class="profile-avatar d-flex align-items-center ps-4">
                <div class="avatar avatar-xl"><img class="rounded-circle" src="<?php echo e(get_user_image($user_data->photo, 'optimized')); ?>" alt=""></div>
                <div class="avatar-details">
                    <h3><?php echo e($user_data->name); ?> </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="profile-content mt-3">
        <div class="row gx-3">
            <div class="col-lg-7 col-sm-12">
                <nav class="profile-nav border bg-white mb-3">
                    <ul class="nav align-items-center justify-content-start">
                        <li class="nav-item <?php if(Route::currentRouteName() == 'user.profile.view'): ?> active <?php endif; ?>"><a href="<?php echo e(route('user.profile.view',$user_data->id)); ?>" class="nav-link"><?php echo e(get_phrase('Timeline')); ?></a></li>
                        <li class="nav-item <?php if(Route::currentRouteName() == 'user.friends'): ?> active <?php endif; ?>"><a href="<?php echo e(route('user.friends',$user_data->id)); ?>" class="nav-link"><?php echo e(get_phrase('Friends')); ?></a></li>
                        <li class="nav-item <?php if(Route::currentRouteName() == 'user.photos'): ?> active <?php endif; ?>"><a href="<?php echo e(route('user.photos',$user_data->id)); ?>" class="nav-link"><?php echo e(get_phrase('Photo')); ?></a></li>
                        <li class="nav-item <?php if(Route::currentRouteName() == 'user.videos'): ?> active <?php endif; ?>"><a href="<?php echo e(route('user.videos',$user_data->id)); ?>" class="nav-link"><?php echo e(get_phrase('Video')); ?></a></li>
                    </ul>
                </nav>

                <?php if(Route::currentRouteName() == 'user.friends'): ?>
                    <?php echo $__env->make('frontend.user.single_user.friends', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif(Route::currentRouteName() == 'user.photos'): ?>
                    <?php echo $__env->make('frontend.user.single_user.photos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif(Route::currentRouteName() == 'user.videos'): ?>
                    <?php echo $__env->make('frontend.user.single_user.videos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                    <?php if($user_data->id == auth()->user()->id): ?>
                        <?php echo $__env->make('frontend.main_content.create_post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <div id="user-timeline-posts">
                        <?php echo $__env->make('frontend.main_content.posts',['type'=>'user_post'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <!-- COL END -->
            <div class="col-lg-5 col-sm-12">
                <?php echo $__env->make('frontend.user.single_user.user_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
    <!-- Profile content End -->
</div>

<?php echo $__env->make('frontend.main_content.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/user/single_user/user_view.blade.php ENDPATH**/ ?>