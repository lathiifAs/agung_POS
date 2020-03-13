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
                        <form class="col-lg-12 row" action="{{ site_url('atur/stok/search_process') }}" method="POST">
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
                                    <a href="#"
                                            class="btn btn-danger btn-rounded m-b-10 m-l-5 modalkurangi"  data-toggle="modal" data-id="{{ $rs['barang_id'] }}" href="#modal" title="Edit"><i
                                                class="ti-pluss"></i> -</a>
                                        <a href="#"
                                            class="btn btn-success btn-rounded m-b-10 m-l-5 modaltambah"  data-toggle="modal" data-id="{{ $rs['barang_id'] }}" href="#modal" title="Edit"><i
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

<!-- Modal Tambah -->
<form class="col-lg-12 row" action="{{ site_url('atur/stok/add_stok') }}" method="POST">
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
<form class="col-lg-12 row" action="{{ site_url('atur/stok/kurangi_stok') }}" method="POST">
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

@push('ext_js')
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
@endpush