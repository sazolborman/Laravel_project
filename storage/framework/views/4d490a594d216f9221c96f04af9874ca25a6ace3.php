

<?php
     $product = \App\Models\Marketplace::find($product_id);
     $productimage = \App\Models\Media_files::where('product_id',$product->id)->get();
?>

<form class="ajaxForm" action="<?php echo e(route('product.update',$product->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Title')); ?></label>
        <input type="text" name="title" class="border-0 bg-secondary" value="<?php echo e($product->title); ?>" placeholder="Your Product Title">
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Currency')); ?></label>
        <select name="currency" id="currency" class="form-control border-0 bg-secondary">
            <option value=""><?php echo e(get_phrase('Select Currency')); ?></option>
            <?php $__currentLoopData = \App\Models\Currency::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($currency->id); ?>" <?php echo e($product->currency_id== $currency->id ? "selected":""); ?>><?php echo e($currency->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Price')); ?></label>
        <input type="text" name="price" class="border-0 bg-secondary"  value="<?php echo e($product->price); ?>" placeholder="Your Price">
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Location')); ?></label>
        <input type="text" name="location" class="border-0 bg-secondary" value="<?php echo e($product->location); ?>" placeholder="Your Location">
    </div>
     <div class="form-group row">
        <div class="col-md-12">
            <label for="category"><?php echo e(get_phrase('Category')); ?></label>
            <select name="category" class="form-control border-0 bg-secondary">
                <option value="" disabled selected><?php echo e(get_phrase('Select Category')); ?></option>
                <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php echo e($category->id==$product->category ? "selected":""); ?>><?php echo e(ucfirst($category->name)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
     </div>
     <div class="form-group row">
        <div class="col-md-12">
            <label for="condition"><?php echo e(get_phrase('Condition')); ?></label>
            <select name="condition" class="form-control border-0 bg-secondary">
                <option value="" disabled selected><?php echo e(get_phrase('Select Condition')); ?></option>
                <option value="used" <?php echo e($product->condition=="used" ? "selected":""); ?>><?php echo e(get_phrase('Used')); ?></option>
                <option value="new" <?php echo e($product->condition=="new" ? "selected":""); ?>><?php echo e(get_phrase('New')); ?></option>
            </select>
        </div>
     </div>

     <div class="form-group row">
        <div class="col-md-12">
            <label for="status"><?php echo e(get_phrase('Status')); ?></label>
            <select name="status" class="form-control border-0 bg-secondary">
                <option value="" disabled selected><?php echo e(get_phrase('Select Status')); ?></option>
                <option value="1" <?php echo e($product->status=="1" ? "selected":""); ?>><?php echo e(get_phrase('In Stock')); ?></option>
                <option value="0" <?php echo e($product->status=="0" ? "selected":""); ?> ><?php echo e(get_phrase('Out Of Stock')); ?></option>
            </select>
        </div>
     </div>

     <div class="form-group row">
        <div class="col-md-12">
            <label for="brand"><?php echo e(get_phrase('Brand')); ?></label>
            <select name="brand" class="form-control border-0 bg-secondary">
                <option value="" disabled selected><?php echo e(get_phrase('Select Brand')); ?></option>
                <?php $__currentLoopData = \App\Models\Brand::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($brand->id); ?>" <?php echo e($brand->id==$product->brand ? "selected":""); ?>><?php echo e(ucfirst($brand->name)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
     </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Description')); ?></label>
        <textarea type="text" name="description" class="border-0 bg-secondary content" id="description" rows="10" placeholder="Your Description"><?php echo e($product->description); ?></textarea>
    </div>
    <div>
        <label for="" class="mb-1"><?php echo e(get_phrase('Previous Uploaded Image')); ?></label> <br>
        <?php $__currentLoopData = $productimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productimage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <img  class="w-55 custome-height-50" src="<?php echo e(get_product_image($productimage->file_name,"thumbnail")); ?>" alt="">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Product Image')); ?></label>
        <input type="file" multiple id="image" class="border-0 bg-secondary" name="multiple_files[]">
    </div>
    <input type="submit" class="btn btn-primary" value="Submit">
</form>


<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/marketplace/edit_product.blade.php ENDPATH**/ ?>