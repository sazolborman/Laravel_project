<!-- Modal -->
<form class="ajaxForm postEditForm" id="createPostForm<?php echo e($post->post_id); ?>" action="<?php echo e(route('edit_post', $post->post_id)); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="hidden" id="post_privacy<?php echo e($post->post_id); ?>" name="privacy" value="public">
    

    <div class="">
        <div class="entry-header d-flex justify-content-between">
            <?php if(isset($page_id)&&!empty($page_id)): ?>
                <?php
                    $page = \App\Models\Page::find($page_id);
                ?>
                <a href="<?php echo e(route('single.page',$page_id)); ?>" class="author-thumb d-flex align-items-center">
                    <img src="<?php echo e(get_page_logo($page->logo, 'logo')); ?>" width="40px" class="rounded-circle" alt="">
                    <h6 class="ms-2 mt-2"><?php echo e($page->title); ?></h6>
                </a>
            <?php else: ?>
                <a href="<?php echo e(route('profile')); ?>" class="author-thumb d-flex align-items-center">
                    <img src="<?php echo e(get_user_image($post->getUser->photo, 'optimized')); ?>" width="40px" class="rounded-circle" alt="">
                    <h6 class="ms-2 mt-2"><?php echo e($post->getUser->name); ?></h6>
                </a>
            <?php endif; ?>
            <div class="entry-status">
                <div class="dropdown">
                    <button class="btn btn-gray dropdown-toggle" type="button" id="postPrivacyDroupdownBtn<?php echo e($post->post_id); ?>" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-earth-americas"></i> <?php echo e(get_phrase('Public')); ?>

                    </button>
                    <ul class="dropdown-menu" aria-labelledby="postPrivacyDroupdownBtn<?php echo e($post->post_id); ?>">
                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="post_privacy('private', this, 'postPrivacyDroupdownBtn<?php echo e($post->post_id); ?>', 'post_privacy<?php echo e($post->post_id); ?>')"><i class="fa-solid fa-user"></i> <?php echo e(get_phrase('Only Me')); ?></a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="post_privacy('friends', this, 'postPrivacyDroupdownBtn<?php echo e($post->post_id); ?>', 'post_privacy<?php echo e($post->post_id); ?>')"><i class="fa-solid fa-users"></i> <?php echo e(get_phrase('Friends')); ?></a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="post_privacy('public', this, 'postPrivacyDroupdownBtn<?php echo e($post->post_id); ?>', 'post_privacy<?php echo e($post->post_id); ?>')"><i class="fa-solid fa-user-group"></i> <?php echo e(get_phrase('Public')); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <textarea class="border-n-h-70" name="description" id="post_article<?php echo e($post->post_id); ?>" placeholder="<?php echo e(get_phrase("What's on your mind ____", [auth()->user()->name])); ?>?"><?php echo e($post->description); ?></textarea>

        <div class="row g-1">
            <?php $__currentLoopData = $post->media_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($media_file->file_type == 'video'): ?>
                    <div class="col-auto position-relative" id="previous-uploaded-img-<?php echo e($media_file->id); ?>">
                        <a href="#" onclick="confirmAction('<?php echo e(route('media.file.delete', $media_file->id)); ?>', true)" class="post-edit-img-del"><i class="fa-solid fa-trash"></i></a>
                        <picture class="editing-items position-relative">
                            <video height="60px" class="rounded-5px" src="<?php echo e(get_image('storage/post/videos/'.$media_file->file_name)); ?>" controls></video>
                        </picture>
                    </div>
                <?php else: ?>
                    <div class="col-auto position-relative" id="previous-uploaded-img-<?php echo e($media_file->id); ?>">
                        <a href="#" onclick="confirmAction('<?php echo e(route('media.file.delete', $media_file->id)); ?>', true)" class="post-edit-img-del"><i class="fa-solid fa-trash"></i></a>
                        <picture class="editing-items position-relative">
                            <img height="60px" class="rounded-5px" src="<?php echo e(get_image('storage/post/images/'.$media_file->file_name)); ?>">
                        </picture>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div id="tab-file<?php echo e($post->post_id); ?>" class="post-inner file-tab cursor-pointer p-0 mt-2">
            <span class="close-btn z-index-2000"><i class="fa fa-close"></i></span>

            <!--Uploader start-->
            <div class="file-uploader">
                <label for="multiFileUploader<?php echo e($post->post_id); ?>">
                    <i class="fa-solid fa-cloud-arrow-up text-secondary"></i>
                    <p><?php echo e(get_phrase('Click to browse')); ?></p>
                </label>
                <input type="file" onchange="chooseFile(this)" class="fileUploader position-absolute visibility-hidden" name="multiple_files[]" id="multiFileUploader<?php echo e($post->post_id); ?>" accept=".jpg,.jpeg,.png,.gif,.mp4,.mov,.wmv,.avi,.mkv,.webm" multiple/>
                <div class="preview-files">
                    <div class="row justify-content-start px-3"></div>
                </div>
            </div>
            <!--Uplodaer end-->

        </div>

        <div class="post-inner py-3" id="tab-tag<?php echo e($post->post_id); ?>">
            <h4 class="h5"> <a href="javascript:void(0)" onclick="$('#tab-tag<?php echo e($post->post_id); ?>').hide()" class="prev-btn"><i class="fa fa-long-arrow-left"></i></a><?php echo e(get_phrase('Tag People')); ?>

            </h4>
            <div class="tag-wrap">
                
                <div class="post-tagged">
                    <h4><?php echo e(get_phrase('Tagged')); ?></h4>
                    <div class="tag-card" id="taggedUsers<?php echo e($post->post_id); ?>"></div>
                    <div class="suggesions">
                        <input class="mt-3" onkeyup="searchFriendsForTagging(this, '#friendsForTagging')" type="search" placeholder="<?php echo e(get_phrase('Search more peoples')); ?>">
                        <h4><?php echo e(get_phrase('Suggestions')); ?></h4>

                        <div class="progress suggestions-loaging-bar d-none"><div class="indeterminate"></div></div>

                        <div class="tag-peoples" id="friendsForTagging<?php echo e($post->post_id); ?>">
                            <?php $friends = DB::table('users')->whereJsonContains('friends', [Auth()->user()->id])->take(5)->get(); ?>
                            <?php echo $__env->make('frontend.main_content.friend_list_for_tagging', array('friends' => $friends), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>

            </div><!-- Tag People End -->
        </div>

        <?php echo $__env->make('frontend.main_content.edit_post_felling_and_activity', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('frontend.main_content.edit_post_location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <!-- Location Tab End -->
        <div class="edit-modal-footer text-center p-3">
            <button type="button" data-tab="tab-file<?php echo e($post->post_id); ?>" class="btn btn-secondary status-type-btn"><img
                    src="<?php echo e(asset('storage/images/image.svg')); ?>" alt="photo"><?php echo e(get_phrase('Photo')); ?>/<?php echo e(get_phrase('Video')); ?></button>

            <button type="button" data-tab="tab-tag<?php echo e($post->post_id); ?>" class="btn btn-secondary status-type-btn"><img
                    src="<?php echo e(asset('storage/images/peoples.png')); ?>" alt="photo"><?php echo e(get_phrase('Tag People')); ?></button>
            <button type="button" data-tab="tab-feeling<?php echo e($post->post_id); ?>" class="btn btn-secondary status-type-btn"><img
                    src="<?php echo e(asset('storage/images/forum.svg')); ?>" alt="photo"><?php echo e(get_phrase('Feelings')); ?> / <?php echo e(get_phrase('Activity')); ?></button>
            <button type="submit" class="btn btn-primary mt-3 rounded w-100 btn-lg"><?php echo e(get_phrase('Update')); ?></button>
        </div>
    </div>
        
</form>


<script type="text/javascript">
    "Use strict";

    $(function(){
        var ecta = $(".edit-modal-footer .btn:not([type=submit])");
        ecta.click(function(){
            var tab_id = $(this).attr('data-tab');
            $('.postEditForm .post-inner').hide();
            $("#"+tab_id).show();
        })

        $(".postEditForm .post-inner span.close-btn").on("click", function() {
            $(".postEditForm .post-inner").hide();
        })
    });
</script>

<!-- <script src="<?php echo e(asset('assets/frontend/uploader/file-uploader.js')); ?>"></script> -->
<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/main_content/edit_post_modal.blade.php ENDPATH**/ ?>