<?php 	
	require_once('db.php');		
	$sigma = 0.3;
	$lambda = 0.1;
	$max_value = 2576596;
	$min_value = 45888;
	$alpha_padi = array(
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
	$alpha = $alpha_padi;
	// print_r($alpha);	

	// echo "<br>";
	

	$sql="SELECT luas_tanam,jml_penduduk,luas_sawah FROM padi";
	$data_training = array();	

	if ($result=mysqli_query($link,$sql)){	  
		while ($row=mysqli_fetch_row($result)){
			array_push($data_training, array($row[0], $row[1], $row[2]));		    
		}
	}

	// $data_test = array(70289,2544315,45888);
	$data_test = array($_POST["luas_tanam"],$_POST["jml_penduduk"],$_POST["luas_lahan"]);

	$norm_test = array();
	foreach ($data_test as $test) {
		array_push($norm_test, ($test - $min_value) / ($max_value - $min_value));
	}
	print_r($norm_test);

	// add data testing
	// $data_test = array(0.009641966, 0.987244281, 0);		
	// print_r($data_test);	

	mysqli_close($link);
	
	// count distance for data testing
	// echo "jarak";
	$jarak_test = array();
	for ($i=0; $i < count($data_training) ; $i++) { 
		$jarak_test[$i] = 0;
		for ($j=0; $j < count($data_training[0]); $j++) {
			$jarak_test[$i] += pow(($data_training[$i][$j] - $data_test[$j]), 2);
		}
	}

	// count kernel for data testing
	$kernel_test = array();
	for($i=0 ; $i < count($jarak_test) ; $i++){
		$kernel_test[$i] = exp(-($jarak_test[$i]/(2*pow($sigma,2))));
	}

	// count hessian for data testing
	$hessian_test = array();
	for($i=0 ; $i < count($kernel_test) ; $i++){
		$hessian_test[$i] = $kernel_test[$i]+pow($lambda,2);
	}

	// count estimation
	$estimasi = 0;
	for($i=0 ; $i < count($hessian_test) ; $i++){
		$estimasi += $alpha[$i]*($hessian_test[$i]+pow($lambda,2));
	}

	$estimasi_denorm = ($estimasi*($max_value - $min_value)) + $min_value;

	// echo "<br>";
	echo "Luas Tanam = ".$_POST["luas_tanam"]."<br>";
	echo "Jumlah Penduduk = ".$_POST["jml_penduduk"]."<br>";
	echo "Luas Lahan (Sawah) = ".$_POST["luas_lahan"]."<br>";
	echo "HASIL ESTIMASI = ".$estimasi_denorm;
	echo "<br>";

	// echo $_POST["luas_tanam"];
?>