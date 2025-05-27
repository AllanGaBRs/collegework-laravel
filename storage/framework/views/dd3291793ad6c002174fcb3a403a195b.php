<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2 class="mb-4">Suppliers List</h2>

    <a href="<?php echo e(route('suppliers.create')); ?>" class="btn btn-success mb-3">
        + Add New Supplier
    </a>

    <?php if($suppliers->isEmpty()): ?>
        <div class="alert alert-info">
            No suppliers found.
        </div>
    <?php else: ?>
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($supplier->id); ?></td>
                        <td><?php echo e($supplier->name); ?></td>
                        <td><?php echo e($supplier->email); ?></td>
                        <td><?php echo e($supplier->phone); ?></td>
                        <td>
                            <a href="<?php echo e(route('suppliers.edit', $supplier->id)); ?>" class="btn btn-sm btn-warning me-1">
                                Edit
                            </a>
                            <form action="<?php echo e(route('suppliers.destroy', $supplier->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this supplier?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\allan\college-laravel-crud-main\resources\views/suppliers/index.blade.php ENDPATH**/ ?>