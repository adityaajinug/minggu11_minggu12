<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
        Data Siswa
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Siswa</li>
      </ol>
    </section>

  <section class="content">
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class= "fa fa-plus"></i>Tambah Data Siswa</button>
    <table class="table">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Logo</th>
        <th colspan="4">Aksi</th>
      </tr>
      <?php 
      $no = 1;
      foreach($siswa as $row) :
      
      ?>
      <tr>
        <td><?php echo $no++?></td>
        <td><?= $row->nama?></td>
        <td><?= $row->alamat?></td>
        <td><img src="<?= base_url();?>assets/logo/<?= $row->logo?>" width="50"></td>
        <td><?=  anchor('siswa/delete/'.$row->id,'<div class="btn btn-danger"><i class="fa fa-trash"></i></div>')?> 
        </td>
        <td><?=  anchor('siswa/edit/'.$row->id, '<div class="btn btn-primary"><i class="fa fa-edit"></i></div>')?>
        </td>
        <td><?=  anchor_popup('siswa/pdf/'.$row->id, '<div class="btn btn-success"><i class="fa fa-file" ></i></div>')?>
        </td>
        <td><?=  anchor('siswa/download/'.$row->id, '<div class="btn btn-warning"><i class="fa fa-download"></i></div>')?>
        </td>
      </tr>
      <?php endforeach;?>
    </table>
  </section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('siswa/add');?>
        <div class="form-group">
          <label for="Nama">Nama</label>
          <input type="text" name="nama" class="form-control" id="Nama" >
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" name="alamat" class="form-control" id="alamat" >
        </div>
        <div class="form-group">
          <label for="logo">Logo</label>
          <input type="file" name="logo" class="form-control" id="logo" >
        </div>
        <hr>
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Save</button>
      <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>

</div>
<script>
