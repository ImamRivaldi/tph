<?php
include '../inc/adm.php';
?>
<?php
if ($_SESSION['level'] == "admin") {
include 'inc/header.php';
?>

<!-- ADD DATA START-->
<?php
    if (isset($_POST['proses-tambah-satuan'])) {
?>
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing layout-spacing">
                    <div class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">                                
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Tambah Satuan</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form method="POST">
                                    <div class="form-group mb-4">
                                        <label for="t-text" class="sr-only">Nama Satuan</label>
                                        <input id="t-text" type="text" name="nama_satuan" placeholder="Nama satuan..." class="form-control">
                                    </div>
                                    <input type="submit" name="tambah-satuan" class="mt-4 mb-4 btn btn-primary" value="Simpan">
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
    } else if (isset($_POST['proses-edit-satuan'])) {
        $id_satuan = $_POST['id_satuan'];
        $sqll = mysqli_query($koneksi,"SELECT * FROM satuan WHERE id_satuan='$id_satuan'");
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
                                        <h4>Edit Satuan</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form method="POST">
                                    <div class="form-group mb-4">
                                        <label for="t-text" class="sr-only">Nama Satuan</label>
                                        <input type="hidden" name="id_satuan" value="<?=$data['id_satuan'];?>">
                                        <input id="t-text" type="text" name="nama_satuan" value="<?=$data['nama_satuan'];?>" class="form-control">
                                    </div>
                                    <input type="submit" name="edit-satuan" class="mt-4 mb-4 btn btn-primary" value="Simpan">
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
                                        <h4>Satuan</h4>
                                    </div>
                                </div>
                                <form action="" method="post">
                                    <button class="btn btn-primary mb-2 mr-2" style="float: right;" name="proses-tambah-satuan"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Tambah Data</button>
                                    <a href="../report/satuan.php" class="btn btn-info mb-2 mr-2" style="float: right;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg> Print</a>
                                </form>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
                                    <table id="style-3" class="table style-3  table-hover">
                                        <thead>
                                            <tr>
                                                <th class="checkbox-column text-center"> No </th>
                                                <th class="text-center">Nama Satuan</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                $sql = mysqli_query($koneksi, "SELECT * FROM satuan");
                                                while ($row = mysqli_fetch_assoc($sql)) {
                                            ?>
                                            <tr>
                                                <td class="checkbox-column text-center"> <?=$no++; ?> </td>
                                                <td class="text-center">
                                                    <?=$row['nama_satuan']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id_satuan" value="<?=$row['id_satuan'];?>">
                                                            <li>
                                                            <button type="submit" name="proses-edit-satuan" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></button></li>
                                                            <li><button type="submit" name="delete-satuan" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button></li>
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