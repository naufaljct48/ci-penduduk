<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
      <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-12 col-md-7 col-sm-6">
            <div class="container-fluid">
              <h1>Data Jumlah Penduduk</h1>
    <button class="btn btn-primary mb-1 tambah"><i class="fas fa-plus"></i> Tambah Data</button>
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
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
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
                // defaultContent: "-",
                // targets: "_all",
                targets: 0,
                width: "5%",
            }, {
                targets: [2, 3, 4],
                orderable: true
            }]
        })
        // tombol tambah
        $('.tambah').on('click', function() {
            $('#formModal').modal('show');
            $('form').attr('action', '<?= site_url('penduduk/tambah') ?>');
            $('.modal-title').text('Tambah Data Penduduk');
            $('button[type=submit]').attr('id', 'tambah');
        })
        // tombol simpan
        $('.content').on('click', '#tambah', function(e) {
            e.preventDefault()
            $.ajax({
                type: $("form").attr("method"),
                url: $('form').attr('action'),
                dataType: "json",
                data: $("form").serialize(),
                success: function(response) {
                    responValidasi(['tambah'], ['penduduk'], response);
                    if (response.sukses) {
                        $('#formModal').modal('hide')
                        table.ajax.reload()
                    }
                }
            });
        })
        $(".content").on("click", ".edit", function() {
            $("#formModal").modal('show');
            $(".modal-title").text('Edit Data');
            $("form").attr("action", '<?= site_url('penduduk/ubah') ?>');
            $("#penduduk").val($(this).data("penduduk"));
            $("#bulan").val($(this).data("bulan"));
            $("#tahun").val($(this).data("tahun"));
            $("button[type=submit]").attr("id", "ubah");
            $(".modal-footer").append('<input type="hidden" name="id" value="' + $(this).data("id") + '">');
        })
        // button ubah
        $(".content").on("click", "#ubah", function(e) {
            e.preventDefault();
            $.ajax({
                type: $("form").attr("method"),
                url: $("form").attr("action"),
                dataType: "json",
                data: $("form").serialize(),
                success: function(response) {
                    responValidasi(['ubah'], ['penduduk'], response);
                    if (response.sukses) {
                        $('#formModal').modal('hide')
                        table.ajax.reload()
                    }
                }
            });
        })
        $('#formModal').on('hide.bs.modal', function() {
            $('form')[0].reset();
            $('input').removeClass('is-invalid');
            $("input[name=id]").remove();
        })
        $('.content').on('click', '.hapus', function(e) {
            Swal.fire({
                title: 'Yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Konfirmasi!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= site_url('penduduk/hapus') ?>',
                        data: {
                            id: $(this).data('id')
                        },
                        success: function(response) {
                            table.ajax.reload()
                            if (response.status) {
                                toastr.success(response.pesan, 'Sukses');
                            } else {
                                toastr.error(response.pesan, 'Gagal');
                            }
                        }
                    })
                }
            })
        })
    });
</script>
<?= $this->endSection(); ?>