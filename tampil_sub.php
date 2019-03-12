<?php
// include file koneksi
require 'koneksi.php';
// buat QUery perintah untuk menampilkan semua data
// Secara Descending berdasarkan ID
$id = $_GET['id_sub_category'];
$sql_get_category = "SELECT * FROM sub_category JOIN produk_media WHERE id_sub_category = '$id' ";
$query = $conn->query($sql_get_category);


// Variable penampung array sementara
$response_data = null;
while ($data = $query->fetch_array()) {
 // tambahkan data yg di seleksi ke dalam array
 $response_data[] = $data;
}
// Cek apakah datanya null ?
if (is_null($response_data)) {
 // jika ya, buat status untuk response jadi false
 $status = false;
} else {
 // jika tidak, buat status untuk response jadi true
 $status = true;
}
// Set type header response ke Json
header('Content-Type: application/json');
// Bungkus data dalam array
$response = ['status' => $status, 'sub_category' => $response_data];
// tampilkan dan convert ke format json
echo json_encode($response);
mysqli_close($conn);

?>