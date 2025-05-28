<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2 class="mb-4">Edit Supplier</h2>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('suppliers.update', $supplier->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="name" class="form-label">Supplier Name:</label>
            <input type="text" name="name" id="name" 
                class="form-control" 
                value="<?php echo e(old('name', $supplier->name)); ?>" 
                required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" 
                class="form-control" 
                value="<?php echo e(old('email', $supplier->email)); ?>" 
                required>
        </div>

        <div class="mb-3">
            <label for="cnpj" class="form-label">CNPJ:</label>
            <input type="text" name="cnpj" id="cnpj" 
                class="form-control" 
                value="<?php echo e(old('cnpj', $supplier->cnpj)); ?>" 
                required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" name="phone" id="phone" 
                class="form-control" 
                value="<?php echo e(old('phone', $supplier->phone)); ?>" 
                required>
        </div>

        <button type="submit" class="btn btn-primary me-2">Update</button>
        <a href="<?php echo e(route('suppliers.index')); ?>" class="btn btn-secondary">Back to Suppliers</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\collegework-laravel-main\resources\views/suppliers/edit.blade.php ENDPATH**/ ?>