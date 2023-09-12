
<?php
    $page = \App\Models\Page::find($page_id);
?>
<form class="ajaxForm" action="<?php echo e(route('page.update',$page->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Page Name')); ?></label>
        <input type="text" class="border-0 bg-secondary" name="name" value="<?php echo e($page->title); ?>" placeholder="Enter your page Name">
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Page Category')); ?></label>
        <select name="category" id="category" class="form-control border-0 bg-secondary">
            <option value="" selected><?php echo e(get_phrase('Select Category')); ?></option>
            <?php $__currentLoopData = \App\Models\Pagecategory::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>" <?php echo e($category->id == $page->category_id ? "selected":""); ?>><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Page BIO')); ?></label>
        <textarea class="border-0 bg-secondary content" name="description" id="description" rows="5" placeholder="Description"><?php echo script_checker($page->description, false); ?></textarea>
    </div>
    <div>
        <label for=""><?php echo e(get_phrase('Previous Profile Photo')); ?></label> <br>
        <img src="<?php echo e(get_page_logo($page->logo, 'logo')); ?>" alt="">
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Update Profile Photo')); ?></label>
        <input type="file" name="image" id="image" class="form-control border-0 bg-secondary">
    </div>
    <button type="submit" class="w-100 btn btn-primary"><?php echo e(get_phrase('Edit Page')); ?></button>
</form>
<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/pages/edit-modal.blade.php ENDPATH**/ ?>