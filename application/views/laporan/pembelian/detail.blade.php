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
                        <li class="breadcrumb-item"><a href="" class="text-muted">Laporan</a></li>
                        <li class="breadcrumb-item"><a href="{{ site_url('laporan/pembelian') }}"
                                class="text-muted">{{ $title }}</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Detail</li>
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
                            <h4 class="card-title">Detail</h4>
                        </div>
                        <div class="col-lg-2">
                            <div class="text-right">
                                <a href="{{ site_url('laporan/pembelian') }}" type="submit"
                                    class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label><b>Tanggal dan Waktu </b></label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ $result['mdd'] }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label><b>Kasir</b> </label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ $result['mdb_name'] }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th class="text-align text-center" width="5%">No.</th>
                                                <th class="text-align text-center" width="10%">Kode Barang</th>
                                                <th class="text-align text-center" width="15%">Nama</th>
                                                <th class="text-align text-center" width="10%">Jumlah</th>
                                                <th class="text-align text-center" width="10%">Harga</th>
                                                <th class="text-align text-center" width="10%">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($detail))
                                            @foreach ($detail as $rs)
                                            <tr>
                                                <th class="text-align text-center"> {{ $no++ }} </th>
                                                <td class="text-align text-center">{{ $rs['barang_kd'] }}</td>
                                                <td class="text-align">{{ $rs['barang_nm'] }}</td>
                                                <td class="text-align text-center">{{ $rs['jumlah'] }}</td>
                                                <td class="text-align text-right">Rp. {{ number_format($rs['harga']) }}</td>
                                                <td class="text-align text-right">Rp. {{ number_format($rs['subtotal']) }}</td>
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
                        <div class="row"  style="margin-right:0px">
                            <div class="col-lg-12 text-right">
                                <h2><b>Total </b>{{ $result['total'] }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>