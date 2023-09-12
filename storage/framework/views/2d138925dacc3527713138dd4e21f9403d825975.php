    <div class="user_settings">

        <div class="bg-white px-3 mb-3 rounded-3 settings_tab">
            <?php echo $__env->make('frontend.addons.user_setting_tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="tabs-content">
            <div class="tab-content eNav-Tabs-content" id="myTabContent">
                <?php echo $__env->make('frontend.addons.payment_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\resources\views/frontend/addons/user_settings.blade.php ENDPATH**/ ?>