
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4><?php echo e(get_phrase('Create your new Ad')); ?></h4>
            </div>
            <div class="export-btn-area">
              <a href="<?php echo e(route('user.ads')); ?>" class="export_btn" data-bs-toggle="tooltip" data-bs-placement="top"
              data-bs-custom-class="custom-tooltip"
              data-bs-title="All Ads"><i class="bi bi-arrow-left me-1"></i> <?php echo e(get_phrase('Back')); ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-6">
        <div class="eSection-wrap-2">
          <div class="eForm-layouts">

            <form method="POST" action="<?php echo e(route('user.ad.store')); ?>" enctype="multipart/form-data">
              <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
              <?php endif; ?>

                <?php echo csrf_field(); ?>
                <div class="mb-3">
                  <label for="name" class="form-label eForm-label"><?php echo e(get_phrase('Title')); ?></label>
                  <input type="text" class="form-control eForm-control" id="name" name="name" placeholder="Title" required>
                </div>
                <div class="mb-3">
                  <label for="ext_url" class="form-label eForm-label"><?php echo e(get_phrase('URL')); ?></label>
                  <input type="url" class="form-control eForm-control" id="ext_url" name="ext_url" placeholder="URL">
                </div>
                <div class="mb-3">
                  <label for="image" class="form-label eForm-label"><?php echo e(get_phrase('Image')); ?></label>
                  <input type="file" class="form-control eForm-control" id="image" name="image" placeholder="Title" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="description" class="form-label eForm-label"><?php echo e(get_phrase('Description')); ?> <small><?php echo e(get_phrase('(50 Character Show In Front End)')); ?></small></label>
                    <textarea name="description" id="description" class="form-control eForm-control content" placeholder="Description"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary"><?php echo e(get_phrase('Submit')); ?></button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Start Footer -->
    <?php echo $__env->make('backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Footer -->
  </div>




<?php /**PATH C:\xampp\htdocs\demo\sociopro\resources\views/backend/user/ad_create.blade.php ENDPATH**/ ?>