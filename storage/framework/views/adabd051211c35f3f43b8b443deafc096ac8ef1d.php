
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4><?php echo e(get_phrase('All Product Brand')); ?> </h4>
              
            </div>
            <div class="export-btn-area">
              <a href="<?php echo e(route('admin.view.product.brand')); ?>" class="export_btn" data-bs-toggle="tooltip" data-bs-placement="top"
              data-bs-custom-class="custom-tooltip"
              data-bs-title="All Product Brand"><?php echo e(get_phrase('View')); ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-12">
        <div class="eSection-wrap-2">
            <div class="row">
                <div class="col-md-6 col-md-6 col-sm-6">
                    <div class="eForm-layouts">
                      <form method="POST" action="<?php echo e(route('admin.save.product.brand')); ?>" enctype="multipart/form-data">
                          <?php echo csrf_field(); ?>
                          <div class="mb-3">
                            <label for="brand" class="form-label eForm-label"><?php echo e(get_phrase('Product Brand')); ?></label>
                            <input type="text" class="form-control eForm-control" id="brand" name="brand" placeholder="Product Brand ">
                          </div>
                          <?php if($errors->any()): ?>
                              <div class="alert alert-danger">
                                  <ul>
                                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <li><?php echo e($error); ?></li>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </ul>
                              </div>
                          <?php endif; ?>
                          
                          <button type="submit" class="btn btn-primary"><?php echo e(get_phrase('Submit')); ?></button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- Start Footer -->
    <?php echo $__env->make('backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Footer -->
  </div>



<?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/backend/admin/brand/create.blade.php ENDPATH**/ ?>