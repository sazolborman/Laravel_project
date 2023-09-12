<!-- Explore Tab Content -->
<!-- Popular Area -->
<div class="blog-area">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between blog-type">
            <?php if($popular->count() > 0): ?>
                <h3 class="text_22">Popular</h3>
            <?php else: ?>
                <h3></h3>
            <?php endif; ?>
            <a href="<?php echo e(route('fundraiser.create')); ?>" class="btn_1">Create Fundraise</a>
        </div>
        <?php if($popular->count() > 0): ?>
            <!-- Single Blog Card -->
            <?php $__currentLoopData = $popular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $days = round((strtotime($row->timestamp_end) - strtotime($row->created_at)) / (3600 * 24));
                    $days_left = (int) $days;
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
                <div class="col-xl-4 col-lg-6 col-md-6">
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
                                <div class="card-donate">
                                    <img src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/donate.svg')); ?>"
                                        alt="donate">
                                    <p class="donate-count">520</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="<?php echo e(route('fundraiser.profile', $id)); ?>">
                                    <h5 class="card-title text_16 campaign-title"><?php echo e($row->title); ?></h5>
                                </a>
                                <p class="card-text pera_text card_preview_text"><?php echo e($row->description); ?></p>

                                <?php if($raised_amount == $goal_amount): ?>
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="<?php echo e($value); ?>" max="100"></progress>
                                        <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%</p>
                                    </div>
                                <?php else: ?>
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="<?php echo e($value); ?>" max="100"></progress>
                                        <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%</p>
                                    </div>
                                <?php endif; ?>


                                <div class="card-raised-area d-flex justify-content-between">
                                    <p class="pera_text">Raised : <span
                                            class="<?php if($raised_amount == $goal_amount): ?> text_green <?php else: ?> text_purple <?php endif; ?> ">$<?php echo e($raised_amount); ?></span>
                                    </p>
                                    <p class="pera_text">Goal : <span class="text_green">$<?php echo e($goal_amount); ?></span>
                                    </p>
                                </div>
                                <?php if($days_left <= 0): ?>
                                    <a href="javascript:void(0)" class=" custom-btn-1 btn"><img
                                            src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg')); ?>"
                                            alt="">
                                        <?php echo e(get_phrase('Share')); ?>

                                    </a>
                                <?php else: ?>
                                    <a href="javascript:void(0)" class=" custom-btn-2 btn"
                                        onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId])); ?>', '<?php echo e(get_phrase('Share Campaign')); ?>');"><img
                                            src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg')); ?>"
                                            alt="">
                                        <?php echo e(get_phrase('Share')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($popular->count() > 2): ?>
                <!-- See More Button -->
                <?php if(Route::currentRouteName() != 'campaign.category'): ?>
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="<?php echo e(route('campaign.category', ['type' => 'popular'])); ?>" id="see_more"
                            class="text_16 text_purple">
                            See all
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

        
        <?php if($animal->count() > 0): ?>
            <div class="col-lg-12 d-flex justify-content-between blog-type">
                <h3 class="text_22">Animals</h3>

            </div>
            <!-- Single Blog Card -->
            <?php $__currentLoopData = $animal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $days = round((strtotime($row->timestamp_end) - strtotime($row->created_at)) / (3600 * 24));
                    $days_left = (int) $days;
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
                <div class="col-xl-4 col-lg-6 col-md-6">
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
                                <div class="card-donate">
                                    <img src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/donate.svg')); ?>"
                                        alt="donate">
                                    <p class="donate-count">520</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="<?php echo e(route('fundraiser.profile', $id)); ?>">
                                    <h5 class="card-title text_16 campaign-title"><?php echo e($row->title); ?></h5>
                                </a>
                                <p class="card-text pera_text card_preview_text"><?php echo e($row->description); ?></p>

                                <?php if($raised_amount == $goal_amount): ?>
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="<?php echo e($value); ?>"
                                            max="100"></progress>
                                        <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%</p>
                                    </div>
                                <?php else: ?>
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="<?php echo e($value); ?>"
                                            max="100"></progress>
                                        <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%</p>
                                    </div>
                                <?php endif; ?>


                                <div class="card-raised-area d-flex justify-content-between">
                                    <p class="pera_text">Raised : <span
                                            class="<?php if($raised_amount == $goal_amount): ?> text_green <?php else: ?> text_purple <?php endif; ?> ">$<?php echo e($raised_amount); ?></span>
                                    </p>
                                    <p class="pera_text">Goal : <span class="text_green">$<?php echo e($goal_amount); ?></span>
                                    </p>
                                </div>
                                <?php if($days_left <= 0): ?>
                                    <a href="javascript:void(0)" class=" custom-btn-1 btn"><img
                                            src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg')); ?>"
                                            alt="">
                                        <?php echo e(get_phrase('Share')); ?>

                                    </a>
                                <?php else: ?>
                                    <a href="javascript:void(0)" class=" custom-btn-2 btn"
                                        onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId])); ?>', '<?php echo e(get_phrase('Share Campaign')); ?>');"><img
                                            src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg')); ?>"
                                            alt="">
                                        <?php echo e(get_phrase('Share')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($animal->count() > 2): ?>
                <!-- See More Button -->
                <?php if(Route::currentRouteName() != 'campaign.category'): ?>
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="<?php echo e(route('campaign.category', ['type' => 'animal'])); ?>" id="see_more"
                            class="text_16 text_purple">
                            See all
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

        
        <?php if($culture->count() > 0): ?>
            <div class="col-lg-12 d-flex justify-content-between blog-type">
                <h3 class="text_22">Arts And Culture</h3>
            </div>
            <!-- Single Blog Card -->
            <?php $__currentLoopData = $culture; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $days = round((strtotime($row->timestamp_end) - strtotime($row->created_at)) / (3600 * 24));
                    $days_left = (int) $days;
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
                <div class="col-xl-4 col-lg-6 col-md-6">
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
                                <div class="card-donate">
                                    <img src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/donate.svg')); ?>"
                                        alt="donate">
                                    <p class="donate-count">520</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="<?php echo e(route('fundraiser.profile', $id)); ?>">
                                    <h5 class="card-title text_16 campaign-title"><?php echo e($row->title); ?></h5>
                                </a>
                                <p class="card-text pera_text card_preview_text"><?php echo e($row->description); ?></p>

                                <?php if($raised_amount == $goal_amount): ?>
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="<?php echo e($value); ?>"
                                            max="100"></progress>
                                        <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%</p>
                                    </div>
                                <?php else: ?>
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="<?php echo e($value); ?>"
                                            max="100"></progress>
                                        <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%</p>
                                    </div>
                                <?php endif; ?>


                                <div class="card-raised-area d-flex justify-content-between">
                                    <p class="pera_text">Raised : <span
                                            class="<?php if($raised_amount == $goal_amount): ?> text_green <?php else: ?> text_purple <?php endif; ?> ">$<?php echo e($raised_amount); ?></span>
                                    </p>
                                    <p class="pera_text">Goal : <span class="text_green">$<?php echo e($goal_amount); ?></span>
                                    </p>
                                </div>
                                <?php if($days_left <= 0): ?>
                                    <a href="javascript:void(0)" class=" custom-btn-1 btn"><img
                                            src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg')); ?>"
                                            alt="">
                                        <?php echo e(get_phrase('Share')); ?>

                                    </a>
                                <?php else: ?>
                                    <a href="javascript:void(0)" class=" custom-btn-2 btn"
                                        onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId])); ?>', '<?php echo e(get_phrase('Share Campaign')); ?>');"><img
                                            src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg')); ?>"
                                            alt="">
                                        <?php echo e(get_phrase('Share')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- See More Button -->
            <?php if($culture->count() > 2): ?>
                <!-- See More Button -->
                <?php if(Route::currentRouteName() != 'campaign.category'): ?>
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="<?php echo e(route('campaign.category', ['type' => 'culture'])); ?>" id="see_more"
                            class="text_16 text_purple">
                            See all
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

        
        <?php if($business->count() > 0): ?>
            <div class="col-lg-12 d-flex justify-content-between blog-type">
                <h3 class="text_22">Business</h3>
            </div>
            <!-- Single Blog Card -->
            <?php $__currentLoopData = $business; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $days = round((strtotime($row->timestamp_end) - strtotime($row->created_at)) / (3600 * 24));
                    $days_left = (int) $days;
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
                <div class="col-xl-4 col-lg-6 col-md-6">
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
                                <div class="card-donate">
                                    <img src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/donate.svg')); ?>"
                                        alt="donate">
                                    <p class="donate-count">520</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="<?php echo e(route('fundraiser.profile', $id)); ?>">
                                    <h5 class="card-title text_16 campaign-title"><?php echo e($row->title); ?></h5>
                                </a>
                                <p class="card-text pera_text card_preview_text"><?php echo e($row->description); ?></p>

                                <?php if($raised_amount == $goal_amount): ?>
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="<?php echo e($value); ?>"
                                            max="100"></progress>
                                        <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%</p>
                                    </div>
                                <?php else: ?>
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="<?php echo e($value); ?>"
                                            max="100"></progress>
                                        <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%p>
                                    </div>
                                <?php endif; ?>


                                <div class="card-raised-area d-flex justify-content-between">
                                    <p class="pera_text">Raised : <span
                                            class="<?php if($raised_amount == $goal_amount): ?> text_green <?php else: ?> text_purple <?php endif; ?> ">$<?php echo e($raised_amount); ?></span>
                                    </p>
                                    <p class="pera_text">Goal : <span class="text_green">$<?php echo e($goal_amount); ?></span>
                                    </p>
                                </div>
                                <?php if($days_left <= 0): ?>
                                    <a href="javascript:void(0)" class=" custom-btn-1 btn"><img
                                            src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg')); ?>"
                                            alt="">
                                        <?php echo e(get_phrase('Share')); ?>

                                    </a>
                                <?php else: ?>
                                    <a href="javascript:void(0)" class=" custom-btn-2 btn"
                                        onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId])); ?>', '<?php echo e(get_phrase('Share Campaign')); ?>');"><img
                                            src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg')); ?>"
                                            alt="">
                                        <?php echo e(get_phrase('Share')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($business->count() > 2): ?>
                <!-- See More Button -->
                <?php if(Route::currentRouteName() != 'campaign.category'): ?>
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="<?php echo e(route('campaign.category', ['type' => 'business'])); ?>" id="see_more"
                            class="text_16 text_purple">
                            See all
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>


        
        <?php if($community->count() > 0): ?>
            <div class="col-lg-12 d-flex justify-content-between blog-type">
                <h3 class="text_22">Community & Social Action</h3>
            </div>
            <!-- Single Blog Card -->
            <?php $__currentLoopData = $community; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $days = round((strtotime($row->timestamp_end) - strtotime($row->created_at)) / (3600 * 24));
                    $days_left = (int) $days;
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
                <div class="col-xl-4 col-lg-6 col-md-6">
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
                                <div class="card-donate">
                                    <img src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/donate.svg')); ?>"
                                        alt="donate">
                                    <p class="donate-count">520</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="<?php echo e(route('fundraiser.profile', $id)); ?>">
                                    <h5 class="card-title text_16 campaign-title"><?php echo e($row->title); ?></h5>
                                </a>
                                <p class="card-text pera_text card_preview_text"><?php echo e($row->description); ?></p>

                                <?php if($raised_amount == $goal_amount): ?>
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="<?php echo e($value); ?>"
                                            max="100"></progress>
                                        <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%</p>
                                    </div>
                                <?php else: ?>
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="<?php echo e($value); ?>"
                                            max="100"></progress>
                                        <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%</p>
                                    </div>
                                <?php endif; ?>


                                <div class="card-raised-area d-flex justify-content-between">
                                    <p class="pera_text">Raised : <span
                                            class="<?php if($raised_amount == $goal_amount): ?> text_green <?php else: ?> text_purple <?php endif; ?> ">$<?php echo e($raised_amount); ?></span>
                                    </p>
                                    <p class="pera_text">Goal : <span class="text_green">$<?php echo e($goal_amount); ?></span>
                                    </p>
                                </div>
                                <?php if($days_left <= 0): ?>
                                    <a href="javascript:void(0)" class=" custom-btn-1 btn"><img
                                            src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg')); ?>"
                                            alt="">
                                        <?php echo e(get_phrase('Share')); ?>

                                    </a>
                                <?php else: ?>
                                    <a href="javascript:void(0)" class=" custom-btn-2 btn"
                                        onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId])); ?>', '<?php echo e(get_phrase('Share Campaign')); ?>');"><img
                                            src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg')); ?>"
                                            alt="">
                                        <?php echo e(get_phrase('Share')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($community->count() > 2): ?>
                <!-- See More Button -->
                <?php if(Route::currentRouteName() != 'campaign.category'): ?>
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="<?php echo e(route('campaign.category', ['type' => 'community'])); ?>" id="see_more"
                            class="text_16 text_purple">
                            See all
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

        
        <?php if($crisis->count() > 0): ?>
            <div class="col-lg-12 d-flex justify-content-between blog-type">
                <h3 class="text_22">Crisis Relief</h3>
            </div>
            <!-- Single Blog Card -->
            <?php $__currentLoopData = $crisis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $days = round((strtotime($row->timestamp_end) - strtotime($row->created_at)) / (3600 * 24));
                    $days_left = (int) $days;
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
                <div class="col-xl-4 col-lg-6 col-md-6">
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
                                <div class="card-donate">
                                    <img src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/donate.svg')); ?>"
                                        alt="donate">
                                    <p class="donate-count">520</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="<?php echo e(route('fundraiser.profile', $id)); ?>">
                                    <h5 class="card-title text_16 campaign-title"><?php echo e($row->title); ?></h5>
                                </a>
                                <p class="card-text pera_text card_preview_text"><?php echo e($row->description); ?></p>

                                <?php if($raised_amount == $goal_amount): ?>
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="<?php echo e($value); ?>"
                                            max="100"></progress>
                                        <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%</p>
                                    </div>
                                <?php else: ?>
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="<?php echo e($value); ?>"
                                            max="100"></progress>
                                        <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%</p>
                                    </div>
                                <?php endif; ?>


                                <div class="card-raised-area d-flex justify-content-between">
                                    <p class="pera_text">Raised : <span
                                            class="<?php if($raised_amount == $goal_amount): ?> text_green <?php else: ?> text_purple <?php endif; ?> ">$<?php echo e($raised_amount); ?></span>
                                    </p>
                                    <p class="pera_text">Goal : <span class="text_green">$<?php echo e($goal_amount); ?></span>
                                    </p>
                                </div>
                                <?php if($days_left <= 0): ?>
                                    <a href="javascript:void(0)" class=" custom-btn-1 btn"><img
                                            src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg')); ?>"
                                            alt="">
                                        <?php echo e(get_phrase('Share')); ?>

                                    </a>
                                <?php else: ?>
                                    <a href="javascript:void(0)" class=" custom-btn-2 btn"
                                        onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId])); ?>', '<?php echo e(get_phrase('Share Campaign')); ?>');"><img
                                            src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg')); ?>"
                                            alt="">
                                        <?php echo e(get_phrase('Share')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($crisis->count() > 2): ?>
                <!-- See More Button -->
                <?php if(Route::currentRouteName() != 'campaign.category'): ?>
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="<?php echo e(route('campaign.category', ['type' => 'crisis'])); ?>" id="see_more"
                            class="text_16 text_purple">
                            See all
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

        
        <?php if($education->count() > 0): ?>
            <div class="col-lg-12 d-flex justify-content-between blog-type">
                <h3 class="text_22">Education</h3>
            </div>
            <!-- Single Blog Card -->
            <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $days = round((strtotime($row->timestamp_end) - strtotime($row->created_at)) / (3600 * 24));
                    $days_left = (int) $days;
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
                <div class="col-xl-4 col-lg-6 col-md-6">
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
                                <div class="card-donate">
                                    <img src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/donate.svg')); ?>"
                                        alt="donate">
                                    <p class="donate-count">520</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="<?php echo e(route('fundraiser.profile', $id)); ?>">
                                    <h5 class="card-title text_16 campaign-title"><?php echo e($row->title); ?></h5>
                                </a>
                                <p class="card-text pera_text card_preview_text"><?php echo e($row->description); ?></p>

                                <?php if($raised_amount == $goal_amount): ?>
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="<?php echo e($value); ?>"
                                            max="100"></progress>
                                        <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%</p>
                                    </div>
                                <?php else: ?>
                                    <div class="card-progress d-flex justify-content-between align-items-center">
                                        <progress id="progress_1" value="<?php echo e($value); ?>"
                                            max="100"></progress>
                                        <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%</p>
                                    </div>
                                <?php endif; ?>


                                <div class="card-raised-area d-flex justify-content-between">
                                    <p class="pera_text">Raised : <span
                                            class="<?php if($raised_amount == $goal_amount): ?> text_green <?php else: ?> text_purple <?php endif; ?> ">$<?php echo e($raised_amount); ?></span>
                                    </p>
                                    <p class="pera_text">Goal : <span class="text_green">$<?php echo e($goal_amount); ?></span>
                                    </p>
                                </div>
                                <?php if($days_left <= 0): ?>
                                    <a href="javascript:void(0)" class=" custom-btn-1 btn"><img
                                            src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg')); ?>"
                                            alt="">
                                        <?php echo e(get_phrase('Share')); ?>

                                    </a>
                                <?php else: ?>
                                    <a href="javascript:void(0)" class=" custom-btn-2 btn"
                                        onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId])); ?>', '<?php echo e(get_phrase('Share Campaign')); ?>');"><img
                                            src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg')); ?>"
                                            alt="">
                                        <?php echo e(get_phrase('Share')); ?>


                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($education->count() > 2): ?>
                <!-- See More Button -->
                <?php if(Route::currentRouteName() != 'campaign.category'): ?>
                    <div class="col-lg-12 mt-3 blog-see-more">
                        <a href="<?php echo e(route('campaign.category', ['type' => 'education'])); ?>" id="see_more"
                            class="text_16 text_purple">
                            See all
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\demo_sociopro1.6\resources\views/frontend/fundraiser/explore_tab.blade.php ENDPATH**/ ?>