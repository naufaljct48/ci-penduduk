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
  <table class="table table-hover" id="dataPenduduk">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Jumlah Penduduk</th>
      <th scope="col">Bulan</th>
      <th scope="col">Tahun</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody> 
    <?php $i = 1; ?>
    <?php foreach($penduduk as $p) : ?>
    <tr>
      <td><?= $i++; ?></td>
      <td><?= $p['jumlah_penduduk']; ?></td>
      <td><?= $p['bulan']; ?></td>
      <td><?= $p['tahun']; ?></td>
      <td>
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editData-<?= $p['id']; ?>"><i class="fa-solid fa-pen"></i> Edit</button>
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusData-<?= $p['id']; ?>"><i class="fa-solid fa-trash"></i> Hapus</button>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </div>
    </div>
<script>
  $(document).ready(function() {
    $('#dataPenduduk').DataTable();
  });
</script>
<?= $this->endSection(); ?>