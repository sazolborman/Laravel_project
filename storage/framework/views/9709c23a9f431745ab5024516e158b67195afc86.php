
<form class="ajaxForm" action="<?php echo e(route('product.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Title')); ?></label>
        <input type="text" name="title" class="border-0 bg-secondary" placeholder="Your Product Title">
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Currency')); ?></label>
        <select name="currency" id="currency" required class="form-control border-0 bg-secondary">
            <option value=""><?php echo e(get_phrase('Select Currency')); ?></option>
            <?php $__currentLoopData = \App\Models\Currency::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($currency->id); ?>"><?php echo e($currency->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Price')); ?></label>
        <input type="number" name="price" class="border-0 bg-secondary" placeholder="Your Price">
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Location')); ?></label>
        <input type="text" name="location" class="border-0 bg-secondary" placeholder="Your Location">
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="category"><?php echo e(get_phrase('Category')); ?></label>
            <select name="category" required class="form-control border-0 bg-secondary">
                <option value="" disabled selected><?php echo e(get_phrase('Select Category')); ?></option>
                <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" ><?php echo e(ucfirst($category->name)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
     </div>
     <div class="form-group row">
        <div class="col-md-12">
            <label for="condition"><?php echo e(get_phrase('Condition')); ?></label>
            <select name="condition" required class="form-control border-0 bg-secondary">
                <option value="" disabled selected><?php echo e(get_phrase('Select Condition')); ?></option>
                <option value="used" ><?php echo e(get_phrase('Used')); ?></option>
                <option value="new" ><?php echo e(get_phrase('New')); ?></option>
            </select>
        </div>
     </div>

     <div class="form-group row">
        <div class="col-md-12">
            <label for="status"><?php echo e(get_phrase('Status')); ?></label>
            <select name="status" required class="form-control border-0 bg-secondary">
                <option value="" disabled selected><?php echo e(get_phrase('Select Status')); ?></option>
                <option value="1" ><?php echo e(get_phrase('In Stock')); ?></option>
                <option value="0" ><?php echo e(get_phrase('Out Of Stock')); ?></option>
            </select>
        </div>
     </div>

     <div class="form-group row">
        <div class="col-md-12">
            <label for="brand"><?php echo e(get_phrase('Brand')); ?></label>
            <select name="brand" required class="form-control border-0 bg-secondary">
                <option value="" disabled selected><?php echo e(get_phrase('Select Brand')); ?></option>
                <?php $__currentLoopData = \App\Models\Brand::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($brand->id); ?>" ><?php echo e(ucfirst($brand->name)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
     </div>

     <div class="form-group">
        <label for="buy_link"><?php echo e(get_phrase('Buy link')); ?></label>
        <input type="url" name="buy_link" id="buy_link" class="border-0 bg-secondary" placeholder="<?php echo e(get_phrase('Enter the buy link')); ?>">
    </div>

    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Description')); ?></label>
        <textarea type="text" name="description" class="border-0 bg-secondary content" id="description" rows="10" placeholder="Your Description"></textarea>
    </div>
    <div id="frames"></div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Product Image')); ?></label>
        <input type="file" multiple id="image" class="border-0 bg-secondary" name="multiple_files[]">
    </div>
    <input type="submit" class="btn btn-primary"  value="Submit">
</form>


<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/marketplace/create_product.blade.php ENDPATH**/ ?>