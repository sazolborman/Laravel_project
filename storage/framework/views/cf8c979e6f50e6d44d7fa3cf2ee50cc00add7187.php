
    <div class="page-wrap">
        <div class="card search-card p-4">
            <h3 class="sub-title"><?php echo e(get_phrase('Search Results')); ?></h3>
            <?php echo $__env->make('frontend.search.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div> <!-- Search Card End -->
        <div class="card page-card p-4 mt-4">
            <h3 class="sub-title"><?php echo e(get_phrase('Pages')); ?></h3>
            <div class="suggest-wrap d-flex gap-3 flex-wrap my-3">
                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mypage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="card sugg-card p-2 rounded">
                            <a href="<?php echo e(route('single.page',$mypage->id)); ?>" class="mb-2 thumbnail-110-auto" style="background-image: url('<?php echo e(get_page_logo($mypage->logo, 'logo')); ?>')"></a>
                            <h4><a href="<?php echo e(route('single.page',$mypage->id)); ?>"><?php echo e(ellipsis($mypage->title,10)); ?></a></h4>
                            <?php
                                    $likecount = \App\Models\Page_like::where('page_id',$mypage->id)->where('user_id',auth()->user()->id)->count();
                            ?>
                            <span class="small text-muted"><?php echo e($likecount); ?> <?php echo e(get_phrase('likes')); ?></span>
                            <?php if($likecount>0): ?>
                                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.dislike',$mypage->id); ?>')" class="btn btn-primary"><i class="fa fa-thumbs-up"></i><?php echo e(get_phrase('Liked')); ?></a>
                            <?php else: ?>
                                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.like',$mypage->id); ?>')" class="btn btn-primary"><i class="fa fa-thumbs-up"></i><?php echo e(get_phrase('Like')); ?></a>
                            <?php endif; ?>
                        </div><!--  Card End -->
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div> 
           
        </div> <!-- Search Card End -->
        
    </div>



    <?php echo $__env->make('frontend.main_content.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.common_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/search/page.blade.php ENDPATH**/ ?>