             
<!-- Content Section Start -->
    <div class="single-event-wrap">
        <div class="event-image event-cover">
            <img class="w-100" src="<?php echo e(viewImage('event',$event->banner,'coverphoto')); ?>" class="img-fluid" alt="Event">
            <div class="event-date">
                <span><?php echo e(date('d M', strtotime($event->event_date))); ?></span>
            </div>
        </div>
        <div class="row gx-3 mt-3">
            <div class="col-lg-7 col-sm-12">
                <div class="card rounded p-3">
                    <?php  $postOfThisEvent = \App\Models\Posts::where('publisher','event')->where('publisher_id',$event->id)->first();?>
                    <div class="post-controls dropdown dotted">
                        <a class="nav-link dropdown-toggle ms-auto text-end m-0 p-0 w-25" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if($postOfThisEvent != null): ?>
                                <li>
                                    <a href="javascript:void(0)" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postOfThisEvent->post_id] )); ?>', '<?php echo e(get_phrase('Share Event')); ?>');" class="dropdown-item "> <?php echo e(get_phrase('Share')); ?></a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="#" class="dropdown-item "> <?php echo e(get_phrase('Create post to share')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    
                    <span class="text-primary"><?php echo e(date('l', strtotime($event->event_date))); ?>, <?php echo e(date('d F Y', strtotime($event->event_date))); ?>, at <?php echo e($event->event_time); ?></span>
                    <h2 class="h5"> <?php echo e($event->title); ?></h2>
                    <span><?php echo e($event->location); ?></span>
                </div> <!-- Card End -->
                <!-- Profile Nav End -->
                <div class="event-tab ct-tab bg-white p-3 border rounded mt-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="about-tab" data-bs-toggle="tab"
                                data-bs-target="#about" type="button" role="tab" aria-controls="about"
                                aria-selected="true"><?php echo e(get_phrase('About')); ?></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="discussion-tab" data-bs-toggle="tab"
                                data-bs-target="#discussion" type="button" role="tab"
                                aria-controls="discussion" aria-selected="false"><?php echo e(get_phrase('Discussion')); ?></button>
                        </li>
                    </ul>
                </div> <!-- Friends Tab End -->
                <div class="tab-content card rounded p-3 mt-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="about" role="tabpanel"
                        aria-labelledby="about-tab">
                        <h2 class="h6"><?php echo e(get_phrase('Details')); ?></h2>
                        <p>
                            <?php echo script_checker($event->description, false); ?>
                        </p>
                    </div> <!-- Tab Pane End -->

                    

                    <div class="tab-pane fade" id="discussion" role="tabpanel"  aria-labelledby="discussion-tab">
                        
                        <?php echo $__env->make('frontend.main_content.create_post', ['event_id' => $event->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="discuss-wrap">
                            <h3 class="h6 my-3">Recent Activity</h3>
                            <?php echo $__env->make('frontend.main_content.posts',['type'=>'user_post'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div><!-- Tab Pane End -->
                </div> <!-- Tab Content End -->
            </div>
            <div class="col-lg-5 col-sm-12">
                <aside class="sidebar plain-sidebar">
                    

                    
                    <div class="widget p-3">
                        <div class="justify-content-between">
                            
                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.going',$event->id); ?>')" class="w-100 mb-2 btn btn-primary <?php if(in_array(auth()->user()->id, json_decode($event->going_users_id))): ?> displaynone <?php endif; ?>" id="goingId<?php echo e($event->id); ?>"> <?php echo e(get_phrase('Going')); ?></a>
                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.notgoing',$event->id); ?>')" class="w-100 mb-2 btn btn-secondary <?php if(!in_array(auth()->user()->id, json_decode($event->going_users_id))): ?> displaynone <?php endif; ?>" id="notGoingId<?php echo e($event->id); ?>"> <?php echo e(get_phrase('Cancel')); ?></a>

                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.interested',$event->id); ?>')" class="w-100 mb-2 btn btn-primary <?php if(in_array(auth()->user()->id, json_decode($event->interested_users_id))): ?> displaynone <?php endif; ?>" id="interestedId<?php echo e($event->id); ?>"> <?php echo e(get_phrase('Interested')); ?></a>
                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.notinterested',$event->id); ?>')" class="w-100 mb-2 btn btn-secondary <?php if(!in_array(auth()->user()->id, json_decode($event->interested_users_id))): ?> displaynone <?php endif; ?>" id="notInterestedId<?php echo e($event->id); ?>"> <?php echo e(get_phrase('Not Interested')); ?></a>

                            
                        </div>
                    </div> <!-- Widget End -->
                    <div class="widget">
                        <div class="d-flex justify-content-between">
                            <h3 class="widget-title"><?php echo e(get_phrase('Guests')); ?></h3>
                            <a href="javascript:void(0)" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.events.view-all', 'event_id' => $event->id])); ?>', '<?php echo e(get_phrase('All Going And Interested User')); ?>');" data-bs-toggle="modal"
                                data-bs-target="#viewAll" class="fw-bold text-primary"><?php echo e(get_phrase('View All')); ?></a>
                        </div>
                        <div class="d-flex justify-content-between my-3">
                            <div class="going">
                                <?php
                                    $directly_going_data = json_decode($event->going_users_id)!=null ? count(json_decode($event->going_users_id)) : "0";
                                    $invite_going_data = $invited_friend_going;
                                    $total = $directly_going_data + $invite_going_data;
                                ?>
                                <span class="rounded-2"><?php echo e($total); ?> </span>
                                Going
                            </div>
                            <div class="going">
                                <span class="rounded-2"><?php echo e(json_decode($event->interested_users_id)!=null ? count(json_decode($event->interested_users_id)) : "0"); ?></span>
                                Interested
                            </div>
                        </div>
                    </div> <!-- Widget End -->
                    <div class="widget">
                        <h3 class="widget-title"><?php echo e(get_phrase('Go With Friends')); ?></h3>
                        <div class="gr-search">
                            <form action="#">
                                <input type="text" class="bg-secondary rounded" id="myInputSearch" onkeyup="mySearchFunction()" placeholder="Search">
                                <span class="i fa fa-search"></span>
                            </form>
                        </div>
                        
                        <div class="invite-wrap overflow-auto mt-3">
                            <table id="myTable" class="w-100">
                                <tbody class="searchTbody">
                                    <?php $__currentLoopData = $friends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $friend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <?php $invited_friend_id = $friend->requester==auth()->user()->id ? $friend->accepter:$friend->requester; ?>
                                    
                                    <?php  $inviteablefrienddetails= DB::table('users')->where('id', $invited_friend_id)->first(); ?>
                                    
                                    <?php  $invite_details= DB::table('invites')->where('invite_reciver_id', $invited_friend_id)->where('event_id', $event->id)->first(); ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex justify-content-between s-invite">
                                                    <div class="ava-img d-flex align-items-center">
                                                        <a href="<?php echo e(route('user.profile.view', $inviteablefrienddetails->id)); ?>"><img width="40" class="user-round" src="<?php echo e(get_user_image($inviteablefrienddetails->photo, 'optimized')); ?>" alt=""></a>
                                                        <h3 class="h6 mb-0"><a href="<?php echo e(route('user.profile.view', $inviteablefrienddetails->id)); ?>"><?php echo e(ellipsis( $inviteablefrienddetails->name,20 )); ?></a></h3>
                                                    </div>
                                                    <div class="invite_button_css">
                                                        <?php if(!empty($invite_details) && $invite_details->invite_reciver_id == $invited_friend_id && $invite_details->is_accepted != '1'): ?>
                                                            <button class="btn px-1 py-0 me-1 text-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?php echo e(get_phrase('Invited')); ?>"> <span class="fas fa-check"></span></button>
                                                        <?php elseif(!empty($invite_details) && $invite_details->invite_reciver_id == $invited_friend_id && $invite_details->is_accepted == '1' ): ?>
                                                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?php echo e(get_phrase('Going')); ?>" class="btn px-1 py-0 me-1 text-success"> <i class="far fa-calendar-check"></i> </button>
                                                        <?php else: ?>
                                                            <a data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?php echo e(get_phrase('Send invitations')); ?>" href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.invite', ['invited_friend_id' => $invited_friend_id, 'requester_id' => auth()->user()->id, 'event_id' => $event->id]); ?>')" class="btn px-1 py-0 me-1"><i class="fas fa-location-arrow"></i></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- Widget End -->

                    <div class="widget p-event-widget">
                        <h3 class="widget-title mb-3"><?php echo e(get_phrase('Popular Events')); ?></h3>
                        <?php $index=1; ?>
                        <?php $__currentLoopData = $popularevents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $popularevent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="popular-event">
                            <div class="p-2 border rounded-3">
                                <img class="img-fluid w-100" src="<?php echo e(viewImage('event',$popularevent['banner'],'thumbnail')); ?>" alt="">
                                <div class="pp-info">
                                    <span class="text-primary"><?php echo e(date('l', strtotime($popularevent['event_date']))); ?>, <?php echo e(date('d F Y', strtotime($popularevent['event_date']))); ?></span>
                                    <h6><a href="<?php echo e(route('single.event',$popularevent['id'])); ?>">  <?php echo e(ellipsis($popularevent['title'], 50)); ?></a></h6>
                                    <div class="d-flex mt-2">
                                        <a href="<?php echo e(route('user.profile.view', $popularevent['user_id'])); ?>"><img src="<?php echo e(get_user_image($popularevent['photo'], 'optimized')); ?>" width="30"
                                                class="cicle user-round" alt=""></a>
                                        <div class="ava-info ms-2">
                                            <h3 class="h6 mb-0"><a href="#"><?php echo e($popularevent['post_user']); ?></a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Event Widget End -->
                        <?php if($index=='5'){break;}else($index++) ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div><!-- Widget End -->
                </aside>
            </div>
        </div>
    </div>

<!-- Content Section End -->

<?php echo $__env->make('frontend.events.event_invite_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.main_content.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/events/single_event.blade.php ENDPATH**/ ?>