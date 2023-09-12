<?php
    if (Schema::hasTable('paid_content_creators')) {
        $creator = DB::table('paid_content_creators')
            ->where('user_id', auth()->user()->id)
            ->where('status', 1)
            ->exists();
    } else {
        $creator = false;
    }
    $fundraiser = DB::table('fundraisers')
        ->where('user_id', auth()->user()->id)
        ->exists();
    
    $donate = DB::table('fundraiser_donations')
        ->where('doner_id', auth()->user()->id)
        ->exists();
?>

<div class="menu-panel">
    <div class="user-profile">
        <div class="user-image">
            <img src="<?php echo e(get_user_image(auth()->user()->id, 'optimized')); ?>" width="100%">
        </div>
        <div class="user-details">
            <h4 class="m-0"><?php echo e($user_info->name); ?></h4>
            <p class="mb-1"><?php echo e($user_info->email); ?></p>
        </div>

        <div class="user-settings">
            <div class="rounded-pill border border-dark px-4 py-2 d-flex align-items-center gap-2"
                style="font-size: 14px; font-weight: 400">
                <span>
                    <i class="fa-solid fa-gear text-muted"></i>
                </span>
                <a href="<?php echo e(route('user.settings')); ?>" class="text-muted">Settings</a>
            </div>
        </div>
    </div>
    <div class="menu-items">
        <ul class="pc-menu m-0 p-0">
            <!-- menu item one -->

            <?php if(addon_status('paid_content') == 1): ?>
                <li class="menu-item <?php if(Route::currentRouteName() == 'creator.payout' ||
                        Route::currentRouteName() == 'subscriber.list' ||
                        Route::currentRouteName() == 'user.subscription' ||
                        Route::currentRouteName() == 'subscription.payment'): ?> active <?php endif; ?>">
                    <a href="javascript: void(0);" class="menu-title text-black">
                        <span>Paid Content</span>
                        <i class="fa-solid fa-angle-up"></i>
                    </a>

                    <!-- menu dropdown item -->
                    <ul class="pc-dropdown-menu">

                        <!-- dropdown menu -->
                        <li class="dropdown-menu-item <?php if(Route::currentRouteName() == 'creator.payout' || Route::currentRouteName() == 'subscriber.list'): ?> active <?php endif; ?>">
                            <a href="javascript: void(0);"
                                <?php if(!$creator): ?> data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="For creators only." class="d-flex justify-content-between creator-only" <?php else: ?> class="dropdown-menu-title" <?php endif; ?>>
                                <span>Creator Panel</span>
                                <i class="fa-solid fa-angle-up"></i>
                            </a>
                            <?php if($creator): ?>
                                <!-- dropdown submenu item -->
                                <ul class="pc-dropdown-submenu">
                                    <li class="dropdown-submenu-item <?php if(Route::currentRouteName() == 'subscriber.list'): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route('subscriber.list')); ?>">Subscribes</a>
                                    </li>
                                    <li class="dropdown-submenu-item <?php if(Route::currentRouteName() == 'creator.payout'): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route('creator.payout')); ?>">Payout report</a>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        </li>


                        <?php if(!$creator): ?>
                            <!-- dropdown menu -->
                            <li class="dropdown-menu-item <?php if(Route::currentRouteName() == 'user.subscription' || Route::currentRouteName() == 'subscription.payment'): ?> active <?php endif; ?>">
                                <a href="javascript: void(0);" class="dropdown-menu-title">
                                    <span>Customer Panel</span>
                                    <i class="fa-solid fa-angle-up"></i>
                                </a>

                                <!-- dropdown submenu item -->
                                <ul class="pc-dropdown-submenu">
                                    <li class="dropdown-submenu-item <?php if(Route::currentRouteName() == 'user.subscription'): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route('user.subscription')); ?>">Subscriptions</a>
                                    </li>
                                    <li class="dropdown-submenu-item <?php if(Route::currentRouteName() == 'subscription.payment'): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route('subscription.payment')); ?>">Payment History</a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


            <?php if(addon_status('fundraiser') == 1): ?>
                <li class="menu-item <?php if(Route::currentRouteName() == 'fundraiser.myactivity' ||
                        Route::currentRouteName() == 'fundraiser.payment' ||
                        Route::currentRouteName() == 'fundraiser.donor' ||
                        Route::currentRouteName() == 'campaign.type' ||
                        Route::currentRouteName() == 'donor.history' ||
                        Route::currentRouteName() == 'campaign.history'): ?> active <?php endif; ?>">
                    <a href="javascript: void(0);" class="menu-title text-black">
                        <span>Fundraiser</span>
                        <i class="fa-solid fa-angle-up"></i>
                    </a>

                    <!-- menu dropdown item -->
                    <ul class="pc-dropdown-menu ">

                        <?php if($fundraiser): ?>
                            <!-- dropdown menu -->
                            <li class="dropdown-menu-item <?php if(Route::currentRouteName() == 'fundraiser.myactivity' ||
                                    Route::currentRouteName() == 'campaign.type' ||
                                    Route::currentRouteName() == 'fundraiser.payment' ||
                                    Route::currentRouteName() == 'campaign.history'): ?> active <?php endif; ?>">
                                <a href="javascript: void(0);" class="dropdown-menu-title">
                                    <span>Fundraise Panel</span>
                                    <i class="fa-solid fa-angle-up"></i>
                                </a>

                                <!-- dropdown submenu item -->
                                <ul class="pc-dropdown-submenu ">
                                    <li class="dropdown-submenu-item <?php if(Route::currentRouteName() == 'fundraiser.myactivity' || Route::currentRouteName() == 'campaign.type'): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route('fundraiser.myactivity')); ?>">My Activities</a>
                                    </li>
                                    <li class="dropdown-submenu-item <?php if(Route::currentRouteName() == 'fundraiser.payment' || Route::currentRouteName() == 'campaign.history'): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route('fundraiser.payment')); ?>">Payment History</a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if($donate): ?>
                            <!-- dropdown menu -->
                            <li class="dropdown-menu-item <?php if(Route::currentRouteName() == 'fundraiser.donor' || Route::currentRouteName() == 'donor.history'): ?> active <?php endif; ?>">
                                <a href="<?php echo e(route('fundraiser.donor')); ?>" class="dropdown-menu-title">
                                    <span>Donor Panel</span>
                                    <i class="fa-solid fa-angle-up"></i>
                                </a>

                                <!-- dropdown submenu item -->
                                <ul class="pc-dropdown-submenu ">
                                    <li class="dropdown-submenu-item <?php if(Route::currentRouteName() == 'donor.history'): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route('donor.history')); ?>">Payment History</a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

        </ul>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\demo_sociopro1.6\resources\views/frontend/addons/left_sidebar.blade.php ENDPATH**/ ?>