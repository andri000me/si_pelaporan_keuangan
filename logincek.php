<?php
session_start();
require_once 'setting/crud.php';
require_once 'setting/koneksi.php';
require_once 'setting/tanggal.php';

$user=$_POST['username'];
$pass=$_POST['password']; 

//Pengecekan ada data dalam login tidak
$sqladmin="Select id_admin from tb_admin where username='$user' and password='$pass'";
$sqluser="Select id_unit from tb_user where username='$user' and password='$pass'";


$hasil=$_POST['angka1']+$_POST['angka2'];
if($_POST['hasil']==$hasil){

	unset($_SESSION['salah']);
	if (CekExist($mysqli,$sqladmin)== true){

    //JIka data ditemukan
		$_SESSION['admin']=caridata($mysqli,$sqladmin);
	//echo "<script>alert('Anda login sebagai admin')</script>";
		echo "<script>window.location='admin/index.php?hal=beranda';</script>";

	}else if (CekExist($mysqli,$sqluser)== true){

    //JIka data ditemukan
		$_SESSION['id']=caridata($mysqli,$sqluser);
		echo "<script>alert('Anda login sebagai user cabang')</script>";
		echo "<script>window.location='user/index.php?hal=beranda';</script>";

	}else{
    //Jika tidak ditemukan
		echo "<script>alert('Username atau Password tidak terdaftar')</script>";
		echo "<script>window.location='index.php';</script>";

	}
}else{
	$_SESSION['salah']='Tidak Sesuai';
	echo "<script>window.location='index.php';</script>";

}

?>