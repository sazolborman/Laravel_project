<form action="<?php echo e(route('update.package', $package->id)); ?>" method="post" class="d-flex flex-column gap-3">
    <?php echo csrf_field(); ?>

    
    <div class="product-form">
        <label for="eInputPackageTitle" class="eForm-label">Package Title</label>
        <input type="text" class="form-control eForm-control" id="eInputPackageTitle" name="title"
            value="<?php echo e($package->title); ?>" aria-label="Package Title" />
    </div>

    
    <div class="product-form">
        <label for="eInputDescription" class="eForm-label">Description</label>
        <input type="text" class="form-control eForm-control" id="eInputDescription" name="description"
            value="<?php echo e($package->description); ?>" aria-label="Description" />
    </div>

    
    <div class="product-form">
        <label for="eInputMonthlyPrice" class="eForm-label">Monthly Price</label>
        <div class="input-group pcMonthlyPrice" id="eInputMonthlyPrice">
            <span class="input-group-text" id="basic-addon1">$</span>
            <input type="text" class="form-control eForm-control" value="<?php echo e($package->price); ?>" min="1"
                name="price" aria-describedby="basic-addon1" />
        </div>
    </div>

    
    <div class="d-flex w-100 gap-3 mt-2">
        <div class="w-50">
            <button type="button" class="btn-cancel border-0" data-bs-dismiss="modal">Cancel</button>
        </div>
        <div class="w-50">
            <button type="submit" class="btn-save border-0">Save</button>
        </div>
    </div>

</form>

<script>
    $(document).ready(function() {
        $('.btn-cancel').click(function(e) {
            e.preventDefault();
            $('.custom-modal').removeClass('custom-modal-show');
        });
    });
</script>
<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\resources\views/frontend/paid_content/edit_package_modal.blade.php ENDPATH**/ ?>