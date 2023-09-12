<div class="marketplace-wrap">
    <nav class="market-nav border bg-white mb-3 rounded">
        <ul class="nav align-items-center">
            <li class="nav-item"><a href="<?php echo e(route('allproducts')); ?>" class="nav-link"><?php echo e(get_phrase('Marketplace')); ?></a></li>
            <li class="nav-item active"><a href="<?php echo e(route('allproducts')); ?>" class="nav-link"><?php echo e(get_phrase('My Products')); ?></a></li>
            
            
        </ul>
    </nav>
    <div
        class="d-flex pagetab-head  border align-items-center justify-content-between mb-3 py-2 px-3 rounded bg-white">
        <h3 class="h5 pt-3"><span><i class="fa-solid fa-calendar-days"></i></span> <?php echo e(get_phrase('Marketplace')); ?></h3>
        <div class="">
            <a href="javascript:void(0)" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.marketplace.create_product'])); ?>', '<?php echo e(get_phrase('Create Product')); ?>');" data-bs-toggle="modal"
                data-bs-target="#createProduct" class="btn btn-primary py-2"> <i class="fa fa-plus-circle"></i> <?php echo e(get_phrase('Create Product')); ?></a>
        </div>
    </div>
    <!-- Product Listing Start -->
    <div class="product-listing">
        <div class="row g-3">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-6 col-md-4 col-lg-6 col-xl-4" id="product-<?php echo e($product->id); ?>">
                    <div class="card product p-3">
                        <div class="product-figure position-relative">
                            <a href="<?php echo e(route('single.product',$product->id)); ?>"><img src="<?php echo e(get_product_image($product->image,"thumbnail")); ?>" alt="" class="img-fluid"></a>
                            
                        </div>
                        <h3 class="h6"><a href="<?php echo e(route('single.product',$product->id)); ?>"> <?php echo e(ellipsis($product->title, 30)); ?> </a></h3>
                        <span class="location"><?php echo e($product->location); ?></span>
                        <div class="prodoct-footer">
                            <a href="<?php echo e(route('single.product',$product->id)); ?>" class="btn btn-primary"><?php echo e($product->getCurrency->symbol); ?> <?php echo e($product->price); ?></a>
                            <a href="javascript:void(0)"  onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.marketplace.edit_product', 'product_id' => $product->id] )); ?>', '<?php echo e(get_phrase('Edit Product')); ?>');" class="" data-bs-toggle="modal"
                                data-bs-target="#editEvent"><i class="fa fa-edit"></i></button>
                            <a href="javascript:void(0)" onclick="confirmAction('<?php echo route('product.delete', ['product_id' => $product->id]); ?>', true)" class=""><i class="fa fa-trash-can me-1"></i> </a>
                        </div>
                    </div>
                </div><!--  Single Product End -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/marketplace/user_products.blade.php ENDPATH**/ ?>