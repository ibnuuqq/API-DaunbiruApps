<?php
	

	$id = @$_GET['id_sub_category'];
	require 'koneksi.php';
	$query = "SELECT sc.id_sub_category,sc.nama_sub_category,pm.media,pm.deskripsi FROM sub_category sc LEFT JOIN produk_media pm ON sc.id_sub_category = pm.id_sub_category  WHERE sc.id_sub_category='$id'";
	$sql = mysqli_query($conn,$query);
	$ray = array();

	while ($row = @mysqli_fetch_array($sql)) {
		array_push($ray,array(
			"id_sub_category" => $row['id_sub_category'],
			"nama_sub_category" => $row['nama_sub_category'],
			"media" => $row['media'],
			"deskripsi" => $row['deskripsi']));
		}
		echo json_encode($ray);

		mysqli_close($conn);

?>