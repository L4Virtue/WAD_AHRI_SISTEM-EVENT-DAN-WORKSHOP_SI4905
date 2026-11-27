<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Event Baru - Master Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo e(route('events.index')); ?>">Sistem Event & Workshop</a>
            <div class="navbar-nav align-items-center">
                <a class="nav-link" href="<?php echo e(route('events.index')); ?>">Daftar Event</a>
                <a class="nav-link active" href="<?php echo e(route('events.create')); ?>">Tambah Event</a>
                <a href="<?php echo e(route('logout')); ?>" class="btn btn-danger btn-sm ms-3" onclick="return confirm('Apakah Anda yakin ingin keluar?')">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card shadow-sm p-4 bg-white rounded border-0 mx-auto" style="max-width: 700px;">
            <h2 class="h4 text-primary mb-4">Tambah Master Event Baru</h2>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('events.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label">Judul Event</label>
                    <input type="text" name="judul_event" class="form-control" placeholder="Masukkan judul event" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Masukkan deskripsi event" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Teknologi">Teknologi</option>
                        <option value="Bisnis">Bisnis</option>
                        <option value="Pengembangan Diri">Pengembangan Diri</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Silabus</label>
                    <textarea name="silabus" class="form-control" rows="3" placeholder="Masukkan rincian silabus" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Durasi Sesi (Menit)</label>
                    <input type="number" name="durasi_sesi" class="form-control" placeholder="Contoh: 180" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?php echo e(route('events.index')); ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Event</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html><?php /**PATH C:\xampp\htdocs\Kelompok 6 main\Kelompok-6-SIUUUUUUU-GG\master-event\resources\views/events/create.blade.php ENDPATH**/ ?>