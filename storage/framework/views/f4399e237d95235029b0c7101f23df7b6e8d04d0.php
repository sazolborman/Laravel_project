<?php
    $event = \App\Models\Event::where('id',$event_id)->first();
?>

            
<form class="ajaxForm event-form" action="<?php echo e(route('event.update',$event->id)); ?>" method="POST" enctype="multipart/form-data" >
    <?php echo csrf_field(); ?>

    <div class="entry-header d-flex mb-10 justify-content-between">
        <div class="ava-info d-flex align-items-center">
            <div class="flex-shrink-0">
                <img src="<?php echo e(get_user_image(Auth()->user()->photo, 'optimized')); ?>" class="rounded-circle user_image_show_on_modal" alt="...">
            </div>
            <div class="ava-desc ms-2">
                <h3 class="mb-0 h6"><?php echo e(Auth::user()->name); ?></h3>
            </div>
        </div>
        <div class="post-controls dropdown">
            <select name="privacy" id="privacy" class="form-control bg-secondary">
                <option value="public" <?php $event->privacy=="public"?"selected":"" ?>>Public</option>
                <option value="private" <?php $event->privacy=="private"?"selected":"" ?>>Private</option>
            </select>
        </div>
    </div>

    <div class="form-group mt-3">
        <label for="#"><?php echo e(get_phrase('Event Name')); ?></label>
        <input type="text" name="eventname" value="<?php echo e($event->title); ?>" placeholder="Enter your event name">
    </div>
    <div class="row">
        <div class="form-group col-md-6 col-lg-6 col-sm-12">
            <label for="#"><?php echo e(get_phrase('Event Date')); ?></label>
            <input type="date" name="eventdate" value="<?php echo e($event->event_date); ?>" placeholder="Event Date">
        </div>
        <div class="form-group col-md-6 col-lg-6 col-sm-12">
            <label for="#"><?php echo e(get_phrase('Event Time')); ?></label>
            <input type="time" name="eventtime" value="<?php echo e($event->event_time); ?>" placeholder="Event Time">
        </div>
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Location')); ?></label>
        <input type="text" name="eventlocation" value="<?php echo e($event->location); ?>" placeholder="Enter your location">
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Event Description')); ?></label>
        <textarea name="description" class="content" id="description" cols="30" rows="10" placeholder="Description"> <?php echo e($event->description); ?></textarea>
    </div>

    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Previous Uploaded Image')); ?></label> <br>
        <img src="<?php echo e(viewImage('event',$event->banner,'coverphoto')); ?>" class="w-50"
                            alt="No Cover Photo Found">
    </div>
    
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Cover Photo')); ?></label>
        <div class="mb-3 mt-1 text-center">
            <input type="file" id="coverphoto" name="coverphoto" class="form-control w-100" name="profile_photo" accept="image/*">
        </div>
    </div>
    <div class="inline-btn mt-5">
        <button class="btn btn-primary w-100" type="submit" onclick="document.getElementById('description').value=CKEDITOR.instances.description.getData(); CKEDITOR.instances.description.destroy()"><?php echo e(get_phrase('Update Event')); ?></button>
    </div>
</form>

<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/events/edit_event.blade.php ENDPATH**/ ?>