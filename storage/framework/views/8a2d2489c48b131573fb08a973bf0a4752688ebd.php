<?php
    $fundraiser = DB::table('fundraisers')
        ->where('user_id', auth()->user()->id)
        ->exists();
    
    $donate = DB::table('fundraiser_donations')
        ->where('doner_id', auth()->user()->id)
        ->exists();
?>
<main class="main my-4">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header d-lg-none mb-3 py-4">
                        <div class="logo">
                            <a class="display-6" href="index.html">SocioPro</a>
                        </div>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body offcanvas-body-2">
                        <div class="timeline-search">
                            <h3 class="text_22">Fundraisers</h3>
                            <div class="gr-search">
                                <form action="<?php echo e(route('fundraiser.search')); ?> " mathod="get">
                                    <input type="text" id="search" name="search" class="bg-secondary rounded"
                                        placeholder="Search" value="<?php echo e(request('search')); ?>">
                                    <span class="i fa fa-search"></span>
                                </form>
                            </div>
                        </div>
                        <div class="timeline-navigation">
                            <!-- Sidebar Tab Button Area -->
                            <div class="blog-nav-tab">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">


                                    <a href="<?php echo e(route('fundraiser.index')); ?>" class="d-block w-100">
                                        <button
                                            class="nav-link custom_btn_1 w-100 <?php if(Route::currentRouteName() == 'fundraiser.index'): ?> active <?php endif; ?>"
                                            type="button">
                                            <img src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/explore.svg')); ?>"
                                                alt="explore">
                                            Explore Fundraisers
                                        </button>
                                    </a>


                                    <?php if($fundraiser || $donate): ?>
                                        <a href="<?php if($fundraiser): ?> <?php echo e(route('fundraiser.myactivity')); ?>

                                        <?php else: ?>
                                        <?php echo e(route('fundraiser.donor')); ?> <?php endif; ?>"
                                            class="d-block w-100">
                                            <button
                                                class="nav-link custom_btn_1 w-100 <?php if(Route::currentRouteName() == 'fundraiser.myacrivity'): ?> active <?php endif; ?>"
                                                type="button">
                                                <img src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/activity.svg')); ?>"
                                                    alt="explore">
                                                Your Activity
                                            </button>
                                        </a>
                                    <?php endif; ?>


                                    <a href="<?php echo e(route('fundraiser.category', ['type' => 'explore'])); ?>"
                                        class="d-block w-100">
                                        <button
                                            class="nav-link custom_btn_1 w-100 <?php if(Route::currentRouteName() == 'fundraiser.category'): ?> active <?php endif; ?>"
                                            type="button">
                                            <img src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/categories.svg')); ?>"
                                                alt="explore">
                                            Categories
                                        </button>
                                    </a>


                                    
                                </div>
                            </div>
                            <!-- Sidebar Footer Area -->
                            <div class="footer-nav">
                                <div class="footer-menu py-2">
                                    <ul>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">Developers</a></li>
                                        <li><a href="#">More</a></li>
                                    </ul>
                                </div>
                                <div class="copy-rights text-muted">
                                    <p>© 2022 Sociopro</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\demo_sociopro1.6\resources\views/frontend/fundraiser/left_navigation.blade.php ENDPATH**/ ?>