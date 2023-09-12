<!-- In Progress Area  -->
<?php if($fundraiser_explore->count() > 0): ?>
    <div class="blog-area">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between blog-type">
                <h3 class="text_22">In Progress</h3>
                <a href="<?php echo e(route('fundraiser.create')); ?>" class="btn_1">Create Fundraise</a>
            </div>
            <!-- Single Blog Card -->
            <?php $__currentLoopData = $fundraiser_explore; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $raised_amount = $row->raised_amount;
                    $goal_amount = $row->goal_amount;
                    $value = ($raised_amount * 100) / $goal_amount;
                    $id = $row->id;
                    
                    $postOfThisEvent = \App\Models\Posts::where('publisher', 'fundraiser')
                        ->where('publisher_id', $id)
                        ->first();
                    if (!empty($postOfThisEvent->post_id)) {
                        $postId = $postOfThisEvent->post_id;
                    } else {
                        $postId = 0;
                    }
                ?>
                <div class="col-xl-4 col-lg-6 col-md-6 card_design">
                    <ul>
                        <li>
                            <div class="blog-card">
                                <div class="card custom_card">
                                    <div class="card-img">
                                        <?php if($row->cover_photo != ''): ?>
                                            <img src="<?php echo e(asset('assets/frontend/images/campaign/' . $row->cover_photo)); ?>"
                                                class="card-img-top" alt="blog">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('storage/blog/coverphoto/default/default.jpg')); ?>"
                                                class="card-img-top" alt="blog">
                                        <?php endif; ?>
                                        <div class="donate_card_1">
                                            <a href="javascript:void(0)" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"
                                                    style="color: #ffffff;"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                                <li>
                                                    <a href="<?php echo e(route('fundraiser.edit', ['id' => $id])); ?>"
                                                        class="dropdown-item btn btn-primary btn-sm"><i
                                                            class="fa fa-edit me-1"></i>
                                                        <?php echo e(get_phrase('Edit')); ?></a>
                                                </li>
                                                <li>


                                                    <a href="javascript:void(0)"
                                                        class="dropdown-item btn btn-primary btn-sm"
                                                        onclick="confirmAction('<?php echo route('explore.delete', ['id' => $row->id]); ?>')">
                                                        <i class="fa fa-trash me-1"></i>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a href="<?php echo e(route('fundraiser.profile', $id)); ?>">
                                            <h5 class="card-title text_16 campaign-title"><?php echo e($row->title); ?>

                                            </h5>
                                        </a>
                                        <p class="card-text pera_text card_preview_text">
                                            <?php echo e($row->description); ?></p>
                                        <div class="card-progress d-flex justify-content-between align-items-center">
                                            <progress id="progress_1" value="<?php echo e($value); ?>"
                                                max="100"></progress>
                                            <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%</p>
                                        </div>
                                        <div class="card-raised-area d-flex justify-content-between">
                                            <p class="pera_text">Raised : <span
                                                    class="text_purple">$<?php echo e($raised_amount); ?></span>
                                            </p>
                                            <p class="pera_text">Goal : <span
                                                    class="text_green">$<?php echo e($goal_amount); ?></span>
                                            </p>
                                        </div>
                                        <div class="in-process-btn d-flex justify-content-between">
                                            <a href="javascript:void(0)" class="custom-btn-2 btn"
                                                onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId])); ?>', '<?php echo e(get_phrase('Share Canpaign')); ?>');"><img
                                                    src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg')); ?>"
                                                    alt="">
                                                <?php echo e(get_phrase('Share')); ?>

                                            </a>


                                            <?php if($row->status == 0): ?>
                                                <a href="<?php echo e(route('fundraiser.status', ['id' => $id])); ?>"
                                                    class="btn  custom-btn-3">Active</a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('fundraiser.status', ['id' => $id])); ?>"
                                                    class="btn btn_1 disable_btn">Disable</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($fundraiser_explore->count() > 2): ?>
                <!-- See More Button -->
                <?php if(Route::currentRouteName() != 'campaign.type'): ?>
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="<?php echo e(route('campaign.type', ['type' => 'ongoing'])); ?>" id="see_more"
                            class="text_16 text_purple">
                            See all
                        </a>
                    </div>
                <?php endif; ?>


            <?php endif; ?>

        </div>
    </div>


<?php endif; ?>
<!-- Complate Area -->

<?php if($fundraiser_complete->count() > 0): ?>
    <div class="blog-area">
        <div class="row">
            <div class="blog-type col-lg-12">
                <h3 class="text_22">Complete</h3>
            </div>
            <!-- Single Blog Card -->
            <?php $__currentLoopData = $fundraiser_complete; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $raised_amount = $row->raised_amount;
                    $goal_amount = $row->goal_amount;
                    $value = ($raised_amount * 100) / $goal_amount;
                    $id = $row->id;
                    
                ?>
                <div class="col-xl-4 col-lg-6 col-md-6 card_design">
                    <div class="blog-card">
                        <div class="card custom_card">
                            <div class="card-img">
                                <?php if($row->cover_photo != ''): ?>
                                    <img src="<?php echo e(asset('assets/frontend/images/campaign/' . $row->cover_photo)); ?>"
                                        class="card-img-top" alt="blog">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('storage/blog/coverphoto/default/default.jpg')); ?>"
                                        class="card-img-top" alt="blog">
                                <?php endif; ?>
                                <div class="donate_card_1">
                                    <a href="javascript:void(0)" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical" style="color: #ffffff;"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                        <li>
                                            <a href="<?php echo e(route('fundraiser.edit', ['id' => $id])); ?>"
                                                class="dropdown-item btn btn-primary btn-sm"><i
                                                    class="fa fa-edit me-1"></i>
                                                <?php echo e(get_phrase('Edit')); ?></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="dropdown-item btn btn-primary btn-sm"
                                                onclick="confirmAction('<?php echo route('explore.delete', ['id' => $row->id]); ?>')">
                                                <i class="fa fa-trash me-1"></i>
                                                Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="<?php echo e(route('fundraiser.profile', $id)); ?>">
                                    <h5 class="card-title text_16 campaign-title"><?php echo e($row->title); ?>

                                    </h5>
                                </a>
                                <p class="card-text pera_text card_preview_text">
                                    <?php echo e($row->description); ?></p>
                                <div class="card-progress d-flex justify-content-between align-items-center">
                                    <progress id="progress_1" value="<?php echo e($value); ?>" max="100"></progress>
                                    <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%</p>
                                </div>
                                <div class="card-raised-area d-flex justify-content-between">
                                    <p class="pera_text">Raised : <span
                                            class="text_purple">$<?php echo e($raised_amount); ?></span>
                                    </p>
                                    <p class="pera_text">Goal : <span class="text_green">$<?php echo e($goal_amount); ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($fundraiser_complete->count() > 2): ?>
                <!-- See More Button -->
                <?php if(Route::currentRouteName() != 'campaign.type'): ?>
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="<?php echo e(route('campaign.type', ['type' => 'complate'])); ?>" id="see_more"
                            class="text_16 text_purple">

                            See all
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>

<?php echo $__env->make('frontend.common_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\demo_sociopro1.6\resources\views/frontend/fundraiser/activity_explore.blade.php ENDPATH**/ ?>