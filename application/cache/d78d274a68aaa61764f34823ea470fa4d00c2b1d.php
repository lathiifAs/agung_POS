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
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Laporan</a></li>
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
                            <h4 class="card-title col-lg-12">Daftar Transaksi</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-align text-center" width="5%">No.</th>
                                    <th class="text-align text-center" width="15%">Tanggal Transaksi</th>
                                    <th class="text-align text-center" width="25%">Total Pembelian</th>
                                    <th class="text-align text-center" width="25%">Nama Kasir</th>
                                    <th class="text-align text-center" width="15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($result)): ?>
                                <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th class="text-align text-center"> <?php echo e($no++); ?> </th>
                                    <td class="text-align text-center"><?php echo e($rs['mdd']); ?></td>
                                    <td class="text-align text-right">Rp. <?php echo e(number_format($rs['total'])); ?></td>
                                    <td class="text-align"><?php echo e($rs['mdb_name']); ?></td>
                                    <td>
                                        <a href="<?php echo e(site_url('laporan/pembelian/detail/'.$rs['transaksi_id'])); ?>" type="button"
                                            class="btn btn-info btn-rounded m-b-10 m-l-5" title="Detail"><i
                                                class="ti-eye"></i> Detail</a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <tr>
                                    <th class="text-align text-center" colspan="8">
                                        <h3> Data kosong </h3>
                                    </th>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <?php if(isset($pagination)): ?>
                        <?php echo $pagination; ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>