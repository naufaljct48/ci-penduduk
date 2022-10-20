<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
      <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-12 col-md-7 col-sm-6">
            <div class="container-fluid">
              <h1>Data Jumlah Penduduk</h1>
    <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#tambahPenduduk"><i class="fas fa-plus"></i> Tambah Data</button>
    <div id="loading"></div>
    <div id="boxResult"></div>
  <div class="card border-info mb-10">
  <div class="card-body">
  <table class="table table-hover" id="tablePenduduk" width="100%">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Jumlah Penduduk</th>
      <th scope="col">Bulan</th>
      <th scope="col">Tahun</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
</table>
    </div>
    </div>
<!-- Modal Tambah -->
<div class="modal fade" id="tambahPenduduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group row">
                    <div class="col-sm-5 col-form-label">
                        <label for="penduduk">Jumlah Penduduk</label>
                    </div>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" name="penduduk" id="penduduk" placeholder="Jumlah Penduduk">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-5 col-form-label">
                        <label for="bulan">Bulan</label>
                    </div>
                    <div class="col-sm-7">
                        <select name="bulan" id="bulan" class="form-control">
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-5 col-form-label">
                        <label for="tahun">Tahun</label>
                    </div>
                    <div class="col-sm-7">
                        <select name="tahun" id="tahun" class="form-control">
                          <?php
                            $firstYear = (int)date('Y') - 3;
                            $lastYear = $firstYear + 10;
                            for($i=$firstYear;$i<=$lastYear;$i++)
                            {
                                echo '<option value='.$i.'>'.$i.'</option>';
                            }
                          ?>
                        </select>
                    </div>
                </div>
                </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button onclick="kirim();" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('js'); ?>
<script>
    $(document).ready(function() {
        var table = $("#tablePenduduk").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= site_url('penduduk/ajax') ?>'
            },
            lengthMenu: [
                [5, 10, 50, 100],
                [5, 10, 50, 100]
            ], //Combobox Limit
            columns: [{
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: 'penduduk',name: 'penduduk'},
                {data: 'bulan',name: 'bulan'},
                {data: 'tahun',name: 'tahun'},
                {
                    data: function(row) {
                        let html = '<button class="btn btn-warning btn-sm mr-1" data-toggle="modal" data-target="#editData" data-id="' + row.id + '" data-penduduk="' + row.penduduk + '" data-bulan="' + row.bulan + '" data-tahun="' + row.tahun + '"><i class="fas fa-edit"></i></button> <div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Edit Data</h5><button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button></div><div class="modal-body"><div class="form-group row"><div class="col-sm-5 col-form-label"><label for="penduduk">Jumlah Penduduk</label></div><div class="col-sm-7"><input type="number" class="form-control" name="penduduk" id="penduduk" placeholder="Jumlah Penduduk" value="' + row.penduduk + '" ><input type="hidden" name="id" id="' + row.id + '"></div></div><div class="form-group row"><div class="col-sm-5 col-form-label"><label for="bulan">Bulan</label></div><div class="col-sm-7"><select name="bulan" id="bulan" class="form-control"><option value="1">Januari</option><option value="2">Februari</option><option value="3">Maret</option><option value="4">April</option><option value="5">Mei</option><option value="6">Juni</option><option value="7">Juli</option><option value="8">Agustus</option><option value="9">September</option><option value="10">Oktober</option><option value="11">November</option><option value="12">Desember</option></select></div></div><div class="form-group row"><div class="col-sm-5 col-form-label"><label for="tahun">Tahun</label></div><div class="col-sm-7"><select name="tahun" id="tahun" class="form-control"><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029">2029</option></select></div></div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button><button onclick="edit();" class="btn btn-primary">Simpan</button></div></div></div></div>';
                        html += ' <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusData" data-id="' + row.id + '"><i class="fa fa-trash"></i></button>'
                        return html;
                    }
                }
            ],
            "columnDefs": [{
                targets: 0,
                width: "5%",
            }, {
                targets: [2, 3, 4],
                orderable: true
            }]
        })
    });
    var loading = '<div class=\"progress\"><div class=\"progress-bar progress-bar-striped progress-bar-animated\" role=\"progressbar\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 100%\"></div></div>';
    function start(){
        $('#loading').html(loading);
    }
    function finish(){
        $('#loading').html("");
    }
    function kirim(){
    start();
    post();
        var penduduk = $('#penduduk').val();
        var bulan = $('#bulan').val();
        var tahun = $('#tahun').val();
        $.ajax({
            url : '<?= site_url('penduduk/tambah') ?>',
            data    : 'penduduk='+penduduk+'&bulan='+bulan+'&tahun='+tahun,
            type    : 'POST',
            dataType: 'html',
            success : function(result){
                $('#tablePenduduk').DataTable().ajax.reload();
                $('#tambahPenduduk').modal('hide');
    hasil();
    finish();
        $("#boxResult").html(result);
        }
        });
    }
    function edit(){
    start();
    post();
        var penduduk = $('#penduduk').val();
        var bulan = $('#bulan').val();
        var tahun = $('#tahun').val();
        $.ajax({
            url : '<?= site_url('penduduk/ubah') ?>',
            data    : 'penduduk='+penduduk+'&bulan='+bulan+'&tahun='+tahun,
            type    : 'POST',
            dataType: 'html',
            success : function(result){
                $('#tablePenduduk').DataTable().ajax.reload();
                $('#tambahPenduduk').modal('hide');
    hasil();
    finish();
        $("#boxResult").html(result);
        }
        });
    }
</script>
<?= $this->endSection(); ?>