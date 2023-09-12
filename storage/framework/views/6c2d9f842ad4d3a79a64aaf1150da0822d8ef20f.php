<div class="product-details-wrap border p-3 rounded bg-white">
    <div class="product-header row">
        <div class="col-lg-6">
            <div id="carouselExampleIndicators" class="carousel slide product-slider"
                data-bs-ride="false">
                
                <div class="carousel-indicators">
                    <?php $__currentLoopData = $product_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide-to="<?php echo e($loop->index); ?>" class="<?php echo e($loop->index=='0'? "active":""); ?>" aria-current="true"
                        aria-label="Slide <?php echo e($loop->index+1); ?>"><img class="w-55 custome-height-50" src="<?php echo e(get_product_image($image->file_name,"thumbnail")); ?>" alt=""></button>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="carousel-inner">
                    <?php $__currentLoopData = $product_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?php echo e($loop->index=='0'? "active":""); ?>"  onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.marketplace.load_image', 'image' => $image->file_name])); ?>', '');">
                            <img class="rounded w-100" src="<?php echo e(get_product_image($image->file_name,"coverphoto")); ?>" alt=""> 
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <button class="carousel-control-prev" type="button"
                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"><?php echo e(get_phrase('Previous')); ?></span>
                </button>
                <button class="carousel-control-next" type="button"
                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"><?php echo e(get_phrase('Next')); ?></span>
                </button>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="product-info">
                <h1 class="product-title h4 fw-7"><?php echo e($product->title); ?></h1>
                <span class="pt-price text-primary sub-title"><?php echo e($product->getCurrency->symbol); ?> <?php echo e($product->price); ?></span>
                <p><?php echo e(get_phrase('Listed')); ?> <?php echo e($product->created_at->timezone(Auth::user()->timezone)->format("d-m-Y")); ?>  . <strong><?php echo e($product->location); ?></strong></p>
                <div class="pt-publisher <?php if(isset($_GET['shared'])): ?> hidden-on-shared-view <?php else: ?> d-flex <?php endif; ?> align-items-center justify-content-between">
                    <div class="pb-author d-flex align-items-center">
                        <img class="user_image_proifle_height" src="<?php echo e(get_user_image($product->getUser->photo, 'optimized')); ?>" alt="">
                        <div class="pb-info ms-2">
                            <p class="text-primary mb-0"><?php echo e(get_phrase('Published By')); ?></p>
                            <h3 class="h6"><?php echo e($product->getUser->name); ?></h3>
                        </div>
                    </div>
                    <div class="pb-share d-flex justify-content-between">
                        <?php if($product->user_id!=auth()->user()->id): ?>
                        
                        <?php endif; ?>
                        <span>
                            
                            <?php
                                $saved = \App\Models\SavedProduct::where('product_id',$product->id)->where('user_id',auth()->user()->id)->count();
                            ?>
                            <?php if($saved>0): ?>
                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('unsave.product.later',$product->id); ?>')"> <i class="fa-solid fa-link-slash"></i> </a>
                            <?php else: ?>
                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('save.product.later',$product->id); ?>')"> <i class="fa fa-bookmark"></i></a>
                            <?php endif; ?>
                        </span>
                        <span><a href="#" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'product_id' => $product->id] )); ?>', '<?php echo e(get_phrase('Share Product')); ?>');" ><i class="fa fa-share"></i></a></span>
                    </div>
                </div>
                <div class="pt-details <?php if(isset($_GET['shared'])): ?> hidden-on-shared-view <?php endif; ?>">
                    <h3 class="sub-title"><?php echo e(get_phrase('Details')); ?></h3>
                    <ul>
                        <li><?php echo e(get_phrase('Condition')); ?><span><?php echo e(ucfirst($product->condition)); ?></span></li>
                        <li><?php echo e(get_phrase('Status')); ?><span><?php echo e($product->status=='1'?"In Stock":"Out Of Stock"); ?></span></li>
                        <li><?php echo e(get_phrase('Category')); ?><span><?php echo e(ucfirst($product->getCategory->name)); ?></span></li>
                        <li><?php echo e(get_phrase('Brand')); ?><span><?php echo e(ucfirst($product->getBrand->name)); ?></span></li>
                        <li><a class="btn btn-primary" target="_blank" href="<?php echo e($product->buy_link); ?>"><?php echo e(get_phrase('Buy Now')); ?></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div> <!-- row end -->
    <div class="row <?php if(isset($_GET['shared'])): ?> hidden-on-shared-view <?php endif; ?>">
        <div class="col-lg-12">
            <div class="product-description my-3">
                <h3 class="sub-title"><?php echo e(get_phrase('Description')); ?></h3>
                <?php echo script_checker($product->description, false); ?>
            </div>
        </div>
    </div> <!-- row end -->
</div>
<?php if(isset($related_product)): ?>
<div class="related-prodcut bg-white p-3 border rounded my-3">
    <h3 class="sub-title"><?php echo e(get_phrase('Related Product')); ?></h3>
    <div class="rl-products owl-carousel">
        <?php $__currentLoopData = $related_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card product p-3">
                <div class="product-figure position-relative">
                    <a href="<?php echo e(route('single.product',$related_product->id)); ?>">
                        <div class="thumbnail-90-90" style="background-image: url('<?php echo e(get_product_image($related_product->image,'coverphoto')); ?>');"></div>
                    </a>
                    <?php if($related_product->user_id!=auth()->user()->id): ?>
                        <a class="message-trigger" href="<?php echo e(route('chat',['reciver'=>$related_product->user_id,'product'=>$related_product->id])); ?>"><i class="fa fa-message"></i></a>
                    <?php endif; ?>
                </div>
                <h3 class="h6"><a href="<?php echo e(route('single.product',$related_product->id)); ?>"> <?php echo e(ellipsis($related_product->title, 15)); ?></a></h3>
                <span class="location"><?php echo e($related_product->location); ?></span>
                <a href="<?php echo e(route('single.product',$related_product->id)); ?>" class="btn btn-primary d-block mt-3">$<?php echo e($related_product->price); ?></a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>


<?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/marketplace/single_product.blade.php ENDPATH**/ ?>