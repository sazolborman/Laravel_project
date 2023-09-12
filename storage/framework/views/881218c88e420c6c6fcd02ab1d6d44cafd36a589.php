<?php
    $raised_amount = $campaign->raised_amount;
    $goal_amount = $campaign->goal_amount;
    $value = ($raised_amount * 100) / $goal_amount;
    
    $postOfThisEvent = \App\Models\Posts::where('publisher', 'fundraiser')
        ->where('publisher_id', $campaign->id)
        ->first();
    if (!empty($postOfThisEvent->post_id)) {
        $postId = $postOfThisEvent->post_id;
    } else {
        $postId = 0;
    }
?>

<main class="main my-4">
    <div class="container">
        <div class="row">


            <div class="col-xl-8 col-lg-7 col-md-12 mb-4">
                <div class="fund-profile-area mb-4">
                    <input type="hidden" name="campaign_id" value="<?php echo e($campaign->id); ?>">
                    <!-- Profile Cover Photo -->
                    <div class="fund-profile-cover">
                        <?php if($campaign->cover_photo != ''): ?>
                            <img src="<?php echo e(asset('assets/frontend/images/campaign/' . $campaign->cover_photo)); ?>"
                                class="card-img-top" alt="blog">
                        <?php else: ?>
                            <img src="<?php echo e(asset('storage/blog/coverphoto/default/default.jpg')); ?>" class="card-img-top"
                                alt="blog">
                        <?php endif; ?>
                    </div>

                    <div class="fund-profile-info">
                        <div class="fund-profile-img">
                            <a href="#"><img src="<?php echo e(get_user_image($campaign->user_id, 'optimized')); ?>"
                                    alt="profile"></a>
                        </div>
                        <div class="found-profile-option d-flex justify-content-end">
                            <div class="post-controls dropdown dotted">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="profile-name-title">
                            <h1 class="text_22"><?php echo e($campaign->title); ?></h1>
                            <div class="profile-title-privacy  align-items-baseline">
                                <p class="text_16"><span>Fundraiser for</span> RSPCA Million Paws Walk <span>by</span>
                                    <?php echo e($campaign->name); ?> <a href="#"><img
                                            src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/privacy.svg')); ?>"
                                            alt="privacy"></a></p>

                            </div>
                        </div>
                        <div class="donate-share d-flex">
                            
                            <?php if($days_left > 0 && $campaign->user_id != auth()->user()->id): ?>
                                <a href="javascript: void(0);" class="btn_2"
                                    onclick="ajaxModal('<?php echo e(route('fundraiser.model', [$modal, 'id' => $campaign->id])); ?>','<?php echo e(get_phrase('Donate')); ?>')"><img
                                        src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/donate2.svg')); ?>"
                                        alt="">
                                    Donate</a>
                            <?php elseif($days_left > 0 && $campaign->user_id == auth()->user()->id): ?>
                            <?php else: ?>
                            <?php endif; ?>


                            
                            <?php if($days_left > 0): ?>
                                <span data-bs-toggle="modal" data-bs-target="">
                                    <a href="javascript:void(0)" class="btn_2 end_btn"
                                        onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId])); ?>', '<?php echo e(get_phrase('Share Canpaign')); ?>');"><img
                                            src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg')); ?>"
                                            alt="">
                                        <?php echo e(get_phrase('Share')); ?>

                                    </a>
                                </span>
                            <?php elseif($days_left <= 0): ?>
                                <br>
                            <?php else: ?>
                                <br>
                            <?php endif; ?>

                        </div>
                    </div>

                </div>


                <div class="fund-profile-goal-area m-0 mb-4">
                    <h3 class="text_22">Goal</h3>
                    <div class="goal-date">
                        <?php if($days_left > 0): ?>
                            <p class="text_16"><?php echo e($days_left); ?> <span>days left</span></p>
                        <?php else: ?>
                            <p class="text_16"> Campaign expired</p>
                        <?php endif; ?>
                    </div>
                    <div class="card-progress goal-progress d-flex justify-content-between align-items-center">
                        <progress id="progress_1" value="<?php echo e($value); ?>" max="100"></progress>
                        <p class="card-progress-value"><?php echo e(number_format($value, 2)); ?>%</p>
                    </div>
                    <div class="goal-raised">
                        <p class="pera_text">Raised : <span
                                class="<?php if($raised_amount == $goal_amount): ?> text_green <?php else: ?> text_purple <?php endif; ?>">$<?php echo e($raised_amount); ?></span>
                            . Goal :
                            <span class="text_green">$<?php echo e($goal_amount); ?>

                        </p>
                    </div>
                    <?php if($days_left > 0): ?>
                        <div class="goal-share-btn">
                            <a href="javascript:void(0)"
                                onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId])); ?>', '<?php echo e(get_phrase('Share Campaign')); ?>');"><img
                                    src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/share.svg')); ?>"
                                    alt="">
                                <?php echo e(get_phrase('Share')); ?>

                            </a>
                        </div>
                    <?php endif; ?>

                </div>


                <div class="fund-profile-about-area">
                    <h3 class="text_22">About</h3>
                    <div class="calender-date d-flex align-items-center" id="see-more-lines">
                        <img src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/calender.svg')); ?>"
                            alt="calender">
                        <p class="pera_text"><?php echo e(date('d-F-Y', strtotime($campaign->created_at))); ?></p>
                    </div>
                    <p class="pera_text pb-3 preview_tex"><?php echo e($campaign->description); ?></p>
                    <div class="about-see-more-btn">
                        <a href="#" class="text_16 text_purple" id="see-btn">See More</a>
                    </div>
                </div>
            </div>


            <div class="col-xl-4 col-lg-5 col-md-12">
                <div class="fundraiser-progress-area mb-4">
                    <div class="fund-progress-title">
                        <h3 class="text_22">Fundraiser Progress</h3>
                    </div>
                    <div class="fund-progress-wrap d-flex flex-wrap align-items-center">
                        <div class="fund-single-progress">
                            <h3 class="text_22"><?php echo e($donate); ?></h3>
                            <p class="pera_text">Donated</p>
                        </div>
                        <div class="fund-single-progress">
                            <?php
                                $invite = json_decode($fundraiser->invited);
                            ?>
                            <?php if($invite != ''): ?>
                                <h3 class="text_22"><?php echo e(count($invite)); ?></h3>
                            <?php else: ?>
                                <h3 class="text_22">0</h3>
                            <?php endif; ?>

                            <p class="pera_text">Invited</p>
                        </div>
                        <div class="fund-single-progress">
                            <h3 class="text_22"><?php echo e($sharecount); ?></h3>
                            <p class="pera_text">Shared</p>
                        </div>
                    </div>
                </div>

                <!-- Invite Friend -->
                <?php if($friendships->count() > 0): ?>
                    <div class="friend-invite-area mb-4">
                        <ul class="friend-invite-wrap custom_invited_card">

                            

                            <?php $__currentLoopData = $friendships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $friendship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($friendship->requester == $user_info->id): ?>
                                    <?php
                                        $friends_user_data = DB::table('users')
                                            ->where('id', $friendship->accepter)
                                            ->first();
                                    ?>
                                <?php else: ?>
                                    <?php
                                        $friends_user_data = DB::table('users')
                                            ->where('id', $friendship->requester)
                                            ->first();
                                    ?>
                                <?php endif; ?>



                                
                                <?php
                                    $invite_details = DB::table('invites')
                                        ->where('invite_reciver_id', $friends_user_data->id)
                                        ->where('fundraiser_id', $fundraiser->id)
                                        ->first();
                                ?>

                                <?php
                                    $number_of_friend_friends = json_decode($friends_user_data->friends);
                                    $number_of_my_friends = json_decode($user_info->friends);
                                    
                                    if (!is_array($number_of_friend_friends)) {
                                        $number_of_friend_friends = [];
                                    }
                                    if (!is_array($number_of_my_friends)) {
                                        $number_of_my_friends = [];
                                    }
                                    
                                    if ($friends_user_data->id == auth()->user()->id) {
                                        continue;
                                    }
                                    
                                $number_of_mutual_friends = count(array_intersect($number_of_friend_friends, $number_of_my_friends)); ?>
                                <div
                                    class="single-item-countable d-flex friend-item align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center w-100">
                                        <!-- Avatar -->
                                        <div class="avatar">
                                            <a href="<?php echo e(route('user.profile.view', $friends_user_data->id)); ?>"><img
                                                    class="avatar-img rounded-circle user_image_show_on_modal"
                                                    src="<?php echo e(get_user_image($friends_user_data->photo, 'optimized')); ?>"
                                                    alt="" height="40" width="40"></a>
                                        </div>
                                        <div class="avatar-info ms-2">
                                            <h6 class="mb-1"><a
                                                    href="<?php echo e(route('user.profile.view', $friends_user_data->id)); ?>"><?php echo e($friends_user_data->name); ?></a>
                                            </h6>
                                            <div class="activity-time small-text text-muted">
                                                <?php echo e($number_of_mutual_friends); ?>

                                                <?php echo e(get_phrase('Mutual Friends')); ?></div>
                                        </div>
                                    </div>
                                    <div class="invite_button_css">
                                        <?php if(
                                            !empty($invite_details) &&
                                                $invite_details->invite_reciver_id == $friends_user_data->id &&
                                                $invite_details->is_accepted != '1'): ?>
                                            <button class=" btn_invited">Invited</button>
                                        <?php elseif(
                                            !empty($invite_details) &&
                                                $invite_details->invite_reciver_id == $friends_user_data->id &&
                                                $invite_details->is_accepted == '1'): ?>
                                            <button class=" btn_invited">Invited </button>
                                        <?php else: ?>
                                            <a class="btn_2"
                                                href="<?php echo e(route('fundraiser.invited', ['invited_friend_id' => $friends_user_data->id, 'requester_id' => auth()->user()->id, 'fundraiser_id' => $fundraiser->id])); ?>">Invite</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            

                        </ul>
                        <div class="see-all-btn">
                            <?php if($friendships->count() > 2): ?>
                                <?php if(Route::currentRouteName() != 'fundraiser.friend'): ?>
                                    <a
                                        href="<?php echo e(route('fundraiser.friend', ['type' => 'seeAll', 'id' => $campaign->id])); ?>">
                                        See all friends</a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="javascript: void(0);" class="visibility-hidden">See all</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="created-owner-area">
                    <h3 class="text_22">Created by</h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="friend-name-img d-flex align-items-center">
                            <div class="friend-img">
                                <a href="#"><img src="<?php echo e(get_user_image($campaign->user_id, 'optimized')); ?>"
                                        alt="friend-img"></a>
                            </div>
                            <div class="friend-name">
                                <a href="#" class="text_15"><?php echo e($campaign->name); ?></a>
                            </div>
                        </div>
                        <?php if($user_data->id != auth()->user()->id): ?>
                            <a href="<?php echo e(route('chat', $user_data->id)); ?>" class="btn_2">Contact</a>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- container end -->
    <?php echo $__env->make('frontend.common_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('backend.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</main>

<script>
    $(document).ready(function() {
        var content = $('.preview_tex').height();
        $('.preview_tex').css('height', '130px');
        if (content > 110) {
            $('#see-btn').click(function(e) {
                e.preventDefault();
                $('.pera_text').removeClass('preview_tex');
                $('.pera_text').css('height', 'auto');
                $(this).remove();
            });
        } else {
            $('#see-btn').remove();
        }
    });
</script>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\1.6\resources\views/frontend/fundraiser/fundraiser_profile.blade.php ENDPATH**/ ?>