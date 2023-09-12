<div class="profile-cover group-cover rounded mb-3">
    <?php echo $__env->make('frontend.groups.cover-photo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div class="group-content profile-content">
    <div class="row gx-3">
        <div class="col-lg-7 col-sm-12">
            <?php echo $__env->make('frontend.groups.iner-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- People Nav End -->
            <div class="people-wrap p-3 border bg-white">
                <div class="member-entry gr-search">
                    <h3 class="h6 mb-0 fw-7"><?php echo e(get_phrase('Members')); ?> <?php echo e($total_member); ?></h3>
                    <p><?php echo e(get_phrase('All  people and  who join this group will appear here')); ?></p>
                    
                    <div class="row py-3 border-bottom">
                        <?php $__currentLoopData = $all_members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_team_member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex justify-content-between my-1">
                                <div class="ava-info d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="<?php echo e(get_user_image($recent_team_member->getUser->photo,'optimized')); ?>" class="circle rounded-circle user_image_show_on_modal" alt="...">
                                    </div>
                                    <div class="ava-desc ms-2">
                                        <h3 class="mb-0 h6"><?php echo e($recent_team_member->getUser->name); ?></h3>
                                        <span class="meta-time text-muted"><?php echo e($recent_team_member->getUser->username); ?></span>
                                    </div>
                                </div>
                                <?php if($recent_team_member->user_id==auth()->user()->id): ?>
                                <div class="post-controls dropdown dotted">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.rjoin',$group->id); ?>')">
                                                <?php echo e(get_phrase('Leave Group')); ?></a></li>
                                    </ul>
                                </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div> <!-- Member Entry End -->
            </div>
            <!--  Single Entry End -->
        </div> <!-- COL END -->
        <!--  Group Content Inner Col End -->
        <?php echo $__env->make('frontend.groups.bio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div><!-- Group content End --><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/groups/all_people.blade.php ENDPATH**/ ?>