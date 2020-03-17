<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-7 align-self-center">
      <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ $title }}
      </h4>
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
            <div class="col-lg-3">
              <h2><b>Total</b></h2>
            </div>
            <div class="col-lg-9">
              <div class="text-right text-primary">
                <b><i><h1><span id="total">Rp. 0</span></h1></i></b>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 text-right">
            <button type="submit" name="search" value="tampilkan" class="btn btn-success" style="height:35px;width:80px">Selesai</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="row">
              <h4 class="card-title col-lg-12">Cari Barang</h4>
            </div>
            <!-- <form class="col-lg-12 row" action="{{ site_url('kasir/kasir/add_list') }}" method="POST"> -->
              <div class="col-lg-12">
                <select name="barang_id" id="barang_id" class="form-control select2-single">
                      <option value="">Nama</option>    
                      @foreach ($result as $rs)
                      <option value="{{ $rs['barang_id'] }}">{{ $rs['barang_nm'] }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="col-lg-12" style="margin-top:3%">
                <input type="number" class="form-control" id="jumlah" aria-describedby="jumlah" name="jumlah"
                  placeholder="Jumlah">
              </div>
              <div class="col-lg-12 text-right" style="margin-top:4%">
                <button type="button" onclick="add_list()" name="search" value="tampilkan" class="btn btn-info">Tambahkan</button>
              </div>
            <!-- </form> -->
          </div>
          <div style="margin-top:1%" class="table-responsive">
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="row">
              <h4 class="card-title col-lg-12">List Barang</h4>
            </div>
          </div>
          <div style="margin-top:1%" class="table-responsive">
            <table class="table" id="tbllist">
              <thead class="bg-primary text-white">
                <tr>
                  <!-- <th class="text-align text-center" width="5%">No.</th> -->
                  <th class="text-align text-center" width="10%">Kode Barang</th>
                  <th class="text-align text-center" width="15%">Nama</th>
                  <th class="text-align text-center" width="10%">jumlah</th>
                  <th class="text-align text-center" width="10%">harga</th>
                  <th class="text-align text-center" width="10%">subtotal</th>
                  <th class="text-align text-center" width="5%"></th>
                </tr>
              </thead>
              <tbody>
                <!-- @if(!empty($result))
                @foreach ($result as $rs)
                <tr>
                  <th class="text-align text-center"> {{ $no++ }} </th>
                  <td class="text-align text-center">{{ $rs['barang_kd'] }}</td>
                  <td>{{ $rs['barang_nm'] }}</td>
                  <td class="text-align text-center">{{ $rs['stok'] }}</td>
                  <td class="text-align text-center">Rp. 22222</td>
                  <td class="text-align text-center">Rp. 22222</td>
                  <td>
                    <a href="#" class="btn btn-danger btn-rounded m-b-10 m-l-5 modalkurangi" data-toggle="modal"
                      data-id="{{ $rs['barang_kd'] }}" href="#modal" title="Edit"><i class="ti-trash"></i> </a>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                  <th class="text-align text-center" colspan="8">
                    <h3> Data kosong </h3>
                  </th>
                </tr>
                @endif -->
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- script untuk js external -->
@push('ext_js')
<script>
    $(document).ready(function () {
        $(".select2-single").select2({
            width: '100%',
            containerCssClass: ':all:'
        });
    });

    function add_list() {
      var barang_id = $('#barang_id').find(":selected").val();
      var jumlah = $('#jumlah').val();
      if (jumlah < 0) {
        alert('jumlah tidak boleh kurang dari 1.'); 
      }

      //send ajax
      $.ajax({
          type: "POST",
          url: "{{ site_url('kasir/kasir/add_list/') }}",
          data: {
              'barang_id' : barang_id,
              'jumlah'    : jumlah
          },
          success: function (result) {
            if (result == 0) {
              alert('jumlah stok tidak mencukupi.');
            }
            else if(result == 1){
              //berhasil
              get_list();
            }else if(result == 2){
              alert('gagal menambahkan ke list.');
            }else{
              alert('Barang dan jumlah harus dimasukan.');
            }
          }
      });
    }

    $('#tbllist tbody').on('click', '.remove_list', function () {
      var detail_transaksi_id = $(this).data("id")
      //send ajax
      $.ajax({
          type: "POST",
          url: "{{ site_url('kasir/kasir/remove_list/') }}",
          data: {
              'detail_transaksi_id' : detail_transaksi_id
          },
          success: function (result) {
            if (result == 0) {
              alert('gagal menghapus barang di list!');
            }else{
              //berhasil
              get_list();
            }
          }
      });

    })

    function get_list(){
      //send ajax
      $.ajax({
          type: "POST",
          url: "{{ site_url('kasir/kasir/get_list/') }}",
          success: function (get_result) {            
            var result = JSON.parse(get_result);
            var total = 0;
            var html = [];
            $.each(result, function(i, item) {
              html.push(`
                <tr>
                      <td class="text-align text-center">`+item.barang_kd +`</td>
                      <td>`+item.barang_nm +`</td>
                      <td class="text-align text-center">`+item.jumlah +`</td>
                      <td class="text-align text-center">Rp. `+Number(item.harga).toLocaleString('ES-es') +`</td>
                      <td class="text-align text-center">Rp. `+Number(item.subtotal).toLocaleString('ES-es') +`</td>
                      <td>
                        <button type="button" class="btn btn-danger btn-rounded m-b-10 m-l-5 remove_list"
                          data-id="`+ item.detail_transaksi_id +`" title="Edit"><i class="ti-trash"></i> </button>
                      </td>
                    </tr>
              `);
              total += parseInt(item.subtotal);
                // alert(item.PageName);
            });
            
            $("#tbllist tbody").html(html);
            // console.log(total);
            document.getElementById("total").innerHTML = 'Rp. ' + Number(total).toLocaleString('ES-es');
            // document.getElementById("total").text() = 'tes';
          }
      });
    }
    
</script>
@endpush