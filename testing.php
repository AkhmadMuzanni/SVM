<?php 
	require_once('db.php');
	$alpha = array(
		14.09446540328213, 
		-14.042057438070751, 
		-18.925819110730693, 
		-37.95596242115745, 
		9.638000052365264, 
		59.49678021347974, 
		38.80248875602943, 
		7.503831726226875, 
		-73.9223889057608, 
		11.98775314182274, 
		3.2600614453296224);
	print_r($alpha);

	echo "<br>";
	

	$sql="SELECT luas_tanam,jml_penduduk,luas_sawah FROM padi";
	$data_training = array();

	if ($result=mysqli_query($link,$sql)){	  
		while ($row=mysqli_fetch_row($result)){
			array_push($data_training, array($row[0], $row[1], $row[2]));		    
		}
	}

	print_r($data_training);

	mysqli_close($link)

?>