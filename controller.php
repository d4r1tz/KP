<?php
	$MMSI = $_REQUEST['MMSI'];

	$con = mysqli_connect("localhost", "root", "", "kp_projek");

	if ($MMSI !== "") {
		
		$query = mysqli_query($con, "SELECT Nama_kapal FROM kapal WHERE MMSI='$MMSI'");

		$row = mysqli_fetch_array($query);

		$Nama_kapal = $row["Nama_kapal"];

	}

	$result = array("$Nama_kapal");
	$myJSON = json_encode($result);
	echo $myJSON;
?>