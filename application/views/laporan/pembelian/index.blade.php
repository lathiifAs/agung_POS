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
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Laporan</a></li>
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
                                @if(!empty($result))
                                @foreach ($result as $rs)
                                <tr>
                                    <th class="text-align text-center"> {{ $no++ }} </th>
                                    <td class="text-align text-center">{{ $rs['mdd'] }}</td>
                                    <td class="text-align text-right">Rp. {{ number_format($rs['total']) }}</td>
                                    <td class="text-align">{{ $rs['mdb_name'] }}</td>
                                    <td>
                                        <a href="{{ site_url('laporan/pembelian/detail/'.$rs['transaksi_id']) }}" type="button"
                                            class="btn btn-info btn-rounded m-b-10 m-l-5" title="Detail"><i
                                                class="ti-eye"></i> Detail</a>
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