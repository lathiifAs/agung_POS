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
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Sistem</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page"><?php echo e($title); ?></li>
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
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <h4 class="card-title col-lg-12">Daftar Navigasi</h4>
                        </div>
                        <form class="col-lg-12 row" action="<?php echo e(site_url('sistem/navigation/search_process')); ?>"
                            method="POST">
                            <div class="col-lg-6">
                                <select name="nav_id" id="single" class="form-control select2-single">
                                    <option value='0'>Pilih Navigasi</options>
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
                            <div class="col-lg-3">
                                <button type="submit" name="search" value="tampilkan" class="btn btn-info">Cari</button>
                                <button type="submit" name="search" value="reset"
                                    class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                        <div class="text-right col-lg-12">
                            <a href="<?php echo e(site_url('sistem/navigation/add')); ?>" type="submit"
                                class="btn btn-primary">Tambah
                                Data</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-align text-center" width="5%">No.</th>
                                    <th class="text-align text-center" width="20%">Judul Navigasi</th>
                                    <th class="text-align text-center" width="20%">URL Navigasi</th>
                                    <th class="text-align text-center" width="10%">Menu Client</th>
                                    <th class="text-align text-center" width="10%">Digunakan</th>
                                    <th class="text-align text-center" width="10%">Ditampilkan</th>
                                    <th class="text-align text-center" width="10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th class="text-align text-center"> <?php echo e($no++); ?> </th>
                                    <td>
                                        <?php if($rs['parent_id'] == 0): ?>
                                        <?php echo e($rs['nav_title']); ?>

                                        <?php else: ?>
                                        -- <?php echo e($rs['nav_title']); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($rs['nav_url']); ?></td>
                                    <td class="text-align text-center">
                                        <?php if($rs['client_st'] == 1): ?>
                                        <span class="label label-primary">Ya</span>
                                        <?php else: ?>
                                        <span class="label label-danger">Tidak</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-align text-center">
                                        <?php if($rs['active_st'] == 1): ?>
                                        <span class="label label-primary">Ya</span>
                                        <?php else: ?>
                                        <span class="label label-danger">Tidak</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-align text-center">
                                        <?php if($rs['display_st'] == 1): ?>
                                        <span class="label label-primary">Ya</span>
                                        <?php else: ?>
                                        <span class="label label-danger">Tidak</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(site_url('sistem/navigation/edit/'.$rs['nav_id'])); ?>"
                                            class="btn btn-success btn-rounded m-b-10 m-l-5" title="Edit"><i
                                                class="ti-pencil"></i> Edit </a>
                                        <a href="<?php echo e(site_url('sistem/navigation/delete/'.$rs['nav_id'])); ?>"
                                            class="btn btn-danger btn-rounded m-b-10 m-l-5" title="Delete"><i
                                                class="ti-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="text-right">
                            <?php if(isset($pagination)): ?>
                            <?php echo $pagination; ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- script untuk js external -->
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