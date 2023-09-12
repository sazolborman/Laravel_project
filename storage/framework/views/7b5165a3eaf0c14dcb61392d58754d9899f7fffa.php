 <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 col-lg-4 col-sm-6 single-item-countable" id="group-<?php echo e($group->id); ?>">
            <div class="card p-2 rounded">
                <div class="mb-2"> <img class="img-fluid img-radisu" src="<?php echo e(get_group_logo($group->logo,'logo')); ?>" ></div>
                <a href="<?php echo e(route('single.group',$group->id)); ?>"><h4><?php echo e(ellipsis($group->title,20)); ?></h4></a>
                <?php $joined = \App\Models\Group_member::where('group_id',$group->id)->where('is_accepted','1')->count(); ?>
                <span class="small text-muted"><?php echo e(get_phrase('____ Members', $joined)); ?></span>
                <?php $join = \App\Models\Group_member::where('group_id',$group->id)->where('user_id',auth()->user()->id)->count(); ?>
                <?php if($join>0): ?>
                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.rjoin',$group->id); ?>')" class="btn btn-primary"><?php echo e(get_phrase('Joined')); ?></a>
                <?php else: ?>
                    <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.join',$group->id); ?>')" class="btn btn-primary"><?php echo e(get_phrase('Join')); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <?php if(isset($search)&&!empty($search)): ?>
            <?php if($key==2): ?>
                <?php break; ?>
            <?php endif; ?>
        <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
<?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/groups/group-single.blade.php ENDPATH**/ ?>