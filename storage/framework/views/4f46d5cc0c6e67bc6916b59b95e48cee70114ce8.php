
    <div class="page-wrap">
        <div class="card search-card p-4">
            <h3 class="sub-title"><?php echo e(get_phrase('Search Results')); ?></h3>
            <?php echo $__env->make('frontend.search.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div> <!-- Search Card End -->
       
        <div class="card p-3 mt-4">
            <h3 class="sub-title"><?php echo e(get_phrase('Marketplace')); ?></h3>
            <div class="row">
                <?php echo $__env->make('frontend.marketplace.product-single',['products'=>$products], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div> <!-- Marketplace card End -->
        
    </div>



    <?php echo $__env->make('frontend.main_content.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.common_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/search/product.blade.php ENDPATH**/ ?>