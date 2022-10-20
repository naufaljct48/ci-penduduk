<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
      <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-12 col-md-7 col-sm-6">
            <div class="container-fluid">
              <h1>Data Jumlah Penduduk</h1>
    <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#tambahPenduduk"><i class="fas fa-plus"></i> Tambah Data</button>
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
<!-- Modal -->
<div class="modal fade" id="tambahPenduduk" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Penduduk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <?= form_open() ?>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="submit" id="" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('js'); ?>
<script>
    $(document).ready(function() {
        const table = $("#tablePenduduk").DataTable({
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
                        let html = '<button class="btn btn-warning btn-sm mr-1 edit" data-id="' + row.id + '" data-penduduk="' + row.penduduk + '" data-bulan="' + row.bulan + '" data-tahun="' + row.tahun + '"><i class="fas fa-edit"></i></button> ';
                        html += '<button class="btn btn-danger btn-sm hapus" data-id="' + row.id + '"><i class="fa fa-trash"></i></button>'
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
</script>
<?= $this->endSection(); ?>