<?php
    $page = \App\Models\Page::find($page_id);
?>
<img class="uploaded_place_here image-fluid rounded mb-5" width="100%" src="<?php echo e(get_page_cover_photo($page->coverphoto,"coverphoto")); ?>">

<form class="ajaxForm" action="<?php echo e(route('page.coverphoto',$page->id)); ?>" method="post" enctype="multipart/form-data">
	<?php echo csrf_field(); ?>
	<div class="mb-3">
		<label for="cover_photo"><?php echo e(get_phrase('Cover Photo')); ?></label>
		<input type="file" id="cover_photo" class="form-control border-0 bg-secondary" name="cover_photo" accept="image/*">
	</div>
	<div class="mb-3">
		<button class="btn btn-primary w-100" type="submit"><?php echo e(get_phrase('Upload')); ?></button>
	</div>
</form>

<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/pages/edit-cover-photo.blade.php ENDPATH**/ ?>