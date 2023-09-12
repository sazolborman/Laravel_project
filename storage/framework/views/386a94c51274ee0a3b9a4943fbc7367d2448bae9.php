
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4><?php echo e(get_phrase('Add a new blgo')); ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-md-7">
        <div class="eSection-wrap-2">
            <div class="eForm-layouts">
              <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
              <form method="POST" action="<?php echo e(route('admin.blog.created')); ?>" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <div class="mb-3">
                    <label for="title" class="form-label eForm-label"><?php echo e(get_phrase('Blog title')); ?></label>
                    <input type="text" class="form-control eForm-control" value="<?php echo e($blog_details->title); ?>" id="title" name="title" placeholder="Blog title">
                  </div>

                  <div class="mb-3">
                      <label for="blog_category" class="form-label eForm-label"><?php echo e(get_phrase('Select a category')); ?></label>
                      <select name="category" class="form-select eForm-control select2" required>
                        <option><?php echo e(get_phrase('Select a category')); ?></option>
                        <?php $__currentLoopData = DB::table('blogcategories')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($category->id); ?>" <?php if($blog_details->category_id == $category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                  </div>

                  <div class="mb-3">
                      <label for="description" class="form-label eForm-label"><?php echo e(get_phrase('Blog details')); ?></label>
                      <textarea id="description" name="description" class="content"><?php echo e($blog_details->description); ?></textarea>
                  </div>

                  <div class="mb-3">
                    <label for="tag" class="form-label eForm-label"><?php echo e(get_phrase('Tags')); ?></label>
                    <input type="text" class="form-control eForm-control py-1" id="tag" value="<?php $__currentLoopData = json_decode($blog_details->tag, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($tag); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" name="tag" placeholder="Tags">
                  </div>

                  <div class="mb-3">
                      <label for="image" class="form-label eForm-label"><?php echo e(get_phrase('Cover photo')); ?></label>
                      <input id="image" class="form-control eForm-control-file" type="file" name="image">
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



<?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/backend/admin/blog/edit.blade.php ENDPATH**/ ?>