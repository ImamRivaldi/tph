<?php
include '../inc/adm.php';
?>
<?php
if ($_SESSION['level'] == "admin") {
include 'inc/header.php';
?>

<!-- ADD DATA START-->
<?php
    if (isset($_POST['proses-tambah-barang'])) {
?>
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing layout-spacing">
                    <div class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">                                
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Tambah Barang</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form method="POST">
                                    <div class="form-group mb-4">
                                        <label for="t-text" class="sr-only">Nama Barang</label>
                                        <input id="t-text" type="text" name="nama_barang" placeholder="Nama barang..." class="form-control">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="t-text" class="sr-only">Nama Kategori</label>
                                        <select class="placeholder js-states form-control" name="id_kategori" title="Pilih Data Kategori">
                                            <?php
                                                $sqlkategori = mysqli_query($koneksi,"SELECT * FROM kategori");
                                                while ($row = mysqli_fetch_assoc($sqlkategori)) {
                                            ?>
                                                <option value="<?=$row['id_kategori'];?>"><?=$row['nama_kategori'];?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="t-text" class="sr-only">Nama Satuan</label>
                                        <select class="placeholder js-states form-control" name="id_satuan" title="Pilih Data Satuan">
                                            <?php
                                                $sqlsatuan = mysqli_query($koneksi,"SELECT * FROM satuan");
                                                while ($row = mysqli_fetch_assoc($sqlsatuan)) {
                                            ?>
                                                <option value="<?=$row['id_satuan'];?>"><?=$row['nama_satuan'];?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-4">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon5">Rp.</span>
                                      </div>
                                      <input type="text" class="form-control" placeholder="Harga" aria-label="Harga" name="harga">
                                    </div>
                                    <input type="submit" name="tambah-barang" class="mt-4 mb-4 btn btn-primary" value="Simpan">
                                    <input type="submit" name="proses-batal" class="mt-4 mb-4 btn btn-danger" value="Batal">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- ADD DATA END -->
<!-- EDIT DATA START -->
<?php
    } else if (isset($_POST['proses-edit-barang'])) {
        $id_barang = $_POST['id_barang'];
        $sqll = mysqli_query($koneksi,"SELECT * FROM barang WHERE id_barang='$id_barang'");
        while ($data = mysqli_fetch_assoc($sqll)) {
?>
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing layout-spacing">
                    <div class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">                                
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Edit Barang</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form method="POST">
                                    <div class="form-group mb-4">
                                        <label for="t-text" class="sr-only">Nama Barang</label>
                                        <input type="hidden" name="id_barang" value="<?=$data['id_barang'];?>">
                                        <input id="t-text" type="text" name="nama_barang" value="<?=$data['nama_barang'];?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="t-text" class="sr-only">Nama Kategori</label>
                                        <select class="placeholder js-states form-control" name="id_kategori" title="Pilih Data Kategori">
                                            <option value="<?=$data['id_kategori'];?>"><?=$data['nama_kategori'];?></option>
                                            <?php
                                                $sqlkategori = mysqli_query($koneksi,"SELECT * FROM kategori");
                                                while ($row = mysqli_fetch_assoc($sqlkategori)) {
                                            ?>
                                                <option value="<?=$row['id_kategori'];?>"><?=$row['nama_kategori'];?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="t-text" class="sr-only">Nama Satuan</label>
                                        <select class="placeholder js-states form-control" name="id_satuan" title="Pilih Data Satuan">
                                            <?php
                                                $sqlsatuan = mysqli_query($koneksi,"SELECT * FROM satuan");
                                                while ($row = mysqli_fetch_assoc($sqlsatuan)) {
                                            ?>
                                                <option value="<?=$row['id_satuan'];?>"><?=$row['nama_satuan'];?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-4">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon5">Rp.</span>
                                      </div>
                                      <input type="text" class="form-control" placeholder="Harga" aria-label="Harga" name="harga">
                                    </div>
                                    <input type="submit" name="edit-barang" class="mt-4 mb-4 btn btn-primary" value="Simpan">
                                    <input type="submit" name="proses-batal" class="mt-4 mb-4 btn btn-danger" value="Batal">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- EDIT DATA END -->
<?php
}
    } else {
?>
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing layout-spacing">
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Barang</h4>
                                    </div>
                                </div>
                                <form action="" method="post">
                                    <button class="btn btn-primary mb-2 mr-2" style="float: right;" name="proses-tambah-barang">Tambah Data</button>
                                    <a href="../report/barang.php" class="btn btn-info mb-2 mr-2" style="float: right;">Print</a>
                                </form>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
                                    <table id="style-3" class="table style-3  table-hover">
                                        <thead>
                                            <tr>
                                                <th class="checkbox-column text-center"> No </th>
                                                <th class="text-center">Nama Barang</th>
                                                <th class="text-center">Nama Kategori</th>
                                                <th class="text-center">Nama Satuan</th>
                                                <th class="text-center">Harga</th>
                                                <th class="text-center">Stok</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                $sql = mysqli_query($koneksi, "SELECT * FROM barang INNER JOIN kategori ON barang.id_kategori = kategori.id_kategori INNER JOIN satuan ON barang.id_satuan = satuan.id_satuan");
                                                while ($row = mysqli_fetch_assoc($sql)) {
                                            ?>
                                            <tr>
                                                <td class="checkbox-column text-center"> <?=$no++; ?> </td>
                                                <td class="text-center">
                                                    <?=$row['nama_barang']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?=$row['nama_kategori']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?=$row['nama_satuan']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?=$row['harga']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?=$row['stok']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id_barang" value="<?=$row['id_barang'];?>">
                                                            <li>
                                                            <button type="submit" name="proses-edit-barang" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></button></li>
                                                            <li><button type="submit" name="delete-barang" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button></li>
                                                        </form>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
<?php
    }
?>
<?php
include 'inc/footer.php';
} else {
  header('location: index.php');
}
?>