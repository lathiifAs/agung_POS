<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ $title }}
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="" class="text-muted">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ site_url('master/barang') }}"
                                class="text-muted">{{ $title }}</a></li>
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
    <form action="{{ site_url('master/barang/delete_process') }}" method="post">
        <input type="hidden" name="barang_id" value="{{ $result['barang_id'] }}">
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
                                    <a href="{{ site_url('master/barang') }}" type="submit"
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
                                <label><b>Kode Barang </b></label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ $result['barang_kd'] }}</label>
                                        </div>
                                    </div>
                                </div>
                                <label><b>Nama </b></label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ $result['barang_nm'] }}</label>
                                        </div>
                                    </div>
                                </div>
                                <label><b>Harga </b></label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Rp. {{ number_format($result['harga']) }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label><b>Stok</b> </label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ $result['stok'] }}</label>
                                        </div>
                                    </div>
                                </div>
                                <label><b>Satuan</b> </label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ $result['satuan'] }}</label>

                                        </div>
                                    </div>
                                </div>
                                <label><b>Status</b> </label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @if ($result['active_st'] == 'yes')
                                            <span class="badge badge-success">aktif</span>
                                            @else
                                            <span class="badge badge-danger">tidak aktif</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-danger m-b-10 m-l-5"> Hapus</button>
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