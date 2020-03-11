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
                        <li class="breadcrumb-item text-muted active" aria-current="page">Hapus Data</li>
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
    <form action="<?php echo e(site_url('sistem/navigation/delete_process')); ?>" method="post">
        <input type="hidden" name="nav_id" value="<?php echo e($result['nav_id']); ?>">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <h4 class="card-title">Hapus Data</h4>
                            </div>
                            <div class="col-lg-2">
                                <div class="text-right">
                                    <a href="<?php echo e(site_url('sistem/navigation')); ?>" type="submit"
                                        class="btn btn-primary">Kembali</a>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-danger" style="margin-top: 20px">
                            <label>Data yang telah terhapus tidak akan dapat dikembalikan lagi,<strong> Yakin hapus data
                                    ini?</strong></label>
                        </div>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label><b>Induk Menu </b></label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo e($parent_title); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <label><b>Role </b></label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo e($result['nav_title']); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <label><b>Deskripsi </b></label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo e($result['nav_desc']); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <label><b>Alamat Menu</b> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo e($result['nav_url']); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label><b>Urutan</b> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo e($result['nav_no']); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <label><b>Digunakan</b> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php if($result['active_st'] == 1): ?>
                                                <label class="control-label"><span
                                                        class="label label-primary">Ya</span></label>
                                                <?php else: ?>
                                                <label class="control-label"><span
                                                        class="label label-danger">Tidak</span></label>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <label><b>Ditampilkan</b> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php if($result['display_st'] == 1): ?>
                                                <label class="control-label"><span
                                                        class="label label-primary">Ya</span></label>
                                                <?php else: ?>
                                                <label class="control-label"><span
                                                        class="label label-danger">Tidak</span></label>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <label><b>Icon</b> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><i
                                                        class="<?php echo e($result['nav_icon']); ?>"></i></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-danger m-b-10 m-l-5"> Hapus</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label><b> Created by </b> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo e($result['mdb_name']); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label><b> Date update </b> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo e($result['mdd']); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>