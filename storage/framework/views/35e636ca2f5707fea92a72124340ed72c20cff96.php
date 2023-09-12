<?php if($fundraiser_complete->count() > 0): ?>

    <div class="pb-20">
        <h4 class="fz-20-b-22-black">Complate Campaign</h4>
    </div>

    <div class="col-lg-12">
        <div class="complate-main-wrap">
            <?php $__currentLoopData = $fundraiser_complete; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $raised_amount = $row->raised_amount;
                    $goal_amount = $row->goal_amount;
                    $value = ($raised_amount * 100) / $goal_amount;
                    $id = $row->id;
                ?>
                <div class="blog-card blog-card-2">
                    <div class="card">
                        <div class="card-img">
                            <?php if($row->cover_photo != ''): ?>
                                <img src="<?php echo e(asset('assets/frontend/images/campaign/' . $row->cover_photo)); ?>"
                                    class="card-img-top" alt="blog">
                            <?php else: ?>
                                <img src="<?php echo e(asset('storage/blog/coverphoto/default/default.jpg')); ?>"
                                    class="card-img-top" alt="blog">
                            <?php endif; ?>
                            <div class="card-donate">
                                <img src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/donate.svg')); ?>"
                                    alt="donate">
                                <p class="donate-count">620</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="javascript: void(0);"
                                onclick="ajaxModal('<?php echo e(route('history.model', [$modal, 'id' => $row->id])); ?>','<?php echo e(get_phrase('Payment history')); ?>')">
                                <h5 class="card-title text_16 card_preview_title"><?php echo e($row->title); ?></h5>
                            </a>
                            <p class="card-text pera_text card_preview_text"><?php echo e($row->description); ?></p>
                            <div class="card-progress d-flex justify-content-between align-items-center">
                                <progress id="progress_1" value="<?php echo e($value); ?>" max="100"></progress>
                                <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%</p>
                            </div>
                            <div class="card-raised-area card-raised-area-2 d-flex justify-content-between">
                                <p class="pera_text">Raised : <span class="text_green">$<?php echo e($raised_amount); ?></span></p>
                                <p class="pera_text">Goal : <span class="text_green">$<?php echo e($goal_amount); ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php if(Route::currentRouteName() != 'campaign.history'): ?>
            <?php if($fundraiser_complete->count() > 4): ?>
                <div class="col-lg-12 mt-3 blog-see-more text-center">
                    <a href="<?php echo e(route('campaign.history', ['type' => 'histoty'])); ?>" id="see_more"
                        class="text_16 text_purple">
                        See all
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php echo $__env->make('frontend.common_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('backend.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php endif; ?>
<?php echo $__env->make('frontend.common_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backend.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\demo_sociopro1.6\resources\views/frontend/fundraiser/complate_campaign_history.blade.php ENDPATH**/ ?>