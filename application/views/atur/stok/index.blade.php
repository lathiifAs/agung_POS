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
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Master</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">{{ $title }}</li>
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
                        <form class="col-lg-12 row" action="{{ site_url('master/barang/search_process') }}" method="POST">
                            <div class="col-lg-3">
                                <input type="text" class="form-control" id="nametext" aria-describedby="name"
                                    placeholder="Kode Barang" name="barang_kd" value="{{ $search['barang_kd'] }}">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" id="nametext" aria-describedby="name"
                                    name="barang_nm" placeholder="Nama" value="{{ $search['barang_nm'] }}">
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
                                @if(!empty($result))
                                @foreach ($result as $rs)
                                <tr>
                                    <th class="text-align text-center"> {{ $no++ }} </th>
                                    <td class="text-align text-center">{{ $rs['barang_kd'] }}</td>
                                    <td>{{ $rs['barang_nm'] }}</td>
                                    <td class="text-align text-center">{{ $rs['stok'] }}</td>
                                    <td class="text-align text-center">{{ $rs['satuan'] }}</td>
                                    <td>
                                        <a href="{{ site_url('master/barang/edit/'.$rs['barang_id']) }}"
                                            class="btn btn-danger btn-rounded m-b-10 m-l-5" title="Edit"><i
                                                class="ti-mines"></i> -</a>
                                        <a href="{{ site_url('master/barang/edit/'.$rs['barang_id']) }}"
                                            class="btn btn-success btn-rounded m-b-10 m-l-5" title="Edit"><i
                                                class="ti-pluss"></i> +</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <th class="text-align text-center" colspan="8">
                                        <h3> Data kosong </h3>
                                    </th>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        @if (isset($pagination))
                        {!! $pagination !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>