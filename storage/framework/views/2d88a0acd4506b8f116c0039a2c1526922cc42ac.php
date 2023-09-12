<?php
    $images = \App\Models\Album_image::where('album_id',$album_id)->get();
?>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="carousel-item <?php echo e($loop->index=="0" ? "active":""); ?>">
          <img src="<?php echo e(asset('storage/album/images/'.$image->image)); ?>" class="d-block w-100" alt="...">
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden"><?php echo e(get_phrase('Previous')); ?></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden"><?php echo e(get_phrase('Next')); ?></span>
  </button>
</div><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/groups/show_album.blade.php ENDPATH**/ ?>