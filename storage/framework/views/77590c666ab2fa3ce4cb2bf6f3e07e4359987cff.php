<div class="profile-wrap">
    <?php echo $__env->make('frontend.pages.timeline-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="profile-content mt-3">
        <div class="row gx-3">
            <div class="col-lg-7 col-sm-12">
                <?php echo $__env->make('frontend.pages.inner-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($page->user_id==auth()->user()->id): ?>
                    <?php echo $__env->make('frontend.main_content.create_post',['page_id'=>$page->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php
                    $comments = DB::table('comments')->join('users', 'comments.user_id', '=', 'users.id')->where('comments.is_type', 'page')->where('comments.id_of_type', $page->id)->where('comments.parent_id', 0)->select('comments.*', 'users.name', 'users.photo')->orderBy('comment_id', 'DESC')->take(1)->get();                                                                
                    $total_comments = DB::table('comments')->where('comments.is_type', 'blog')->where('comments.id_of_type', $page->id)->where('comments.parent_id', 0)->get()->count();
                ?>

                <?php echo $__env->make('frontend.main_content.comments',['comments'=>$comments,'post_id'=>$page->id,'type'=>"page"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <?php echo $__env->make('frontend.main_content.posts',['type'=>"page"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-5 col-sm-12">
                <?php echo $__env->make('frontend.pages.bio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div> 
</div>

<?php echo $__env->make('frontend.main_content.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    
        <?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/pages/page-timeline.blade.php ENDPATH**/ ?>