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
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Master</a></li>
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
                            <h4 class="card-title col-lg-12">Daftar Barang</h4>
                        </div>
                        <form class="col-lg-12 row" action="<?php echo e(site_url('atur/stok/search_process')); ?>" method="POST">
                            <div class="col-lg-3">
                                <input type="text" class="form-control" id="nametext" aria-describedby="name"
                                    placeholder="Kode Barang" name="barang_kd" value="<?php echo e($search['barang_kd']); ?>">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" id="nametext" aria-describedby="name"
                                    name="barang_nm" placeholder="Nama" value="<?php echo e($search['barang_nm']); ?>">
                            </div>
                            <div class="col-lg-3">
                                <button type="submit" name="search" value="tampilkan" class="btn btn-info">Cari</button>
                                <button type="submit" name="search" value="reset"
                                    class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                    <div style="margin-top:1%" class="table-responsive">
                        <table class="table">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-align text-center" width="5%">No.</th>
                                    <th class="text-align text-center" width="15%">Kode Barang</th>
                                    <th class="text-align text-center" width="20%">Nama</th>
                                    <th class="text-align text-center" width="10%">jumlah Stok</th>
                                    <th class="text-align text-center" width="10%">Satuan</th>
                                    <th class="text-align text-center" width="10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($result)): ?>
                                <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th class="text-align text-center"> <?php echo e($no++); ?> </th>
                                    <td class="text-align text-center"><?php echo e($rs['barang_kd']); ?></td>
                                    <td><?php echo e($rs['barang_nm']); ?></td>
                                    <td class="text-align text-center"><?php echo e($rs['stok']); ?></td>
                                    <td class="text-align text-center"><?php echo e($rs['satuan']); ?></td>
                                    <td>
                                    <a href="#"
                                            class="btn btn-danger btn-rounded m-b-10 m-l-5 modalkurangi"  data-toggle="modal" data-id="<?php echo e($rs['barang_id']); ?>" href="#modal" title="Edit"><i
                                                class="ti-pluss"></i> -</a>
                                        <a href="#"
                                            class="btn btn-success btn-rounded m-b-10 m-l-5 modaltambah"  data-toggle="modal" data-id="<?php echo e($rs['barang_id']); ?>" href="#modal" title="Edit"><i
                                                class="ti-pluss"></i> +</a>
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

<!-- Modal Tambah -->
<form class="col-lg-12 row" action="<?php echo e(site_url('atur/stok/add_stok')); ?>" method="POST">
  <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Tambah Stok</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="barang_id" class="barang_id" value="">
          <input type="number" placeholder="Jumlah" name="jumlah" style="text-align:center;" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- Modal Kurang -->
<form class="col-lg-12 row" action="<?php echo e(site_url('atur/stok/kurangi_stok')); ?>" method="POST">
  <div class="modal fade" id="modalkurangi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Kurangi Stok</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="barang_id" class="barang_id" value="">
          <input type="number" placeholder="Jumlah" name="jumlah" style="text-align:center;" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>

<?php $__env->startPush('ext_js'); ?>
<script>
 $(document).on("click", ".modaltambah", function () {
      var barang_id = $(this).data('id');
      $(".modal-body .barang_id").val(barang_id);
      $('#modaltambah').modal('show');
  });

  $(document).on("click", ".modalkurangi", function () {
      var barang_id = $(this).data('id');
      $(".modal-body .barang_id").val(barang_id);
      $('#modalkurangi').modal('show');
  });
</script>
<?php $__env->stopPush(); ?>