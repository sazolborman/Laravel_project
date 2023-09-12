<!-- Profile Nav End -->
<div class="friends-tab ct-tab bg-white p-3">
    <div class="d-flex align-items-center justify-content-between p-3">
        <h3 class="h6 fw-7 m-0"><?php echo e(get_phrase('Media')); ?></h3>
        <div class="gap-2">
            <a onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.groups.album_image','profile_id'=>$user_info->id])); ?>', '<?php echo e(get_phrase('Add Photo To Album')); ?>');" data-bs-toggle="modal" data-bs-target="#albumCreateModal"
                class="btn btn-primary"> <?php echo e(get_phrase('Add Photo/Album')); ?>

            </a>
        </div>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="profile-photo-tab"
                data-bs-toggle="tab" data-bs-target="#profile-photo" type="button"
                role="tab" aria-controls="profile-photo" aria-selected="true"><?php echo e(get_phrase('Your Photos')); ?></button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-album-tab" data-bs-toggle="tab"
                data-bs-target="#profile-album" type="button" role="tab"
                aria-controls="profile-album" aria-selected="false"><?php echo e(get_phrase('Album')); ?></button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="profile-photo" role="tabpanel"
            aria-labelledby="profile-photo-tab">
            <div class="photo-list mt-3">
                <div class="photoGallery flex-wrap" id="allPhotos">
                    <?php echo $__env->make('frontend.profile.photo_single', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div> <!-- Tab Pane End -->
        <div class="tab-pane fade" id="profile-album" role="tabpanel" aria-labelledby="profile-tab">
            <div class="friends-request my-3 g-2">
                <div class="row" id="profile-album-row">
                    <div class="col-create-album col-12 col-md-4 col-lg-12 col-xl-6">
                        <div class="card album-create-card">
                            <a onclick="showCustomModal('<?php echo route('profile.album', ['action_type' => 'form']); ?>', '<?php echo e(get_phrase('Create Album')); ?>')" class="create-album">
                                <i class="fa fa-circle-plus"></i>
                            </a>
                            <h4 class="h6"><?php echo e(get_phrase('Create Album')); ?></h4>
                        </div>
                    </div> <!-- Card End -->

                    <?php echo $__env->make('frontend.profile.album_single', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                </div>
            </div>
        </div><!-- Tab Pane End -->

    </div> <!-- Tab Content End -->
</div> <!-- Friends Tab End --><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/profile/photos.blade.php ENDPATH**/ ?>