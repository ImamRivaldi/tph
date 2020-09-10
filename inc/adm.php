<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include '../inc/koneksi.php';

if (isset($_POST['logout'])) {
    session_start();
    session_destroy();
	echo "<script>alert('Berhasil Log Out.');document.location.href='../index.php'</script>";
}

/*BARANG START*/
if (isset($_POST['proses-batal'])) {
	$_SESSION['fungsi'] = "view";
}

if (isset($_POST['tambah-barang'])) {
	$nama_barang 		= $_POST['nama_barang'];
	$id_sub_jenis 		= $_POST['id_sub_jenis'];
	$status 			= $_POST['status'];
	$_SESSION['fungsi'] = "view";

	$sql = mysqli_query($koneksi,"INSERT INTO barang VALUES('','$nama_barang','$id_sub_jenis','$status')");
	echo "<script>alert('Berhasil Menambahkan Data.');document.location.href='barang.php'</script>";
}

if (isset($_POST['edit-barang'])) {
	$id_barang	 		= $_POST['id_barang'];
	$nama_barang 		= $_POST['nama_barang'];
	$id_sub_jenis 		= $_POST['id_sub_jenis'];
	$status 			= $_POST['status'];
	$_SESSION['fungsi'] = "view";

	$sql = mysqli_query($koneksi,"UPDATE barang SET nama_barang='$nama_barang', id_sub_jenis='$id_sub_jenis', status='$status' WHERE id_barang='$id_barang'");
	echo "<script>alert('Berhasil Mengedit Data.');document.location.href='barang.php'</script>";
}

if (isset($_POST['delete-barang'])) {
	$id_barang	 		= $_POST['id_barang'];
	$_SESSION['fungsi'] = "view";

	$sql = mysqli_query($koneksi,"DELETE FROM barang WHERE id_barang='$id_barang'");
	echo "<script>alert('Berhasil Menghapus Data.');document.location.href='barang.php'</script>";
}
/*BARANG END*/
?>