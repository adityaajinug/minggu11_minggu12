<!DOCTYPE html>
<html lang="en"><head>
  <title></title>
</head><body>
  <table border="1">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Logo</th>
    </tr>
    <tr>
      <td><?= $siswa->nama?></td>
      <td><?= $siswa->alamat?></td>
      <td><img src="<?= base_url();?>assets/logo/<?= $siswa->logo?>" width="50"></td>
    </tr>

  </table>
  <script type="text/javascript">
window.print();
</script>
</body></html>