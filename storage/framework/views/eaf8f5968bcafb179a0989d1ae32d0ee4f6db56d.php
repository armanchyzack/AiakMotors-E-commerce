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

<?php $__env->startSection('product'); ?>
9
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
        <h1 class="text-bg" style="color: #ffd700"> Spine The wheel and win a prize. </h1>
        <p class="text-center" style="color: #ffd700"> Spine the wheel on in a mounth</p>
    </div>
    <main class="mt-3">
        <input id="spin-button" type="checkbox"/>
        <div class="wheel">
            <div class="slice" style="--i: 1">
                <p class="value text bankrupt">
                    Bankrupt
                </p>
            </div>
            <div class="slice" style="--i: 2">
                <p class="value">350</p>
            </div>
            <div class="slice" style="--i: 3">
                <p class="value">250</p>
            </div>
            <div class="slice" style="--i: 4">
                <p class="value">600</p>
            </div>
            <div class="slice" style="--i: 5">
                <p class="value">400</p>
            </div>
            <div class="slice" style="--i: 6">
                <p class="value">150</p>
            </div>
            <div class="slice" style="--i: 7">
                <p class="value">250</p>
            </div>
            <div class="slice" style="--i: 8">
                <p class="value">400</p>
            </div>
        </div>
    </main>




    <?php $__env->startPush('customJs'); ?>
        <script>
            document.getElementById('spin-button').addEventListener('click', async () => {
                try {
                    // Disable the spin button while spinning
                    document.getElementById('spin-button').disabled = true;

                    const response = await fetch('/spin', {
                        method: 'POST', // Ensure this is POST
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json',
                        },
                    });

                    if (!response.ok) {
                        // Handle non-200 status codes
                        const error = await response.text(); // Parse error response as text
                        console.error(error);
                        alert(`Error: ${response.status} - ${response.statusText}`);
                        return;
                    }

                    const data = await response.json();

                    // Handle the result
                    let winningprize = alert(`Congratulations, ${data.user.name}! You won ${data.prize}.`);

                    // Trigger the spinner animation
                    const wheel = document.querySelector('.spinner-wheel');
                    const spinDegrees = Math.floor(Math.random() * 360) + 3600; // Random spin
                    wheel.style.transition = 'transform 3s ease-out';
                    wheel.style.transform = `rotate(${spinDegrees}deg)`;

                    // Re-enable the button after animation completes
                    setTimeout(() => {
                        document.getElementById('spin-button').disabled = false;
                    }, 3000); // Adjust this timing based on your animation duration

                } catch (error) {
                    console.error('Error:', error);
                }
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Frontend\spinewheel.blade.php ENDPATH**/ ?>