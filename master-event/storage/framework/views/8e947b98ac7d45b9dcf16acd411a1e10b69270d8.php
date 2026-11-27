<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Event - Daftar Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo e(route('events.index')); ?>">Sistem Event & Workshop</a>
            <div class="navbar-nav align-items-center">
                <a class="nav-link active" href="<?php echo e(route('events.index')); ?>">Daftar Event</a>
                
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-events')): ?>
                    <a class="nav-link" href="<?php echo e(route('events.create')); ?>">Tambah Event</a>
                <?php endif; ?>

                <span class="badge bg-light text-primary ms-3">
                    <?php echo e(auth()->user()->username); ?> (<?php echo e(auth()->user()->role); ?>)
                </span>
                <a href="<?php echo e(route('logout')); ?>" class="btn btn-danger btn-sm ms-2" onclick="return confirm('Apakah Anda yakin ingin keluar?')">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="card shadow-sm p-4 bg-white rounded border-0">
            
            <?php if(session('pesan')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('pesan')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h4 text-primary mb-0">Daftar Master Event</h2>
                
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-events')): ?>
                    <a href="<?php echo e(route('events.create')); ?>" class="btn btn-success">+ Tambah Event Baru</a>
                <?php endif; ?>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Judul Event</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Silabus</th>
                            <th>Durasi Sesi</th>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-events')): ?>
                                <th class="text-center">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($data->judul_event ?? $data->judul); ?></td>
                                <td><?php echo e($data->deskripsi); ?></td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        <?php echo e($data->kategori); ?>

                                    </span>
                                </td>
                                <td><?php echo e($data->silabus); ?></td>
                                <td><?php echo e($data->durasi_sesi ?? $data->durasi); ?> Menit</td>
                                
                                
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-events')): ?>
                                    <td class="text-center text-nowrap">
                                        <a href="<?php echo e(route('events.edit', $data->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        
                                        <form action="<?php echo e(route('events.destroy', $data->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    Belum ada data event yang tersimpan.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Kelompok 6 main\Kelompok-6-SIUUUUUUU-GG\master-event\resources\views/events/index.blade.php ENDPATH**/ ?>