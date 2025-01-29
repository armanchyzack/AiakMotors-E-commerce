<?php $__env->startSection('sidenav'); ?>
<div class="col-3 sidenavbar" style="height: 100vh;">
    <div class="sidenav">
        <a href="<?php echo e(route('car')); ?>" class="d-flex" style="color: #ffd700">Car <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="<?php echo e(route('accessory')); ?>" class="d-flex" style="color: #ffd700">Accessories <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="<?php echo e(route('service')); ?>" class="d-flex" style="color: #ffd700">Service <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="<?php echo e(route('spinner')); ?>" class="d-flex" style="color: #ffd700">Spin Wheel <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('catefilter'); ?>
<div class="row">
    <div class="col-6" >
        <div class="dropdown" >
            <button class="btn btn-secondary dropdown-toggle btn-sm w-100 " type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a class="dropdown-item active" href="<?php echo e(route('category', $cate->slug)); ?>"><?php echo e(Str::ucfirst($cate->title)); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <div class="col-6">
      <div class="dropdown" >
        <button class="btn btn-secondary dropdown-toggle btn-sm w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Price Filter
        </button>
            <select id="sortOrder" class="dropdown-menu dropdown-menu-dark">
                <option value="high_to_low" class="btn" type="submit">High to Low</option>
                <option value="low_to_high" class="btn" >Low to High</option>
            </select>
    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('product'); ?>
9
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card-group carde ">
    <?php $__currentLoopData = $accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accessory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class=" container card col-lg-4" style="border-radius: 5%">
            <img src="<?php echo e($accessory->image_url); ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo e(Str::ucfirst($accessory->name)); ?></h5>
                <?php if($accessory->discount_price): ?>
                    <h6 class="text-white mt-1 text-bg-light text-decoration-line-through"><?php echo e($accessory->price); ?> <span><i
                                class="fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
                <?php else: ?>
                    <h6 class="text-white mt-1 text-bg-light"><?php echo e($accessory->price); ?> <span><i
                                class="fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
                <?php endif; ?>
                <?php if($accessory->discount_price): ?>
                    <h6 class="text-white mt-1 text-bg-light"><?php echo e($accessory->discount_price); ?> <span><i
                                class="fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
                <?php endif; ?>
                <div class="d-flex mt-2 buttonn">

                    <a  href="<?php echo e(route('cart.add', $accessory->id)); ?>" class="btn btn-primary add-to-cart btn-light me-2 <?php echo e($accessory->quantity === 'Out of Stock' ? 'disabled' : ''); ?>"><i class="fa-solid fa-cart-shopping"
                            style="color: #ffd700;"></i></a>
                    <a href="<?php echo e(route('item.show', ['type' => 'accessory', 'id' => $accessory->id])); ?>" class="btn btn-sm <?php echo e($accessory->quantity === 'Out of Stock' ? 'disabled' : ''); ?>">Buy Now
                    </a>
                </div>
            </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Frontend\accessory.blade.php ENDPATH**/ ?>