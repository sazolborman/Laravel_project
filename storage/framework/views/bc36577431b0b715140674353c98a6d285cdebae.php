<button type="button" class="btn-save border-0" data-bs-toggle="modal" data-bs-target="#addpackageModal">
    Add Package
</button>


<div class="modal fade p-0" id="addpackageModal" tabindex="-1" aria-labelledby="addPackage" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-center" id="addPackage">Add Package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?php echo e(route('create.package')); ?>" method="post" class="d-flex flex-column gap-3">
                    <?php echo csrf_field(); ?>

                    
                    <div class="product-form">
                        <label for="eInputPackageTitle" class="eForm-label">Package Title</label>
                        <input type="text" class="form-control eForm-control" id="eInputPackageTitle" name="title"
                            placeholder="Package Title" aria-label="Package Title" required />
                    </div>

                    
                    <div class="product-form">
                        <label for="eInputDescription" class="eForm-label">Description</label>
                        <input type="text" class="form-control eForm-control" id="eInputDescription"
                            name="description" placeholder="Description" aria-label="Description" required />
                    </div>

                    
                    

                    
                    

                    
                    <div class="product-form">
                        <label for="eInputMonthlyPrice" class="eForm-label">Monthly Price</label>
                        <div class="input-group pcMonthlyPrice" id="eInputMonthlyPrice">
                            <span class="input-group-text"
                                id="basic-addon1">$</span>
                            <input type="text" class="form-control eForm-control" placeholder="00" min="1"
                                name="price" aria-describedby="basic-addon1" required />
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
            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\resources\views/frontend/paid_content/create_package_modal.blade.php ENDPATH**/ ?>