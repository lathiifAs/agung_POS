            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Selamat datang kembali.</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                            <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                                <option selected>Aug 19</option>
                                <option value="1">July 19</option>
                                <option value="2">Jun 19</option>
                            </select>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="container-fluid">
                <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php echo e($ttl_transaksi); ?></h2>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Transaksi</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i class="fab fa-opencart"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                            class="set-doller">Rp. </sup><?php echo e(number_format($ttl_pemasukan)); ?></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Pemasukan
                                    </h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i class="fas fa-dollar-sign"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Penjualan Barang</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th class="text-align text-center" width="5%">No.</th>
                                                <th class="text-align text-center" width="10%">Kode Barang</th>
                                                <th class="text-align text-center" width="25%">Barang</th>
                                                <th class="text-align text-center" width="20%">Jumlah Terjual</th>
                                                <th class="text-align text-center" width="20%">Sisa Stok</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($peritem)): ?>
                                            <?php $__currentLoopData = $peritem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th class="text-align text-center"> <?php echo e($no++); ?> </th>
                                                <td class="text-align text-center"><?php echo e($rs['barang_kd']); ?></td>
                                                <td class="text-align"><?php echo e($rs['barang_nm']); ?></td>
                                                <td class="text-align text-center"><?php echo e($rs['jumlah']); ?></td>
                                                <td class="text-align text-center"><?php echo e($rs['stok']); ?></td>
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