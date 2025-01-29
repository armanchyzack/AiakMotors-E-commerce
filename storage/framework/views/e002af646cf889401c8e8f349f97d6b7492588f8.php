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
        <a href="<?php echo e(route('our.shop.details')); ?>" class="d-flex" style="color: #ffd700">About Us<span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('product'); ?>
9
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    .value {
    font-size: 0.6em;

    }
    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #ffd700;
    margin: auto;
    padding: 0;
    border: 1px solid #ffd700;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}


/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #ffd;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #ffd700;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #ffd;
    color: white;
}




</style>

<div class="container">
    <h1 class="text-bg" style="color: #ffd700">Spin The Wheel and Win a Prize!</h1>
    <p class="text-center" style="color: #ffd700">Spin the wheel once a month!</p>
</div>

<main class="mt-3">
    <input id="spin-button" type="checkbox" />
    <div class="wheel">
        <!-- Loop through $wheelslice collection and display slice_one -->
        <?php $__currentLoopData = $wheelslice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="slice" style="--i: <?php echo e($loop->iteration); ?>">
                <p class="value text">
                    <?php echo e($slice->slice_one); ?> <!-- Access slice_one field -->
                </p>
            </div>
            <div class="slice" style="--i: 2">
                <p class="value"><?php echo e($slice->slice_two); ?> </p>
            </div>
            <div class="slice" style="--i: 3">
                <p class="value"><?php echo e($slice->slice_three); ?></p>
            </div>
            <div class="slice" style="--i: 4">
                <p class="value"><?php echo e($slice->slice_four); ?></p>
            </div>
            <div class="slice" style="--i: 5">
                <p class="value"><?php echo e($slice->slice_five); ?></p>
            </div>
            <div class="slice" style="--i: 6">
                <p class="value"><?php echo e($slice->slice_six); ?></p>
            </div>
            <div class="slice" style="--i: 7">
                <p class="value"><?php echo e($slice->slice_seven); ?></p>
            </div>
            <div class="slice" style="--i: 8">
                <p class="value"><?php echo e($slice->slice_eight); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</main>

<section>
    <a href="#" class="btn nav-link mt-3 w-50 m-auto popUpBtn" data-modal="myModal1" style="border: 2px solid #ffd700; background:inherit; color:#ffd700;">More Details</a>
</section>

<section>
    <div id="myModal1" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">×</span>
                <h2><?php echo e(Str::ucfirst($details->title)); ?></h2>
            </div>
            <p id="text"><?php echo $details->description; ?></p>
        </div>
    </div>
</section>

<?php $__env->startPush('customJs'); ?>
<script>
    document.getElementById('spin-button').addEventListener('click', async () => {
        try {
            // Disable the spin button while spinning
            document.getElementById('spin-button').disabled = true;

            // Simulate wheel spin with a delay (optional)
            const wheel = document.querySelector('.wheel');
            wheel.style.transform = 'rotate(3600deg)'; // Simulate a full rotation

            // Delay for the spinning animation to finish
            setTimeout(async () => {
                // After spinning, call your backend API
                try {
                    const response = await fetch('/spin', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json',
                        },
                    });

                    window.location.href = 'user/profile'; // Redirect after spin result
                } catch (error) {
                    console.error('Error:', error);
                    window.location.href = 'user/profile';
                }
            }, 3000);  // Match with the wheel rotation duration

        } catch (error) {
            console.error('Error:', error);
            window.location.href = 'user/profile';
        }
    });

    $(document).ready(function() {
        // Open the modal when "More Details" button is clicked
        $('.popUpBtn').on('click', function() {
            $('#' + $(this).data('modal')).css('display', 'block');
        });

        // Close the modal when the close button is clicked
        $('span.close').on('click', function() {
            $('.modal').css('display', 'none');
        });

        // Close the modal if the user clicks outside of the modal content
        $(window).on('click', function(event) {
            if ($(event.target).is('.modal')) {
                $('.modal').css('display', 'none');
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Frontend/spinewheel.blade.php ENDPATH**/ ?>