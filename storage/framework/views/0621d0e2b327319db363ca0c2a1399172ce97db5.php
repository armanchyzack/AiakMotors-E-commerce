<?php $__env->startSection('sidenav'); ?>
<div class="col-3 sidenavbar" style="height: 100vh;">
    <div class="sidenav">
        <a href="<?php echo e(route('car')); ?>" class="d-flex" style="color: #ffd700">Car <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="<?php echo e(route('accessory')); ?>" class="d-flex" style="color: #ffd700">Accessories <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="<?php echo e(route('spinner')); ?>" class="d-flex" style="color: #ffd700">Spin Wheel <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('searchinpu'); ?>
<form class="d-flex">
    <input class="form-control me-2" name="search" id="searchbar" type="search" placeholder="Search"
        aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
<div class="searchresult">
    <ul>
    </ul>
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
    <style>
        .popup {
            display: none;
            position: fixed;
            padding: 10px;
            width: 280px;
            left: 50%;
            margin-left: -150px;
            height: 180px;
            top: 50%;
            margin-top: -100px;
            background: #FFF;
            border: 3px solid #ffd700;
            z-index: 20;
        }

        #popup:after {
            position: fixed;
            content: "";
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: -2;
        }

        #popup:before {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: #FFF;
            z-index: -1;
        }

        .popupk {
            display: none;
            position: fixed;
            padding: 10px;
            width: 280px;
            left: 50%;
            margin-left: -150px;
            height: 60vh;
            top: 50%;
            margin-top: -100px;
            background: #FFF;
            border: 3px solid #ffd700;
            z-index: 20;
        }

        #popupk:after {
            position: fixed;
            content: "";
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: -2;
        }

        #popupk:before {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: #FFF;
            z-index: -1;
        }

        .popup img {
            height: 150px;
            width: 260px;
        }
    </style>

    <div class="card-group carde ">
        <?php if(!$category->cars->isEmpty()): ?>
        <?php $__currentLoopData = $category->cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card col-xl-4" style="border-radius: 5%">
                <img src="<?php echo e($car->image_url); ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e(Str::ucfirst($car->name)); ?></h5>
                    <?php if($car->discount_price): ?>
                        <h6 class="text-white mt-1 text-bg-light text-decoration-line-through"><?php echo e($car->price); ?> <span><i
                                    class="fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
                    <?php else: ?>
                        <h6 class="text-white mt-1 text-bg-light"><?php echo e($car->price); ?> <span><i
                                    class="fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
                    <?php endif; ?>
                    <?php if($car->discount_price): ?>
                        <h6 class="text-white mt-1 text-bg-light"><?php echo e($car->discount_price); ?> <span><i
                                    class="fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
                    <?php endif; ?>
                    <button  class="btn btn-sm allimg gallery-link button" onclick="show('popup-<?php echo e($car->id); ?>')">All Image</button>
                    <div class="d-flex mt-2 buttonn">
                        <a href="" class="btn btn-sm">More Details</a>
                    </div>
                </div>
            <div class="container">

                <!-- This is what will be included inside the popup -->
                <div class="popup" id="popup-<?php echo e($car->id); ?>">
                    <div id="<?php echo e($car->id); ?>" class="carousel slide" data-bs-ride="carousel">

                        <!-- Indicators/dots -->
                        <div class="carousel-indicators">

                            <?php $__currentLoopData = $car->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index =>$img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button type="button" data-bs-target="#<?php echo e($car->id); ?>" data-bs-slide-to="<?php echo e($index + 0); ?>" class="<?php echo e($index === 0 ? 'active' : ''); ?>"></button>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner">

                            <?php $__currentLoopData = $car->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index =>$img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>">
                              <img src="<?php echo e($img->image_url); ?>" alt="Image <?php echo e($index + 1); ?>" class="d-block" style="width:100%">
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>


                    </div>


                    
                    <a href="#" class="btn btn-sm mt-4" style="border: 1px solid #ffd700; backgorund:inherit; color:#ffd700" onclick="hide('popup-<?php echo e($car->id); ?>')">Close</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
       <?php if(!$category->accessories->isEmpty()): ?>
       <?php $__currentLoopData = $category->accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accessory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="card col-xl-4" style="border-radius: 5%">
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

                       <a t class="btn btn-light me-2"><i class="fa-solid fa-cart-shopping"
                               style="color: #ffd700;"></i></a>
                       <a href="" class="btn btn-sm">Buy Now</a>
                   </div>
               </div>

       </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <?php endif; ?>

    </div>

    <?php $__env->startPush('customJs'); ?>
        <script>
            $ = function(id) {
                return document.getElementById(id);
            }

            var show = function(id) {
                $(id).style.display = 'block';
            }
            var hide = function(id) {
                $(id).style.display = 'none';
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Frontend\cateory_product.blade.php ENDPATH**/ ?>