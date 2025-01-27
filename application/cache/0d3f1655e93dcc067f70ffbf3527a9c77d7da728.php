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
                        <li class="breadcrumb-item"><a href="" class="text-muted">Master</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(site_url('sistem/navigation')); ?>"
                                class="text-muted"><?php echo e($title); ?></a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Edit Data</li>
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
                            <h4 class="card-title">Edit Data</h4>
                        </div>
                        <div class="col-lg-2">
                            <div class="text-right">
                                <a href="<?php echo e(site_url('sistem/navigation')); ?>" type="submit"
                                    class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <form action="<?php echo e(site_url('sistem/navigation/edit_process')); ?>" method="POST">
                        <input type="hidden" name="nav_id" value="<?php echo e($result['nav_id']); ?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Induk Menu </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="parent_id" id="parent_id"
                                                    class="form-control select2-single parent_id">
                                                    <option value='0'>Tidak ada</options>
                                                        <?php $__currentLoopData = $rs_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($menu['nav_id']); ?>"
                                                        <?php if($menu['nav_id']==$result['parent_id']): ?> selected <?php endif; ?>>
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
                                                <input type="text" name="nav_title" value="<?php echo e($result['nav_title']); ?>"
                                                    class="form-control" placeholder="Judul...">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Deskripsi </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="nav_desc" value="<?php echo e($result['nav_desc']); ?>"
                                                    class="form-control" placeholder="Deskripsi...">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Alamat Menu</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="nav_url" value="<?php echo e($result['nav_url']); ?>"
                                                    class="form-control" placeholder="Alamat...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Urutan </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="nav_no" value="<?php echo e($result['nav_no']); ?>"
                                                    class="form-control" placeholder="Urutan...">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Digunakan </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="active_st" class="form-control">
                                                    <?php if($result['active_st'] == 1): ?>
                                                    <option value="1" selected>Ya</options>
                                                    <option value="0">Tidak</options>
                                                        <?php else: ?>
                                                    <option value="1">Ya</options>
                                                    <option value="0" selected>Tidak</options>
                                                        <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Ditampilkan </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="display_st" class="form-control">
                                                    <?php if($result['display_st'] == 1): ?>
                                                    <option value="1" selected>Ya</options>
                                                    <option value="0">Tidak</options>
                                                        <?php else: ?>
                                                    <option value="1">Ya</options>
                                                    <option value="0" selected>Tidak</options>
                                                        <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Icon Menu </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="nav_icon" value="<?php echo e($result['nav_icon']); ?>"
                                                    class="form-control" placeholder="Icon...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12" style="margin-top:50px">
                                    <label>Gunakan Sebagai Menu Client </label>
                                    <?php if($result['client_st'] == 1): ?>
                                    <input type="checkbox" name="client_st" checked data-toggle="toggle"
                                        data-onstyle="primary">
                                    <?php else: ?>
                                    <input type="checkbox" name="client_st" data-toggle="toggle" data-onstyle="primary">
                                    <?php endif; ?>
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