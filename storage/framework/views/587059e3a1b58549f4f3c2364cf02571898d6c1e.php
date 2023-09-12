<?php $__currentLoopData = $stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="javascript:void(0)" class="story-entry creat-story m-0" onclick="loadStoryDetailsOnModal('<?php echo $story->story_id; ?>')">
        <div class="story-small-img">
            <img src="<?php echo e(get_user_image($story->photo, 'optimized')); ?>" alt="photo">
        </div>

        <?php if($story->content_type == 'text'): ?>
            <?php
                $text_info = json_decode($story->description, true);
            ?>
            <div class="stories-view" style="color: <?php echo '#'.$text_info['color']; ?>; background-color: <?php echo '#'.$text_info['bg-color']; ?>;">
                <?php echo e($text_info['text']); ?>

            </div> 
        <?php else: ?>
            <?php $media_files = DB::table('media_files')->where('story_id', $story->story_id)->get(); ?>
            <?php $__currentLoopData = $media_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($media_file->file_type == 'video'): ?>
                    <?php if(File::exists('storage/story/videos/'.$media_file->file_name)): ?>
                        <video muted controlsList="nodownload" class="plyr-js initialized">
                            <source src="<?php echo e(asset('storage/story/videos/'.$media_file->file_name)); ?>" type="">
                        </video>
                    <?php endif; ?>
                <?php else: ?>
                    <figure class="avatar-img rounded" style="background-image: url(<?php echo e(asset('storage/story/images/'.$media_file->file_name)); ?>)"></figure>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <div class="story-shadow">
            <div class="story-text">
                <h4 class="text-nav"><?php echo e($story->name); ?></h4>
                <p class="text-des"><?php echo e(date_formatter($story->created_at, 2)); ?></p>
            </div>
        </div>
    </a><div class="devider"></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/story/single_story.blade.php ENDPATH**/ ?>