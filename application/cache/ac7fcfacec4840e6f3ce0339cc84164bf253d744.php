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
    
    <?php echo $__env->make('template/notif', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <h4 class="card-title col-lg-12">Daftar Group</h4>
                        </div>
                        <form class="col-lg-12 row" action="<?php echo e(site_url('sistem/group/search_process')); ?>"
                            method="POST">
                            <div class="col-lg-5">
                                <input type="text" name="group_name" class="form-control" value="<?php echo e($search['group_name']); ?>" placeholder="Nama group...">
                            </div>
                            <div class="col-lg-3">
                                <button type="submit" name="search" value="tampilkan" class="btn btn-info">Cari</button>
                                <button type="submit" name="search" value="reset"
                                    class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                        <div class="text-right col-lg-12">
                            <a href="<?php echo e(site_url('sistem/group/add')); ?>" type="submit" class="btn btn-primary">Tambah
                                Data</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-align text-center" width="5%">No.</th>
                                    <th class="text-align text-center" width="20%">Group</th>
                                    <th class="text-align text-center" width="45%">Deskripsi</th>
                                    <th class="text-align text-center" width="30%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($result)): ?>
                                    <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th class="text-align text-center"> <?php echo e($no++); ?> </th>
                                        <td class="text-align"><?php echo e($rs['group_name']); ?></td>
                                        <td><?php echo e($rs['group_desc']); ?></td>
                                        <td>
                                            <a href="<?php echo e(site_url('sistem/group/detail/'.$rs['group_id'])); ?>" type="button"
                                                class="btn btn-info btn-rounded m-b-10 m-l-5" title="Detail"><i
                                                    class="ti-eye"></i> Detail</a>
                                            <a href="<?php echo e(site_url('sistem/group/edit/'.$rs['group_id'])); ?>"
                                                class="btn btn-success btn-rounded m-b-10 m-l-5" title="Edit"><i
                                                    class="ti-pencil"></i> Edit </a>
                                            <a href="<?php echo e(site_url('sistem/group/delete/'.$rs['group_id'])); ?>"
                                                class="btn btn-danger btn-rounded m-b-10 m-l-5" title="Delete"><i
                                                    class="ti-trash"></i> Hapus</button>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <th class="text-align text-center" colspan="4"><h3> Data kosong </h3></th>
                                    </tr>
                                <?php endif; ?>
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