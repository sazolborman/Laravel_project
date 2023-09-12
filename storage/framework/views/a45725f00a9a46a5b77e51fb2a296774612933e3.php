<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
                    <div class="d-flex flex-column">
                        <h4><?php echo e(get_phrase('Author Request')); ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
        <div class="col-12">
            <div class="eSection-wrap-2">
                <!-- Filter area -->

                <div class="table-responsive">
                    <table class="table eTable w-100" id="server_side_users_data">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(get_phrase('Name')); ?></th>
                                <th><?php echo e(get_phrase('Email')); ?></th>
                                <th><?php echo e(get_phrase('Status')); ?></th>
                                <th class="text-center"><?php echo e(get_phrase('Actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $info = DB::table('users')
                                        ->where('id', $author->user_id)
                                        ->first();
                                ?>
                                <tr>
                                    <td><?php echo e($authors->firstItem() + $key); ?></td>
                                    <td><?php echo e($info->name); ?></td>
                                    <td><?php echo e($info->email); ?></td>
                                    </td>
                                    <td class="status">
                                        <?php if($author->status > 0): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Deactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="adminTable-action me-auto">
                                            <button type="button"
                                                class="eBtn eBtn-black dropdown-toggle table-action-btn-2"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <?php echo e(get_phrase('Actions')); ?>

                                            </button>
                                            <ul
                                                class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">

                                                <li>
                                                    <a href="<?php echo e(route('author.review.request', $author->user_id)); ?>"
                                                        class="dropdown-item">
                                                        <?php echo e(get_phrase('Review')); ?>

                                                    </a>
                                                </li>

                                                <?php if($author->status > 0): ?>
                                                    <li>
                                                        <a href="<?php echo e(route('author.status', ['id' => $author->user_id, 'status' => 1])); ?>"
                                                            class="dropdown-item">
                                                            <?php echo e(get_phrase('Deactive')); ?>

                                                        </a>
                                                    </li>
                                                <?php else: ?>
                                                    <li>
                                                        <a href="<?php echo e(route('author.status', ['id' => $author->user_id, 'status' => 0])); ?>"
                                                            class="dropdown-item">
                                                            <?php echo e(get_phrase('Active')); ?>

                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <li>
                                                    <a href="<?php echo e(route('author.delete', $author->user_id)); ?>"
                                                        class="dropdown-item">
                                                        <?php echo e(get_phrase('Delete')); ?>

                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-end">
                        <?php echo e($authors->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\resources\views/backend/admin/paid_content/author_list.blade.php ENDPATH**/ ?>