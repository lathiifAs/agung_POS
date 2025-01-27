<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"><?php echo e($title); ?>

            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="" class="text-muted">Sistem</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(site_url('sistem/navigation')); ?>"
                                class="text-muted"><?php echo e($title); ?></a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Tambah Data</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="container-fluid">
    
    <?php echo $__env->make('template/notif', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-10">
                            <h4 class="card-title">Tambah Data</h4>
                        </div>
                        <div class="col-lg-2">
                            <div class="text-right">
                                <a href="<?php echo e(site_url('sistem/navigation')); ?>" type="submit"
                                    class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <form action="<?php echo e(site_url('sistem/navigation/add_process')); ?>" method="POST">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Induk Menu </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="parent_id" id="single"
                                                    class="form-control select2-single">
                                                    <option value='0'>Tidak ada</options>
                                                        <?php $__currentLoopData = $rs_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($menu['nav_id']); ?>">
                                                        <?php if($menu['parent_id'] == 0): ?>
                                                        <?php echo e($menu['nav_title']); ?>

                                                        <?php else: ?>
                                                        -- <?php echo e($menu['nav_title']); ?>

                                                        <?php endif; ?>
                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label>judul Menu </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="nav_title" class="form-control"
                                                    placeholder="Judul...">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Deskripsi </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="nav_desc" class="form-control"
                                                    placeholder="Deskripsi...">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Alamat Menu</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="nav_url" class="form-control"
                                                    placeholder="Alamat...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Urutan </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="nav_no" class="form-control"
                                                    placeholder="Urutan...">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Digunakan </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="active_st" class="form-control">
                                                    <option value="1">Ya</options>
                                                    <option value="0">Tidak</options>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Ditampilkan </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="display_st" class="form-control">
                                                    <option value="1">Ya</options>
                                                    <option value="0">Tidak</options>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Icon Menu </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="nav_icon" class="form-control"
                                                    placeholder="Icon...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12" style="margin-top:50px">
                                    <label>Gunakan Sebagai Menu Client </label> 
                                    <input name="client_st" type="checkbox" data-toggle="toggle"
                                                    data-onstyle="primary">
                                    <div class="col-lg-12">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success m-b-10 m-l-5"> Simpan</button>
                                            <button type="reset" class="btn btn-secondary m-b-10 m-l-5"> Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('ext_js'); ?>
            <script>
                $(document).ready(function () {
                    $(".select2-single").select2({
                        width: '100%',
                        containerCssClass: ':all:'
                    });
                });
            </script>
            <?php $__env->stopPush(); ?>