<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include '../inc/koneksi.php';

if (isset($_POST['logout'])) {
    session_start();
    session_destroy();
	echo "<script>alert('Berhasil Log Out.');document.location.href='../index.php'</script>";
}

/*KATEGORI START*/
if (isset($_POST['proses-batal'])) {
	$_SESSION['fungsi'] = "view";
}

if (isset($_POST['tambah-kategori'])) {
	$nama_kategori 		= $_POST['nama_kategori'];
	$_SESSION['fungsi'] = "view";

	$sql = mysqli_query($koneksi,"INSERT INTO kategori VALUES('','$nama_kategori')");
	echo "<script>alert('Berhasil Menambahkan Data.');document.location.href='kategori.php'</script>";
}

if (isset($_POST['edit-kategori'])) {
	$id_kategori	 	= $_POST['id_kategori'];
	$nama_kategori 		= $_POST['nama_kategori'];
	$_SESSION['fungsi'] = "view";

	$sql = mysqli_query($koneksi,"UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'");
	echo "<script>alert('Berhasil Mengedit Data.');document.location.href='kategori.php'</script>";
}

if (isset($_POST['delete-kategori'])) {
	$id_kategori	 	= $_POST['id_kategori'];
	$_SESSION['fungsi'] = "view";

	$sql = mysqli_query($koneksi,"DELETE FROM kategori WHERE id_kategori='$id_kategori'");
	echo "<script>alert('Berhasil Menghapus Data.');document.location.href='kategori.php'</script>";
}
/*KATEGORI END*/

/*SATUAN START*/
if (isset($_POST['tambah-satuan'])) {
	$nama_satuan		= $_POST['nama_satuan'];
	$_SESSION['fungsi']	= "view";

	$sql = mysqli_query($koneksi, "INSERT INTO satuan VALUES('','$nama_satuan')");
	echo "<script>alert('Berhasil Menambahkan Data.');document.location.href='satuan.php'</script>";
}

if (isset($_POST['edit-satuan'])) {
	$id_satuan	 		= $_POST['id_satuan'];
	$nama_satuan 		= $_POST['nama_satuan'];
	$_SESSION['fungsi'] = "view";

	$sql = mysqli_query($koneksi,"UPDATE satuan SET nama_satuan='$nama_satuan' WHERE id_satuan='$id_satuan'");
	echo "<script>alert('Berhasil Mengedit Data.');document.location.href='satuan.php'</script>";
}

if (isset($_POST['delete-satuan'])) {
	$id_satuan	 		= $_POST['id_satuan'];
	$_SESSION['fungsi'] = "view";

	$sql = mysqli_query($koneksi,"DELETE FROM satuan WHERE id_satuan='$id_satuan'");
	echo "<script>alert('Berhasil Menghapus Data.');document.location.href='satuan.php'</script>";
}
/*SATUAN END*/  
?>