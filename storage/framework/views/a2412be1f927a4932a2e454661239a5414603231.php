<div class="bg-white px-3 mb-3 rounded-3 settings_tab">
    <ul class="nav nav-tabs eNav-Tabs-custom bg-transparent shadow-none border-0 m-0 p-0" id="myTab" role="tablist">
        <!-- Subscribed -->
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="valid-tab" data-bs-toggle="tab" data-bs-target="#valid" type="button"
                role="tab" aria-controls="valid" aria-selected="true">
                Subscribed
                <span></span>
            </button>
        </li>

        <!-- Expired -->
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="expired-tab" data-bs-toggle="tab" data-bs-target="#expired" type="button"
                role="tab" aria-controls="expired" aria-selected="true">
                Expired
                <span></span>
            </button>
        </li>
    </ul>
</div>

<div class="tabs-content">
    <div class="tab-content eNav-Tabs-content" id="myTabContent">
        <div class="tab-pane fade show active" id="valid" role="tabpanel" aria-labelledby="valid-tab">
            <?php echo $__env->make('frontend.paid_content.user_subscription_report', ['type' => 'valid'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="tab-pane fade" id="expired" role="tabpanel" aria-labelledby="expired-tab">
            <?php echo $__env->make('frontend.paid_content.user_subscription_report', ['type' => 'expired'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\resources\views/frontend/paid_content/user_subscription.blade.php ENDPATH**/ ?>