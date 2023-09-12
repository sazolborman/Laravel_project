
    <div class="page-wrap">
        <div class="card search-card p-4">
            <h3 class="sub-title"><?php echo e(get_phrase('Search Results')); ?></h3>
            <?php echo $__env->make('frontend.search.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div> <!-- Search Card End -->
        
        
        
        <div class="card p-4 mt-4">
            <h3 class="sub-title"><?php echo e(get_phrase('Groups')); ?></h3>
                <div class="suggest-wrap d-flex gap-3 flex-wrap my-3">
                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <div class="card sugg-card p-2 rounded">
                                <div class="mb-2 thumbnail-103-103" style="background-image: url('<?php echo e(get_group_logo($group->logo,'logo')); ?>');"></div>
                                            <a href="<?php echo e(route('single.group',$group->id)); ?>"><h4><?php echo e(ellipsis($group->title,10)); ?></h4></a>
                                <?php $joined = \App\Models\Group_member::where('group_id',$group->id)->where('is_accepted','1')->count(); ?>
                                <span class="small text-muted"><?php echo e($joined); ?> <?php echo e(get_phrase('Member')); ?> <?php if($joined>1): ?> s <?php endif; ?></span>
                                <?php $join = \App\Models\Group_member::where('group_id',$group->id)->where('user_id',auth()->user()->id)->count(); ?>
                                <?php if($join>0): ?>
                                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.rjoin',$group->id); ?>')" class="btn btn-primary"><?php echo e(get_phrase('Joined')); ?></a>
                                <?php else: ?>
                                    <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.join',$group->id); ?>')" class="btn btn-primary"><?php echo e(get_phrase('Join')); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div> 
        </div><!--  Group Card End -->
    </div>



    <?php echo $__env->make('frontend.main_content.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.common_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/search/group.blade.php ENDPATH**/ ?>