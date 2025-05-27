<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Product & Supplier Management</title>

    <!-- Bootstrap CSS (via CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo e(route('main')); ?>">Laravel CRUD</a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('products.index')); ?>">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('suppliers.index')); ?>">Suppliers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('students')); ?>">Students</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH D:\collegework-laravel-main\resources\views/layout.blade.php ENDPATH**/ ?>