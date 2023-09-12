
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4><?php echo e(get_phrase('Your ads')); ?></h4>
              
            </div>

            <div class="export-btn-area">
              <a href="<?php echo e(route('user.ad.create')); ?>" class="export_btn"><i class="fas fa-plus me-2"></i> <?php echo e(get_phrase('Create a new Ad')); ?></a>
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
            <table class="table eTable " id="">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col"><?php echo e(get_phrase('Image')); ?></th>
                  <th scope="col"><?php echo e(get_phrase('Title')); ?></th>
                  <th scope="col"><?php echo e(get_phrase('Start Date')); ?></th>
                  <th scope="col"><?php echo e(get_phrase('End Date')); ?></th>
                  <th scope="col"><?php echo e(get_phrase('Status')); ?></th>
                  <th scope="col" class="text-center"><?php echo e(get_phrase('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(++$key); ?></td>
                        <td>
                          <a href="<?php echo e($ad->ext_url); ?>" target="_blank"><img class="image-fluid" width="80px" src="<?php echo e(get_image('storage/sponsor/thumbnail/'.$ad->image)); ?>"></a>
                        </td>
                        <td><?php echo e($ad->name); ?></td>
                        <td><?php echo e(date_formatter($ad->start_date)); ?></td>
                        <td><?php echo e(date_formatter($ad->end_date)); ?></td>
                        <td>
                          <?php if($ad->status != 1): ?>
                            <span class="badge bg-secondary"><?php echo e(get_phrase('Disabled by administrator')); ?></span>
                          <?php elseif(strtotime($ad->start_date) == strtotime($ad->end_date)): ?>
                            <span class="badge bg-primary"><?php echo e(get_phrase('Not yet published')); ?></span>
                          <?php elseif(strtotime($ad->end_date) < time()): ?>
                            <span class="badge bg-danger"><?php echo e(get_phrase('Expired')); ?></span>
                          <?php else: ?>
                            <span class="badge bg-success"><?php echo e(get_phrase('Active')); ?></span>
                          <?php endif; ?>
                        </td>
                        
                        <td class="text-center">
                          <div class="adminTable-action">
                            <button type="button" class="eBtn eBtn-black dropdown-toggle table-action-btn-2" data-bs-toggle="dropdown" aria-expanded="false">
                              <?php echo e(get_phrase('Actions')); ?>

                            </button>
                            <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                              
                              <li><a class="dropdown-item" href="<?php echo e(route('user.ad.edit', $ad->id)); ?>"><?php echo e(get_phrase('Edit')); ?></a></li>

                              <?php if($ad->expiry_date < time() && $ad->status == 1): ?>
                                <li>
                                  <a href="javascript:;" class="dropdown-item" onclick="ajaxModal('<?php echo e(route('load_modal_content', ['backend.user.ad_activation', 'id' => $ad->id])); ?>', '<?php echo e(get_phrase('Ad activation')); ?>')">Active</a>
                                </li>
                              <?php endif; ?>

                              <li><a class="dropdown-item" onclick="return confirm('<?php echo e(get_phrase('Are You Sure Want To Delete?')); ?>')" href="<?php echo e(route('user.ad.delete', $ad->id)); ?>"><?php echo e(get_phrase('Delete')); ?></a></li>
                            </ul>
                          </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- End Admin area -->

   
    <!-- Start Footer -->
    <?php echo $__env->make('backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Footer -->
  </div>



<?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/backend/user/ads.blade.php ENDPATH**/ ?>