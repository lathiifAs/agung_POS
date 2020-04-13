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
    {{-- notif wajib ada di setiap halaman admin kecuali delete--}}
    @include('template/notif')
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
                                <a href="{{ site_url('master/barang') }}" type="submit"
                                    class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ site_url('master/barang/add_process') }}" method="POST">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Kode Barang </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="number" name="barang_kd" class="form-control"
                                                    placeholder="Isian kode barang...">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Nama<span style="color:red">*</span> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="barang_nm" class="form-control"
                                                    placeholder="Isian nama...">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Harga<span style="color:red">*</span> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" id="formatnumber" name="harga" class="form-control"
                                                    placeholder="Isian harga...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Stok<span style="color:red">*</span> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                                <input type="number" name="stok" class="form-control"
                                                    placeholder="Isian stok...">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Satuan<span style="color:red">*</span> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <input type="text" name="satuan" class="form-control"
                                                    placeholder="Isian satuan...">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Status<span style="color:red">*</span> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="active_st" class="form-control">
                                                    <option value="yes">Aktif</option>
                                                    <option value="no">Tidak Aktif</option>
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('ext_js')
    <script>
        var formatnumber = document.getElementById('formatnumber');
        formatnumber.addEventListener('keyup', function () {
            var val = this.value;
            val = val.replace(/[^0-9\.]/g, '');
            if (val != "") {
                valArr = val.split('.');
                valArr[0] = (parseInt(valArr[0], 10)).toLocaleString();
                val = valArr.join('.');
            }
            this.value = val;
        });
    </script>
    @endpush