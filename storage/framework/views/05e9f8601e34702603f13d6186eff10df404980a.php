<!-- Banner & Name -->
<div class="main-content-wraper mb-4 position-relative overflow-hidden">
    <img src="<?php echo e(asset('assets/frontend/images/' . $paid_content->cover_photo)); ?>" alt="banner" class="banner-img">
    <div class="profile-banner-title">
        <div class="wrapper d-flex align-items-center g-20">
            <div class="profile-img">
                <img src="<?php echo e(asset('assets/frontend/images/' . $paid_content->logo)); ?>" alt="" />
            </div>
            <div class="contents">
                <h3 class="fz-24-sb-22-white pb-6"><?php echo e($paid_content->title); ?></h3>
                <p class="fz-16-r-22-white"><?php echo e($paid_content->sub_title); ?></p>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\resources\views/frontend/paid_content/banner.blade.php ENDPATH**/ ?>