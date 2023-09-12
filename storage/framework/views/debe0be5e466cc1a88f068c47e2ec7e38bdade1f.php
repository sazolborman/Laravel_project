<div class="page-content">
    <div class="page-tab bg-white border rounded p-3 pb-1">
        <div class="d-flex pagetab-head align-items-center justify-content-between">
            <h3 class="h5"><span><i class="fa fa-flag"></i></span> <?php echo e(get_phrase('Pages')); ?></h3>
            <a href="javascript:void(0)" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.pages.create_page'])); ?>', '<?php echo e(get_phrase('Create Page')); ?>');" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#createPage" class="btn btn-primary"> <i class="fa fa-plus-circle"></i><?php echo e(get_phrase('Create Page')); ?></a>
        </div>
        <ul class="nav ct-tab mt-1" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="mypage-tab" data-bs-toggle="tab"
                    data-bs-target="#mypage" type="button" role="tab" aria-controls="mypage"
                    aria-selected="true"><?php echo e(get_phrase('My Pages')); ?> </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="suggest-page-tab" data-bs-toggle="tab"
                    data-bs-target="#suggest-page" type="button" role="tab"
                    aria-controls="suggest-page" aria-selected="false"> <?php echo e(get_phrase('Suggested Pages')); ?></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="linked-page-tab" data-bs-toggle="tab"
                    data-bs-target="#linked-page" type="button" role="tab"
                    aria-controls="linked-page" aria-selected="false"><?php echo e(get_phrase('Liked Pages')); ?></button>
            </li>
        </ul>
    </div>
    <div class="tab-content bg-white border p-3 rounded mt-3" id="myTabContent">
        <div class="tab-pane fade show active" id="mypage" role="tabpanel"
            aria-labelledby="mypage-tab">
                <?php echo $__env->make('frontend.pages.single-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div><!--  Tab Pane End -->
        
        <div class="tab-pane fade" id="suggest-page" role="tabpanel"
            aria-labelledby="suggest-page-tab">
            
            <?php echo $__env->make('frontend.pages.suggested', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div><!--  Tab Pane End -->
        <div class="tab-pane fade" id="linked-page" role="tabpanel"
            aria-labelledby="linked-page-tab">

            <?php echo $__env->make('frontend.pages.liked-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
        </div><!--  Tab Pane End -->
    </div> <!-- Tab Content End -->
</div> <!-- Page Content End -->

<?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/pages/pages.blade.php ENDPATH**/ ?>