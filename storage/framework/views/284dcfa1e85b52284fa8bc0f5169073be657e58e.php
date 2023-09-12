<div class="d-flex">
    <?php if($message->react==''): ?>
    <a href="javascript:void(0)"> <img src="<?php echo e(asset('storage/images/r-like.png')); ?>" class="react-icon filter-gray-1"  alt="Like"> </a>
    <?php elseif($message->react=='like'): ?>
    <a href="javascript:void(0)" class="<?php if($message->react=='like'): ?> d-block <?php else: ?> d-none <?php endif; ?>"> <img src="<?php echo e(asset('storage/images/r-like.png')); ?>" class="react-icon" alt="Like"> </a>
    <?php elseif($message->react=='lough'): ?>
        <a href="javascript:void(0)" class="<?php if($message->react=='lough'): ?> d-block <?php else: ?> d-none <?php endif; ?>"> <img src="<?php echo e(asset('storage/images/smile2.png')); ?>" class="react-icon" alt="Love"> </a>
    <?php elseif($message->react=='love'): ?>
        <a href="javascript:void(0)" class="<?php if($message->react=='love'): ?> d-block <?php else: ?> d-none <?php endif; ?>"> <img src="<?php echo e(asset('storage/images/r-love.png')); ?>" class="react-icon" alt="Love"> </a>
    <?php elseif($message->react=='sad'): ?>
    <a href="javascript:void(0)" class="<?php if($message->react=='sad'): ?> d-block <?php else: ?> d-none <?php endif; ?>"> <img src="<?php echo e(asset('storage/images/r-cry1.png')); ?>" class="react-icon" alt="Sad"> </a>
    <?php elseif($message->react=='angry'): ?>
    <a href="javascript:void(0)" class="<?php if($message->react=='angry'): ?> d-block <?php else: ?> d-none <?php endif; ?>"> <img src="<?php echo e(asset('storage/images/r-angry.png')); ?>" class="react-icon" alt="Angry"> </a>
    <?php endif; ?>
</div>

<ul class="react-list">
    <li><a href="javascript:void(0)" onclick="myMessageReact('like', 'update', <?php echo e($message->id); ?>)" ><img src="<?php echo e(asset('storage/images/r-like.png')); ?>" class="" alt="Like"></a>
    </li>
    <li><a href="javascript:void(0)" onclick="myMessageReact('love', 'update', <?php echo e($message->id); ?>)"><img src="<?php echo e(asset('storage/images/r-love.png')); ?>" class="" alt="Love"></a>
    </li>
    <li><a href="javascript:void(0)" onclick="myMessageReact('sad', 'update', <?php echo e($message->id); ?>)"><img src="<?php echo e(asset('storage/images/r-cry1.png')); ?>" class="" alt="Sad"></a>
    </li>
    <li><a href="javascript:void(0)" onclick="myMessageReact('angry', 'update', <?php echo e($message->id); ?>)"><img src="<?php echo e(asset('storage/images/r-angry.png')); ?>" class=""  alt="Angry"></a>
    </li>
</ul><?php /**PATH /home/creati65/demo.creativeitem.com/sociopro/resources/views/frontend/chat/chat_react.blade.php ENDPATH**/ ?>