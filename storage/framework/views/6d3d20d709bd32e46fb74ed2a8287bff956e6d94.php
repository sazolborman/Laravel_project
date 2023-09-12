<?php
    $category = DB::table('fundraiser_categories')->get();
    $id = auth()->user()->id;
?>
<main class="main my-4">
    <div class="">
        <div class="fixsize">
            <div class="headline_size">
                <h3>Please fill in your information</h3>
            </div>
            <div class="campaign-form">
                <form action="<?php echo e(route('fundraiser.update', ['id' => $campaign_info->id])); ?>" method="post"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="up_user_id" value="<?php echo e($id); ?>">
                    <input type="hidden" id="up_id">

                    
                    <div class="title fund-form-group">
                        <label for="exampleFormControlInput1" class="form-label texts_size">Give your fundraiser a
                            title</label>
                        <div class="title-form-field">
                            <input type="text" name="up_title" class="form-control active"
                                id="exampleFormControlInput1" value="<?php echo e($campaign_info->title); ?>">
                            <h3 class="title-max-text">50</h3>
                        </div>

                    </div>
                    
                    <div class="fund-form-group">
                        <label for="exampleFormControlTextarea1" class="form-label texts_size">Example
                            textarea</label>
                        <textarea class="form-control" name="up_description" id="exampleFormControlTextarea1" value=""><?php echo e($campaign_info->description); ?></textarea>
                    </div>


                    
                    <div class="fund-form-group">
                        <label for="exampleFormControlInput1" class="form-label texts_size">Which category do you
                            select?</label>

                        <div class="starting-goal-input">
                            <select class="form-control text_16 " name="up_categories_id">
                                <option class="pera_text">Open this select menu</option>
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>"
                                        <?php if($row->id == $campaign_info->categories_id): ?> selected <?php endif; ?>><?php echo e($row->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>


                    
                    <div class="fund-form-group">
                        <label for="exampleFormControlInput1" class="form-label texts_size">How much would you like to
                            raise?</label>

                        <div class="starting-goal-input d-flex">
                            <input type="text" name="up_goal_amount" class="form-control text_16 "
                                placeholder="$50000" value="<?php echo e($campaign_info->goal_amount); ?>">
                            <h3 class="amount-add-btn">AUD</h3>
                        </div>
                    </div>


                    
                    <div class="fund-form-group">
                        <label for="exampleFormControlInput1" class="form-label texts_size">How long will the campaign
                            last?</label>
                        <div class="starting-goal-input">
                            <input value="<?php echo e(date('Y-m-d', strtotime($campaign_info->timestamp_end))); ?>" type="date"
                                name="up_timestamp_end" class="form-control text_16">
                        </div>
                    </div>


                    
                    <div class="fund-form-group">
                        <div>
                            <label for="exampleFormControlInput1" class="form-label texts_size">Add a cover photo or
                                video</label>
                        </div>
                        <div>
                            <div class="img-file-drag">
                                <div class="image-upload">
                                    <input type="file" name="cover_photo" id="logo" onchange="fileValue(this)">
                                    <label for="logo" class="upload-field" id="file-label">
                                        <div class="file-thumbnail">
                                            <?php if($campaign_info->cover_photo != ''): ?>
                                                <img id="image-preview"
                                                    src="<?php echo e(asset('assets/frontend/images/campaign/' . $campaign_info->cover_photo)); ?>"
                                                    class="card-img-top" alt="blog">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('storage/blog/coverphoto/default/default.jpg')); ?>"
                                                    class="card-img-top" alt="blog">
                                            <?php endif; ?>

                                            <h3 class="browse-option text_20">
                                                Drop your image here, or <span>browse</span>
                                            </h3>
                                            <p class="file-img-type">Supports; JPG, JPEG2000, PNG</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <input type="submit" class="btn_fundraiser" value="Update Fundraiser">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\1.6\resources\views/frontend/fundraiser/fundraiser_update_form.blade.php ENDPATH**/ ?>