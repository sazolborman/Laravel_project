<?php
    $comments = DB::table('comments')->join('users', 'comments.user_id', '=', 'users.id')->where('comments.is_type', 'blog')->where('comments.id_of_type', $blog->id)->where('comments.parent_id', 0)->select('comments.*', 'users.name', 'users.photo')->orderBy('comment_id', 'DESC')->take(1)->get();                                                                
    $total_comments = DB::table('comments')->where('comments.is_type', 'blog')->where('comments.id_of_type', $blog->id)->where('comments.parent_id', 0)->get()->count();
?>

<div class="single-wrap">
    <div class="blog-feature" style="background-image: url('<?php echo e(get_blog_image($blog->thumbnail,'coverphoto')); ?>')">
        <div class="blog-head">
            <a href="#" class="btn btn-primary"> <?php echo e($blog->created_at->format("d-M-Y")); ?> </a>
            <h1><?php echo e($blog->title); ?></h1>

            <div class="d-flex align-items-center">
                <img src="<?php echo e(get_user_image($blog->user_id,'optimized')); ?>" class="user-round user_image_show_on_modal" alt="">
                <div class="ava-info ms-2">
                    <h6 class="mb-0"><a href="<?php echo e(route('user.profile.view',$blog->getUser->id)); ?>"><?php echo e($blog->getUser->name); ?></a></h6>
                    <small><?php echo e($blog->created_at->diffForHumans()); ?></small>
                </div>
            </div>
            <div class="bhead-meta">
                <span><?php echo e($total_comments); ?> <?php echo e(get_phrase('Comments')); ?></span>
                <span><?php echo e(count(json_decode($blog->view))); ?> <?php echo e(get_phrase('Views')); ?></span>
            </div>
        </div>
    </div><!--  Blog Cover End -->
    <div class="row g-2 mt-3 ">
        <div class="col-lg-7">
            <div class="card p-3 blog-details">
                <?php echo script_checker($blog->description, false); ?>
                <div class="blog-footer">
                    <div class="post-share justify-content-between align-items-center border-bottom pb-3">
                        <div class="post-meta">
                            <?php
                                $tags = json_decode($blog->tag, true);
                            ?>
                            
                            <?php if(is_array($tags)): ?>
                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="#"><span class="badge bg-primary mt-1">#<?php echo e($tag); ?></span></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="p-share d-flex align-items-center mt-3">
                            <h3 class="h6"><?php echo e(get_phrase('Share')); ?>: </h3>
                            <div class="social-share ms-2">
                                <ul>
                                    <?php $__currentLoopData = $socailshare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e($value); ?>" target="_blank"><i class="fa-brands fa-<?php echo e($key); ?>"></i></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Comment Start -->
                        <div class="user-comments  bg-white" id="user-comments-<?php echo e($blog->id); ?>">
                            <div class="comment-form d-flex p-3 bg-secondary">
                                <img src="<?php echo e(get_user_image(Auth()->user()->photo, 'optimized')); ?>" alt="" class="rounded-circle img-fluid" width="40px">
                                <form action="javascript:void(0)" class="w-100 ms-2" method="post">
                                    <input class="form-control py-3" onkeypress="postComment(this, 0, <?php echo e($blog->id); ?>, 0,'blog');" rows="1" placeholder="Write Comments">
                                </form>
                            </div>
                            <ul class="comment-wrap pt-3 pb-0 list-unstyled" id="comments<?php echo e($blog->id); ?>">
                                <?php echo $__env->make('frontend.main_content.comments',['comments'=>$comments,'post_id'=>$blog->id,'type'=>"blog"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </ul>
                            <?php if($comments->count() < $total_comments): ?> 
                                <a class="btn p-3 pt-0" onclick="loadMoreComments(this, <?php echo e($blog->id); ?>, 0, <?php echo e($total_comments); ?>,'blog')"><?php echo e(get_phrase('View Comment')); ?></a>
                            <?php endif; ?>
                        </div>
                    
                </div><!--  Blog Details Footer End -->
            </div>
        </div>
        <div class="col-lg-5">
            <aside class="sidebar">
                <div class="widget search-widget">
                    <form action="#" class="search-form">
                        <input class="bg-secondary" type="search" id="searchblogfield" placeholder="Search">
                        <span><i class="fa fa-search"></i></span>
                    </form>
                </div>
                <div class="widget recent-posts">
                    <h3 class="widget-title mb-4"><?php echo e(get_phrase('Recent Post')); ?></h3>
                    <div class="posts-wrap" id="searchblogviewsection">
                        <?php $__currentLoopData = $recent_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="post-entry d-flex">
                                <div class="post-thumb"><img class="img-fluid rounded" src="<?php echo e(get_blog_image($post->thumbnail,'thumbnail')); ?>" alt="Recent Post">
                                </div>
                                <div class="post-txt ms-2">
                                    <h3><a class="ellipsis-line-2" href="<?php echo e(route('single.blog',$post->id)); ?>"><?php echo e($post->title); ?></a></h3>
                                    <div class="post-meta">
                                        <span class="date-meta"><a href="#"><?php echo e($post->created_at->format("d-M-Y")); ?></a></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div> <!-- Recent Post Widget End -->
                <div class="widget tag-widget">
                    <h3 class="widget-title mb-3"><?php echo e(get_phrase('Categories')); ?></h3>
                    <div class="tags">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('category.blog',$category->id)); ?>" class="<?php if($post->category_id == $category->id): ?> active <?php endif; ?>"><?php echo e($category->name); ?> (<?php echo e(DB::table('blogs')->where('category_id', $category->id)->get()->count()); ?>)</a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                         
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div><!-- Single Page Wrap End -->
<?php echo $__env->make('frontend.main_content.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/blogs/single_blog.blade.php ENDPATH**/ ?>