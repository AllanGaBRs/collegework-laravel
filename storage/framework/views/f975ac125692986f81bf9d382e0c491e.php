<?php $__env->startSection('content'); ?>
<style>
    .hero {
        background-image:
            linear-gradient(90deg, rgba(50, 119, 189, 0.8), rgba(233, 236, 239, 0.8)),
            url('/assets/ilustracao-shop2.jpeg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        padding: 80px 20px;
        text-align: center;
        border-radius: 12px;
    }

    .hero h1 {
        font-size: 3rem;
        font-weight: bold;
    }

    .hero p {
        font-size: 1.2rem;
        color: #555;
    }

    .categories {
        padding: 60px 0;
    }

    .card-category {
        transition: transform 0.3s ease;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .card-category:hover {
        transform: translateY(-8px);
    }

    .card-category img {
        height: 180px;
        object-fit: cover;
    }

</style>

<div class="hero">
    <h1>Bem-vindo ao Pelegrin Shop</h1>
    <p>Gerencie seus produtos, fornecedores e muito mais.</p>
</div>

<div class="container categories">
    <h2 class="text-center mb-5 fw-bold">Nossas Seções</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card card-category">
                <img src="<?php echo e(asset('assets/products-img.jpeg')); ?>"" class=" card-img-top" alt="Produtos">
                <div class="card-body text-center">
                    <h5 class="card-title">Produtos</h5>
                    <p class="card-text">Gerencie todos os seus produtos com facilidade.</p>
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-outline-success">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-category">
                <img src="<?php echo e(asset('assets/suppliers-img.jpg')); ?>" class="card-img-top" alt="Fornecedores">
                <div class="card-body text-center">
                    <h5 class="card-title">Fornecedores</h5>
                    <p class="card-text">Mantenha controle total sobre seus fornecedores.</p>
                    <a href="<?php echo e(route('suppliers.index')); ?>" class="btn btn-outline-primary">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-category">
                <img src="<?php echo e(asset('assets/students-img.jpg')); ?>" class="card-img-top" alt="Alunos">
                <div class="card-body text-center">
                    <h5 class="card-title">Alunos</h5>
                    <p class="card-text">Veja a lista de alunos cadastrados no sistema.</p>
                    <a href="<?php echo e(route('students')); ?>" class="btn btn-outline-warning">Acessar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\collegework-laravel-main\resources\views/main.blade.php ENDPATH**/ ?>