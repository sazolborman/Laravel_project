
<?php
$page = \App\Models\Page::find($page_id);
?>
<form class="" action="<?php echo e(route('page.update.info',$page->id)); ?>" method="POST" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<div class="form-group">
    <label for="#"><?php echo e(get_phrase('Job')); ?></label>
    <input type="text" class="" name="job" value="<?php echo e($page->job); ?>" placeholder="Enter your Job">
</div>
<div class="form-group">
    <label for="#"><?php echo e(get_phrase('Lifestyle')); ?></label>
    <input type="text" class="" name="lifestyle" value="<?php echo e($page->lifestyle); ?>" placeholder="Enter your Lifestyle">
</div>
<div class="form-group">
    <label for="#"><?php echo e(get_phrase('Location')); ?></label>
    <input type="text" class="" name="location" value="<?php echo e($page->location); ?>" placeholder="Enter your Location" >
</div>
<button type="submit" class="w-100 btn btn-primary"><?php echo e(get_phrase('Update Info')); ?></button>
</form>
<?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/pages/edit-page-info.blade.php ENDPATH**/ ?>