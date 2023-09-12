<div class="settings-wraper">
    <div class="d-flex justify-content-between align-items-center flex-wrap g-20 pb-20">
        <h4 class="fz-20-b-22-black">Settings</h4>
    </div>

    <div class="alert alert-danger" role="alert">
        <span><strong>Note : </strong></span>&nbsp
        <span><strong>Make sure that the ( * ) marked fields are not left out.</strong></span>
    </div>


    <div class="seetings-tabs-wrapper">
        <ul class="nav nav-tabs eNav-Tabs-custom px-3 mb-5" id="myTab" role="tablist">
            <?php echo $__env->make('frontend.paid_content.setting_tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </ul>


        <?php
            $creator = DB::table('paid_content_creators')
                ->where('user_id', auth()->user()->id)
                ->first();
        ?>

        <div class="tab-content eNav-Tabs-content" id="myTabContent">
            <?php echo $__env->make('frontend.paid_content.profile_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('frontend.paid_content.email_notification_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('frontend.paid_content.social_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\resources\views/frontend/paid_content/settings.blade.php ENDPATH**/ ?>