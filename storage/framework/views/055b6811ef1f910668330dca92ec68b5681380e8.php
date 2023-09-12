<div class="payment-history">
    <!-- Table -->
    <div class="table-responsive px-30 py-30 ">
        <table class="table eTable tableCustom">
            <!-- Table Head -->
            <thead>
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date Processed</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $phistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div class="mi-w-108">
                                <p class="m-0"><?php echo e(++$key); ?></p>
                            </div>
                        </td>
                        <td>
                            <div class="mi-w-110">
                                <p class="m-0"><?php echo e($row->name); ?></p>
                            </div>
                        </td>
                        <td>
                            <div class="mi-w-110">
                                <span class="m-0"><?php echo e($row->amount); ?></span>
                            </div>
                        </td>
                        <td>
                            <div class="mi-w-110">
                                <span class="t-badge"><?php echo e($row->created_at); ?></span>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\1.6\resources\views/frontend/fundraiser/history_modal.blade.php ENDPATH**/ ?>