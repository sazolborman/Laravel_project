<div class="main_content">
    <!-- Start User Profile area -->
<div class="user-profile-area d-flex flex-wrap">
<!-- Left side -->
<div class="user-info d-flex flex-column">
<div class="user-info-basic d-flex flex-column justify-content-center">
<div class="user-graphic-element-1">
    <img src="<?php echo e(get_user_image(auth()->user()->photo),'optimized'); ?>" class="img-fluid rounded" alt="">
</div>

<div class="userImg">
    <img width="100%" src="<?php echo e(get_user_image(auth()->user()->photo),'optimized'); ?>" alt="">
</div>
<div class="userContent text-center">
    <h4 class="title mt-4"><?php echo e(auth()->user()->name); ?></h4>
    <p class="info"><?php echo e(auth()->user()->user_role); ?></p>
    <p class="user-status-verify"><?php echo e(get_phrase('Verified')); ?></p>
</div>
</div>
<div class="user-info-edit">
<div class="user-edit-title d-flex justify-content-between align-items-center">
    <h3 class="title"><?php echo e(get_phrase('Details info')); ?></h3>
</div>
<div class="user-info-edit-items">
    <div class="item">
    <p class="title"><?php echo e(get_phrase('Email')); ?></p>
    <p class="info"><?php echo e(auth()->user()->email); ?></p>
    </div>
    <div class="item">
    <p class="title"><?php echo e(get_phrase('Phone Number')); ?></p>
    <p class="info"><?php echo e(auth()->user()->phone); ?></p>
    </div>
    <div class="item">
    <p class="title"><?php echo e(get_phrase('Address')); ?></p>
    <p class="info">
    <?php echo e(auth()->user()->address); ?>

    </p>
    </div>
</div>
</div>
</div>
<!-- Right side -->
<div class="user-details-info">

<!-- Tab content -->
<div class="tab-content eNav-Tabs-content" id="myTabContent">
<div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
    <div class="eForm-layouts">
    <form action="<?php echo e(route('user.password.update')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>                 
        <div class="fpb-7">
        <label for="eInputName" class="eForm-label"><?php echo e(get_phrase('Current Password')); ?></label>
        <input type="text" class="form-control eForm-control" id="eInputName"  name="prevpass" placeholder="8 Symbols at least" value="" aria-label="Abu ishaqk">
        <p class="text-danger"><?php echo e($errors->first('prevpass')); ?></p>
        </div>
        <div class="fpb-7">
        <label for="pass" class="eForm-label"><?php echo e(get_phrase('Password')); ?></label>
        <input type="password"  class="form-control eForm-control" id="pass" name="password" placeholder="New Password" value="">
        </div>

        <div class="fpb-7">
        <label for="confirm_pass" class="eForm-label"><?php echo e(get_phrase('Confirm Password')); ?></label>
        <input type="password" class="form-control eForm-control" id="confirm_pass" name="password_confirmation" placeholder="Confirm Password" value="">
        </div>
        <p class="text-danger"><?php echo e($errors->first('password')); ?></p>
        
        
        

    <button type="submit" class="userFormEdit-btn btn"><?php echo e(get_phrase('Update')); ?></button>

    </form>
    </div>
</div>

</div>
</div>
</div>
<!-- End User Profile area -->

<!-- Start Footer -->
<?php echo $__env->make('backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End Footer -->
</div><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/backend/admin/profile_view/password.blade.php ENDPATH**/ ?>