<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
        Edit Data
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Data</li>
      </ol>
    </section>
  <section class="content">
    <?php foreach($siswa as $row) : ?>
      <?= form_open_multipart('siswa/update');?>
      <div class="form-group">
          <label for="Nama">Nama</label>
          <input type="hidden" name="id" class="form-control" id="id" value="<?= $row->id?>">
          <input type="text" name="nama" class="form-control" id="Nama" value="<?= $row->nama?>">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $row->alamat?>">
        </div>
        <div class="form-group">
          <label for="logo">Logo</label>
          <img src="<?= base_url();?>assets/logo/<?= $row->logo?>" width="50">
          <input type="file" name="logo" class="form-control" id="logo" value="<?= $row->logo?>" >
        </div>

        <button type="reset"class="btn btn-danger">Reset</button>
        <button type="submit"class="btn btn-primary">Save</button>
        <?= form_close(); ?>
    <?php endforeach;?>
  </section>

</div>