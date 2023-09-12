<?php
    if ($type == 'valid') {
        $subscription = $valid;
    } else {
        $subscription = $expired;
    }
?>

<div class="bg-white">
    <?php if(count($subscription) > 0): ?>
        <div class="creator-items-wrap">
            <div class="content-area single-content-list user_subscription">
                <table class="table table-borderless">
                    <thead>
                        <tr class="table-heading">
                            <th scope="col">No</th>
                            <th scope="col">Creator</th>
                            <th scope="col" class="text-center">Joined</th>
                            <th scope="col" class="text-center">Expires</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">View Page</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $subscription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subscriber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="single-row">
                                <th scope="row">
                                    <div class="single-cell ps-md-3 d-flex align-items-center">
                                        <div class="cell-item">
                                            <p><?php echo e($subscription->firstItem() + $key); ?></p>
                                        </div>
                                    </div>
                                </th>
                                <td>
                                    <div class="single-cell">
                                        <div class="cell-item d-flex gap-3">
                                            <div class="list-img-pic">
                                                <img src="<?php echo e(get_user_image($subscriber->creator_id, 'optimized')); ?>"
                                                    height="100%">
                                            </div>
                                            <div>
                                                <?php
                                                    $info = App\Models\Users::where('id', $subscriber->creator_id)->first();
                                                ?>
                                                <h6><?php echo e($info->name); ?></h6>
                                                <p><?php echo e($info->email); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="single-cell flex-center">
                                        <div class="cell-item d-flex gap-3">
                                            <p>
                                                <?php echo e(date('d-m-Y', $subscriber->issue_date)); ?>

                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="single-cell flex-center">
                                        <div class="cell-item">
                                            <p class="issue-date">
                                                <?php echo e(date('d-m-Y', $subscriber->expire_date)); ?></p>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="single-cell flex-center">
                                        <div class="cell-item cell-item d-flex a;ign-items-center">
                                            <p>
                                                <?php if($subscriber->status == 0): ?>
                                                    <span class="badge rounded-pill bg-warning">Expired</span>
                                                <?php else: ?>
                                                    <span class="badge rounded-pill bg-primary">Valid</span>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="single-cell flex-center">
                                        <div class="cell-item cell-item d-flex a;ign-items-center">
                                            <?php
                                                $page = App\Models\PaidContentCreator::where('user_id', $subscriber->creator_id)->value('title');
                                            ?>
                                            <p>
                                                <a href="<?php echo e(route('page.view', ['page' => $page, 'id' => $subscriber->creator_id])); ?>"
                                                    class="btn btn-primary">View page</a>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>

                <div class="d-flex justify-content-end">
                    <?php echo e($subscription->links()); ?>

                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="no-package d-flex justify-content-center align-items-center mt-3">
            <p class="m-0 py-4">No subscriptions yet.</p>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\resources\views/frontend/paid_content/user_subscription_report.blade.php ENDPATH**/ ?>