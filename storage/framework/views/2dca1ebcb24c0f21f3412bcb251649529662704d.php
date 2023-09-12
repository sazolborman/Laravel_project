<?php $__currentLoopData = $all_albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="single-item-countable col-6">
        <div class="card album-card">
            <div class="mb-2 position-relative"><img
                    src="<?php echo e(get_album_thumbnail($album->id, 'optimized')); ?>"
                    class="rounded img-fluid" alt="">
                <div class="post-controls dropdown dotted">
                    <a class="nav-link dropdown-toggle" href="#"
                        id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                    </a>
                    
                </div>
            </div>
            <div class="card-details">
                <h6><a href="#"><?php echo e($album->title); ?></a></h6>
                <span class="mute"><?php echo e(DB::table('album_images')->where('album_id', $album->id)->get()->count()); ?> <?php echo e(get_phrase('Items')); ?></span>
            </div>
        </div>
    </div> <!-- Card End -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/user/single_user/album_single.blade.php ENDPATH**/ ?>