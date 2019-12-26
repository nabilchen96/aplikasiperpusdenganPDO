<?php
error_reporting(0);
include 'koneksi.php';
$id = $_GET['id'];
$proses = $_GET['proses'];
$namabuku = $_POST['namabuku'];
$jenisbuku = $_POST['jenisbuku'];
$pengarang = $_POST['pengarang'];
$tahunterbit = $_POST['tahunterbit'];
$penerbit = $_POST['penerbit'];
$isbn = $_POST['isbn'];

if($proses == "tambah"){
    $sql = "INSERT INTO buku (namabuku,jenisbuku,pengarang,tahunterbit,penerbit,ISBN) VALUES ('$namabuku','$jenisbuku','$pengarang','$tahunterbit','$penerbit','$isbn')";
    $data = $conn->prepare($sql);
    $hasil = $data->execute([$namabuku,$jenisbuku,$pengarang,$tahunterbit,$penerbit,$isbn]);
    if($hasil){
    echo
        '<script>alert("Berhasil");window.location="index.php";</script>';
    }else{
    echo
        '<script>alert("Gagal");window.location="index.php";</script>';
    }
}elseif($proses == "edit"){
    $sql = "UPDATE buku set namabuku='$namabuku',jenisbuku='$jenisbuku',pengarang='$pengarang',tahunterbit='$tahunterbit',penerbit='$penerbit',ISBN='$isbn' WHERE idbuku='$id'";
    $data = $conn->prepare($sql);
    $hasil = $data->execute([$namabuku,$jenisbuku,$pengarang,$tahunterbit,$penerbit,$isbn]);
    if($hasil){
    echo
        '<script>alert("Berhasil");window.location="index.php";</script>';
    }else{
    echo
        '<script>alert("Gagal");window.location="index.php";</script>';
    }
}elseif($proses == 'hapus'){
    $sql = "DELETE FROM buku WHERE idbuku='$id'";
    $data = $conn->prepare($sql);
    $hasil = $data->execute([$id]);
    if($hasil){
        echo
            '<script>alert("Berhasil");window.location="index.php";</script>';
        }else{
        echo
            '<script>alert("Gagal");window.location="index.php";</script>';
        }
}

?>