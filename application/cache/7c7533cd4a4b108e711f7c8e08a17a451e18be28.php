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
                        <li class="breadcrumb-item"><a href="<?php echo e(site_url('master/user')); ?>"
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
                                <a href="<?php echo e(site_url('master/user')); ?>" type="submit"
                                    class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <form action="<?php echo e(site_url('master/user/edit_process')); ?>" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo e($result['user_id']); ?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Nama </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="nama" class="form-control"
                                                    placeholder="Isian nama..." value="<?php echo e($result['nama']); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Jenis Kelamin </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="jns_kelamin" class="form-control">
                                                    <?php if($result['jns_kelamin'] == 'L'): ?>
                                                    <option value="L" selected>Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                    <?php else: ?>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P" selected>Perempuan</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Hak Akses </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="role_id" id="role_id" class="form-control">
                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($role['role_id']); ?>"><?php echo e($role['role_nm']); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Alamat </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="col-sm-12" name="alamat"
                                                    placeholder="Alamat lengkap..."><?php echo e($result['alamat']); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Email </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="user_mail" class="form-control"
                                                    placeholder="Isian email..." value="<?php echo e($result['user_mail']); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Username </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="user_name" class="form-control"
                                                    placeholder="Isian username..." value="<?php echo e($result['user_name']); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Password </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="password" name="user_pass" placeholder="Isian password..."
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Status </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="user_st" class="form-control">
                                                    <?php if($result['user_st'] == 1): ?>
                                                    <option value="1" selected>Aktif</option>
                                                    <option value="0">Tidak Aktif</option>
                                                    <option value="2">Block</option>
                                                    <?php elseif($result['user_st'] == 0): ?>
                                                    <option value="1">Aktif</option>
                                                    <option value="0" selected>Tidak Aktif</option>
                                                    <option value="2">Block</option>
                                                    <?php else: ?>
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Tidak Aktif</option>
                                                    <option value="2" selected>Block</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success m-b-10 m-l-5"> Simpan</button>
                                        <button type="reset" class="btn btn-secondary m-b-10 m-l-5"> Reset</button>
                                    </div>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>