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
                <form action="<?php echo e(route('fundraiser.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>



                    
                    <div class="title fund-form-group">
                        <label for="exampleFormControlInput1" class="form-label texts_size">Give your fundraiser a
                            title</label>
                        <div class="title-form-field">
                            <input type="text" name="title" class="form-control active"
                                id="exampleFormControlInput1" placeholder="Donate to help..."
                                value="<?php echo e(old('title')); ?>">
                            <h3 class="title-max-text">50</h3>
                        </div>
                        <small class="text-danger">
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <?php echo e($message); ?>

                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </small>
                    </div>
                    
                    <div class="fund-form-group">
                        <label for="exampleFormControlTextarea1" class="form-label texts_size">Example
                            textarea</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                            placeholder="Hi, my name is Jane and I'm fundraising for... " value="<?php echo e(old('description')); ?>"></textarea>
                    </div>
                    <small class="text-danger">
                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php echo e($message); ?>

                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </small>

                    
                    <div class="fund-form-group">
                        <label for="exampleFormControlInput1" class="form-label texts_size">Which category do you
                            select?</label>

                        <div class="starting-goal-input">
                            <select class="form-control text_16 " name="categories_id">
                                <option class="pera_text">Open this select menu</option>
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <small class="text-danger">
                        <?php $__errorArgs = ['categories_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php echo e($message); ?>

                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </small>

                    
                    <div class="fund-form-group">
                        <label for="exampleFormControlInput1" class="form-label texts_size">How much would you like to
                            raise?</label>

                        <div class="starting-goal-input d-flex">
                            <input type="number" name="goal_amount" class="form-control text_16 " placeholder="00"
                                required value="" value="<?php echo e(old('goal_amount')); ?>">
                            <h3 class="amount-add-btn">AUD</h3>
                        </div>
                    </div>
                    <small class="text-danger">
                        <?php $__errorArgs = ['goal_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php echo e($message); ?>

                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </small>

                    
                    <div class="fund-form-group">
                        <label for="exampleFormControlInput1" class="form-label texts_size">How long will the campaign
                            last?</label>
                        <div class="starting-goal-input">
                            <input type="date" name="timestamp_end" class="form-control text_16"
                                value="<?php echo e(old('timestamp_end')); ?>">
                        </div>
                    </div>
                    <small class="text-danger">
                        <?php $__errorArgs = ['timestamp_end'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php echo e($message); ?>

                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </small>

                    
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
                                            <img id="image-preview"
                                                src="<?php echo e(asset('assets/frontend/css/fundraiser/images/fundraiser/file-image.png')); ?>"
                                                alt="image">
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
                        <input type="submit" class="btn_fundraiser" value="Complete Fundraiser">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php /**PATH C:\xampp\htdocs\demo\sociopro\1.6\resources\views/frontend/fundraiser/fundraiser_campaign_form.blade.php ENDPATH**/ ?>