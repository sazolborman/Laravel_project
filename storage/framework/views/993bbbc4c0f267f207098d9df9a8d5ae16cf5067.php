<div class="profile-cover rounded">
    <div class="profile-header" style="background-image: url('<?php echo e(get_page_cover_photo($page->coverphoto,"coverphoto")); ?>')">
        <?php if($page->user_id==auth()->user()->id): ?>
            <button onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.pages.edit-cover-photo','page_id'=>$page->id])); ?>', '<?php echo e(get_phrase('Update your cover photo')); ?>');" class="edit-cover btn"><i class="fa fa-camera"></i><?php echo e(get_phrase('Edit Cover Photo')); ?></button>
        <?php endif; ?>
        <div class="profile-avatar d-flex align-items-center ps-4">
            <div class="avatar avatar-xl"><img src="<?php echo e(get_page_logo($page->logo, 'logo')); ?>" class="user-round" alt=""></div>
            <div class="avatar-details">
                <h3 class="mb-1"><?php echo e($page->title); ?></h3>
                <span class="mute d-block text-white"><?php echo e($page->getCategory->name); ?></span>
                <?php if($page->user_id==auth()->user()->id): ?>
                    <a href="javascript:void(0)" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.pages.edit-modal', 'page_id' => $page->id])); ?>', '<?php echo e(get_phrase('Edit Page')); ?>');" class="btn btn-primary mt-3" data-bs-toggle="modal"
                        data-bs-target="#edit-profile"><i class="fa fa-pen"></i><?php echo e(get_phrase('Edit Profile')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/pages/timeline-header.blade.php ENDPATH**/ ?>