<?php $__env->startSection('content'); ?>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
        color:rgb(255, 255, 255);
    }

    .student-card {
        border-radius: 12px;
        border: none;
        background-color: #ffffffcc; /* leve transparência */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        padding: 1.25rem;
        text-align: center;
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        cursor: default;
        user-select: none;
    }

    .student-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 30px rgba(0, 0, 0, 0.18);
        background-color: #fff; /* remove transparência no hover */
        cursor: pointer;
    }

    .student-photo {
        width: 130px;
        height: 130px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #fff;
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.12);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        margin-bottom: 1rem;
    }

    .student-photo:hover {
        transform: scale(1.2);
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25);
        z-index: 10;
        cursor: pointer;
    }

    h2 {
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 2rem;
    }

    h6 {
        font-weight: 600;
        color: #334155;
        margin-bottom: 0.25rem;
    }

    small {
        color: #64748b;
        font-style: italic;
    }

    .row.g-4 > [class*='col-'] {
        margin-bottom: 1.5rem;
    }
</style>

<div>
    <h2>Students List</h2>

    <div class="row g-4">
        
        <div class="col-6 col-md-4 col-lg-3">
            <div class="student-card shadow-sm">
                <img 
                    src="<?php echo e(asset('assets/allan.jpg')); ?>" 
                    alt="Allan Gabriel" 
                    class="student-photo" >
                <h6>Allan Gabriel</h6>
                <small>RA: 252256-1</small>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <div class="student-card shadow-sm">
                <img 
                    src="<?php echo e(asset('assets/ingrid.jpg')); ?>" 
                    alt="Ingrid Bearari" 
                    class="student-photo" >
                <h6>Ingrid Bearari</h6>
                <small>RA: 248064-1</small>
            </div>
        </div>

         <div class="col-6 col-md-4 col-lg-3">
            <div class="student-card shadow-sm">
                <img 
                    src="<?php echo e(asset('assets/kamilla.jpg')); ?>" 
                    alt="João Souza" 
                    class="student-photo" >
                <h6>Kamilla Barros</h6>
                <small>RA: 226756-1</small>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\collegework-laravel-main\resources\views/students.blade.php ENDPATH**/ ?>